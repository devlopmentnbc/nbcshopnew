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

        // Citypak Settings
        $citypakApiKey = Setting::get('citypak_api_key', config('services.citypak.api_key', ''));
        $citypakEnvironment = Setting::get('citypak_environment', config('services.citypak.environment', 'staging'));
        $citypakFromName = Setting::get('citypak_from_name', config('app.name', 'Unimart Store'));
        $citypakFromAddressLine1 = Setting::get('citypak_from_address_line_1', 'No 123 Main Street');
        $citypakFromAddressLine2 = Setting::get('citypak_from_address_line_2', '');
        $citypakFromAddressLine3 = Setting::get('citypak_from_address_line_3', '');
        $citypakFromAddressLine4 = Setting::get('citypak_from_address_line_4', 'Colombo');
        $citypakFromContactName = Setting::get('citypak_from_contact_name', 'Dispatch Manager');
        $citypakFromContact1 = Setting::get('citypak_from_contact_1', '0771234567');
        $citypakFromContact2 = Setting::get('citypak_from_contact_2', '');

        return view('admin.settings.shipping', compact(
            'domesticFee', 'freeThreshold', 'enableCod', 'enableCard', 'maxCodLimit', 'maxCardLimit',
            'citypakApiKey', 'citypakEnvironment', 'citypakFromName', 'citypakFromAddressLine1',
            'citypakFromAddressLine2', 'citypakFromAddressLine3', 'citypakFromAddressLine4',
            'citypakFromContactName', 'citypakFromContact1', 'citypakFromContact2'
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

            'citypak_api_key' => ['nullable', 'string', 'max:255'],
            'citypak_environment' => ['required', 'string', 'in:staging,production'],
            'citypak_from_name' => ['required', 'string', 'max:150'],
            'citypak_from_address_line_1' => ['required', 'string', 'max:255'],
            'citypak_from_address_line_2' => ['nullable', 'string', 'max:255'],
            'citypak_from_address_line_3' => ['nullable', 'string', 'max:255'],
            'citypak_from_address_line_4' => ['required', 'string', 'max:100'],
            'citypak_from_contact_name' => ['required', 'string', 'max:150'],
            'citypak_from_contact_1' => ['required', 'string', 'max:30'],
            'citypak_from_contact_2' => ['nullable', 'string', 'max:30'],
        ]);

        Setting::set('domestic_shipping_fee', $validated['domestic_shipping_fee']);
        Setting::set('free_shipping_threshold', $validated['free_shipping_threshold']);
        Setting::set('enable_shipping_cod', $request->has('enable_shipping_cod') ? '1' : '0');
        Setting::set('enable_shipping_card', $request->has('enable_shipping_card') ? '1' : '0');
        Setting::set('max_cod_order_limit', $validated['max_cod_order_limit']);
        Setting::set('max_card_order_limit', $validated['max_card_order_limit']);

        // Save Citypak settings
        Setting::set('citypak_api_key', trim($validated['citypak_api_key'] ?? ''));
        Setting::set('citypak_environment', $validated['citypak_environment']);
        Setting::set('citypak_from_name', $validated['citypak_from_name']);
        Setting::set('citypak_from_address_line_1', $validated['citypak_from_address_line_1']);
        Setting::set('citypak_from_address_line_2', $validated['citypak_from_address_line_2'] ?? '');
        Setting::set('citypak_from_address_line_3', $validated['citypak_from_address_line_3'] ?? '');
        Setting::set('citypak_from_address_line_4', $validated['citypak_from_address_line_4']);
        Setting::set('citypak_from_contact_name', $validated['citypak_from_contact_name']);
        Setting::set('citypak_from_contact_1', $validated['citypak_from_contact_1']);
        Setting::set('citypak_from_contact_2', $validated['citypak_from_contact_2'] ?? '');

        return redirect()->back()->with('success', 'Shipping and Citypak Courier settings updated successfully!');
    }
}
