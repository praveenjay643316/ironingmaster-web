@extends('layouts.app')

@section('title', 'Book Service - Ironing Master')

@section('content')
<section class="about-two booking_page">
    <div class="container">
        <div class="row">
            {{-- PAGE TITLE --}}
            <div class="col-12 text-center mb-4">
                <h3 style="font-size: 32px; font-weight: 700; color: #081634; margin-bottom: 10px;">
                    Select Your Clothes
                </h3>
                <p style="color: #666; font-size: 16px;">Choose items and add to cart</p>
            </div>

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            {{-- CATEGORY TABS --}}
            <div class="col-12">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-all" type="button" role="tab" 
                                aria-controls="pills-all" aria-selected="true">
                            All
                        </button>
                    </li>
                    @if(isset($subcategories))
                        @foreach(collect($subcategories)->unique('name') as $subcategory)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" 
                                        id="pills-{{ Str::slug($subcategory['name']) }}-tab" 
                                        data-bs-toggle="pill" 
                                        data-bs-target="#pills-{{ Str::slug($subcategory['name']) }}" 
                                        type="button" role="tab" 
                                        aria-controls="pills-{{ Str::slug($subcategory['name']) }}" 
                                        aria-selected="false">
                                    {{ $subcategory['name'] }}
                                </button>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            {{-- TAB CONTENT --}}
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    {{-- ALL PRODUCTS TAB --}}
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" 
                         aria-labelledby="pills-all-tab">
                        <div class="dress_cat">
                            @if(isset($products))
                                @foreach($products as $product)
                                    <div class="cat_details" data-price="{{ $product['price'] }}" 
                                         data-product-id="{{ $product['id'] }}">
                                        <div class="product_left">
                                            <div class="product_img">
                                                <img src="{{ $product['image'] }}" 
                                                     alt="{{ $product['name'] }}"
                                                     onerror="this.src='{{ asset('assets/images/product/default.png') }}'">
                                            </div>
                                            <div class="pro_det">
                                                <h6 class="pro_name">{{ $product['name'] }}</h6>
                                                <small class="price_small">₹{{ $product['price'] }}</small>
                                            </div>
                                        </div>
                                        <div class="qty_box">
                                            <button type="button" class="qty_btn btn-minus">−</button>
                                            <input type="text" class="qty_input" value="0" readonly>
                                            <button type="button" class="qty_btn btn-plus">+</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- INDIVIDUAL SUBCATEGORY TABS --}}
                    @if(isset($subcategories) && isset($productsBySubcategory))
                        @foreach(collect($subcategories)->unique('name') as $subcategory)
                            <div class="tab-pane fade" id="pills-{{ Str::slug($subcategory['name']) }}" 
                                 role="tabpanel" aria-labelledby="pills-{{ Str::slug($subcategory['name']) }}-tab">
                                <div class="dress_cat">
                                    @php
                                        // Get all subcategory IDs with this name
                                        $subcategoryIds = collect($subcategories)
                                            ->where('name', $subcategory['name'])
                                            ->pluck('id');
                                        
                                        // Get products for these subcategories
                                        $categoryProducts = collect($products)
                                            ->whereIn('subcategory_id', $subcategoryIds);
                                    @endphp
                                    
                                    @foreach($categoryProducts as $product)
                                        <div class="cat_details" data-price="{{ $product['price'] }}" 
                                             data-product-id="{{ $product['id'] }}">
                                            <div class="product_left">
                                                <div class="product_img">
                                                    <img src="{{ $product['image'] }}" 
                                                         alt="{{ $product['name'] }}"
                                                         onerror="this.src='{{ asset('assets/images/product/default.png') }}'">
                                                </div>
                                                <div class="pro_det">
                                                    <h6 class="pro_name">{{ $product['name'] }}</h6>
                                                    <small class="price_small">₹{{ $product['price'] }}</small>
                                                </div>
                                            </div>
                                            <div class="qty_box">
                                                <button type="button" class="qty_btn btn-minus" >−</button>
                                                <input type="text" class="qty_input" value="0" readonly>
                                                <button type="button" class="qty_btn btn-plus">+</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- BOTTOM CART SUMMARY --}}
            <div class="cart_summary">
                <div class="summary_box">
                    <span class="items_text">
                        Total Price : (<span id="totalItems">0</span> items)
                    </span>
                    <span class="price_text">
                        ₹<span id="totalPrice">0</span>
                    </span>
                </div>
                <button type="button" class="add_cart_btn" onclick="handleAddToCart()">
                    Add to Cart
                </button>

                <script>
                function handleAddToCart() {
                    const totalItems = parseInt(document.getElementById('totalItems').innerText);

                    if (totalItems === 0) {
                        alert('Please select some clothes');
                        return;
                    }

                    // cart has items → go to schedule page
                    window.location.href = "{{ route('schedule-appointment') }}";
                }
                </script>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* =========================
   PAGE LAYOUT
========================= */
.booking_page {
    padding: 250px 0 93px;
}

/* =========================
   PRODUCT GRID
========================= */
.dress_cat {
    width: 100%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    gap: 40px 30px;
    justify-content: center;
}

/* =========================
   PRODUCT CARD
========================= */
.cat_details {
    width: calc(33.333% - 20px); /* 3 columns */
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

/* =========================
   LEFT SIDE (IMAGE + TEXT)
========================= */
.product_left {
    display: flex;
    align-items: center;
    gap: 15px;
    min-width: 0;
}

.product_img {
    width: 70px;
    flex-shrink: 0;
}

.product_img img {
    width: 100%;
    border-radius: 8px;
}

.pro_det h6 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.pro_det small {
    color: #666;
}

.price_small {
    color: green !important;
    font-weight: 600;
}

/* =========================
   QTY BOX
========================= */
.qty_box {
    display: flex;
    align-items: center;
    border: 1px solid #a855f7;
    border-radius: 20px;
    overflow: hidden;
    flex-shrink: 0;
}

.qty_btn {
    background: #f3e8ff;
    color: #7e22ce;
    border: none;
    padding: 6px 12px;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s;
}

.qty_btn:hover {
    background: #e9d5ff;
}

.qty_input {
    width: 32px;
    text-align: center;
    border: none;
    font-size: 14px;
    background: transparent;
    color: #7e22ce;
    font-weight: 600;
}

/* =========================
   CART SUMMARY
========================= */
.cart_summary {
    bottom: 0;
    left: 0;
    width: 100%;
    background: #fff;
    padding: 12px 20px;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    z-index: 1000;
}

.summary_box {
    display: flex;
    justify-content: space-between;
    background: #f3e8ff;
    padding: 12px;
    border-radius: 12px;
    font-weight: 600;
    margin-bottom: 10px;
}

.price_text {
    color: #7e22ce;
}

/* =========================
   ADD TO CART BUTTON
========================= */
.add_cart_btn {
    width: 100%;
    padding: 14px;
    background: #7e22ce;
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s;
}

.add_cart_btn:hover {
    background: #6b21a8;
    transform: translateY(-2px);
}

/* =========================
   TABS
========================= */
.nav-pills .nav-link {
    border-radius: 25px;
    padding: 10px 30px;
    color: #666;
    font-weight: 600;
    transition: all 0.3s;
}

.nav-pills .nav-link.active {
    background: #7e22ce;
    color: #fff;
}

.nav-pills .nav-link:hover {
    background: #f3e8ff;
    color: #7e22ce;
}

/* =========================
   RESPONSIVE
========================= */

/* Tablet */
@media (max-width: 992px) {
    .cat_details {
        width: calc(50% - 20px); /* 2 columns */
    }
}

/* Mobile */
@media (max-width: 768px) {
    .booking_page {
        padding: 180px 0 93px;
    }

    .dress_cat {
        gap: 20px;
    }

    .cat_details {
        width: 100%;
    }

    .cart_summary {
        padding: 15px;
    }
}

</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async function () {

    const API_BASE = "{{ config('services.admin_api.url') }}";
    const TOKEN = "{{ session('token') }}";

    // Common API call
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

        if (!res.ok) {
            console.error('API error', res.status);
            return null;
        }
        return res.json();
    }

    // Update qty inputs everywhere for same product
    function updateQtyEverywhere(productId, qty) {
        document.querySelectorAll(`.cat_details[data-product-id="${productId}"]`)
            .forEach(box => {
                box.querySelector('.qty_input').value = qty;
            });
    }

    // Update totals (items + price) from API response
    function updateTotalsFromAPI(cartData) {
        let totalQty = cartData.total_quantity ?? 0;
        let totalPrice = cartData.total_price ?? 0;

        document.getElementById('totalItems').innerText = totalQty;
        document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
    }

    // Load cart on page load
    async function loadCart() {
        const res = await api(`${API_BASE}/cart`);
        if (!res || !res.data) return;

        // Update product qtys
        res.data.forEach(item => {
            updateQtyEverywhere(item.product_id, item.quantity);
        });

        // Update totals
        updateTotalsFromAPI(res);
    }

    // Add product to cart
    async function addToCart(productId) {
        await api(`${API_BASE}/cart/add`, 'POST', { product_id: productId });
        const res = await api(`${API_BASE}/cart`);
        if (!res) return;

        // Update quantities and totals
        const cartItem = res.data.find(i => i.product_id == productId);
        if (cartItem) updateQtyEverywhere(productId, cartItem.quantity);
        updateTotalsFromAPI(res);
    }

    // Remove product from cart
    async function removeFromCart(productId) {
        const cart = await api(`${API_BASE}/cart`);
        const cartItem = cart?.data?.find(i => i.product_id == productId);
        if (!cartItem) return;

        await api(`${API_BASE}/cart/${cartItem.id}/remove`, 'DELETE');

        const res = await api(`${API_BASE}/cart`);
        if (!res) return;

        const updatedItem = res.data.find(i => i.product_id == productId);
        updateQtyEverywhere(productId, updatedItem ? updatedItem.quantity : 0);
        updateTotalsFromAPI(res);
    }

    // Event listeners for + buttons
    document.querySelectorAll('.btn-plus').forEach(btn => {
        btn.addEventListener('click', function () {
            const box = this.closest('.cat_details');
            const productId = box.dataset.productId;
            addToCart(productId);
        });
    });

    // Event listeners for - buttons
    document.querySelectorAll('.btn-minus').forEach(btn => {
        btn.addEventListener('click', function () {
            const box = this.closest('.cat_details');
            const productId = box.dataset.productId;
            removeFromCart(productId);
        });
    });

    // Initialize
    loadCart();

});
</script>
@endpush







