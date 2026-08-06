<?php

namespace App\Services;

use Illuminate\Support\Str;

class CybersourceService
{
    protected string $accessKey;
    protected string $profileId;
    protected string $secretKey;
    protected string $endpoint;

    public function __construct()
    {
        $this->accessKey = (string) config('services.cybersource.access_key');
        $this->profileId = (string) config('services.cybersource.profile_id');
        $this->secretKey = (string) config('services.cybersource.secret_key');
        $this->endpoint  = (string) config('services.cybersource.endpoint', 'https://secureacceptance.cybersource.com/pay');
    }

    /**
     * Build signed fields array for CyberSource Secure Acceptance Hosted Checkout
     */
    public function buildHostedCheckoutRequest($order): array
    {
        $amount = number_format($order->total_lkr ?? $order->total ?? $order->subtotal_lkr ?? $order->subtotal ?? 0, 2, '.', '');
        
        $nameParts = explode(' ', trim($order->name ?? 'Customer User'), 2);
        $firstName = $this->sanitize($nameParts[0] ?? 'Customer');
        $lastName  = $this->sanitize($nameParts[1] ?? 'User');

        $shippingCountryCode = strtoupper($order->delivery_country_code ?? $order->shipping_country_code ?? $order->country_code ?? 'LK');
        $billingCountryCode  = strtoupper($order->billing_country_code  ?? $order->country_code ?? 'LK');

        $shippingAddress = $order->delivery_address_line1 ?? $order->shipping_address ?? $order->address ?? 'Address Line 1';
        $shippingCity    = $order->delivery_city    ?? $order->shipping_city    ?? $order->city    ?? 'Colombo';
        $shippingState   = $this->normalizeState($order->delivery_state ?? $order->shipping_state ?? 'Western', $shippingCountryCode);
        $shippingPostal  = $order->delivery_postal_code ?? $order->shipping_postal_code ?? '10200';

        $billingAddress  = $order->billing_address_line1  ?? $order->billing_address  ?? $order->address ?? $shippingAddress;
        $billingCity     = $order->billing_city     ?? $order->city    ?? $shippingCity;
        $billingState    = $this->normalizeState($order->billing_state  ?? 'Western', $billingCountryCode);
        $billingPostal   = $order->billing_postal_code  ?? $shippingPostal;

        $fields = [
            'access_key'             => $this->accessKey,
            'profile_id'             => $this->profileId,
            'transaction_uuid'       => (string) Str::uuid(),
            'signed_date_time'       => gmdate("Y-m-d\TH:i:s\Z"),
            'transaction_type'       => 'sale',
            'reference_number'       => $order->order_number ?? $order->order_no ?? $order->id,
            'amount'                 => $amount,
            'currency'               => strtoupper($order->currency ?? 'LKR'),
            'locale'                 => 'en',

            // Billing Info
            'bill_to_forename'           => Str::limit($firstName, 60, ''),
            'bill_to_surname'            => Str::limit($lastName, 60, ''),
            'bill_to_email'              => trim($order->email ?? 'customer@example.com'),
            'bill_to_phone'              => substr(preg_replace('/[^0-9]/', '', $order->phone ?? '0770000000'), 0, 15),
            'bill_to_address_line1'      => Str::limit($this->sanitize($billingAddress), 60, ''),
            'bill_to_address_city'       => Str::limit($this->sanitize($billingCity), 50, ''),
            'bill_to_address_country'    => $billingCountryCode,
            'bill_to_address_state'      => $this->sanitize($billingState), 
            'bill_to_address_postal_code'=> $billingPostal,   
            'bill_to_company_name'       => 'None',

            // Shipping Info
            'ship_to_forename'           => Str::limit($firstName, 60, ''),
            'ship_to_surname'            => Str::limit($lastName, 60, ''),
            'ship_to_phone'              => substr(preg_replace('/[^0-9]/', '', $order->phone ?? '0770000000'), 0, 15),
            'ship_to_address_line1'      => Str::limit($this->sanitize($shippingAddress), 60, ''),
            'ship_to_address_city'       => Str::limit($this->sanitize($shippingCity), 50, ''),
            'ship_to_address_country'    => $shippingCountryCode,
            'ship_to_address_state'      => $this->sanitize($shippingState),
            'ship_to_address_postal_code'=> $shippingPostal,

            'signed_field_names'     => '', 
            'unsigned_field_names'   => '',
        ];

        $fields['signed_field_names'] = implode(',', array_keys($fields));
        $fields['signature'] = $this->sign($fields);

        return [
            'endpoint' => $this->endpoint,
            'fields'   => $fields,
        ];
    }

    /**
     * Sign field array using HMAC SHA256
     */
    public function sign(array $params): string
    {
        $signedFieldNames = explode(',', $params['signed_field_names'] ?? '');
        $dataToSign = [];

        foreach ($signedFieldNames as $field) {
            $dataToSign[] = $field . '=' . ($params[$field] ?? '');
        }

        $stringToSign = implode(',', $dataToSign);

        return base64_encode(
            hash_hmac('sha256', $stringToSign, $this->secretKey, true)
        );
    }

    /**
     * Verify signature of incoming CyberSource response callback
     */
    public function verifyResponse(array $params): bool
    {
        $signature = $params['signature'] ?? '';
        $signedFieldNames = $params['signed_field_names'] ?? '';

        if (!$signature || !$signedFieldNames) {
            return false;
        }

        $calculatedSignature = $this->sign($params);

        return hash_equals($calculatedSignature, $signature);
    }

    protected function sanitize($value): string
    {
        return str_replace([',', "\n", "\r"], ' ', trim($value ?? ''));
    }

    /**
     * Normalize state/province names to 2-letter codes for US and CA.
     */
    public function normalizeState(string $state, string $countryCode): string
    {
        $countryCode = strtoupper(trim($countryCode));
        $state = trim($state);

        if ($countryCode === 'US') {
            $usStates = [
                'ALABAMA' => 'AL', 'ALASKA' => 'AK', 'ARIZONA' => 'AZ', 'ARKANSAS' => 'AR',
                'CALIFORNIA' => 'CA', 'COLORADO' => 'CO', 'CONNECTICUT' => 'CT', 'DELAWARE' => 'DE',
                'FLORIDA' => 'FL', 'GEORGIA' => 'GA', 'HAWAII' => 'HI', 'IDAHO' => 'ID',
                'ILLINOIS' => 'IL', 'INDIANA' => 'IN', 'IOWA' => 'IA', 'KANSAS' => 'KS',
                'KENTUCKY' => 'KY', 'LOUISIANA' => 'LA', 'MAINE' => 'ME', 'MARYLAND' => 'MD',
                'MASSACHUSETTS' => 'MA', 'MICHIGAN' => 'MI', 'MINNESOTA' => 'MN', 'MISSISSIPPI' => 'MS',
                'MISSOURI' => 'MO', 'MONTANA' => 'MT', 'NEBRASKA' => 'NE', 'NEVADA' => 'NV',
                'NEW HAMPSHIRE' => 'NH', 'NEW JERSEY' => 'NJ', 'NEW MEXICO' => 'NM', 'NEW YORK' => 'NY',
                'NORTH CAROLINA' => 'NC', 'NORTH DAKOTA' => 'ND', 'OHIO' => 'OH', 'OKLAHOMA' => 'OK',
                'OREGON' => 'OR', 'PENNSYLVANIA' => 'PA', 'RHODE ISLAND' => 'RI', 'SOUTH CAROLINA' => 'SC',
                'SOUTH DAKOTA' => 'SD', 'TENNESSEE' => 'TN', 'TEXAS' => 'TX', 'UTAH' => 'UT',
                'VERMONT' => 'VT', 'VIRGINIA' => 'VA', 'WASHINGTON' => 'WA', 'WEST VIRGINIA' => 'WV',
                'WISCONSIN' => 'WI', 'WYOMING' => 'WY', 'DISTRICT OF COLUMBIA' => 'DC'
            ];

            $upperState = strtoupper($state);
            return $usStates[$upperState] ?? ($state ?: 'CA');
        }

        return $state;
    }
}
