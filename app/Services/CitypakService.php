<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CitypakService
{
    /**
     * Get Citypak API Base URL based on environment setting.
     */
    public function getBaseUrl(): string
    {
        $env = Setting::get('citypak_environment', config('services.citypak.environment', 'staging'));
        if (strtolower($env) === 'production') {
            return rtrim(config('services.citypak.production_url', 'https://falcon.citypak.lk'), '/');
        }
        return rtrim(config('services.citypak.staging_url', 'https://staging.citypak.lk'), '/');
    }

    /**
     * Get Citypak API Token.
     */
    public function getApiKey(): string
    {
        return trim(Setting::get('citypak_api_key', config('services.citypak.api_key', '')));
    }

    /**
     * Sanitize string for Citypak API (non-ASCII character replacement).
     */
    private function sanitizeString(string $text, int $maxLength = 255): string
    {
        // Replace non-ASCII characters
        $cleaned = preg_replace('/[^\x00-\x7F]+/', ' ', $text);
        $cleaned = trim(preg_replace('/\s+/', ' ', $cleaned));
        if (strlen($cleaned) > $maxLength) {
            $cleaned = substr($cleaned, 0, $maxLength);
        }
        return $cleaned;
    }

    /**
     * Create Order on Citypak Courier API.
     *
     * @param Order $order
     * @param array $overrides
     * @return array Result array with success boolean, message, and data
     */
    public function createOrder(Order $order, array $overrides = []): array
    {
        $apiKey = $this->getApiKey();
        if (empty($apiKey)) {
            return [
                'success' => false,
                'message' => 'Citypak API Key is missing. Please configure it in Shipping Settings.',
            ];
        }

        $order->loadMissing('items.product');

        // Sender details from settings or defaults
        $fromName = $this->sanitizeString(Setting::get('citypak_from_name', config('app.name', 'Unimart Store')), 150);
        $fromLine1 = $this->sanitizeString(Setting::get('citypak_from_address_line_1', 'No 123 Main Street'), 255);
        $fromLine2 = $this->sanitizeString(Setting::get('citypak_from_address_line_2', ''), 255);
        $fromLine3 = $this->sanitizeString(Setting::get('citypak_from_address_line_3', ''), 255);
        $fromLine4 = $this->sanitizeString(Setting::get('citypak_from_address_line_4', 'Colombo'), 100);
        $fromContactName = $this->sanitizeString(Setting::get('citypak_from_contact_name', 'Dispatch Manager'), 150);
        $fromContact1 = $this->sanitizeString(Setting::get('citypak_from_contact_1', '0771234567'), 30);
        $fromContact2 = $this->sanitizeString(Setting::get('citypak_from_contact_2', ''), 30);

        // Recipient details
        $toName = $this->sanitizeString($order->name, 150);
        $toLine1 = $this->sanitizeString($order->delivery_address_line1 ?: $order->billing_address_line1, 255);
        $toLine2 = $this->sanitizeString($order->delivery_address_line2 ?: ($order->billing_address_line2 ?? ''), 255);
        $toLine3 = $this->sanitizeString($order->delivery_state ?: ($order->billing_state ?? ''), 255);
        $toLine4 = $this->sanitizeString($order->delivery_city ?: ($order->billing_city ?? 'Colombo'), 100);
        $toContactName = $toName;
        $toContact1 = $this->sanitizeString($order->phone, 30);
        $toContact2 = '';

        // Calculate total weight in grams (default 500g, max 100,000g)
        $calculatedWeight = 0;
        $totalPieces = 0;
        $itemNames = [];

        foreach ($order->items as $item) {
            $qty = max(1, intval($item->quantity));
            $totalPieces += $qty;
            $itemNames[] = $qty . 'x ' . $item->name;

            $productWeight = 0;
            if ($item->product && !empty($item->product->weight_grams)) {
                $productWeight = floatval($item->product->weight_grams);
            }
            if ($productWeight <= 0) {
                $productWeight = 500; // fallback per item
            }
            $calculatedWeight += ($productWeight * $qty);
        }

        $weightGrams = intval($overrides['weight_g'] ?? ($calculatedWeight > 0 ? $calculatedWeight : 500));
        if ($weightGrams > 100000) {
            $weightGrams = 100000;
        }

        $numberOfPieces = intval($overrides['number_of_pieces'] ?? min(20, max(1, $totalPieces)));
        if ($numberOfPieces > 20) {
            $numberOfPieces = 20;
        }

        // Description <= 128 chars
        $descString = implode(', ', $itemNames);
        $description = $this->sanitizeString($overrides['description'] ?? $descString, 128);

        // Cash on Delivery amount calculation
        $isCod = in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash']);
        $codAmount = 0;
        if ($isCod && strtolower($order->payment_status) !== 'paid') {
            $codAmount = floatval($order->total_lkr);
        }
        if (isset($overrides['cash_on_delivery_amount'])) {
            $codAmount = floatval($overrides['cash_on_delivery_amount']);
        }

        $payload = [
            'token' => $apiKey,
            'reference' => $order->order_number,
            'from_name' => $fromName,
            'from_address_line_1' => $fromLine1,
            'from_address_line_2' => $fromLine2,
            'from_address_line_3' => $fromLine3,
            'from_address_line_4' => $fromLine4,
            'from_contact_name' => $fromContactName,
            'from_contact_1' => $fromContact1,
            'from_contact_2' => $fromContact2,
            'to_name' => $toName,
            'to_address_line_1' => $toLine1,
            'to_address_line_2' => $toLine2,
            'to_address_line_3' => $toLine3,
            'to_address_line_4' => $toLine4,
            'to_contact_name' => $toContactName,
            'to_contact_1' => $toContact1,
            'to_contact_2' => $toContact2,
            'to_nic' => $this->sanitizeString($overrides['to_nic'] ?? '', 20),
            'description' => $description,
            'weight_g' => $weightGrams,
            'cash_on_delivery_amount' => $codAmount,
            'number_of_pieces' => $numberOfPieces,
        ];

        $endpointUrl = $this->getBaseUrl() . '/customer_api/v1/orders';

        Log::info('Citypak Create Order Request Sent', [
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'url' => $endpointUrl,
            'payload' => array_merge($payload, ['token' => '***HIDDEN***']),
        ]);

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->timeout(30)->post($endpointUrl, $payload);

            $httpCode = $response->status();
            $body = $response->json();

            Log::info('Citypak Create Order Response Received', [
                'order_id' => $order->id,
                'http_code' => $httpCode,
                'response_body' => $body,
            ]);

            if ($httpCode === 200 && is_array($body)) {
                $success = filter_var($body['success'] ?? false, FILTER_VALIDATE_BOOLEAN);
                if ($success) {
                    $responseData = $body['data'] ?? [];
                    $citypakOrderId = null;
                    $trackingNumber = null;
                    $facilityCode = null;

                    // Extract order_id & tracking_number from nested data structure
                    if (is_array($responseData)) {
                        $citypakOrderId = $responseData['order_id'] ?? ($responseData[0]['order_id'] ?? null);
                        $items = $responseData['items'] ?? ($responseData[0]['items'] ?? []);
                        if (!empty($items) && is_array($items)) {
                            $firstItem = reset($items);
                            $trackingNumber = $firstItem['tracking_number'] ?? null;
                            $facilityCode = $firstItem['delivery_facility_code'] ?? null;
                        }
                    }

                    // Update order in database
                    $order->update([
                        'citypak_order_id' => $citypakOrderId,
                        'citypak_tracking_number' => $trackingNumber,
                        'citypak_delivery_facility_code' => $facilityCode,
                        'citypak_status' => 'CREATED',
                        'citypak_dispatched_at' => now(),
                        'status' => 'processing',
                    ]);

                    return [
                        'success' => true,
                        'message' => $body['message'] ?? 'Citypak Order created successfully!',
                        'citypak_order_id' => $citypakOrderId,
                        'tracking_number' => $trackingNumber,
                        'raw_data' => $responseData,
                    ];
                }

                return [
                    'success' => false,
                    'message' => $body['message'] ?? 'Failed to create Citypak order.',
                    'raw_data' => $body,
                ];
            }

            return [
                'success' => false,
                'message' => $body['message'] ?? ("Citypak API error: HTTP " . $httpCode),
            ];
        } catch (\Exception $e) {
            Log::error('Citypak Create Order Exception', [
                'order_id' => $order->id,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'Exception occurred connecting to Citypak API: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Get Waybill PDF stream response for given Order ID.
     */
    public function getWaybillPdfByOrderId(string|int $citypakOrderId, string $pageSize = 'A4', int $perPageWaybillCount = 4)
    {
        $apiKey = $this->getApiKey();
        $endpointUrl = $this->getBaseUrl() . "/customer_api/v1/orders/{$citypakOrderId}/waybills";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
            ])->get($endpointUrl, [
                'page_size' => $pageSize,
                'per_page_waybill_count' => $perPageWaybillCount,
            ]);

            if ($response->successful()) {
                return response($response->body(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="citypak_waybill_' . $citypakOrderId . '.pdf"',
                ]);
            }

            $json = $response->json();
            return response()->json([
                'success' => false,
                'message' => $json['message'] ?? 'Failed to retrieve waybill PDF from Citypak.',
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error streaming waybill: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get Waybill PDF stream response for tracking numbers array.
     */
    public function getWaybillPdfByTrackingNumbers(array $trackingNumbers, string $pageSize = 'A4', int $perPageWaybillCount = 4)
    {
        $apiKey = $this->getApiKey();
        $endpointUrl = $this->getBaseUrl() . "/customer_api/v1/waybills";

        $queryParams = [
            'page_size' => $pageSize,
            'per_page_waybill_count' => $perPageWaybillCount,
            'tracking_numbers' => $trackingNumbers,
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
            ])->get($endpointUrl, $queryParams);

            if ($response->successful()) {
                return response($response->body(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="citypak_waybills.pdf"',
                ]);
            }

            $json = $response->json();
            return response()->json([
                'success' => false,
                'message' => $json['message'] ?? 'Waybills not found.',
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error streaming waybill: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Track Order by Tracking Number.
     */
    public function trackOrder(string $trackingNumber): array
    {
        $apiKey = $this->getApiKey();
        $endpointUrl = $this->getBaseUrl() . "/customer_api/v1/track";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
            ])->get($endpointUrl, [
                'tracking_number' => $trackingNumber,
            ]);

            $json = $response->json();
            if ($response->successful() && is_array($json)) {
                $isSuccess = filter_var($json['is_success'] ?? ($json['success'] ?? false), FILTER_VALIDATE_BOOLEAN);
                return [
                    'success' => $isSuccess,
                    'message' => $json['message'] ?? ($isSuccess ? 'Tracking information retrieved' : 'Failed to retrieve tracking'),
                    'data' => $json['data'] ?? null,
                ];
            }

            return [
                'success' => false,
                'message' => $json['message'] ?? 'Tracking number not found.',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error connecting to Citypak tracking API: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Create Courier Pickup Request.
     */
    public function createPickup(array $data): array
    {
        $apiKey = $this->getApiKey();
        $endpointUrl = $this->getBaseUrl() . "/customer_api/v1/pickups";

        $payload = [
            'pickup_address_line_1' => $this->sanitizeString($data['pickup_address_line_1'] ?? 'No 123 Main Street', 255),
            'pickup_address_line_2' => $this->sanitizeString($data['pickup_address_line_2'] ?? '', 255),
            'pickup_address_line_3' => $this->sanitizeString($data['pickup_address_line_3'] ?? '', 255),
            'pickup_address_line_4_city' => $this->sanitizeString($data['pickup_address_line_4_city'] ?? 'Colombo', 100),
            'pickup_contact_person' => $this->sanitizeString($data['pickup_contact_person'] ?? 'Dispatch Manager', 150),
            'pickup_contact_number_1' => $this->sanitizeString($data['pickup_contact_number_1'] ?? '0771234567', 30),
            'estimated_pickup_weight_grams' => intval($data['estimated_pickup_weight_grams'] ?? 500),
            'estimated_waybill_count' => intval($data['estimated_waybill_count'] ?? 1),
            'pickup_from_datetime' => $data['pickup_from_datetime'] ?? now()->addHour()->format('d/m/Y H:i'),
            'pickup_to_datetime' => $data['pickup_to_datetime'] ?? now()->addHours(3)->format('d/m/Y H:i'),
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post($endpointUrl, $payload);

            $json = $response->json();
            if ($response->successful() && is_array($json)) {
                return [
                    'success' => filter_var($json['success'] ?? true, FILTER_VALIDATE_BOOLEAN),
                    'message' => $json['message'] ?? 'Pickup requested!',
                    'pickup_id' => $json['data']['pickup_id'] ?? null,
                ];
            }

            return [
                'success' => false,
                'message' => $json['message'] ?? 'Failed to schedule pickup with Citypak.',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error requesting pickup: ' . $e->getMessage(),
            ];
        }
    }
}
