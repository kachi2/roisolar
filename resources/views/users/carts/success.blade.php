@extends('layouts.app')

@section('title', 'Order Placed Successfully')

@section('content')
<div class="container py-5 text-center">
    <div class="card shadow-sm p-4">
        <h2 class="text-success mb-3">🎉 Order Successful!</h2>

        @if($success)
            <p class="text-muted">{{ $success }}</p>
        @else
            <p class="text-muted">Your order has been successfully placed.</p>
        @endif

       <div class="d-flex flex-wrap gap-2 mt-3">
    <a href="{{ route('users.products') }}" 
       class="btn btn-outline-primary btn-sm flex-fill text-center">
        Continue Shopping
    </a>

    <a href="{{ route('users.orderList') }}" 
       class="btn btn-primary btn-sm flex-fill text-center">
        View Order
    </a>
</div>
    </div>
</div>
@endsection
