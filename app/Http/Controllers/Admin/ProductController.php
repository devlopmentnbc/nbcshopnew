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

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Product::with(['brand', 'category', 'subCategory', 'attributeValues.attribute']);

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

        return view('admin.products.index', compact('products', 'categories', 'brands'));
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
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'how_to_use' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
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
            'short_description' => $request->short_description,
            'description' => $request->description,
            'how_to_use' => $request->how_to_use,
            'ingredients' => $request->ingredients,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : true,
        ]);

        $syncData = [];
        if ($request->filled('variants') && is_array($request->variants)) {
            foreach ($request->variants as $valId => $varData) {
                if (isset($varData['selected']) && $varData['selected'] == 1) {
                    $syncData[$valId] = [
                        'price_lkr' => $varData['price_lkr'] ?? 0.00,
                        'price_usd' => $varData['price_usd'] ?? 0.00,
                        'sale_price_lkr' => !empty($varData['sale_price_lkr']) ? $varData['sale_price_lkr'] : null,
                        'sale_price_usd' => !empty($varData['sale_price_usd']) ? $varData['sale_price_usd'] : null,
                        'stock' => $varData['stock'] ?? 0,
                        'sku' => $varData['sku'] ?? null,
                    ];
                }
            }
        }
        $product->attributeValues()->sync($syncData);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully with attribute pricing.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $product->load('attributeValues');
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
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'how_to_use' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
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
            'short_description' => $request->short_description,
            'description' => $request->description,
            'how_to_use' => $request->how_to_use,
            'ingredients' => $request->ingredients,
            'image' => $imagePath,
            'status' => $request->has('status') ? (bool) $request->status : false,
        ]);

        $syncData = [];
        if ($request->filled('variants') && is_array($request->variants)) {
            foreach ($request->variants as $valId => $varData) {
                if (isset($varData['selected']) && $varData['selected'] == 1) {
                    $syncData[$valId] = [
                        'price_lkr' => $varData['price_lkr'] ?? 0.00,
                        'price_usd' => $varData['price_usd'] ?? 0.00,
                        'sale_price_lkr' => !empty($varData['sale_price_lkr']) ? $varData['sale_price_lkr'] : null,
                        'sale_price_usd' => !empty($varData['sale_price_usd']) ? $varData['sale_price_usd'] : null,
                        'stock' => $varData['stock'] ?? 0,
                        'sku' => $varData['sku'] ?? null,
                    ];
                }
            }
        }
        $product->attributeValues()->sync($syncData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
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
