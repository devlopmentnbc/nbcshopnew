<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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

        $categories = $query
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

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
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'h1_heading' => 'nullable|string|max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);
        $this->ensureSlugIsNotReserved($slug);

        $uploadDir = public_path('uploads/categories');

        if (! File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true, true);
        }

        $file = $request->file('image');
        $filename = time().'_'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);
        $imagePath = 'uploads/categories/'.$filename;

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'meta_title' => $request->filled('meta_title') ? trim($request->input('meta_title')) : null,
            'meta_description' => $request->filled('meta_description') ? trim(preg_replace('/\s+/', ' ', $request->input('meta_description'))) : null,
            'h1_heading' => $request->filled('h1_heading') ? trim($request->input('h1_heading')) : null,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : true,
            'sort_order' => ((int) Category::max('sort_order')) + 1,  // Add New Category to the end of the list
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        $subCategories = $category->subCategories()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'name', 'status']);

        return view('admin.categories.edit', compact('category', 'subCategories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'slug' => 'nullable|string|max:255|unique:categories,slug,'.$category->id,
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'h1_heading' => 'nullable|string|max:120',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);
        $this->ensureSlugIsNotReserved($slug);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/categories');

            if (! File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            if ($category->image && File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }

            $filename = time().'_'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/categories/'.$filename;
        }

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'meta_title' => $request->filled('meta_title') ? trim($request->input('meta_title')) : null,
            'meta_description' => $request->filled('meta_description') ? trim(preg_replace('/\s+/', ' ', $request->input('meta_description'))) : null,
            'h1_heading' => $request->filled('h1_heading') ? trim($request->input('h1_heading')) : null,
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

    /**
     * Update category order after dragging.
     */
    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'integer', 'distinct', 'exists:categories,id'],
        ]);

        $categoryIds = Category::orderBy('sort_order', 'asc')->orderBy('id', 'asc')->pluck('id');
        $submittedIds = collect($validated['categories'])->map(fn ($id) => (int) $id);

        if ($submittedIds->sort()->values()->all() !== $categoryIds->sort()->values()->all()) {
            throw ValidationException::withMessages([
                'categories' => 'The complete category list is required to save its order.',
            ]);
        }

        DB::transaction(function () use ($submittedIds) {
            $submittedIds->each(fn ($id, $index) => Category::whereKey($id)
                ->update(['sort_order' => $index + 1]));
        });

        return response()->json(['message' => 'Category order updated.']);
    }

    /**
     * Categories live at /{slug}, so a slug must not clash with an existing
     * page such as /shop or /checkout (that page would win and hide the category).
     */
    private function ensureSlugIsNotReserved(string $slug): void
    {
        if ($slug === '' || in_array(strtolower($slug), \App\Support\Catalog::reservedSlugs(), true)) {
            throw ValidationException::withMessages([
                'slug' => "The URL \"/{$slug}\" is already used by another page. Please choose a different slug.",
            ]);
        }
    }
}
