@extends('layouts.app')

@section('title', 'Order Success - Ironing Master')

@section('content')
<section class="success_page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="success_card">
                    <div class="success_icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    
                    <h2>Order Placed Successfully!</h2>
                    <p class="success_message">
                        Thank you for your order. We have received your booking request.
                    </p>

                    @if(session('order'))
                        <div class="order_details">
                            <h5>Order Details</h5>
                            <div class="detail_row">
                                <span class="label">Order Reference:</span>
                                <span class="value">{{ session('order')['order_ref_num'] ?? 'N/A' }}</span>
                            </div>
                            <div class="detail_row">
                                <span class="label">Pickup Date:</span>
                                <span class="value">{{ session('order')['pickup_date'] ?? 'N/A' }}</span>
                            </div>
                            <div class="detail_row">
                                <span class="label">Pickup Time:</span>
                                <span class="value">{{ session('order')['time_slot'] ?? 'N/A' }}</span>
                            </div>
                            <div class="detail_row">
                                <span class="label">Payment Mode:</span>
                                <span class="value">{{ session('order')['payment_mode'] ?? 'N/A' }}</span>
                            </div>
                        </div>
                    @endif

                    <div class="success_actions">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-home"></i> Go to Home
                        </a>
                        <a href="{{ route('orders') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list"></i> View My Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .success_page {
        padding: 150px 0 100px;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .success_card {
        background: #fff;
        padding: 50px 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin-top: 50px;
    }

    .success_icon {
        margin-bottom: 30px;
    }

    .success_icon i {
        font-size: 80px;
        color: #28a745;
        animation: scaleIn 0.5s ease-in-out;
    }

    @keyframes scaleIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .success_card h2 {
        color: #333;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .success_message {
        color: #666;
        font-size: 16px;
        margin-bottom: 30px;
    }

    .order_details {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 12px;
        margin: 30px 0;
        text-align: left;
    }

    .order_details h5 {
        font-size: 20px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    .detail_row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .detail_row:last-child {
        border-bottom: none;
    }

    .detail_row .label {
        color: #666;
        font-weight: 600;
    }

    .detail_row .value {
        color: #333;
        font-weight: 500;
    }

    .success_actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 30px;
    }

    .success_actions .btn {
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .success_actions .btn i {
        margin-right: 8px;
    }

    .success_actions .btn-primary {
        background: #7e22ce;
        border: none;
    }

    .success_actions .btn-primary:hover {
        background: #6b21a8;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(126, 34, 206, 0.3);
    }

    .success_actions .btn-outline-primary {
        border: 2px solid #7e22ce;
        color: #7e22ce;
        background: transparent;
    }

    .success_actions .btn-outline-primary:hover {
        background: #7e22ce;
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .success_page {
            padding: 100px 0 50px;
        }

        .success_card {
            padding: 30px 20px;
        }

        .success_card h2 {
            font-size: 24px;
        }

        .success_actions {
            flex-direction: column;
        }

        .success_actions .btn {
            width: 100%;
        }
    }
</style>
@endpush