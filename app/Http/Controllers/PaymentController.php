<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    protected $razorpayKey;
    protected $razorpaySecret;
    protected $adminApiUrl;

    public function __construct()
    {
        $this->razorpayKey = config('services.razorpay.key');
        $this->razorpaySecret = config('services.razorpay.secret');
        $this->adminApiUrl = config('services.admin_api.url');
    }

    /**
     * Create Razorpay Order with amount verification and coupon support
     */
    public function createOrder(Request $request)
    {
        try {
            // Get user token from session
            $token = session('token');
            
            if (!$token) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Fetch cart from admin API to verify amount
            $cartResponse = Http::withToken($token)
                ->get($this->adminApiUrl . '/cart');

            if (!$cartResponse->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch cart details'
                ], 400);
            }

            $cartData = $cartResponse->json();

            // Verify cart is not empty
            if (empty($cartData['data'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cart is empty'
                ], 400);
            }

            // Calculate amount from backend
            $itemsTotal = floatval($cartData['total_price'] ?? 0);
            $deliveryCharge = 0; // You can get this from settings or pass from frontend
            $discount = 0;

            // Check if coupon is applied (from request)
            $couponCode = $request->input('coupon_code');
            
            if ($couponCode) {
                // Apply coupon to get discount
                $couponResponse = Http::withToken($token)
                    ->post($this->adminApiUrl . '/coupon/apply', [
                        'coupon_code' => $couponCode
                    ]);

                if ($couponResponse->successful()) {
                    $couponData = $couponResponse->json();
                    if (isset($couponData['success']) && $couponData['success']) {
                        $discount = floatval($couponData['discount'] ?? 0);
                        
                        // Store coupon info in session for later verification
                        session([
                            'applied_coupon' => [
                                'code' => $couponCode,
                                'discount' => $discount
                            ]
                        ]);
                    }
                }
            }

            $grandTotal = $itemsTotal - $discount + $deliveryCharge;

            // Verify amount is valid
            if ($grandTotal <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid order amount'
                ], 400);
            }

            // Convert to paise (Razorpay requires amount in smallest currency unit)
            $amountInPaise = round($grandTotal * 100);

            // Create Razorpay Order
            $api = new Api($this->razorpayKey, $this->razorpaySecret);
            
            $orderData = [
                'receipt' => 'order_' . time(),
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'notes' => [
                    'user_id' => session('user.id'),
                    'items_total' => $itemsTotal,
                    'delivery_charge' => $deliveryCharge,
                    'discount' => $discount,
                    'coupon_code' => $couponCode ?? null
                ]
            ];

            $razorpayOrder = $api->order->create($orderData);

            // Store order details in session for verification later
            session([
                'razorpay_order' => [
                    'order_id' => $razorpayOrder['id'],
                    'amount' => $grandTotal,
                    'amount_paise' => $amountInPaise,
                    'discount' => $discount,
                    'coupon_code' => $couponCode,
                    'created_at' => now()->toDateTimeString()
                ]
            ]);

            return response()->json([
                'success' => true,
                'order_id' => $razorpayOrder['id'],
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'verified_amount' => $grandTotal,
                'discount' => $discount,
                'message' => 'Order created successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Razorpay Order Creation Failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to create payment order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify Razorpay Payment Signature
     */
    public function verifyPayment(Request $request)
    {
        try {
            $razorpayOrderId = $request->razorpay_order_id;
            $razorpayPaymentId = $request->razorpay_payment_id;
            $razorpaySignature = $request->razorpay_signature;

            // Verify signature
            $api = new Api($this->razorpayKey, $this->razorpaySecret);
            
            $attributes = [
                'razorpay_order_id' => $razorpayOrderId,
                'razorpay_payment_id' => $razorpayPaymentId,
                'razorpay_signature' => $razorpaySignature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Verify amount from session
            $sessionOrder = session('razorpay_order');
            
            if (!$sessionOrder || $sessionOrder['order_id'] !== $razorpayOrderId) {
                throw new \Exception('Order verification failed');
            }

            // Fetch payment details from Razorpay
            $payment = $api->payment->fetch($razorpayPaymentId);

            // Verify amount matches
            if ($payment['amount'] != $sessionOrder['amount_paise']) {
                throw new \Exception('Payment amount mismatch');
            }

            return [
                'success' => true,
                'payment_id' => $razorpayPaymentId,
                'amount' => $sessionOrder['amount'],
                'discount' => $sessionOrder['discount'] ?? 0,
                'coupon_code' => $sessionOrder['coupon_code'] ?? null
            ];

        } catch (\Exception $e) {
            Log::error('Payment Verification Failed: ' . $e->getMessage());
            
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}