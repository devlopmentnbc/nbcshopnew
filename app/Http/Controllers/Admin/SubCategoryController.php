<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the sub-categories.
     */
    public function index(Request $request)
    {
        $query = SubCategory::with('category');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $subCategories = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.sub_categories.index', compact('subCategories', 'categories'));
    }

    /**
     * Show the form for creating a new sub-category.
     */
    public function create()
    {
        $categories = Category::where('status', true)->orderBy('name')->get();
        return view('admin.sub_categories.create', compact('categories'));
    }

    /**
     * Store a newly created sub-category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:sub_categories,name',
            'slug' => 'nullable|string|max:255|unique:sub_categories,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $uploadDir = public_path('uploads/sub_categories');

        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $file = $request->file('image');
        $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);
        $imagePath = 'uploads/sub_categories/' . $filename;

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : true,
        ]);

        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category created successfully.');
    }

    /**
     * Show the form for editing the specified sub-category.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.sub_categories.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified sub-category in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:sub_categories,name,' . $subCategory->id,
            'slug' => 'nullable|string|max:255|unique:sub_categories,slug,' . $subCategory->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = $subCategory->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/sub_categories');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            if ($subCategory->image && File::exists(public_path($subCategory->image))) {
                File::delete(public_path($subCategory->image));
            }

            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/sub_categories/' . $filename;
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        $subCategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category updated successfully.');
    }

    /**
     * Remove the specified sub-category from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        if ($subCategory->image && File::exists(public_path($subCategory->image))) {
            File::delete(public_path($subCategory->image));
        }

        $subCategory->delete();

        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category deleted successfully.');
    }
}
