<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CitypakWebhookController extends Controller
{
    /**
     * Handle incoming Push API webhook from Citypak Courier.
     */
    public function handlePushWebhook(Request $request)
    {
        $payload = $request->all();

        Log::info('Citypak Push Webhook Received', [
            'payload' => $payload,
            'headers' => $request->headers->all(),
        ]);

        $trackingNumber = $payload['tracking_number'] ?? null;
        $reference = $payload['reference'] ?? null;
        $status = $payload['status'] ?? null;
        $statusType = $payload['status_type'] ?? null;

        if (!$trackingNumber && !$reference) {
            return response()->json([
                'success' => false,
                'message' => 'Missing tracking_number or reference in payload.',
            ], 400);
        }

        // Find Order by tracking number or order reference
        $order = Order::where(function ($q) use ($trackingNumber, $reference) {
            if ($trackingNumber) {
                $q->where('citypak_tracking_number', $trackingNumber);
            }
            if ($reference) {
                $q->orWhere('order_number', $reference);
            }
        })->first();

        if (!$order) {
            Log::warning('Citypak Webhook Order Not Found', [
                'tracking_number' => $trackingNumber,
                'reference' => $reference,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Order not found in system.',
            ], 404);
        }

        // Update tracking history
        $history = $order->citypak_tracking_history ?? [];
        $actionDateTime = $payload['action_datetime'] ?? ($payload['delivered_datetime'] ?? now()->format('d-m-Y H:i:s'));

        $newLog = [
            'status' => $status,
            'status_type' => $statusType,
            'reason' => $payload['reason'] ?? null,
            'action_datetime' => $actionDateTime,
            'received_at' => now()->toIso8601String(),
        ];
        $history[] = $newLog;

        $updateData = [
            'citypak_status' => $status ?: $statusType,
            'citypak_tracking_history' => $history,
        ];

        if ($trackingNumber && empty($order->citypak_tracking_number)) {
            $updateData['citypak_tracking_number'] = $trackingNumber;
        }

        // Handle specific statuses
        if (strtoupper($status) === 'DELIVERED' || strtoupper($statusType) === 'DL') {
            $updateData['status'] = 'completed';

            // If Cash on Delivery, mark payment status as Paid upon delivery
            if (in_array(strtolower($order->payment_method), ['cash_on_delivery', 'cod', 'cash'])) {
                $updateData['payment_status'] = 'paid';
            }
        } elseif (strtoupper($status) === 'NOT DELIVERED') {
            $updateData['citypak_status'] = 'NOT DELIVERED: ' . ($payload['reason'] ?? 'Unspecified reason');
        } elseif (strtoupper($status) === 'OUT FOR DELIVERY') {
            $updateData['status'] = 'processing';
        }

        $order->update($updateData);

        Log::info('Citypak Webhook Processed Order #' . $order->order_number, [
            'new_status' => $order->status,
            'citypak_status' => $order->citypak_status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Citypak status updated successfully.',
            'order_number' => $order->order_number,
        ]);
    }
}
