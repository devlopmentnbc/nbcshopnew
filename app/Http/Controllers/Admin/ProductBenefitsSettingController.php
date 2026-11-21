<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\ProductBenefits;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductBenefitsSettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.product-benefits', [
            'items' => ProductBenefits::all(),
            'icons' => ProductBenefits::ICONS,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'items' => ['required', 'array', 'size:' . ProductBenefits::COUNT],
            'items.*.icon' => ['required', Rule::in(array_keys(ProductBenefits::ICONS))],
            'items.*.text' => ['nullable', 'string', 'max:60', 'required_if_accepted:items.*.enabled'],
        ], [
            'items.*.text.required_if_accepted' => 'An active benefit needs some text.',
        ]);

        $items = [];
        foreach (array_values($validated['items']) as $i => $item) {
            $items[] = [
                'enabled' => $request->boolean("items.$i.enabled"),
                'icon' => $item['icon'],
                'text' => trim((string) ($item['text'] ?? '')),
            ];
        }

        ProductBenefits::save($items);

        return back()->with('success', 'Product benefits updated successfully.');
    }
}
