<!DOCTYPE html>
<html>
<head>
    <title>Schedule Appointment</title>
</head>
<body>

@extends('layouts.app')

@section('title', 'Schedule Appointment - Ironing Master')

@section('content')
<section class="about-two appointment_page">
    <div class="container">
        <div class="row">
             <form method="POST" action="{{ route('appointment.store') }}" id="appointmentForm">
                @csrf
                
                {{-- PAGE TITLE --}}
                <div class="text-center mb-4">
                    <h2 style="font-size: 32px; font-weight: 700; color: #081634;">Schedule Appointment</h2>
                </div>
                
                {{-- CUSTOMER DETAILS --}}
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input class="form-control" type="text" name="name" id="name" 
                                   value="{{ old('name', session('user.name')) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="email">Customer Email</label>
                            <input class="form-control" type="email" name="email" id="email" 
                                   value="{{ old('email', session('user.email')) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="phone_number">Customer Phone Number</label>
                            <input class="form-control" type="tel" name="phone_number" id="phone_number" 
                                   value="{{ old('phone_number', session('user.phone')) }}" required>
                            @error('phone_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                
                {{-- PICKUP DETAILS --}}
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="pickup_date">Pickup Date</label>
                            <input class="form-control" type="date" name="pickup_date" id="pickup_date" 
                                   min="{{ date('Y-m-d') }}" value="{{ old('pickup_date') }}" required>
                            @error('pickup_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="pickup_time">Pickup Time</label>
                            <input class="form-control" type="time" name="pickup_time" id="pickup_time" 
                                   value="{{ old('pickup_time') }}" required>
                            @error('pickup_time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="pickup_location">Select Pickup Location</label>
                            <input id="pickup_location" class="form-control" type="text" 
                                   name="pickup_location" placeholder="Search location" 
                                   value="{{ old('pickup_location') }}" required>
                            @error('pickup_location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                
                {{-- PRODUCT DETAILS --}}
                <div class="product_details mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6>Product Details</h6>
                        <span class="badge bg-primary" id="totalItemsBadge">0 items</span>
                    </div>
                    
                    <div id="productsContainer">
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2 text-muted">Loading your cart items...</p>
                        </div>
                    </div>
                </div>
                
                {{-- COUPON & CART SUMMARY --}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="coupon_code">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h6>Have a coupon code?</h6>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <button type="button" class="btn btn-success btn-sm" id="applyCouponBtn">
                                            Apply Coupon
                                        </button>
                                    </div>
                                </div>
                                
                                {{-- Coupon Input Box --}}
                                <div class="row mt-3" id="couponInputBox" style="display:none;">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" 
                                               id="coupon_code_input" placeholder="Enter coupon code">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success w-100" onclick="applyCouponCode()">
                                            Apply
                                        </button>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div id="couponMessage"></div>
                                    </div>
                                </div>
                                
                                {{-- Applied Coupon Display --}}
                                <div class="row mt-3" id="appliedCouponBox" style="display:none;">
                                    <div class="col-12">
                                        <div class="applied-coupon-badge">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    <strong id="appliedCouponCode"></strong>
                                                    <span class="text-success ms-2" id="appliedCouponSavings"></span>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeCoupon()">
                                                    <i class="fas fa-times"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="cart_details">
                            <div class="row">
                                <div class="col-md-6"><h6>Items</h6></div>
                                <div class="col-md-6">
                                    <span>₹<span id="itemsTotal">0.00</span></span>
                                </div>
                                
                                <div class="col-md-6"><h6>Discount</h6></div>
                                <div class="col-md-6">
                                    <span class="text-success">- ₹<span id="discount">0.00</span></span>
                                </div>
                                
                                <div class="col-md-6"><h6>Delivery</h6></div>
                                <div class="col-md-6">
                                    <span>₹<span id="delivery">0.00</span></span>
                                </div>
                                
                                <div class="col-md-6">
                                    <h6><strong>Grand Total</strong></h6>
                                </div>
                                <div class="col-md-6">
                                    <span><strong>₹<span id="grandTotal">0.00</span></strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- HIDDEN FIELDS --}}
                <input type="hidden" name="payment_method" id="payment_method" value="">
                <input type="hidden" name="coupon_code" id="coupon_code" value="">
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" value="">
                <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="">
                <input type="hidden" name="razorpay_signature" id="razorpay_signature" value="">
                
                {{-- PAYMENT BUTTONS --}}
                <div class="cart_btn_det">
                    <button type="button" class="btn btn-success" id="payOnlineBtn">
                        <i class="fas fa-credit-card"></i> Pay Online
                    </button>
                    <button type="button" class="btn btn-danger" id="payCashBtn">
                        <i class="fas fa-money-bill"></i> Pay on Delivery (COD)
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .appointment_page { padding: 250px 0 93px; }
    .form-control { padding: 10px 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; }
    .form-control:focus { border-color: #7e22ce; box-shadow: 0 0 0 0.2rem rgba(126, 34, 206, 0.15); }
    .form-group label { font-weight: 600; margin-bottom: 8px; color: #333; display: block; }
    
    .product_details {
        background: #d6eaff69;
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
        max-height: 50vh;
        overflow-y: auto;
    }
    
    .cart_details {
        background: #e7e7e759;
        padding: 20px;
        border-radius: 10px;
    }
    
    .coupon_code {
        background: #fff9e6;
        padding: 15px;
        border-radius: 10px;
        border: 1px dashed #ffc107;
    }
    
    .applied-coupon-badge {
        background: #d4edda;
        border: 1px solid #28a745;
        padding: 12px 15px;
        border-radius: 8px;
        animation: slideIn 0.3s ease-in-out;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .cart_btn_det {
        justify-content: center;
        align-items: center;
        display: flex;
        gap: 20px;
        margin-top: 30px;
    }
    
    .cart_btn_det .btn {
        padding: 12px 40px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s;
    }
    
    #couponMessage { font-size: 14px; margin-top: 5px; }
    .text-success { color: #28a745 !important; }
    
    @media (max-width: 768px) {
        .appointment_page { padding: 180px 0 93px; }
        .cart_btn_det { flex-direction: column; gap: 10px; }
        .cart_btn_det .btn { width: 100%; }
    }
</style>
@endpush

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9e-OIAr6jDaLIHHb5DV7GIN7Vh8J1fHk&libraries=places&callback=initAutocomplete" async defer></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async function () {
    const API_BASE = "{{ config('services.admin_api.url') }}";
    const TOKEN = "{{ session('token') }}";
    const RAZORPAY_KEY = "{{ config('services.razorpay.key') }}";

    let appliedCouponData = null;

    async function api(url, method = 'GET', body = null) {
        const res = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + TOKEN,
                'Accept': 'application/json'
            },
            body: body ? JSON.stringify(body) : null
        });
        if (!res.ok) return null;
        return res.json();
    }

    window.initAutocomplete = function() {
        new google.maps.places.Autocomplete(document.getElementById('pickup_location'));
    }

    function updateTotalsFromAPI(cartData) {
        const itemsTotal = cartData.total_price ?? 0;
        const deliveryCharge = parseFloat(document.getElementById('delivery').textContent) || 0;
        let discount = parseFloat(document.getElementById('discount').textContent) || 0;
        
        // Apply coupon discount if available
        if (appliedCouponData && appliedCouponData.discount) {
            discount = appliedCouponData.discount;
        }
        
        const grandTotal = itemsTotal - discount + deliveryCharge;

        document.getElementById('itemsTotal').textContent = itemsTotal.toFixed(2);
        document.getElementById('discount').textContent = discount.toFixed(2);
        document.getElementById('grandTotal').textContent = grandTotal.toFixed(2);
        document.getElementById('totalItemsBadge').textContent = `${cartData.total_quantity ?? 0} items`;
    }

    function renderCartProducts(cartData) {
        const container = document.getElementById('productsContainer');
        
        if (!cartData || !cartData.data || cartData.data.length === 0) {
            container.innerHTML = `
                <div class="empty-cart text-center py-5">
                    <div style="font-size: 64px; color: #ddd; margin-bottom: 20px;">🛒</div>
                    <h5>Your cart is empty</h5>
                    <p>Please add items from the booking page first</p>
                    <a href="{{ route('booking') }}" class="btn btn-primary mt-3">Go to Booking</a>
                </div>
            `;
            return;
        }

        let html = '';
        cartData.data.forEach(item => {
            const product = item.product;
            const quantity = item.quantity;
            
            html += `
                <div class="cat_details" style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background: #fff; border-radius: 10px; margin-bottom: 15px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="width: 70px; height: 70px; flex-shrink: 0; overflow: hidden; border-radius: 8px;">
                            <img src="${product.image}" alt="${product.name}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div>
                            <h6 style="margin: 0 0 5px 0; font-size: 18px; font-weight: 600;">${product.name}</h6>
                            <small style="color: green; font-weight: 600; font-size: 16px;">₹${product.price}</small>
                        </div>
                    </div>
                    <div>
                        <span style="color: #7e22ce; font-weight: 600;">Qty: ${quantity}</span>
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;
    }

    // Toggle coupon input
    document.getElementById("applyCouponBtn").addEventListener("click", function () {
        const couponBox = document.getElementById("couponInputBox");
        couponBox.style.display = couponBox.style.display === "none" ? "flex" : "none";
    });

    // Apply coupon function
    window.applyCouponCode = async function() {
        const couponCode = document.getElementById('coupon_code_input').value.trim();
        const messageDiv = document.getElementById('couponMessage');
        
        if (!couponCode) {
            messageDiv.innerHTML = '<small class="text-danger">Please enter a coupon code</small>';
            return;
        }

        try {
            const result = await api(`${API_BASE}/coupon/apply`, 'POST', { 
                coupon_code: couponCode 
            });

            if (result && result.success) {
                appliedCouponData = result;
                
                // Update totals
                document.getElementById('discount').textContent = result.discount.toFixed(2);
                document.getElementById('grandTotal').textContent = result.new_total.toFixed(2);
                document.getElementById('coupon_code').value = couponCode;
                
                // Hide input box
                document.getElementById('couponInputBox').style.display = 'none';
                document.getElementById('applyCouponBtn').style.display = 'none';
                
                // Show applied coupon badge
                document.getElementById('appliedCouponCode').textContent = couponCode.toUpperCase();
                document.getElementById('appliedCouponSavings').textContent = `(You saved ₹${result.discount.toFixed(2)})`;
                document.getElementById('appliedCouponBox').style.display = 'block';
                
                // Clear input
                document.getElementById('coupon_code_input').value = '';
                messageDiv.innerHTML = '';
            } else {
                messageDiv.innerHTML = `<small class="text-danger">${result?.message || 'Invalid coupon code'}</small>`;
            }
        } catch (error) {
            messageDiv.innerHTML = '<small class="text-danger">Failed to apply coupon</small>';
        }
    }
    
    // Remove coupon function
    window.removeCoupon = async function() {
        // Clear coupon data
        appliedCouponData = null;
        document.getElementById('coupon_code').value = '';
        
        // Reset discount
        document.getElementById('discount').textContent = '0.00';
        
        // Recalculate totals
        const cartData = await api(`${API_BASE}/cart`);
        if (cartData) {
            updateTotalsFromAPI(cartData);
        }
        
        // Hide applied coupon badge
        document.getElementById('appliedCouponBox').style.display = 'none';
        
        // Show apply button again
        document.getElementById('applyCouponBtn').style.display = 'inline-block';
        
        // Clear message
        document.getElementById('couponMessage').innerHTML = '';
    }

    function validateForm() {
        const products = document.querySelector('#productsContainer .cat_details');
        if (!products) {
            alert('Your cart is empty. Please add products first.');
            return false;
        }

        const fields = ['name', 'email', 'phone_number', 'pickup_date', 'pickup_time', 'pickup_location'];
        for (let field of fields) {
            if (!document.getElementById(field).value.trim()) {
                alert('Please fill all required fields');
                return false;
            }
        }
        return true;
    }

    async function createRazorpayOrder() {
        try {
            const couponCode = document.getElementById('coupon_code').value;
            
            const response = await fetch("{{ route('payment.create.order') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    coupon_code: couponCode || null
                })
            });

            const result = await response.json();
            
            if (!response.ok || !result.success) {
                throw new Error(result.message || 'Failed to create order');
            }

            console.log('Razorpay Order Created:', result);
            return result;
        } catch (error) {
            console.error('Error creating order:', error);
            alert(error.message || 'Failed to create payment order. Please try again.');
            return null;
        }
    }

    async function initiateRazorpayPayment() {
        if (!validateForm()) return;

        const orderData = await createRazorpayOrder();
        if (!orderData) return;

        const options = {
            key: RAZORPAY_KEY,
            amount: orderData.amount,
            currency: orderData.currency,
            order_id: orderData.order_id,
            name: 'Ironing Master',
            description: 'Appointment Payment',
            handler: function (response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                document.getElementById('payment_method').value = 'online';
                document.getElementById('appointmentForm').submit();
            },
            prefill: {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                contact: document.getElementById('phone_number').value
            },
            theme: { color: '#7e22ce' },
            modal: {
                ondismiss: function() {
                    alert('Payment cancelled. Please try again.');
                }
            }
        };

        const razorpay = new Razorpay(options);
        razorpay.open();
    }

    document.getElementById('payOnlineBtn').addEventListener('click', function(e) {
        e.preventDefault();
        initiateRazorpayPayment();
    });

    document.getElementById('payCashBtn').addEventListener('click', function(e) {
        e.preventDefault();
        
        if (!validateForm()) return;

        if (confirm('Are you sure you want to place this order with Cash on Delivery?')) {
            document.getElementById('payment_method').value = 'cash';
            document.getElementById('appointmentForm').submit();
        }
    });

    async function loadCartToAppointmentPage() {
        const cartData = await api(`${API_BASE}/cart`);
        
        if (!cartData) {
            document.getElementById('productsContainer').innerHTML = `
                <div class="alert alert-danger">Failed to load cart. Please try again.</div>
            `;
            return;
        }

        renderCartProducts(cartData);
        updateTotalsFromAPI(cartData);
    }

    loadCartToAppointmentPage();
});
</script>
@endpush

</body>
</html>