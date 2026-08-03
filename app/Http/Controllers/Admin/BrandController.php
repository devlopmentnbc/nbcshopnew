<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the brands.
     */
    public function index(Request $request)
    {
        $query = Brand::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $brands = $query->latest()->paginate(10)->withQueryString();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new brand.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created brand in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'slug' => 'nullable|string|max:255|unique:brands,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/brands');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/brands/' . $filename;
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        Brand::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : true,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Show the form for editing the specified brand.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified brand in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'slug' => 'nullable|string|max:255|unique:brands,slug,' . $brand->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $imagePath = $brand->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/brands');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            // Remove old image if exists
            if ($brand->image && File::exists(public_path($brand->image))) {
                File::delete(public_path($brand->image));
            }

            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/brands/' . $filename;
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        $brand->update([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified brand from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->image && File::exists(public_path($brand->image))) {
            File::delete(public_path($brand->image));
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}
