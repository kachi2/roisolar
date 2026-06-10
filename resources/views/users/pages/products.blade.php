@extends('layouts.app')

@section('title', 'All Products')

@section('head')
<link rel="canonical" href="{{ url('catalogs') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@endsection

@section('styles')
<style>
/* ============================================================
   ALL PRODUCTS PAGE — ROISOLAR 2025 DESIGN
   ============================================================ */

*, *::before, *::after { box-sizing: border-box; }

:root {
  --ink:       #0f172a;
  --ink-soft:  #334155;
  --muted:     #64748b;
  --line:      #e2e8f0;
  --surface:   #f8fafc;
  --white:     #ffffff;
  --primary:   #0c4a6e;
  --primary-l: #0369a1;
  --accent:    #f59e0b;
  --accent-l:  #fbbf24;
  --danger:    #ef4444;
  --green:     #10b981;
  --r:         14px;
  --r-sm:      8px;
  --shadow-xs: 0 1px 3px rgba(0,0,0,.06);
  --shadow-sm: 0 4px 12px rgba(0,0,0,.07);
  --shadow-md: 0 12px 36px rgba(0,0,0,.12);
  --ease:      cubic-bezier(.4,0,.2,1);
  --dur:       .25s;
}

body { font-family: 'Inter', 'Segoe UI', sans-serif !important; }

/* ---- PAGE HERO BANNER ---- */
.prod-hero-section { padding: 0 !important; margin: 0 !important; }
.prod-hero {
  background: linear-gradient(120deg, #0c4a6e 0%, #0369a1 60%, #0284c7 100%);
  padding: 36px 0 32px;
  position: relative;
  overflow: hidden;
}
.prod-hero::before {
  content: '';
  position: absolute;
  width: 420px; height: 420px;
  border-radius: 50%;
  border: 1.5px solid rgba(255,255,255,.07);
  top: -120px; right: -80px;
}
.prod-hero h1 {
  font-size: clamp(1.4rem, 3vw, 2rem);
  font-weight: 800;
  color: #fff;
  letter-spacing: -.02em;
  margin: 0 0 10px;
  position: relative;
  z-index: 1;
}
.prod-hero h1 span {
  background: linear-gradient(90deg, #fde68a, #f59e0b);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.prod-breadcrumb {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  color: rgba(255,255,255,.65);
  flex-wrap: wrap;
  list-style: none;
  padding: 0; margin: 0;
  position: relative; z-index: 1;
}
.prod-breadcrumb a { color: rgba(255,255,255,.75); text-decoration: none; transition: color .2s; }
.prod-breadcrumb a:hover { color: #fde68a; }
.prod-breadcrumb .sep { font-size: 10px; opacity: .5; }
.prod-breadcrumb .current { color: #fde68a; font-weight: 600; }

/* ---- LAYOUT ---- */
.prod-layout {
  display: grid;
  grid-template-columns: 240px 1fr;
  gap: 28px;
  padding: 32px 0 64px;
  align-items: start;
}

/* ---- SIDEBAR ---- */
.sidebar-card {
  background: var(--white);
  border-radius: var(--r);
  border: 1px solid var(--line);
  box-shadow: var(--shadow-xs);
  overflow: hidden;
  margin-bottom: 20px;
}
.sidebar-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 16px;
  background: var(--primary);
}
.sidebar-head.toggleable { cursor: pointer; user-select: none; }
.sidebar-head h6 {
  font-size: 12px;
  font-weight: 700;
  color: #fff;
  letter-spacing: .07em;
  text-transform: uppercase;
  margin: 0;
}
.sidebar-head .toggle-icon {
  color: rgba(255,255,255,.7);
  font-size: 13px;
  transition: transform var(--dur) var(--ease);
}
.sidebar-head.open .toggle-icon { transform: rotate(180deg); }

.cat-list { padding: 8px 10px; margin: 0; list-style: none; }
.cat-list li a {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 9px 12px;
  border-radius: var(--r-sm);
  font-size: 13.5px;
  color: var(--ink-soft);
  text-decoration: none;
  transition: all var(--dur) var(--ease);
  font-weight: 500;
}
.cat-list li a:hover { background: rgba(12,74,110,.07); color: var(--primary); padding-left: 18px; }
.cat-list li a i { color: var(--accent); font-size: 9px; flex-shrink: 0; }

/* Latest sidebar */
.latest-item {
  display: flex;
  gap: 12px;
  padding: 12px 14px;
  border-bottom: 1px solid var(--line);
  text-decoration: none;
  transition: background var(--dur) var(--ease);
}
.latest-item:last-child { border-bottom: none; }
.latest-item:hover { background: var(--surface); }
.latest-item .li-thumb {
  flex-shrink: 0;
  width: 52px; height: 52px;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid var(--line);
  background: var(--surface);
}
.latest-item .li-thumb img { width: 100%; height: 100%; object-fit: cover; }
.latest-item .li-info { flex: 1; min-width: 0; }
.latest-item .li-name {
  display: block;
  font-size: 12.5px;
  font-weight: 600;
  color: var(--ink);
  line-height: 1.35;
  margin-bottom: 5px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.latest-item:hover .li-name { color: var(--primary-l); }
.li-prices { display: flex; gap: 6px; align-items: center; }
.li-old { font-size: 11px; color: var(--muted); text-decoration: line-through; }
.li-new { font-size: 13px; font-weight: 700; color: var(--primary); }

/* ---- MAIN ---- */
.prod-main-head {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 14px;
  margin-bottom: 22px;
}
.prod-title {
  font-size: 1.25rem;
  font-weight: 800;
  color: var(--primary);
  letter-spacing: -.02em;
  margin: 0 0 4px;
}
.prod-count { font-size: 13px; color: var(--muted); font-weight: 500; }

/* Search */
.prod-search {
  display: flex;
  min-width: 280px;
  border-radius: var(--r-sm);
  overflow: hidden;
  border: 1.5px solid var(--line);
  background: var(--white);
  transition: border-color .2s, box-shadow .2s;
  box-shadow: var(--shadow-xs);
}
.prod-search:focus-within { border-color: var(--primary-l); box-shadow: 0 0 0 3px rgba(3,105,161,.12); }
.prod-search input {
  flex: 1; border: none; outline: none;
  padding: 11px 16px;
  font-size: 14px;
  font-family: 'Inter', sans-serif;
  color: var(--ink); background: transparent;
}
.prod-search input::placeholder { color: var(--muted); }
.prod-search button {
  padding: 0 18px;
  background: var(--primary); color: #fff;
  border: none; font-size: 14px; font-weight: 600;
  cursor: pointer;
  transition: background var(--dur);
  display: flex; align-items: center; gap: 6px;
  white-space: nowrap;
}
.prod-search button:hover { background: var(--primary-l); }

/* Search results label */
.search-label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 7px 14px;
  background: rgba(12,74,110,.07);
  color: var(--primary);
  border-radius: 50px;
  font-size: 13px;
  font-weight: 600;
  margin-bottom: 18px;
}

/* ---- PRODUCT GRID ---- */
.pprod-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 18px;
}

.pprod-card {
  background: var(--white);
  border-radius: var(--r);
  border: 1px solid var(--line);
  box-shadow: var(--shadow-xs);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: transform var(--dur) var(--ease), box-shadow var(--dur) var(--ease), border-color var(--dur);
}
.pprod-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-md);
  border-color: rgba(3,105,161,.25);
}

.pprod-img-wrap {
  position: relative;
  height: 190px;
  background: var(--surface);
  overflow: hidden;
}
.pprod-img-wrap img {
  width: 100%; height: 100%;
  object-fit: contain;
  padding: 14px;
  transition: transform .4s var(--ease);
}
.pprod-card:hover .pprod-img-wrap img { transform: scale(1.07); }

.pprod-badge {
  position: absolute;
  top: 10px; left: 10px;
  background: var(--danger);
  color: #fff; font-size: 10px; font-weight: 700;
  letter-spacing: .04em; text-transform: uppercase;
  padding: 3px 8px; border-radius: 4px; z-index: 1;
}

.pprod-overlay {
  position: absolute; inset: 0;
  background: rgba(12,74,110,.55);
  display: flex; align-items: center; justify-content: center;
  opacity: 0;
  transition: opacity var(--dur) var(--ease);
  z-index: 2;
}
.pprod-card:hover .pprod-overlay { opacity: 1; }
.pprod-view-btn {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 9px 20px;
  background: var(--white); color: var(--primary);
  font-size: 12.5px; font-weight: 700;
  border-radius: 50px; text-decoration: none;
  box-shadow: 0 4px 14px rgba(0,0,0,.25);
  transition: background var(--dur), color var(--dur);
}
.pprod-view-btn:hover { background: var(--accent); color: #fff; }

.pprod-body {
  padding: 14px 16px 16px;
  display: flex; flex-direction: column; flex: 1;
}
.pprod-name {
  font-size: 13.5px; font-weight: 700;
  color: var(--ink); line-height: 1.4;
  margin-bottom: 8px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-decoration: none;
  transition: color var(--dur);
}
.pprod-name:hover { color: var(--primary-l); }
.pprod-cat {
  font-size: 11px; color: var(--muted);
  font-weight: 600; text-transform: uppercase;
  letter-spacing: .06em; margin-bottom: 8px;
}
.pprod-prices {
  display: flex; align-items: center;
  gap: 8px; margin-bottom: 12px; flex-wrap: wrap;
}
.pprod-old { font-size: 11.5px; color: var(--muted); text-decoration: line-through; font-weight: 500; }
.pprod-new { font-size: 16px; font-weight: 800; color: var(--primary); }

.pprod-cta {
  display: flex; align-items: center; justify-content: center;
  gap: 8px; margin-top: auto;
  padding: 11px 16px;
  background: var(--primary); color: #fff;
  font-size: 13px; font-weight: 700;
  border-radius: var(--r-sm); text-decoration: none;
  letter-spacing: .01em;
  transition: background var(--dur) var(--ease), transform var(--dur), box-shadow var(--dur);
  box-shadow: 0 4px 14px rgba(12,74,110,.2);
}
.pprod-cta:hover {
  background: var(--primary-l); color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 8px 22px rgba(12,74,110,.35);
}

/* Empty state */
.pprod-empty {
  grid-column: 1 / -1;
  text-align: center;
  padding: 72px 24px;
  background: var(--white);
  border-radius: var(--r);
  border: 1.5px dashed var(--line);
}
.pprod-empty .empty-icon { font-size: 3.5rem; color: #cbd5e1; margin-bottom: 20px; }
.pprod-empty h4 { font-size: 1.1rem; font-weight: 800; color: var(--ink-soft); margin-bottom: 8px; }
.pprod-empty p { font-size: 14px; color: var(--muted); margin: 0 0 20px; }
.pprod-empty .btn-back {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 10px 24px; background: var(--primary); color: #fff;
  border-radius: var(--r-sm); text-decoration: none;
  font-size: 13.5px; font-weight: 700; transition: background var(--dur);
}
.pprod-empty .btn-back:hover { background: var(--primary-l); color: #fff; }

/* ---- MOBILE CART FAB ---- */
.cart-fab {
  position: fixed; bottom: 20px; right: 20px; z-index: 1050;
  width: 54px; height: 54px;
  background: linear-gradient(135deg, var(--primary), var(--primary-l));
  color: #fff; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  text-decoration: none;
  box-shadow: 0 8px 28px rgba(12,74,110,.45);
  transition: transform var(--dur) var(--ease);
}
.cart-fab:hover { transform: scale(1.1); color: #fff; }
.cart-fab i { font-size: 20px; }
.cart-fab-badge {
  position: absolute; top: -4px; right: -4px;
  min-width: 20px; height: 20px;
  background: var(--accent); color: #fff;
  font-size: 11px; font-weight: 700;
  border-radius: 50px;
  display: flex; align-items: center; justify-content: center;
  padding: 0 4px; border: 2px solid #fff;
}
@media (min-width: 768px) { .cart-fab { display: none; } }

/* ---- RESPONSIVE ---- */
@media (max-width: 991px) {
  .prod-layout { grid-template-columns: 1fr; }
  .sidebar-col { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 0; }
  .sidebar-col .sidebar-card { margin-bottom: 0; }
  .pprod-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 767px) {
  .sidebar-col { grid-template-columns: 1fr; }
  .pprod-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
  .pprod-img-wrap { height: 150px; }
  .prod-hero { padding: 24px 0 20px; }
  .prod-main-head { flex-direction: column; }
  .prod-search { min-width: 100%; width: 100%; }
}
@media (max-width: 480px) {
  .pprod-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
  .pprod-body { padding: 10px 12px 12px; }
  .pprod-name { font-size: 12.5px; }
  .pprod-new { font-size: 14px; }
  .pprod-cta { padding: 9px 10px; font-size: 11.5px; }
  .pprod-img-wrap { height: 130px; }
}
</style>
@endsection

@section('content')

{{-- Mobile Cart FAB --}}
@php $cartCount = collect(session('cart', []))->sum('quantity'); @endphp
<a href="{{ route('carts.index') }}" class="cart-fab d-md-none">
  <i class="fas fa-shopping-cart"></i>
  @if($cartCount > 0)
    <span class="cart-fab-badge">{{ $cartCount }}</span>
  @endif
</a>

{{-- Page Hero --}}
<div class="prod-hero-section">
  <div class="prod-hero">
    <div class="container">
      <h1>All <span>Solar Products</span></h1>
      <nav aria-label="breadcrumb">
        <ol class="prod-breadcrumb">
          <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
          <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
          <li><span class="current">Products</span></li>
        </ol>
      </nav>
    </div>
  </div>
</div>

{{-- Main Layout --}}
<div class="container">
  <div class="prod-layout">

    {{-- SIDEBAR --}}
    <aside class="sidebar-col">

      <div class="sidebar-card">
        <div class="sidebar-head toggleable" id="catToggle">
          <h6><i class="fas fa-layer-group me-2"></i>Categories</h6>
          <i class="fas fa-chevron-down toggle-icon"></i>
        </div>
        <ul class="cat-list" id="catList">
          @foreach ($categories as $cat)
            <li>
              <a href="{{ route('category.products', $cat->id) }}">
                <i class="fas fa-circle"></i> {{ $cat->name }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="sidebar-card">
        <div class="sidebar-head">
          <h6><i class="fas fa-bolt me-2"></i>Latest Products</h6>
        </div>
        @foreach ($latest as $item)
          <a class="latest-item" href="{{ route('product.details', $item->slug) }}">
            <div class="li-thumb">
              <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
            </div>
            <div class="li-info">
              <span class="li-name">{{ $item->name }}</span>
              <div class="li-prices">
                <span class="li-old">&#8358;{{ number_format($item->price) }}</span>
                <span class="li-new">&#8358;{{ number_format($item->sale_price) }}</span>
              </div>
            </div>
          </a>
        @endforeach
      </div>

    </aside>

    {{-- MAIN --}}
    <main>

      <div class="prod-main-head">
        <div>
          <h2 class="prod-title">
            @isset($searchterm)
              {{ $searchterm }}
            @else
              All Products
            @endisset
          </h2>
          <span class="prod-count">{{ count($products) }} product{{ count($products) != 1 ? 's' : '' }} found</span>
        </div>
        <form action="{{ route('products.search') }}" method="GET">
          <div class="prod-search">
            <input type="text" name="q" placeholder="Search products..." value="{{ request('q') }}">
            <button type="submit"><i class="fas fa-search"></i> Search</button>
          </div>
        </form>
      </div>

      @isset($searchterm)
        <div class="search-label">
          <i class="fas fa-search"></i> {{ $searchterm }}
        </div>
      @endisset

      <div class="pprod-grid">

        @forelse ($products as $item)
          <div class="pprod-card">
            <div class="pprod-img-wrap">
              <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
              @if(isset($item->price) && isset($item->sale_price) && $item->price > $item->sale_price)
                @php $discount = round((($item->price - $item->sale_price) / $item->price) * 100); @endphp
                <span class="pprod-badge">-{{ $discount }}%</span>
              @endif
              <div class="pprod-overlay">
                <a href="{{ route('product.details', $item->slug) }}" class="pprod-view-btn">
                  <i class="fas fa-eye"></i> View
                </a>
              </div>
            </div>
            <div class="pprod-body">
              @if($item->categories)
                <span class="pprod-cat">{{ $item->categories->name }}</span>
              @endif
              <a href="{{ route('product.details', $item->slug) }}" class="pprod-name">
                {{ $item->name }}
              </a>
              <div class="pprod-prices">
                @if(isset($item->price) && isset($item->sale_price) && $item->price > $item->sale_price)
                  <span class="pprod-old">&#8358;{{ number_format($item->price) }}</span>
                @endif
                <span class="pprod-new">&#8358;{{ number_format($item->sale_price ?? $item->price) }}</span>
              </div>
              <a href="{{ route('product.details', $item->slug) }}" class="pprod-cta">
                <i class="fas fa-cart-plus"></i> Add to Cart
              </a>
            </div>
          </div>
        @empty
          <div class="pprod-empty">
            <div class="empty-icon"><i class="fas fa-box-open"></i></div>
            <h4>No Products Found</h4>
            <p>Try a different search term or browse all categories.</p>
            <a href="{{ route('products.search') }}" class="btn-back">
              <i class="fas fa-arrow-left"></i> View All Products
            </a>
          </div>
        @endforelse

      </div>

    </main>
  </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener("DOMContentLoaded", function () {
  var catToggle = document.getElementById("catToggle");
  var catList   = document.getElementById("catList");

  if (!catToggle || !catList) return;

  function applyState() {
    if (window.innerWidth >= 992) {
      catList.style.display = "block";
      catToggle.classList.add("open");
    } else {
      catList.style.display = "none";
      catToggle.classList.remove("open");
    }
  }

  applyState();
  window.addEventListener("resize", applyState);

  catToggle.addEventListener("click", function () {
    if (window.innerWidth < 992) {
      var visible = catList.style.display !== "none";
      catList.style.display = visible ? "none" : "block";
      catToggle.classList.toggle("open", !visible);
    }
  });
});
</script>
@endsection
