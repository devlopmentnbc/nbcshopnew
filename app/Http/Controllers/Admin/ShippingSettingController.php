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

        return view('admin.settings.shipping', compact('domesticFee', 'freeThreshold'));
    }

    /**
     * Update shipping settings in the database.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'domestic_shipping_fee' => ['required', 'numeric', 'min:0'],
            'free_shipping_threshold' => ['required', 'numeric', 'min:0'],
        ]);

        Setting::set('domestic_shipping_fee', $validated['domestic_shipping_fee']);
        Setting::set('free_shipping_threshold', $validated['free_shipping_threshold']);

        return redirect()->back()->with('success', 'Shipping settings updated successfully!');
    }
}
