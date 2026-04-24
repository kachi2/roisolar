@extends('layouts.app')

@section('title')
<title>{{ $product->name }} — {{ config('app.name') }}</title>
@endsection

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

/* HERO BREADCRUMB */
.pd-hero-section{padding:0!important;margin:0!important;}
.pd-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 60%,#0284c7 100%);padding:28px 0 24px;position:relative;overflow:hidden;}
.pd-hero::before{content:'';position:absolute;width:350px;height:350px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-100px;right:-60px;pointer-events:none;}
.pd-breadcrumb{display:flex;align-items:center;gap:6px;font-size:13px;color:rgba(255,255,255,.65);flex-wrap:wrap;list-style:none;padding:0;margin:0;position:relative;z-index:1;}
.pd-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.pd-breadcrumb a:hover{color:#fde68a;}
.pd-breadcrumb .sep{font-size:10px;opacity:.5;}
.pd-breadcrumb .current{color:#fde68a;font-weight:600;max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}

/* LAYOUT */
.pd-section{padding:36px 0 60px;}
.pd-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-sm);overflow:hidden;margin-bottom:32px;}
.pd-img-col{display:flex;flex-direction:column;align-items:center;padding:32px 24px;background:var(--surface);border-right:1px solid var(--line);}
.pd-img-main{width:100%;max-width:380px;height:320px;display:flex;align-items:center;justify-content:center;background:var(--white);border-radius:var(--r);border:1px solid var(--line);overflow:hidden;margin-bottom:16px;box-shadow:var(--shadow-xs);}
.pd-img-main img{max-width:100%;max-height:100%;object-fit:contain;padding:16px;transition:transform .4s var(--ease);}
.pd-img-main:hover img{transform:scale(1.05);}
.pd-badge-strip{display:flex;gap:8px;flex-wrap:wrap;justify-content:center;}
.pd-badge{display:inline-flex;align-items:center;gap:5px;padding:5px 12px;border-radius:50px;font-size:11.5px;font-weight:700;letter-spacing:.04em;}
.pd-badge.discount{background:rgba(239,68,68,.1);color:var(--danger);}
.pd-badge.instock{background:rgba(16,185,129,.1);color:var(--green);}
.pd-badge.outstock{background:rgba(100,116,139,.1);color:var(--muted);}
.pd-info-col{padding:32px 28px;}
.pd-cat-tag{display:inline-flex;align-items:center;gap:6px;padding:4px 12px;border-radius:50px;background:rgba(12,74,110,.08);color:var(--primary);font-size:11.5px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;margin-bottom:14px;text-decoration:none;transition:background var(--dur);}
.pd-cat-tag:hover{background:rgba(12,74,110,.15);color:var(--primary);}
.pd-title{font-size:clamp(1.2rem,2.5vw,1.6rem);font-weight:800;color:var(--ink);letter-spacing:-.025em;line-height:1.25;margin:0 0 20px;}
.pd-price-block{display:flex;align-items:center;gap:14px;flex-wrap:wrap;margin-bottom:24px;padding:16px 20px;background:var(--surface);border-radius:var(--r-sm);border:1px solid var(--line);}
.pd-price-new{font-size:2rem;font-weight:900;color:var(--primary);letter-spacing:-.03em;}
.pd-price-old{font-size:1.1rem;color:var(--muted);text-decoration:line-through;font-weight:500;}
.pd-price-save{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:50px;background:rgba(239,68,68,.1);color:var(--danger);font-size:12px;font-weight:700;}
.pd-meta{list-style:none;padding:0;margin:0 0 24px;display:flex;flex-direction:column;gap:10px;}
.pd-meta li{display:flex;align-items:center;gap:12px;font-size:13.5px;padding:10px 14px;background:var(--surface);border-radius:var(--r-sm);border:1px solid var(--line);}
.pd-meta li .meta-label{font-weight:700;color:var(--ink-soft);min-width:80px;}
.pd-meta li .meta-val{color:var(--ink);font-weight:500;}
.pd-cart-form{margin-bottom:20px;}
.pd-qty-row{display:flex;align-items:center;gap:12px;margin-bottom:16px;flex-wrap:wrap;}
.pd-qty-wrap{display:flex;align-items:center;border:1.5px solid var(--line);border-radius:var(--r-sm);overflow:hidden;background:var(--white);}
.pd-qty-btn{width:40px;height:44px;background:var(--surface);border:none;font-size:15px;color:var(--ink-soft);cursor:pointer;transition:background var(--dur);display:flex;align-items:center;justify-content:center;}
.pd-qty-btn:hover{background:var(--line);}
.pd-qty-input{width:56px;height:44px;border:none;border-left:1.5px solid var(--line);border-right:1.5px solid var(--line);text-align:center;font-size:15px;font-weight:700;color:var(--ink);background:var(--white);outline:none;font-family:'Inter',sans-serif;}
.pd-add-btn{flex:1;display:flex;align-items:center;justify-content:center;gap:10px;padding:13px 28px;background:linear-gradient(135deg,var(--primary),var(--primary-l));color:#fff;border:none;border-radius:var(--r-sm);font-size:15px;font-weight:700;cursor:pointer;transition:all var(--dur) var(--ease);box-shadow:0 6px 20px rgba(12,74,110,.3);font-family:'Inter',sans-serif;}
.pd-add-btn:hover{background:linear-gradient(135deg,#0b3c91,var(--primary));transform:translateY(-2px);box-shadow:0 10px 28px rgba(12,74,110,.4);}
.pd-share-row{display:flex;align-items:center;gap:10px;flex-wrap:wrap;}
.pd-share-label{font-size:12px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.07em;}
.pd-share-btn{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:50px;font-size:12.5px;font-weight:600;text-decoration:none;transition:all var(--dur);}
.pd-share-btn.wa{background:#dcfce7;color:#16a34a;}.pd-share-btn.wa:hover{background:#16a34a;color:#fff;}
.pd-share-btn.fb{background:#dbeafe;color:#1d4ed8;}.pd-share-btn.fb:hover{background:#1d4ed8;color:#fff;}
.pd-share-btn.tw{background:#e0f2fe;color:#0369a1;}.pd-share-btn.tw:hover{background:#0369a1;color:#fff;}

/* TABS */
.pd-tabs-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-xs);overflow:hidden;margin-bottom:40px;}
.pd-tab-nav{display:flex;border-bottom:2px solid var(--line);background:var(--surface);}
.pd-tab-btn{padding:14px 24px;font-size:13.5px;font-weight:700;color:var(--muted);background:none;border:none;cursor:pointer;transition:all var(--dur);border-bottom:3px solid transparent;margin-bottom:-2px;font-family:'Inter',sans-serif;}
.pd-tab-btn:hover{color:var(--primary);}
.pd-tab-btn.active{color:var(--primary);border-bottom-color:var(--primary);}
.pd-tab-pane{display:none;padding:24px 28px;}
.pd-tab-pane.active{display:block;}
.pd-tab-pane p,.pd-tab-pane li{font-size:14.5px;color:var(--ink-soft);line-height:1.8;}

/* RELATED */
.pd-related-title{font-size:1.25rem;font-weight:800;color:var(--primary);letter-spacing:-.02em;margin-bottom:20px;display:flex;align-items:center;gap:10px;}
.pd-related-title::after{content:'';flex:1;height:2px;background:linear-gradient(to right,var(--accent),transparent);border-radius:2px;}
.rel-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;}
.rel-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-xs);overflow:hidden;display:flex;flex-direction:column;transition:transform var(--dur) var(--ease),box-shadow var(--dur),border-color var(--dur);}
.rel-card:hover{transform:translateY(-5px);box-shadow:var(--shadow-md);border-color:rgba(3,105,161,.25);}
.rel-img-wrap{position:relative;height:160px;background:var(--surface);overflow:hidden;}
.rel-img-wrap img{width:100%;height:100%;object-fit:contain;padding:12px;transition:transform .4s var(--ease);}
.rel-card:hover .rel-img-wrap img{transform:scale(1.07);}
.rel-overlay{position:absolute;inset:0;background:rgba(12,74,110,.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity var(--dur) var(--ease);}
.rel-card:hover .rel-overlay{opacity:1;}
.rel-view-btn{display:inline-flex;align-items:center;gap:7px;padding:8px 18px;background:var(--white);color:var(--primary);font-size:12px;font-weight:700;border-radius:50px;text-decoration:none;box-shadow:0 4px 14px rgba(0,0,0,.2);transition:background var(--dur),color var(--dur);}
.rel-view-btn:hover{background:var(--accent);color:#fff;}
.rel-body{padding:12px 14px 14px;flex:1;display:flex;flex-direction:column;}
.rel-name{font-size:12.5px;font-weight:700;color:var(--ink);line-height:1.35;margin-bottom:8px;text-decoration:none;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;transition:color var(--dur);}
.rel-name:hover{color:var(--primary-l);}
.rel-prices{display:flex;align-items:center;gap:6px;margin-bottom:10px;}
.rel-old{font-size:11px;color:var(--muted);text-decoration:line-through;}
.rel-new{font-size:14px;font-weight:800;color:var(--primary);}
.rel-cta{display:flex;align-items:center;justify-content:center;gap:7px;padding:9px;background:var(--primary);color:#fff;font-size:12px;font-weight:700;border-radius:var(--r-sm);text-decoration:none;margin-top:auto;transition:background var(--dur),transform var(--dur);}
.rel-cta:hover{background:var(--primary-l);color:#fff;transform:translateY(-1px);}

/* TOAST */
.pd-toast{position:fixed;top:24px;right:24px;z-index:9999;min-width:300px;max-width:380px;padding:14px 44px 14px 18px;border-radius:var(--r-sm);font-size:14px;font-weight:600;color:#fff;box-shadow:var(--shadow-md);animation:toastIn .35s var(--ease);}
@keyframes toastIn{from{opacity:0;transform:translateY(-14px);}to{opacity:1;transform:translateY(0);}}
.pd-toast.success{background:var(--primary);}
.pd-toast.error{background:var(--danger);}
.pd-toast-close{position:absolute;top:10px;right:14px;background:none;border:none;color:rgba(255,255,255,.8);font-size:18px;cursor:pointer;line-height:1;}
.pd-toast-close:hover{color:#fff;}

/* CART FAB */
.cart-fab{position:fixed;bottom:20px;right:20px;z-index:1050;width:54px;height:54px;background:linear-gradient(135deg,var(--primary),var(--primary-l));color:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;text-decoration:none;box-shadow:0 8px 28px rgba(12,74,110,.45);transition:transform var(--dur) var(--ease);}
.cart-fab:hover{transform:scale(1.1);color:#fff;}
.cart-fab i{font-size:20px;}
.cart-fab-badge{position:absolute;top:-4px;right:-4px;min-width:20px;height:20px;background:var(--accent);color:#fff;font-size:11px;font-weight:700;border-radius:50px;display:flex;align-items:center;justify-content:center;padding:0 4px;border:2px solid #fff;}
@media(min-width:768px){.cart-fab{display:none;}}

/* RESPONSIVE */
@media(max-width:991px){.rel-grid{grid-template-columns:repeat(3,1fr);}}
@media(max-width:767px){
  .pd-img-col{border-right:none;border-bottom:1px solid var(--line);padding:20px 16px;}
  .pd-img-main{height:240px;}.pd-info-col{padding:20px 16px;}.pd-price-new{font-size:1.6rem;}
  .rel-grid{grid-template-columns:repeat(2,1fr);}
  .pd-tab-btn{padding:12px 16px;font-size:12.5px;}
}
@media(max-width:480px){
  .pd-add-btn{font-size:13.5px;padding:12px 18px;}
  .rel-grid{grid-template-columns:repeat(2,1fr);gap:10px;}
  .rel-img-wrap{height:120px;}
}
</style>
@endsection

@php $cartCount = collect(session('cart', []))->sum('quantity'); @endphp

<a href="{{ route('carts.index') }}" class="cart-fab d-md-none">
  <i class="fas fa-shopping-cart"></i>
  @if($cartCount > 0)<span class="cart-fab-badge">{{ $cartCount }}</span>@endif
</a>

@foreach ($errors->all() as $error)
  <div class="pd-toast error">
    <button class="pd-toast-close" onclick="this.parentElement.remove()">&times;</button>
    {{ $error }}
  </div>
@endforeach
@if(session('success'))
  <div class="pd-toast success">
    <button class="pd-toast-close" onclick="this.parentElement.remove()">&times;</button>
    {{ session('success') }}
  </div>
@endif

@section('content')

<div class="pd-hero-section">
  <div class="pd-hero">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="pd-breadcrumb">
          <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
          <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
          <li><a href="{{ route('users.products') }}">Products</a></li>
          @if($product->category)
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li><a href="{{ route('category.products', $product->category->id) }}">{{ $product->category->name }}</a></li>
          @endif
          <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
          <li><span class="current">{{ $product->name }}</span></li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="pd-section">
  <div class="container">

    <div class="pd-card">
      <div class="row g-0">

        <div class="col-md-5 pd-img-col">
          <div class="pd-img-main">
            <img src="{{ asset('images/products/'.$product->image_path) }}" alt="{{ $product->name }}">
          </div>
          <div class="pd-badge-strip">
            @if(isset($product->price) && isset($product->sale_price) && $product->price > $product->sale_price)
              @php $disc = round((($product->price - $product->sale_price) / $product->price) * 100); @endphp
              <span class="pd-badge discount"><i class="fas fa-tag"></i> {{ $disc }}% OFF</span>
            @endif
            @if(isset($product->qty) && $product->qty > 0)
              <span class="pd-badge instock"><i class="fas fa-check-circle"></i> In Stock</span>
            @else
              <span class="pd-badge outstock"><i class="fas fa-times-circle"></i> Out of Stock</span>
            @endif
          </div>
        </div>

        <div class="col-md-7 pd-info-col">
          @if($product->category)
            <a href="{{ route('category.products', $product->category->id) }}" class="pd-cat-tag">
              <i class="fas fa-layer-group"></i> {{ $product->category->name }}
            </a>
          @endif
          <h1 class="pd-title">{{ $product->name }}</h1>
          <div class="pd-price-block">
            <span class="pd-price-new">&#8358;{{ number_format($product->sale_price ?? $product->price) }}</span>
            @if(isset($product->price) && isset($product->sale_price) && $product->price > $product->sale_price)
              <span class="pd-price-old">&#8358;{{ number_format($product->price) }}</span>
              <span class="pd-price-save"><i class="fas fa-bolt"></i> Save &#8358;{{ number_format($product->price - $product->sale_price) }}</span>
            @endif
          </div>
          <ul class="pd-meta">
            @if($product->sku)
              <li>
                <i class="fas fa-barcode" style="color:var(--muted);font-size:14px;"></i>
                <span class="meta-label">SKU</span>
                <span class="meta-val">#{{ $product->sku }}</span>
              </li>
            @endif
            @if($product->category)
              <li>
                <i class="fas fa-tag" style="color:var(--muted);font-size:14px;"></i>
                <span class="meta-label">Category</span>
                <span class="meta-val">{{ $product->category->name }}</span>
              </li>
            @endif
            @if(isset($product->qty))
              <li>
                <i class="fas fa-boxes" style="color:var(--muted);font-size:14px;"></i>
                <span class="meta-label">Stock</span>
                <span class="meta-val" style="color:{{ $product->qty > 0 ? 'var(--green)' : 'var(--danger)' }};font-weight:700;">
                  {{ $product->qty > 0 ? $product->qty.' units available' : 'Out of Stock' }}
                </span>
              </li>
            @endif
          </ul>
          <form action="{{ route('carts.add', encrypt($product->id)) }}" method="POST" class="pd-cart-form">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="pd-qty-row">
              <div class="pd-qty-wrap">
                <button type="button" class="pd-qty-btn" id="pdQtyMinus"><i class="fas fa-minus"></i></button>
                <input type="number" name="quantity" id="pdQtyInput" class="pd-qty-input" value="1" min="1" max="{{ $product->qty ?? 99 }}">
                <button type="button" class="pd-qty-btn" id="pdQtyPlus"><i class="fas fa-plus"></i></button>
              </div>
              <button type="submit" class="pd-add-btn">
                <i class="fas fa-cart-plus"></i> Add to Cart
              </button>
            </div>
          </form>
          <div class="pd-share-row">
            <span class="pd-share-label">Share:</span>
            <a href="https://wa.me/?text={{ urlencode($product->name.' — '.url()->current()) }}" target="_blank" class="pd-share-btn wa"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="pd-share-btn fb"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($product->name) }}" target="_blank" class="pd-share-btn tw"><i class="fab fa-twitter"></i> Twitter</a>
          </div>
        </div>
      </div>
    </div>

    <div class="pd-tabs-card">
      <div class="pd-tab-nav">
        <button class="pd-tab-btn active" data-tab="desc"><i class="fas fa-align-left me-2"></i>Description</button>
        @if($product->specification)
          <button class="pd-tab-btn" data-tab="spec"><i class="fas fa-list-ul me-2"></i>Specifications</button>
        @endif
      </div>
      <div class="pd-tab-pane active" id="pd-tab-desc">
        <p>{!! $product->description !!}</p>
      </div>
      @if($product->specification)
        <div class="pd-tab-pane" id="pd-tab-spec">
          <p>{!! $product->specification !!}</p>
        </div>
      @endif
    </div>

    @if(count($products) > 0)
      <h3 class="pd-related-title">
        <i class="fas fa-bolt" style="color:var(--accent);"></i> Related Products
      </h3>
      <div class="rel-grid">
        @foreach ($products as $item)
          <div class="rel-card">
            <div class="rel-img-wrap">
              <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
              <div class="rel-overlay">
                <a href="{{ route('product.details', $item->slug) }}" class="rel-view-btn"><i class="fas fa-eye"></i> View</a>
              </div>
            </div>
            <div class="rel-body">
              <a href="{{ route('product.details', $item->slug) }}" class="rel-name">{{ $item->name }}</a>
              <div class="rel-prices">
                @if(isset($item->price) && isset($item->sale_price) && $item->price > $item->sale_price)
                  <span class="rel-old">&#8358;{{ number_format($item->price) }}</span>
                @endif
                <span class="rel-new">&#8358;{{ number_format($item->sale_price ?? $item->price) }}</span>
              </div>
              <a href="{{ route('product.details', $item->slug) }}" class="rel-cta"><i class="fas fa-cart-plus"></i> Add to Cart</a>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener("DOMContentLoaded", function () {
  var qtyInput = document.getElementById("pdQtyInput");
  document.getElementById("pdQtyPlus").addEventListener("click", function () {
    var max = parseInt(qtyInput.getAttribute("max")) || 99;
    if (parseInt(qtyInput.value) < max) qtyInput.value = parseInt(qtyInput.value) + 1;
  });
  document.getElementById("pdQtyMinus").addEventListener("click", function () {
    if (parseInt(qtyInput.value) > 1) qtyInput.value = parseInt(qtyInput.value) - 1;
  });
  document.querySelectorAll(".pd-tab-btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      document.querySelectorAll(".pd-tab-btn").forEach(function (b) { b.classList.remove("active"); });
      document.querySelectorAll(".pd-tab-pane").forEach(function (p) { p.classList.remove("active"); });
      btn.classList.add("active");
      var target = document.getElementById("pd-tab-" + btn.getAttribute("data-tab"));
      if (target) target.classList.add("active");
    });
  });
  document.querySelectorAll(".pd-toast").forEach(function (t) {
    setTimeout(function () {
      t.style.opacity = "0"; t.style.transform = "translateY(-10px)"; t.style.transition = "all .4s ease";
      setTimeout(function () { t.remove(); }, 400);
    }, 4000);
  });
});
</script>
@endsection
