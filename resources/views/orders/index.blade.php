@extends('layouts.app')

@section('title', 'My Orders - Ironing Master')

@section('content')
<section class="about-two orders_page">
    <div class="container">
        <div class="row">

            {{-- PAGE TITLE --}}
            <div class="col-12 text-center mb-4">
                <h3 class="page_title">My Orders</h3>
                <p class="page_subtitle">Track your ironing orders</p>
            </div>

            <div class="col-12">
                <table id="ordersTable" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order Ref</th>
                            <th>Pickup Date</th>
                            <th>Time Slot</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Table body populated via JS --}}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
@endsection
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
.orders_page { padding: 250px 0 80px; }
.page_title { font-size: 32px; font-weight: 700; color: #081634; }
.page_subtitle { color: #666; margin-bottom: 20px; }

#ordersTable th, #ordersTable td {
    padding: 12px 15px; /* Increase padding */
    vertical-align: middle;
}

.dataTables_wrapper .dataTables_filter input {
    border-radius: 8px;
    padding: 6px;
    border: 1px solid #ccc;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 8px;
    padding: 6px 12px;
    margin: 2px;
}

.badge-status {
    padding: 5px 10px;
    border-radius: 12px;
    color: #fff;
    font-weight: 600;
    display: inline-block;
}

.badge-order-placed { background: #10b981; }
.badge-packed { background: #10b981; }
.badge-driver-assigned { background: #10b981; }
.badge-shipped { background: #10b981; }
.badge-delivered { background: #10b981; }

@media (max-width: 768px) {
    .orders_page { padding: 180px 0 80px; }
    #ordersTable th, #ordersTable td { padding: 8px 10px; }
}
</style>
@endpush
@push('scripts')

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(async function() {
    const API_BASE = "{{ config('services.admin_api.url') }}";
    const TOKEN = "{{ session('token') }}";

    async function fetchOrders() {
        const res = await fetch(`${API_BASE}/orders`, {
            headers: { 'Authorization': 'Bearer ' + TOKEN, 'Accept': 'application/json' }
        });
        if (!res.ok) return [];
        const data = await res.json();
        return data.data ?? [];
    }

    function statusBadge(status) {
        switch(status) {
            case 10: return '<span class="badge-status badge-order-placed">Order Placed</span>';
            case 30: return '<span class="badge-status badge-packed">Packed</span>';
            case 40: return '<span class="badge-status badge-driver-assigned">Driver Assigned</span>';
            case 50: return '<span class="badge-status badge-shipped">Shipped</span>';
            case 60: return '<span class="badge-status badge-delivered">Delivered</span>';
            default: return '<span class="badge-status badge-order-placed">Processing</span>';
        }
    }

    const orders = await fetchOrders();

    $('#ordersTable').DataTable({
        data: orders,
        columns: [
            { data: 'order_ref_num' },
            { data: 'pickup_date' },
            { data: 'time_slot' },
            { data: 'payment_mode' },
            { data: 'status', render: function(data) { return statusBadge(data); } },
            { data: 'total', render: function(data) { return '₹' + (data ?? 0).toFixed(2); } }
        ],
        order: [[1, 'desc']],
        pageLength: 10,
        lengthMenu: [5, 10, 20, 50],
        autoWidth: false,
    });
});
</script>
@endpush
