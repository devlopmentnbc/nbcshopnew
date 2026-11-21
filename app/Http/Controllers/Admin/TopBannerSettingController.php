<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Support\TopBanner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TopBannerSettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.top-banner', [
            'banner' => TopBanner::get(),
            'linkTypes' => TopBanner::LINK_TYPES,
            'products' => Product::orderBy('name')->get(['id', 'name', 'status']),
        ]);
    }

    public function update(Request $request)
    {
        $hex = 'regex:/^#[0-9a-fA-F]{6}$/';

        $validated = $request->validate([
            'text' => ['required', 'string', 'max:200'],
            'button_text' => ['required', 'string', 'max:40'],
            'link_type' => ['required', Rule::in(array_keys(TopBanner::LINK_TYPES))],
            'product_id' => ['nullable', 'required_if:link_type,product', 'integer', 'exists:products,id'],
            'color_start' => ['required', $hex],
            'color_end' => ['required', $hex],
            'text_color' => ['required', $hex],
            'repeat' => ['required', 'integer', 'min:1', 'max:10'],
        ], [
            'product_id.required_if' => 'Please choose the product that "Shop Now" should open.',
        ]);

        TopBanner::save([
            'enabled' => $request->boolean('enabled'),
            'text' => $validated['text'],
            'button_text' => $validated['button_text'],
            'link_type' => $validated['link_type'],
            'product_id' => $validated['link_type'] === 'product' ? (int) $validated['product_id'] : null,
            'color_start' => strtolower($validated['color_start']),
            'color_end' => strtolower($validated['color_end']),
            'text_color' => strtolower($validated['text_color']),
            'repeat' => (int) $validated['repeat'],
        ]);

        return back()->with('success', 'Top banner updated successfully.');
    }
}
