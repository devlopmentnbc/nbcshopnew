<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Support\HomePopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class HomePopupSettingController extends Controller
{
    public function index()
    {
        $popup = HomePopup::get();

        return view('admin.settings.home-popup', [
            'popup' => $popup,
            'imageUrl' => HomePopup::imageUrl($popup),
            'linkTypes' => HomePopup::LINK_TYPES,
            'frequencies' => HomePopup::FREQUENCIES,
            'products' => Product::orderBy('name')->get(['id', 'name', 'status']),
            'categories' => Category::orderBy('name')->get(['id', 'name', 'status']),
            'subCategories' => SubCategory::with('category:id,name')->orderBy('name')->get(['id', 'category_id', 'name', 'status']),
            'brands' => Brand::orderBy('name')->get(['id', 'name', 'status']),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'title' => ['nullable', 'string', 'max:150'],
            'message' => ['nullable', 'string', 'max:500'],
            'button_text' => ['required', 'string', 'max:40'],
            'link_type' => ['required', Rule::in(array_keys(HomePopup::LINK_TYPES))],
            'product_id' => ['nullable', 'required_if:link_type,product', 'integer', 'exists:products,id'],
            'category_id' => ['nullable', 'required_if:link_type,category', 'integer', 'exists:categories,id'],
            'sub_category_id' => ['nullable', 'required_if:link_type,sub_category', 'integer', 'exists:sub_categories,id'],
            'brand_id' => ['nullable', 'required_if:link_type,brand', 'integer', 'exists:brands,id'],
            'custom_url' => ['nullable', 'required_if:link_type,url', 'string', 'max:500', 'regex:/^(https?:\/\/|\/)/i'],
            'frequency' => ['required', Rule::in(array_keys(HomePopup::FREQUENCIES))],
            'delay' => ['required', 'integer', 'min:0', 'max:60'],
        ], [
            'product_id.required_if' => 'Please choose the product the button should open.',
            'category_id.required_if' => 'Please choose the product range (category) the button should open.',
            'sub_category_id.required_if' => 'Please choose the sub category the button should open.',
            'brand_id.required_if' => 'Please choose the brand the button should open.',
            'custom_url.required_if' => 'Please enter the link the button should open.',
            'custom_url.regex' => 'The custom link must start with https://, http:// or /.',
        ]);

        $current = HomePopup::get();
        $image = $current['image'];

        if ($request->boolean('remove_image')) {
            $this->deleteUpload($image);
            $image = null;
        }

        if ($request->hasFile('image')) {
            $dir = public_path(HomePopup::UPLOAD_DIR);
            if (! File::exists($dir)) {
                File::makeDirectory($dir, 0755, true, true);
            }

            $file = $request->file('image');
            $filename = time() . '_popup_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $filename);

            $this->deleteUpload($image);
            $image = HomePopup::UPLOAD_DIR . '/' . $filename;
        }

        $type = $validated['link_type'];

        HomePopup::save([
            'enabled' => $request->boolean('enabled'),
            'image' => $image,
            'title' => trim((string) ($validated['title'] ?? '')),
            'message' => trim((string) ($validated['message'] ?? '')),
            'button_text' => $validated['button_text'],
            'link_type' => $type,
            'product_id' => $type === 'product' ? (int) $validated['product_id'] : null,
            'category_id' => $type === 'category' ? (int) $validated['category_id'] : null,
            'sub_category_id' => $type === 'sub_category' ? (int) $validated['sub_category_id'] : null,
            'brand_id' => $type === 'brand' ? (int) $validated['brand_id'] : null,
            'custom_url' => $type === 'url' ? trim($validated['custom_url']) : '',
            'frequency' => $validated['frequency'],
            'delay' => (int) $validated['delay'],
            'version' => time(),
        ]);

        return back()->with('success', 'Home popup updated successfully.');
    }

    private function deleteUpload(?string $path): void
    {
        if ($path && Str::startsWith($path, HomePopup::UPLOAD_DIR . '/') && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
