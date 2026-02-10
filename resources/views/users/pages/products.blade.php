@extends('layouts.app')

@section('title')
<title>{{$products[0]?->categories?->name }}</title>
@endsection
@section('head')
<link rel="canonical" href="{{ url('catalogs/'.Str::slug($products[0]?->categories?->name)) }}">

@endsection

@section('styles')
 <style>

.page-title {
    padding: 8px 0;
    background: #f5f6fa;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 0;
  }

  .breadcrumb {
    background: none;
    margin: 0;
    font-size: 14px;
  }

  .breadcrumb a {
    color: #4f46e5;
    text-decoration: none;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }
.search-container {
    display: flex;
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

.search-container input {
    flex: 1;
    padding: 12px 15px;
    border: 2px solid #ddd;
    border-right: none;
    border-radius: 8px 0 0 8px;
    outline: none;
    font-size: 16px;
    transition: all 0.3s ease;
}

.search-container input:focus {
    border-color: #485269;
    /* box-shadow: 0 0 4px rgba(255, 107, 0, 0.3); */
}

.search-container button {
    padding: 12px 20px;
    background: #0a1831;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 0 8px 8px 0;
    cursor: pointer;
    transition: background 0.3s ease;
}

.search-container button:hover {
    /* background: #e65b00; */
}


/* Mobile adjustments */
@media (max-width: 480px) {
    .search-container input {
        font-size: 14px;
        padding: 8px 12px;
    }

    .search-container button {
        font-size: 16px;
        padding: 0 12px;
    }
}
    
    
    .category-card {
      transition: 0.3s;
      
    }
    .category-card:hover {
      transform: scale(1.03);
    }
    .category-img {
      height: 170px;
      object-fit: cover;
    }

    li.active a {
    font-weight: bold;
    color: #007bff;
}




.category-sidebar {
    width: 250px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    padding: 15px;
    font-family: Arial, sans-serif;
}

.category-sidebar h3 {
    margin-bottom: 12px;
    font-size: 18px;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 5px;
}

.category-sidebar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.category-sidebar ul li {
    margin-bottom: 8px;
}

.category-sidebar ul li a {
    display: block;
    padding: 8px 10px;
    color: #04104b;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease, color 0.3s ease;
}

.category-sidebar ul li a:hover {
    background: #060813;
    color: #fff !important;
}

/* Mobile Friendly */
@media (max-width: 768px) {
    .category-sidebar {
        width: 100%;
        margin-bottom: 20px;
    }
}


.latest-products {
    background: #fff;
    padding: 16px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.sidebar-title {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 14px;
    border-bottom: 1px solid #eee;
    padding-bottom: 8px;
}

/* Card */
.latest-card {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
}

.latest-card:last-child {
    margin-bottom: 0;
}

/* Image */
.latest-card .thumb {
    flex-shrink: 0;
    width: 58px;
    height: 58px;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #eee;
}

.latest-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Info */
.latest-info {
    flex: 1;
}

.product-name {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: #222;
    line-height: 1.3;
    margin-bottom: 4px;
    text-decoration: none;
}

.product-name:hover {
    color: #0d6efd;
}

.price-wrap {
    display: flex;
    gap: 8px;
    align-items: center;
}

.old-price {
    font-size: 12px;
    color: #999;
    text-decoration: line-through;
}

.new-price {
    font-size: 14px;
    font-weight: 600;
    color: #0d6efd;
}

/* Mobile polish */
@media (max-width: 576px) {
    .latest-products {
        padding: 14px;
    }

    .latest-card .thumb {
        width: 50px;
        height: 50px;
    }

    .product-name {
        font-size: 13px;
    }

    .new-price {
        font-size: 13px;
    }
}





.product-card-elegant {
    background: #fff;
    border-radius: 8px;
    padding: 12px;
    border: 1px solid #eaeaea;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.product-card-elegant:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.1);
}


/* Image hover zoom */
.product-card-elegant:hover .product-image img {
    transform: scale(1.05);
}



.product-card-elegant:hover .cart-icon {
    transform: scale(1.15);
    color: #163a5f;
}

/* Title – fixed height */
.product-title {
  min-height: 42px;
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 8px;
  line-height: 1.3;
  color: #041936;
}

.product-title a {
  color: #041835;
  text-decoration: none;

  display: -webkit-box;
  -webkit-line-clamp: 2;   /* max 2 lines */
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.product-title a:hover {
  color: #0d47a1;
}


/* Image */
.product-image {
    height: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 6px;
    
}

.product-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

/* Price row */
.price-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}

.price {
    display: flex;
    align-items: center;
    gap: 6px;
}

.old-price {
    font-size: 10px;
    color: #dc3545; /* red strike */
    text-decoration: line-through;
}

.new-price {
    font-size: 12px;
    font-weight: 600;
    color: #0a2540; /* dark blue */
}

.cart-icon {
    font-size: 16px;
    color: #0a2540;
    transition: transform 0.25s ease, color 0.25s ease;
}

/* Add to cart button */
.product-card-elegant a.add-cart-btn {
    margin-top: auto;
    width: 100%;
    background: transparent;
    text-align: center;
    padding: 7px;
    font-size: 13px;
    border-radius: 6px;
    color: #333;
    transition: background 0.25s ease, border-color 0.25s ease, color 0.25s ease;
}

.product-card-elegant a.add-cart-btn:hover {
    background: #e0dbdb;
    border-color: #0a2540;
}

/* Mobile tuning */
@media (max-width: 576px) {
    .product-image {
        height: 95px;
    }

    .add-cart-btn {
        font-size: 12px;
        padding: 6px;
    }
}


.add-cart-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  padding: 12px 16px;

  background: linear-gradient(135deg, #0d47a1, #1565c0);
  color: #fff;
  font-size: 0.9rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.4px;

  border-radius: 10px;
  text-decoration: none;
  border: none;

  transition: all 0.3s ease;
  box-shadow: 0 6px 18px rgba(13, 71, 161, 0.25);
}

.add-cart-btn:hover {
  background: linear-gradient(135deg, #0b3c91, #0d47a1);
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(13, 71, 161, 0.35);
  color: #fff;
}

.add-cart-btn:active {
  transform: scale(0.98);
}




/* ===== MOBILE STICKY CART (ICON ONLY) ===== */
.mobile-cart-bar {
    position: fixed;
    bottom: 16px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1050;
}

/* Circular button */
.mobile-cart-link.icon-only {
    position: relative;
    width: 58px;
    height: 58px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(135deg, #0d47a1, #1565c0);
    color: #ffffff;

    border-radius: 50%;
    text-decoration: none;

    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.4);
    transition: all 0.25s ease;
}

/* Cart icon */
.mobile-cart-link.icon-only i {
    font-size: 22px;
}

/* Badge */
.mobile-cart-badge {
    position: absolute;
    top: -14px;
    right: -22px;

    min-width: 22px;
    height: 22px;
    padding: 0 6px;

    background: #f97316;
    color: #ffffff;

    font-size: 12px;
    font-weight: 700;

    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Hover / tap */
.mobile-cart-link.icon-only:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 18px 40px rgba(13, 71, 161, 0.55);
    color: #fff;
}

.mobile-cart-link.cart-text{
  font-size: 14px;
  font-weight: 500;
}

/* Hide on desktop */
@media (min-width: 768px) {
    .mobile-cart-bar {
        display: none;
    }
}





  </style>
  @endsection
@section('content')


<!-- Mobile Sticky Cart -->
<div class="mobile-cart-bar d-md-none">
    <a href="{{ route('carts.index') }}" class="mobile-cart-link">
    <span class="cart-text">
            View Cart &nbsp;
        </span>
        <i class="icon-cart"></i>

        @php
            $cartCount = collect(session('cart', []))->sum('quantity');
        @endphp

        <span class="mobile-cart-badge">
            {{ $cartCount }}
        </span>
    </a>
</div>


  <!-- ========================
       page title 
    =========================== -->
<section class="page-title">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
      </ol>
    </nav>
  </div>
</section>

 

<div class="container py-5">
    <div class="row">
        <!-- Categories Sidebar -->
        <div class="col-md-3">
            {{-- <h5 class="mb-3">Categories</h5> --}}
            <!-- Search -->
                {{-- <div class="search-container">
    <input type="text" placeholder="Search products...">
    <button type="submit">
        
    </button>
</div> <br> --}}
           
        <aside class="category-sidebar">
          <h3> Browse Categories</h3> 
          <ul>
              @foreach ($categories as $cat)
                          <li  {{ request('category') == $cat->id ? 'active' : '' }}>
                              <a href="{{route('category.products',$cat->id)}}" {{ request()->category == $cat->id ? 'text-yellow' : '' }}>
                                  {{ $cat->name }} 
                              </a>
                          </li>
                          
                  @endforeach
          </ul>
    </aside>
<br>




<aside class="latest-products">
    <h3 class="sidebar-title">Latest Products</h3>

    @foreach ($latest as $item)
        <div class="latest-card">
            <a class="thumb" href="{{ route('product.details', encrypt($item->id)) }}">
                <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
            </a>

            <div class="latest-info">
                <a class="product-name" href="{{ route('product.details', encrypt($item->id)) }}">
                    {{ $item->name }}
                </a>

                <div class="price-wrap">
                    <span class="old-price">&#8358;{{ number_format($item->price) }}</span>
                    <span class="new-price">&#8358;{{ number_format($item->sale_price) }}</span>
                </div>
            </div>
        </div>
    @endforeach
</aside>


        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <h5 class="mt-0 mb-2">{{ $currentCategory->name ?? ' Products' }}</h5>
            <div class="row">

<form action="{{ route('prod.search') }}" method="GET" style="max-width: 860px;">
@csrf
  <div style="display: flex; width: 100%;">
    <input 
      type="text" 
      name="query" 
      placeholder="Search for Products" 
      value="{{ request('query') }}" 
      style="
        flex: 1;
        padding: 10px 12px;
        border: 1px solid #0d2f6b;
        border-right: none;
        outline: none;
        font-size: 14px;
        border-radius: 4px 0 0 4px;
      "
    >
    <button 
      type="submit" 
      style="
        background-color: #0d2f6b;
        color: #fff;
        font-weight: bold;
        padding: 0 18px;
        border: 1px solid #0d2f6b;
        border-radius: 0 4px 4px 0;
        cursor: pointer;
      "
    >
      SEARCH
    </button>
  </div>
</form>



<div class="container my-4">
  <div class="row row-cols-2 row-cols-md-4 g-3">

    @forelse ($products as $item)
      <div class="col">
        <div class="product-card-elegant">

          <!-- Product Name -->
          <h6 class="product-title">
            <a href="{{ route('product.details', encrypt($item->id)) }}">
              {{ $item->name }}
            </a>
          </h6>

          <!-- Image -->
          <a href="{{ route('product.details', encrypt($item->id)) }}" class="product-image">
            <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
          </a>

          <!-- Price -->
          <div class="price-row">
            <div class="price">
              <span class="old-price">&#8358;{{ number_format($item->price) }}</span> 
              <span class="new-price">&#8358;{{ number_format($item->sale_price) }}</span>
            </div>
          </div>
          <br>
          <!-- Add to Cart Button (your liked design) -->
          <a class="add-cart-btn" href="{{ route('product.details', encrypt($item->id)) }}">
            Add to Cart
          </a>

        </div>
      </div>
    @empty
      <p class="text-center">No products available.</p>
    @endforelse

  </div>
</div>








        
       </div>

            
        </div>
    </div>
</div>





@endsection