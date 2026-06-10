@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('head')
<link rel="canonical" href="{{ url()->current() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@endsection

@section('styles')
<style>
*,*::before,*::after{box-sizing:border-box;}
:root{
  --ink:#0f172a;--ink-soft:#334155;--muted:#64748b;--line:#e2e8f0;--surface:#f8fafc;
  --white:#ffffff;--primary:#0c4a6e;--primary-l:#0369a1;--accent:#f59e0b;--accent-l:#fbbf24;
  --danger:#ef4444;--green:#10b981;--r:14px;--r-sm:8px;
  --shadow-xs:0 1px 3px rgba(0,0,0,.06);--shadow-sm:0 4px 12px rgba(0,0,0,.08);
  --shadow-md:0 12px 36px rgba(0,0,0,.12);--ease:cubic-bezier(.4,0,.2,1);--dur:.25s;
}
body{font-family:'Inter','Segoe UI',sans-serif!important;}

/* HERO */
.cart-hero-section{padding:0!important;margin:0!important;}
.cart-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 60%,#0284c7 100%);padding:28px 0 24px;position:relative;overflow:hidden;}
.cart-hero::before{content:'';position:absolute;width:350px;height:350px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-100px;right:-60px;pointer-events:none;}
.cart-hero h1{font-size:clamp(1.2rem,3vw,1.7rem);font-weight:800;color:#fff;letter-spacing:-.02em;margin:0 0 10px;position:relative;z-index:1;}
.cart-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.cart-breadcrumb{display:flex;align-items:center;gap:6px;font-size:13px;color:rgba(255,255,255,.65);flex-wrap:wrap;list-style:none;padding:0;margin:0;position:relative;z-index:1;}
.cart-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.cart-breadcrumb a:hover{color:#fde68a;}
.cart-breadcrumb .sep{font-size:10px;opacity:.5;}
.cart-breadcrumb .current{color:#fde68a;font-weight:600;}

/* TOAST */
.cart-toast{position:fixed;top:24px;right:24px;z-index:9999;min-width:280px;max-width:360px;padding:13px 44px 13px 18px;border-radius:var(--r-sm);font-size:13.5px;font-weight:600;color:#fff;box-shadow:var(--shadow-md);animation:toastIn .35s var(--ease);}
@keyframes toastIn{from{opacity:0;transform:translateY(-14px);}to{opacity:1;transform:translateY(0);}}
.cart-toast.success{background:var(--green);}
.cart-toast.error{background:var(--danger);}
.cart-toast-close{position:absolute;top:10px;right:14px;background:none;border:none;color:rgba(255,255,255,.8);font-size:18px;cursor:pointer;line-height:1;}

/* SECTION */
.cart-section{padding:36px 0 64px;}
.cart-layout{display:grid;grid-template-columns:1fr 340px;gap:28px;align-items:start;}

/* CART ITEMS PANEL */
.cart-panel-head{
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:16px;
}
.cart-panel-title{font-size:1.1rem;font-weight:800;color:var(--primary);letter-spacing:-.02em;margin:0;}
.cart-count-badge{
  display:inline-flex;align-items:center;gap:5px;
  padding:4px 12px;border-radius:50px;
  background:rgba(12,74,110,.08);color:var(--primary);
  font-size:12px;font-weight:700;
}

/* CART ROW */
.cart-row{
  background:var(--white);border-radius:var(--r);
  border:1px solid var(--line);box-shadow:var(--shadow-xs);
  padding:18px 20px;margin-bottom:12px;
  display:flex;align-items:center;gap:16px;
  transition:box-shadow var(--dur),border-color var(--dur);
}
.cart-row:hover{box-shadow:var(--shadow-sm);border-color:rgba(3,105,161,.2);}

.cart-row-img{
  flex-shrink:0;width:90px;height:90px;
  border-radius:10px;overflow:hidden;
  background:var(--surface);border:1px solid var(--line);
  display:flex;align-items:center;justify-content:center;
}
.cart-row-img img{width:100%;height:100%;object-fit:contain;padding:6px;}

.cart-row-body{flex:1;min-width:0;}
.cart-row-name{
  font-size:14.5px;font-weight:700;color:var(--ink);
  line-height:1.35;margin-bottom:6px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.cart-row-meta{display:flex;align-items:center;gap:12px;flex-wrap:wrap;}
.cart-row-price{font-size:13px;color:var(--muted);font-weight:500;}
.cart-row-price strong{color:var(--primary);font-size:14px;}

/* Qty stepper inline */
.cart-qty-form{display:flex;align-items:center;gap:6px;}
.cart-qty-wrap{display:flex;align-items:center;border:1.5px solid var(--line);border-radius:var(--r-sm);overflow:hidden;}
.cart-qty-btn{width:30px;height:30px;background:var(--surface);border:none;font-size:13px;color:var(--ink-soft);cursor:pointer;transition:background var(--dur);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.cart-qty-btn:hover{background:var(--line);}
.cart-qty-input{width:42px;height:30px;border:none;border-left:1.5px solid var(--line);border-right:1.5px solid var(--line);text-align:center;font-size:13px;font-weight:700;color:var(--ink);background:var(--white);outline:none;font-family:'Inter',sans-serif;}

.cart-row-right{
  display:flex;flex-direction:column;align-items:flex-end;gap:10px;
  flex-shrink:0;min-width:90px;
}
.cart-row-total{font-size:16px;font-weight:800;color:var(--primary);}
.cart-remove-btn{
  display:inline-flex;align-items:center;gap:5px;
  padding:5px 12px;border-radius:var(--r-sm);
  background:rgba(239,68,68,.08);color:var(--danger);
  border:1px solid rgba(239,68,68,.15);
  font-size:12px;font-weight:600;cursor:pointer;
  transition:all var(--dur);font-family:'Inter',sans-serif;
}
.cart-remove-btn:hover{background:var(--danger);color:#fff;border-color:var(--danger);}

/* SUMMARY CARD */
.cart-summary{
  background:var(--white);border-radius:var(--r);
  border:1px solid var(--line);box-shadow:var(--shadow-sm);
  overflow:hidden;position:sticky;top:90px;
}
.cart-summary-head{
  background:var(--primary);padding:18px 22px;
}
.cart-summary-head h5{font-size:14px;font-weight:800;color:#fff;margin:0;letter-spacing:.04em;text-transform:uppercase;}
.cart-summary-body{padding:22px;}
.summary-line{
  display:flex;align-items:center;justify-content:space-between;
  padding:10px 0;border-bottom:1px solid var(--line);
  font-size:13.5px;
}
.summary-line:last-of-type{border-bottom:none;}
.summary-line .s-label{color:var(--muted);font-weight:500;}
.summary-line .s-val{color:var(--ink);font-weight:700;}
.summary-total-line{
  display:flex;align-items:center;justify-content:space-between;
  padding:14px 0 20px;
  border-top:2px solid var(--line);
  margin-top:6px;
}
.summary-total-line .s-label{color:var(--ink);font-size:15px;font-weight:800;}
.summary-total-line .s-val{color:var(--primary);font-size:1.35rem;font-weight:900;letter-spacing:-.02em;}

.checkout-btn{
  display:flex;align-items:center;justify-content:center;gap:10px;
  width:100%;padding:14px;
  background:linear-gradient(135deg,var(--primary),var(--primary-l));color:#fff;
  border:none;border-radius:var(--r-sm);font-size:15px;font-weight:700;
  text-decoration:none;cursor:pointer;letter-spacing:.01em;
  transition:all var(--dur) var(--ease);
  box-shadow:0 6px 20px rgba(12,74,110,.3);
  font-family:'Inter',sans-serif;
  margin-bottom:10px;
}
.checkout-btn:hover{background:linear-gradient(135deg,#0b3c91,var(--primary));color:#fff;transform:translateY(-2px);box-shadow:0 10px 28px rgba(12,74,110,.4);}
.continue-btn{
  display:flex;align-items:center;justify-content:center;gap:8px;
  width:100%;padding:12px;
  background:var(--surface);color:var(--ink-soft);
  border:1.5px solid var(--line);border-radius:var(--r-sm);
  font-size:13.5px;font-weight:700;text-decoration:none;
  transition:all var(--dur);
  font-family:'Inter',sans-serif;
}
.continue-btn:hover{background:var(--line);color:var(--primary);border-color:rgba(3,105,161,.3);}

/* Trust strip inside summary */
.summary-trust{
  display:flex;flex-direction:column;gap:8px;
  padding:16px 22px;border-top:1px solid var(--line);
  background:var(--surface);
}
.st-item{display:flex;align-items:center;gap:8px;font-size:12px;color:var(--muted);}
.st-item i{color:var(--green);font-size:13px;flex-shrink:0;}

/* EMPTY STATE */
.cart-empty{
  text-align:center;padding:72px 24px;
  background:var(--white);border-radius:var(--r);
  border:1.5px dashed var(--line);
}
.cart-empty .empty-icon{font-size:4rem;color:#cbd5e1;margin-bottom:20px;}
.cart-empty h3{font-size:1.3rem;font-weight:800;color:var(--ink-soft);margin-bottom:8px;}
.cart-empty p{font-size:14px;color:var(--muted);margin-bottom:24px;}
.cart-empty .start-btn{
  display:inline-flex;align-items:center;gap:9px;
  padding:12px 28px;background:var(--primary);color:#fff;
  border-radius:var(--r-sm);text-decoration:none;
  font-size:14px;font-weight:700;transition:background var(--dur);
}
.cart-empty .start-btn:hover{background:var(--primary-l);color:#fff;}

/* RESPONSIVE */
@media(max-width:991px){
  .cart-layout{grid-template-columns:1fr;}
  .cart-summary{position:static;}
}
@media(max-width:576px){
  .cart-row{flex-wrap:wrap;gap:12px;}
  .cart-row-img{width:70px;height:70px;}
  .cart-row-right{flex-direction:row;align-items:center;justify-content:space-between;width:100%;min-width:0;}
  .cart-hero h1{font-size:1.3rem;}
}
</style>
@endsection

{{-- Toasts --}}
@if(session('success'))
<div class="cart-toast success" id="cartToast">
  <button class="cart-toast-close" onclick="this.parentElement.remove()">&times;</button>
  <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
</div>
@endif
@foreach($errors->all() as $error)
<div class="cart-toast error">
  <button class="cart-toast-close" onclick="this.parentElement.remove()">&times;</button>
  {{ $error }}
</div>
@endforeach

@section('content')

{{-- Hero --}}
<div class="cart-hero-section">
  <div class="cart-hero">
    <div class="container">
      <h1>Shopping <span>Cart</span></h1>
      <nav aria-label="breadcrumb">
        <ol class="cart-breadcrumb">
          <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
          <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
          <li><a href="{{ route('users.products') }}">Products</a></li>
          <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
          <li><span class="current">Cart</span></li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="cart-section">
  <div class="container">

    @php
      $sessionCart = session('cart', []);
      $totalItems  = collect($sessionCart)->sum('quantity');
      $totalCost   = collect($sessionCart)->sum(fn($c) => $c['price'] * $c['quantity']);
    @endphp

    @if(count($sessionCart) > 0)

      <div class="cart-layout">

        {{-- LEFT: Cart Items --}}
        <div>
          <div class="cart-panel-head">
            <h2 class="cart-panel-title">Your Items</h2>
            <span class="cart-count-badge"><i class="fas fa-shopping-cart"></i> {{ $totalItems }} item{{ $totalItems != 1 ? 's' : '' }}</span>
          </div>

          @foreach($sessionCart as $id => $cart)
            <div class="cart-row">
              {{-- Image --}}
              <div class="cart-row-img">
                <img src="{{ asset('images/products/'.$cart['image']) }}" alt="{{ $cart['name'] }}">
              </div>

              {{-- Details --}}
              <div class="cart-row-body">
                <div class="cart-row-name">{{ $cart['name'] }}</div>
                <div class="cart-row-meta">
                  <span class="cart-row-price">Unit: <strong>&#8358;{{ number_format($cart['price']) }}</strong></span>
                  @if(isset($cart['sku']))
                    <span style="font-size:11.5px;color:var(--muted);">SKU: {{ $cart['sku'] }}</span>
                  @endif
                </div>
              </div>

              {{-- Right: total + remove --}}
              <div class="cart-row-right">
                <span class="cart-row-total">&#8358;{{ number_format($cart['price'] * $cart['quantity']) }}</span>
                <div style="font-size:12px;color:var(--muted);font-weight:600;">Qty: {{ $cart['quantity'] }}</div>
                <form action="{{ route('carts.delete', $id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="cart-remove-btn">
                    <i class="fas fa-trash-alt"></i> Remove
                  </button>
                </form>
              </div>
            </div>
          @endforeach

        </div>

        {{-- RIGHT: Summary --}}
        <div>
          <div class="cart-summary">
            <div class="cart-summary-head">
              <h5><i class="fas fa-receipt me-2"></i>Order Summary</h5>
            </div>
            <div class="cart-summary-body">
              <div class="summary-line">
                <span class="s-label">Items ({{ $totalItems }})</span>
                <span class="s-val">&#8358;{{ number_format($totalCost) }}</span>
              </div>
              <div class="summary-line">
                <span class="s-label">Shipping</span>
                <span class="s-val" style="color:var(--green);">Calculated at checkout</span>
              </div>
              <div class="summary-total-line">
                <span class="s-label">Total</span>
                <span class="s-val">&#8358;{{ number_format($totalCost) }}</span>
              </div>

              @if(session()->has('cartSession'))
                <a href="{{ route('checkout.index', $cartSession) }}" class="checkout-btn">
                  <i class="fas fa-lock"></i> Proceed to Checkout
                </a>
              @else
                <a href="{{ route('users.products') }}" class="checkout-btn" style="opacity:.6;pointer-events:none;cursor:not-allowed;">
                  <i class="fas fa-lock"></i> Proceed to Checkout
                </a>
              @endif
              <a href="{{ route('users.products') }}" class="continue-btn">
                <i class="fas fa-arrow-left"></i> Continue Shopping
              </a>
            </div>
            <div class="summary-trust">
              <div class="st-item"><i class="fas fa-shield-alt"></i> Secure 256-bit SSL checkout</div>
              <div class="st-item"><i class="fas fa-undo"></i> Easy returns &amp; refunds</div>
              <div class="st-item"><i class="fas fa-headset"></i> 24/7 customer support</div>
            </div>
          </div>
        </div>

      </div>

    @else

      {{-- Empty cart --}}
      <div class="cart-empty">
        <div class="empty-icon"><i class="fas fa-shopping-cart"></i></div>
        <h3>Your cart is empty</h3>
        <p>Looks like you haven't added any solar products yet.</p>
        <a href="{{ route('users.products') }}" class="start-btn">
          <i class="fas fa-solar-panel"></i> Browse Products
        </a>
      </div>

    @endif

  </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener("DOMContentLoaded", function () {
  // Auto-dismiss toasts
  document.querySelectorAll(".cart-toast").forEach(function (t) {
    setTimeout(function () {
      t.style.opacity = "0";
      t.style.transform = "translateY(-10px)";
      t.style.transition = "all .4s ease";
      setTimeout(function () { t.remove(); }, 400);
    }, 4000);
  });
});
</script>
@endsection
