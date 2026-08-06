<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CybersourceService;
use Illuminate\Support\Facades\Log;

class CybersourceController extends Controller
{
    /**
     * Redirect customer to CyberSource Hosted Checkout portal
     */
    public function pay(string $orderNumber, CybersourceService $cyber)
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        $checkoutData = $cyber->buildHostedCheckoutRequest($order);

        return view('payments.cybersource-redirect', [
            'endpoint' => $checkoutData['endpoint'],
            'fields'   => $checkoutData['fields'],
            'order'    => $order,
        ]);
    }

    /**
     * Handle incoming response POST from CyberSource Hosted Checkout
     */
    public function handleResponse(Request $request, CybersourceService $cyber)
    {
        $data = $request->all();

        Log::info('Cybersource Response Received', [
            'method'           => $request->method(),
            'decision'         => $data['decision'] ?? null,
            'reason_code'      => $data['reason_code'] ?? null,
            'reference_number' => $data['req_reference_number'] ?? null,
            'transaction_id'   => $data['transaction_id'] ?? null,
        ]);

        // 1. Verify signature
        if (! $cyber->verifyResponse($data)) {
            Log::warning('Invalid Cybersource signature', [
                'reference_number' => $data['req_reference_number'] ?? null,
                'decision'         => $data['decision'] ?? null,
            ]);
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
        }

        $orderNo  = $data['req_reference_number'] ?? null;
        $decision = strtoupper($data['decision'] ?? '');
        $reasonCode = $data['reason_code'] ?? null;

        if (!$orderNo) {
            return response()->json(['status' => 'error', 'message' => 'Missing reference number'], 400);
        }

        $order = Order::where('order_number', $orderNo)->first();

        if ($decision === 'ACCEPT') {
            Log::info('Cybersource payment accepted', ['order_no' => $orderNo]);
            
            if ($order) {
                $order->update([
                    'status'         => 'processing',
                    'payment_status' => 'paid',
                ]);
            }

            session()->forget('cart');

            return redirect()->route('checkout.success', $orderNo)
                ->with('success', 'Payment successful! Order #' . $orderNo . ' has been placed.');
        }

        Log::warning('Cybersource payment declined/cancelled', [
            'order_no'    => $orderNo,
            'decision'    => $decision,
            'reason_code' => $reasonCode,
        ]);

        if ($order) {
            $order->update([
                'payment_status' => 'failed',
            ]);
        }

        return redirect()->route('checkout')
            ->with('error', 'Payment ' . strtolower($decision) . '. Reason code: ' . $reasonCode);
    }
}
