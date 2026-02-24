@extends('layouts.app')
@section('title')
<title>Checkout | Risolar</title>
@endsection

@section('head')
<link rel="canonical" href="{{ url()->current() }}">

@endsection

@section('styles')
<style>
.btn-gradient {
    background: linear-gradient(135deg, #007bff, #0056d2);
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    border: none;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #0056d2, #003d99);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}
.delivery {
    color: #343232;
    font-size: 14px;
    font-family: Verdana,'Geneva', Tahoma, sans-serif;
}
</style>
@endsection

@section('content')
<div style="height: 2em; background:#eee"></div>

<div class="container my-5">
    <div class="row g-4">

        <!-- Checkout Form -->
        <div class="col-lg-7">
            <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                @csrf
                <input type="hidden" name="address_id" value="{{ $address->id }}">
                @php
                    $shipping_fee = 8000;
                    $totalCost = 0;
                    if(session('cart')){
                        foreach(session('cart') as $item){
                            $totalCost += $item['price'] * $item['quantity'];
                        }
                    }
                    $grandTotal = $totalCost + $shipping_fee;
                @endphp
                <input type="hidden" name="amount" id="amount" value="{{ $grandTotal }}">
                <input type="hidden" name="reference" id="reference">

                <!-- Billing Info -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0 text-secondary fw-semibold">Billing Information</h6>
                            <a href="" class="small text-decoration-none text-primary">Change Address</a>
                        </div>
                        <p style="color:#76717a">Name: {{ $address->name }}</p>
                        <p style="color:#76717a">Address: {{ $address->address }}, {{ $address->city }}, {{ $address->state }}, {{ $address->country }}</p>
                        <p style="color:#76717a">Phone: {{ $address->phone }}</p>
                        <p style="color:#76717a">Email: {{ $address->email }}</p>
                        <p style="color:#76717a">Order No: {{ $orderNo }}</p>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h6 class="mb-3 text-secondary fw-semibold">Payment Method</h6>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="card" value="card" checked>
                            <label class="form-check-label" for="card">
                                <i class="fas fa-credit-card me-2 text-primary"></i> Credit / Debit Card
                            </label>
                            <div class="ms-4 mt-2 small text-muted">Pay securely using Visa, Mastercard, or Verve.</div>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="delivery" value="delivery">
                            <label class="form-check-label" for="delivery">
                                <i class="fab fa-paypal me-2 text-primary"></i> Home Delivery
                            </label>
                            <div class="ms-4 mt-2 small text-muted">Redirects to shipment address.</div>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="bank" value="bank">
                            <label class="form-check-label" for="bank">
                                <i class="fas fa-university me-2 text-primary"></i> Bank Transfer
                            </label>
                            <div class="ms-4 mt-2 small text-muted">Transfer funds directly to our account. Details will be shown after checkout.</div>
                        </div>

                        <button type="button" id="payBtn" class="btn btn-gradient w-100 py-3">
                            <i class="fas fa-lock me-2"></i> Proceed to Secure Payment
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="mb-4 text-secondary fw-semibold">Order Summary</h6>
                    @php
                        $totalItems = 0;
                    @endphp
                    @if(session('cart') && count(session('cart')) > 0)
                        @foreach(session('cart') as $cart)
                            @php
                                $totalItems += $cart['quantity'];
                            @endphp
                            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                <div>
                                    <p class="mb-0 fw-medium">{{ $cart['name'] }}</p>
                                    <small class="text-muted">Qty: {{ $cart['quantity'] }}</small>
                                </div>
                                <span class="fw-semibold">{{ moneyFormat($cart['price'] * $cart['quantity'], 2) }}</span>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Shipping</span>
                            <span class="fw-medium">{{ moneyFormat($shipping_fee) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-semibold fs-6">
                            <span>Total</span>
                            <span>{{ moneyFormat($grandTotal, 2) }}</span>
                        </div>
                    @else
                        <p class="text-muted">Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const payBtn = document.getElementById('payBtn');
    const checkoutForm = document.getElementById('checkoutForm');

    payBtn.addEventListener('click', function (e) {
        e.preventDefault();

        const selected = document.querySelector('input[name="payment_method"]:checked');
        if(!selected) {
            alert('Please select a payment method');
            return;
        }

        // HOME DELIVERY or BANK
        if(selected.value === 'delivery' || selected.value === 'bank') {
            checkoutForm.submit();
            return;
        }

        // CARD PAYMENT
        if(selected.value === 'card') {
            let amountField = document.getElementById('amount');
            let amount = parseFloat(amountField.value);
            
            if(!amount || amount <= 0) {
                alert('Invalid payment amount');
                return;
            }

            // Paystack requires amount in kobo (NGN × 100)
            amount = Math.round(amount * 100);

            // Generate a unique reference
            let reference = 'REF_' + Math.floor(Math.random() * 1000000000);
            document.getElementById('reference').value = reference;

            // Initialize Paystack payment
            let handler = PaystackPop.setup({
                key: "{{ config('paystack.publicKey') }}", 
                email: "{{ auth()->user()->email }}",
                amount: amount,
                ref: reference,
                currency: "NGN",
                callback: function(response){
                    // When payment is successful, submit the form with reference
                    document.getElementById('reference').value = response.reference;
                    checkoutForm.submit();
                },
                onClose: function(){
                    alert('Transaction cancelled.');
                }
            });

            handler.openIframe();
        }
    });
});
</script>
@endsection