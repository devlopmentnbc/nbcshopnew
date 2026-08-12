<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ShippingSettingController extends Controller
{
    /**
     * Display the shipping settings configuration page.
     */
    public function index()
    {
        $domesticFee = Setting::get('domestic_shipping_fee', '450.00');
        $freeThreshold = Setting::get('free_shipping_threshold', '45000.00');
        $enableCod = Setting::get('enable_shipping_cod', '1');
        $enableCard = Setting::get('enable_shipping_card', '1');
        $maxCodLimit = Setting::get('max_cod_order_limit', '10000.00');
        $maxCardLimit = Setting::get('max_card_order_limit', '20000.00');

        return view('admin.settings.shipping', compact(
            'domesticFee', 'freeThreshold', 'enableCod', 'enableCard', 'maxCodLimit', 'maxCardLimit'
        ));
    }

    /**
     * Update shipping settings in the database.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'domestic_shipping_fee' => ['required', 'numeric', 'min:0'],
            'free_shipping_threshold' => ['required', 'numeric', 'min:0'],
            'max_cod_order_limit' => ['required', 'numeric', 'min:0'],
            'max_card_order_limit' => ['required', 'numeric', 'min:0'],
        ]);

        Setting::set('domestic_shipping_fee', $validated['domestic_shipping_fee']);
        Setting::set('free_shipping_threshold', $validated['free_shipping_threshold']);
        Setting::set('enable_shipping_cod', $request->has('enable_shipping_cod') ? '1' : '0');
        Setting::set('enable_shipping_card', $request->has('enable_shipping_card') ? '1' : '0');
        Setting::set('max_cod_order_limit', $validated['max_cod_order_limit']);
        Setting::set('max_card_order_limit', $validated['max_card_order_limit']);

        return redirect()->back()->with('success', 'Shipping and payment limit settings updated successfully!');
    }
}
