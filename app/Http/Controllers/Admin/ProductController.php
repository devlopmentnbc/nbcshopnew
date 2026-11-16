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
        $query = Product::with(['brand', 'category', 'subCategory', 'additionalCategories.category', 'additionalCategories.subCategory', 'attributeValues.attribute', 'images']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
        }

        if ($request->filled('category_id')) {
            $query->inCategory($request->input('category_id'));
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
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'h1_heading' => 'nullable|string|max:120',
            'usd_offer_price' => 'nullable|numeric|min:0',
            'weight_grams' => 'nullable|numeric|min:0',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'extra_categories' => 'nullable|array',
            'extra_categories.*.category_id' => 'nullable|exists:categories,id',
            'extra_categories.*.sub_category_id' => 'nullable|exists:sub_categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'how_to_use' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'image_alt' => 'nullable|string|max:150',
            'gallery_alt' => 'nullable|array',
            'gallery_alt.*' => 'nullable|string|max:150',
            'new_gallery_alt' => 'nullable|array',
            'new_gallery_alt.*' => 'nullable|string|max:150',
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

        $slug = $this->uniqueSlug($request->filled('slug') ? $request->slug : $request->name);

        $product = Product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'slug' => $slug,
            'meta_title' => $request->filled('meta_title') ? trim($request->input('meta_title')) : null,
            'meta_description' => $request->filled('meta_description') ? trim(preg_replace('/\s+/', ' ', $request->input('meta_description'))) : null,
            'h1_heading' => $request->filled('h1_heading') ? trim($request->input('h1_heading')) : null,
            'sku' => Product::generateSku(),
            'usd_offer_price' => $request->usd_offer_price ?: null,
            'weight_grams' => $request->filled('weight_grams') ? (int) $request->weight_grams : 500,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'how_to_use' => $request->how_to_use,
            'ingredients' => $request->ingredients,
            'image' => $imagePath,
            'image_alt' => $request->filled('image_alt') ? trim($request->input('image_alt')) : null,
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
                        'alt_text' => $this->cleanAlt($request->input("new_gallery_alt.$index")),
                    ]);
                }
            }
        }

        $syncData = $this->processVariantsData($request, $product);
        $product->attributeValues()->sync($syncData);
        $this->syncAdditionalCategories($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully with gallery images and pricing.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $product->load(['attributeValues', 'images', 'additionalCategories']);
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
                'sap_code' => $val->pivot->sap_code,
                'weight_grams' => $val->pivot->weight_grams,
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
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'h1_heading' => 'nullable|string|max:120',
            'usd_offer_price' => 'nullable|numeric|min:0',
            'weight_grams' => 'nullable|numeric|min:0',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'extra_categories' => 'nullable|array',
            'extra_categories.*.category_id' => 'nullable|exists:categories,id',
            'extra_categories.*.sub_category_id' => 'nullable|exists:sub_categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'how_to_use' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'image_alt' => 'nullable|string|max:150',
            'gallery_alt' => 'nullable|array',
            'gallery_alt.*' => 'nullable|string|max:150',
            'new_gallery_alt' => 'nullable|array',
            'new_gallery_alt.*' => 'nullable|string|max:150',
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

        $slug = $this->uniqueSlug($request->filled('slug') ? $request->slug : $request->name, $product->id);

        $product->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'slug' => $slug,
            'meta_title' => $request->filled('meta_title') ? trim($request->input('meta_title')) : null,
            'meta_description' => $request->filled('meta_description') ? trim(preg_replace('/\s+/', ' ', $request->input('meta_description'))) : null,
            'h1_heading' => $request->filled('h1_heading') ? trim($request->input('h1_heading')) : null,
            'usd_offer_price' => $request->usd_offer_price ?: null,
            'weight_grams' => $request->filled('weight_grams') ? (int) $request->weight_grams : ($product->weight_grams ?: 500),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'how_to_use' => $request->how_to_use,
            'ingredients' => $request->ingredients,
            'image' => $imagePath,
            'image_alt' => $request->filled('image_alt') ? trim($request->input('image_alt')) : null,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        // Alt text of existing gallery images (only this product's images)
        foreach ((array) $request->input('gallery_alt', []) as $imageId => $alt) {
            $product->images()->whereKey((int) $imageId)->update(['alt_text' => $this->cleanAlt($alt)]);
        }

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
                        'alt_text' => $this->cleanAlt($request->input("new_gallery_alt.$index")),
                    ]);
                }
            }
        }

        $syncData = $this->processVariantsData($request, $product);
        $product->attributeValues()->sync($syncData);
        $this->syncAdditionalCategories($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Replace the product's additional category placements with the submitted rows.
     * Rows without a category, duplicates, and the main category placement are skipped.
     */
    private function syncAdditionalCategories(Request $request, Product $product): void
    {
        $subCategoryParents = SubCategory::pluck('category_id', 'id');
        $mainKey = $product->category_id.'-'.($product->sub_category_id ?? '');

        $rows = collect($request->input('extra_categories', []))
            ->filter(fn ($row) => ! empty($row['category_id']))
            ->map(function ($row) use ($subCategoryParents) {
                $subCategoryId = $row['sub_category_id'] ?? null;

                // Ignore a sub-category that doesn't belong to the chosen category.
                if ($subCategoryId && (int) ($subCategoryParents[$subCategoryId] ?? 0) !== (int) $row['category_id']) {
                    $subCategoryId = null;
                }

                return [
                    'category_id' => (int) $row['category_id'],
                    'sub_category_id' => $subCategoryId ? (int) $subCategoryId : null,
                ];
            })
            ->unique(fn ($row) => $row['category_id'].'-'.($row['sub_category_id'] ?? ''))
            ->reject(fn ($row) => $row['category_id'].'-'.($row['sub_category_id'] ?? '') === $mainKey)
            ->values();

        $product->additionalCategories()->delete();
        $product->additionalCategories()->createMany($rows->all());
    }

    /**
     * Show dedicated variant management page for a product.
     */
    public function manageVariants(Product $product)
    {
        $product->load(['attributeValues.attribute', 'brand', 'category', 'subCategory']);
        $attributes = Attribute::with(['values' => function ($q) {
            $q->where('status', true)->orderBy('id');
        }])->where('status', true)->orderBy('name')->get();

        return view('admin.products.variants', compact('product', 'attributes'));
    }

    /**
     * Dedicated endpoint to update product variants & stock.
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

        return redirect()->route('admin.products.variants.manage', $product->id)->with('success', 'Product stock and attribute variants updated successfully.');
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
                        'sap_code' => $varData['sap_code'] ?? null,
                        'weight_grams' => isset($varData['weight_grams']) && $varData['weight_grams'] !== '' ? (int) $varData['weight_grams'] : null,
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

    /**
     * Slugify the value and append -2, -3, ... if another product already uses it.
     */
    private function uniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value) ?: 'product';
        $slug = $base;
        $suffix = 2;

        while (Product::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }

    private function cleanAlt($alt): ?string
    {
        $alt = trim(preg_replace('/\s+/', ' ', (string) $alt));

        return $alt === '' ? null : mb_substr($alt, 0, 150);
    }
}
