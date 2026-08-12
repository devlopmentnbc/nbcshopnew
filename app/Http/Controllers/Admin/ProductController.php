<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Product::with(['brand', 'category', 'subCategory', 'attributeValues.attribute', 'images']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $allAttributes = Attribute::where('status', true)->with('values')->orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories', 'brands', 'allAttributes'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $brands = Brand::where('status', true)->orderBy('name')->get();
        $categories = Category::where('status', true)->orderBy('name')->get();
        $subCategories = SubCategory::where('status', true)->orderBy('name')->get();
        $attributes = Attribute::where('status', true)->with('values')->orderBy('name')->get();

        return view('admin.products.create', compact('brands', 'categories', 'subCategories', 'attributes'));
    }

    /**
     * Redirect the resource show route to the existing product editor.
     */
    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'weight_grams' => 'nullable|numeric|min:0',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'how_to_use' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'status' => 'nullable|boolean',
            'variants' => 'nullable|array',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/products');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/products/' . $filename;
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        $product = Product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'slug' => $slug,
            'sku' => $request->sku ?: strtoupper(Str::random(8)),
            'weight_grams' => $request->filled('weight_grams') ? (int) $request->weight_grams : 500,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'how_to_use' => $request->how_to_use,
            'ingredients' => $request->ingredients,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : true,
        ]);

        // Upload Gallery Images
        if ($request->hasFile('gallery_images')) {
            $galleryDir = public_path('uploads/products/gallery');
            if (!File::exists($galleryDir)) {
                File::makeDirectory($galleryDir, 0755, true, true);
            }
            foreach ($request->file('gallery_images') as $index => $gFile) {
                if ($gFile && $gFile->isValid()) {
                    $gFilename = (int)(microtime(true) * 1000) . '_' . $index . '_' . Str::slug($request->name) . '.' . $gFile->getClientOriginalExtension();
                    $gFile->move($galleryDir, $gFilename);
                    $product->images()->create([
                        'image_path' => 'uploads/products/gallery/' . $gFilename,
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        $syncData = $this->processVariantsData($request, $product);
        $product->attributeValues()->sync($syncData);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully with gallery images and pricing.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $product->load(['attributeValues', 'images']);
        $brands = Brand::where('status', true)->orderBy('name')->get();
        $categories = Category::where('status', true)->orderBy('name')->get();
        $subCategories = SubCategory::where('status', true)->orderBy('name')->get();
        $attributes = Attribute::where('status', true)->with('values')->orderBy('name')->get();

        $variantMap = [];
        foreach ($product->attributeValues as $val) {
            $variantMap[$val->id] = [
                'selected' => 1,
                'price_lkr' => $val->pivot->price_lkr,
                'price_usd' => $val->pivot->price_usd,
                'sale_price_lkr' => $val->pivot->sale_price_lkr,
                'sale_price_usd' => $val->pivot->sale_price_usd,
                'stock' => $val->pivot->stock,
                'sku' => $val->pivot->sku,
                'image' => $val->pivot->image,
            ];
        }

        return view('admin.products.edit', compact('product', 'brands', 'categories', 'subCategories', 'attributes', 'variantMap'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'sku' => 'nullable|string|max:255|unique:products,sku,' . $product->id,
            'weight_grams' => 'nullable|numeric|min:0',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'how_to_use' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'status' => 'nullable|boolean',
            'variants' => 'nullable|array',
        ]);

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadDir = public_path('uploads/products');

            if (!File::exists($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $imagePath = 'uploads/products/' . $filename;
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);

        $product->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'slug' => $slug,
            'sku' => $request->sku ?: $product->sku,
            'weight_grams' => $request->filled('weight_grams') ? (int) $request->weight_grams : ($product->weight_grams ?: 500),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'how_to_use' => $request->how_to_use,
            'ingredients' => $request->ingredients,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        // Upload New Gallery Images
        if ($request->hasFile('gallery_images')) {
            $galleryDir = public_path('uploads/products/gallery');
            if (!File::exists($galleryDir)) {
                File::makeDirectory($galleryDir, 0755, true, true);
            }
            $existingCount = $product->images()->count();
            foreach ($request->file('gallery_images') as $index => $gFile) {
                if ($gFile && $gFile->isValid()) {
                    $gFilename = (int)(microtime(true) * 1000) . '_' . ($existingCount + $index) . '_' . Str::slug($request->name) . '.' . $gFile->getClientOriginalExtension();
                    $gFile->move($galleryDir, $gFilename);
                    $product->images()->create([
                        'image_path' => 'uploads/products/gallery/' . $gFilename,
                        'sort_order' => $existingCount + $index,
                    ]);
                }
            }
        }

        $syncData = $this->processVariantsData($request, $product);
        $product->attributeValues()->sync($syncData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Dedicated endpoint to update product variants & stock (from modal or quick form).
     */
    public function updateVariants(Request $request, Product $product)
    {
        $product->load('attributeValues');
        $syncData = $this->processVariantsData($request, $product);
        $product->attributeValues()->sync($syncData);

        if ($request->wantsJson() || $request->ajax()) {
            $product->load(['attributeValues.attribute', 'brand', 'category']);
            return response()->json([
                'success' => true,
                'message' => 'Product stock and attribute variants updated successfully.',
                'total_stock' => $product->totalStock(),
                'product' => $product,
            ]);
        }

        return back()->with('success', 'Product stock and attribute variants updated successfully.');
    }

    /**
     * Helper to process variant data array and uploaded variant image files.
     */
    private function processVariantsData(Request $request, ?Product $product = null): array
    {
        $syncData = [];
        $existingVariantsMap = $product ? $product->attributeValues->keyBy('id') : collect();

        if ($request->has('variants') && is_array($request->variants)) {
            $variantDir = public_path('uploads/products/variants');
            if (!File::exists($variantDir)) {
                File::makeDirectory($variantDir, 0755, true, true);
            }

            foreach ($request->variants as $valId => $varData) {
                if (isset($varData['selected']) && ($varData['selected'] == 1 || $varData['selected'] === 'true')) {
                    $imagePath = null;
                    
                    // Retain existing image if present
                    if ($product && isset($existingVariantsMap[$valId])) {
                        $imagePath = $existingVariantsMap[$valId]->pivot->image ?? null;
                    }

                    // Check for new uploaded file for this variant
                    if ($request->hasFile("variants.{$valId}.image")) {
                        $file = $request->file("variants.{$valId}.image");
                        if ($file && $file->isValid()) {
                            // Delete old image if exists
                            if ($imagePath && File::exists(public_path($imagePath))) {
                                File::delete(public_path($imagePath));
                            }
                            $filename = time() . '_var_' . $valId . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                            $file->move($variantDir, $filename);
                            $imagePath = 'uploads/products/variants/' . $filename;
                        }
                    }

                    $syncData[$valId] = [
                        'price_lkr' => $varData['price_lkr'] ?? 0.00,
                        'price_usd' => $varData['price_usd'] ?? 0.00,
                        'sale_price_lkr' => !empty($varData['sale_price_lkr']) ? $varData['sale_price_lkr'] : null,
                        'sale_price_usd' => !empty($varData['sale_price_usd']) ? $varData['sale_price_usd'] : null,
                        'stock' => $varData['stock'] ?? 0,
                        'sku' => $varData['sku'] ?? null,
                        'image' => $imagePath,
                    ];
                }
            }
        }

        return $syncData;
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        foreach ($product->images as $gImg) {
            if ($gImg->image_path && File::exists(public_path($gImg->image_path))) {
                File::delete(public_path($gImg->image_path));
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Delete a single gallery image.
     */
    public function destroyGalleryImage(ProductImage $image)
    {
        if ($image->image_path && File::exists(public_path($image->image_path))) {
            File::delete(public_path($image->image_path));
        }

        $image->delete();

        return back()->with('success', 'Gallery image deleted successfully.');
    }

    /**
     * Get sub-categories for a category via AJAX/JSON.
     */
    public function getSubCategories($categoryId)
    {
        $subCategories = SubCategory::where('category_id', $categoryId)
            ->where('status', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($subCategories);
    }
}
