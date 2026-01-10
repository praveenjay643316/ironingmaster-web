<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    protected $adminApiUrl;

    public function __construct()
    {
        $this->adminApiUrl = config('services.admin_api.url');
    }

    /**
     * Store appointment with payment verification
     */
    public function store(Request $request)
    {
        try {
            $token = session('token');
            
            if (!$token) {
                return redirect()->route('login')->with('error', 'Please login first');
            }

            // Validate request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone_number' => 'required|string',
                'pickup_date' => 'required|date',
                'pickup_time' => 'required',
                'pickup_location' => 'required|string',
                'payment_method' => 'required|in:online,cash',
                'coupon_code' => 'nullable|string',
            ]);

            // Fetch cart from admin API to verify amount and get products
            $cartResponse = Http::withToken($token)->get($this->adminApiUrl . '/cart');

            
            
            if (!$cartResponse->successful() || empty($cartResponse->json()['data'])) {
                return back()->with('error', 'Cart is empty or could not be verified');
            }

            $cartData = $cartResponse->json();
                
            // If online payment, verify payment
            $paymentStatus = 'pending';
            $transactionId = null;

            if ($request->payment_method === 'online') {
                $paymentController = new PaymentController();
                $verificationResult = $paymentController->verifyPayment($request);

                if (!$verificationResult['success']) {
                    return back()->with('error', 'Payment verification failed: ' . $verificationResult['message']);
                }

                $paymentStatus = 'paid';
                $transactionId = $request->razorpay_payment_id;
            }

            // Get user's default address or create one from pickup location
            $addressId = $this->getOrCreateAddress($token, $request->pickup_location);

            if (!$addressId) {
                return back()->with('error', 'Failed to process address');
            }

            // Prepare products array for order creation
            $products = [];
            foreach ($cartData['data'] as $cartItem) {
                $products[] = [
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity']
                ];
            }

            // Prepare order data matching the admin API structure
            $orderData = [
                'pickup_location' => $validated['pickup_location'],
                'payment_mode' => $validated['payment_method'] === 'online' ? 'Online' : 'COD',
                'products' => $products,
                'time_slot' => $validated['pickup_time'],
                'pickup_date' => $validated['pickup_date'],
                'address_id' => $addressId,
                'payment_status' => $paymentStatus,
                'transaction_id' => $transactionId,
                'coupon_code' => $validated['coupon_code'] ?? null,
            ];

            // Submit order to admin API
            $response = Http::withToken($token)
                ->post($this->adminApiUrl . '/order/create', $orderData);
                

            if ($response->successful()) {
                $orderResponse = $response->json();
                
                // Clear cart after successful order
                Http::withToken($token)->delete($this->adminApiUrl . '/cart/clear');
                
                // Clear session order data
                session()->forget('razorpay_order');
                
                return redirect()->route('appointment.success')
                    ->with('success', 'Order placed successfully!')
                    ->with('order', $orderResponse['order'] ?? null);
            }

            Log::error('Order creation failed: ' . $response->body());
            return back()->with('error', 'Failed to create order: ' . ($response->json()['error'] ?? 'Unknown error'));

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Appointment Creation Failed: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Get user's default address or create from pickup location
     */
    private function getOrCreateAddress($token, $pickupLocation)
{
    try {
        // 1️⃣ Fetch addresses
        $addressResponse = Http::withToken($token)
            ->get($this->adminApiUrl . '/addresses');

        if ($addressResponse->successful()) {
            $addresses = $addressResponse->json()['addresses'] ?? [];

            if (!empty($addresses)) {
                // Return active address
                foreach ($addresses as $address) {
                    if (!empty($address['active_status'])) {
                        return $address['id'];
                    }
                }

                // Else return first address
                return $addresses[0]['id'];
            }
        }

        // 2️⃣ Create new address
        $newAddressData = [
            'name' => 'Pickup Address',
            'house_or_building_no' => 'N/A',
            'address_line_1' => $pickupLocation,
            'address_line_2' => null,
            'landmark' => null,
            'active_status' => true,
            'latitude' => '0.0000',
            'longitude' => '0.0000',
            'pincode' => '000000',
        ];

        $createResponse = Http::withToken($token)
            ->post($this->adminApiUrl . '/addresses/create', $newAddressData);

        if ($createResponse->successful()) {
            return $createResponse->json()['address']['id'] ?? null;
        }

        Log::error('Address create failed: ' . $createResponse->body());
        return null;

    } catch (\Exception $e) {
        Log::error('Address error: ' . $e->getMessage());
        return null;
    }
}


    /**
     * Show order success page
     */
    public function success()
    {
        $order = session('order');
        return view('appointment-success', compact('order'));
    }
}