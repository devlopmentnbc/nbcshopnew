<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(Request $request)
    {
        $query = Category::withCount('subCategories');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $categories = $query->latest()->paginate(10)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $uploadDir = public_path('uploads/categories');

        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $file = $request->file('image');
        $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);
        $imagePath = 'uploads/categories/' . $filename;

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : true,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/categories');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            if ($category->image && File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }

            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/categories/' . $filename;
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image && File::exists(public_path($category->image))) {
            File::delete(public_path($category->image));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
