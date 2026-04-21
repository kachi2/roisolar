@extends('layouts.app')
@section('title')
<title>  Roisolar NG </title>
@endsection
@section('head')
<link rel="canonical" href="https://sanlivepharmacy.com/">

@endsection
@section('content')

@section('styles')

<style>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
 /* ==== GENERAL ==== */
  /* Hide slick arrows on mobile */
@media (max-width: 768px) {
    .slick-prev,
    .slick-next {
        display: none !important;
    }
}

.recentProductSwiper {
    padding-bottom: 50px;
}

.swiper-button-next,
.swiper-button-prev {
    color: #000;
    top: 40%;
}

.swiper-pagination-bullet {
    background: #ccc;
    opacity: 1;
}

.swiper-pagination-bullet-active {
    background: #000;
}

.swiper-slide {
    height: auto;
}
  



.recentSwiper {
    width: 100%;
    padding-bottom: 20px;
}

.swiper-slide {
    height: auto;
}

.product-card-elegant {
    height: 100%;
}





/* ===============================
   CUSTOM HERO SLIDER
================================= */

.custom-slider {
    position: relative;
    width: 100%;
    overflow: hidden;
}

/* Force slick wrappers to inherit height */
.custom-slider .slick-list,
.custom-slider .slick-track {
    height: 100%;
}

/* Slide Styling */
.custom-slide {
    width: 100%;
    height: 90vh; /* Desktop height */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

/* Tablet */
@media (max-width: 992px) {
    .custom-slide {
        height: 25vh;
    }
}

/* Mobile */
@media (max-width: 768px) {
    .custom-slide {
        height: 25vh;
    }
}

/* Small Mobile */
@media (max-width: 480px) {
    .custom-slide {
        height: 25vh;
    }
}





  .text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
.add-cart-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;

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

/* ICON */
.add-cart-btn i {
  font-size: 0.95rem;
}

/* HOVER */
.add-cart-btn:hover {
  background: linear-gradient(135deg, #0b3c91, #0d47a1);
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(13, 71, 161, 0.35);
  color: #fff;
}

/* ACTIVE */
.add-cart-btn:active {
  transform: scale(0.98);
}

/* MOBILE */
@media (max-width: 576px) {
  .add-cart-btn {
    font-size: 0.85rem;
    padding: 10px 14px;
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

.product-title {
    font-size: 13px;
    font-weight: 500;
    line-height: 1.3;
    margin-bottom: 6px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 34px;
}

.product-title a {
    color: #0a0441;
    text-decoration: none;
}

.product-title a:hover {
    color: #163a5f;
}

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

.product-card-elegant:hover .product-image img {
    transform: scale(1.05);
}

.price-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}

.old-price {
    font-size: 10px;
    color: #dc3545;
    text-decoration: line-through;
}

.new-price {
    font-size: 12px;
    font-weight: 600;
    color: #0a2540;
}

.cart-icon {
    font-size: 16px;
    color: #0a2540;
    transition: transform 0.25s ease;
}

.product-card-elegant:hover .cart-icon {
    transform: scale(1.15);
}

.product-card-elegant a.add-cart-btn {
    margin-top: auto;
    width: 100%;
    background: transparent;
    text-align: center;
    padding: 7px;
    font-size: 13px;
    border-radius: 4px;
    color: #0a2540;
    transition: all 0.25s ease;
}

.product-card-elegant a.add-cart-btn:hover {
    background: #e0dbdb;
    border-color: #0a2540;
}

@media (max-width: 576px) {
    .product-image {
        height: 95px;
    }

    .add-cart-btn {
        font-size: 12px;
        padding: 6px;
    }
}


/* team section */
 /* .team-section { */
    /* margin-top: 0; remove gap above */
    /* padding-top: 5px;
    animation: fadeInUp 1s ease forwards;
  } */

  /* .team-section h2 {
    text-align: center;
    font-size: 24px;
    color: #111827;
    margin-bottom: 24px;
  }

  .team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
  }

  .team-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.05);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .team-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.1);
  }

  .team-card img {
    width: 100%;
    height: 240px;
    object-fit: cover;
  }

  .team-card h4 {
    margin: 10px 0 4px;
    color: #4f46e5;
    font-size: 18px;
  }

  .team-card p {
    font-size: 14px;
    color: #555;
    margin-bottom: 12px;
  } */

  /* ===== Animation ===== */
  /* @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(25px); }
    to { opacity: 1; transform: translateY(0); }
  } */

  /* ==== RESPONSIVE ==== */
  /* @media (max-width: 992px) {
    .service-img {
      height: 120px;
    }
  }

  @media (max-width: 768px) {
    .col-4 {
      flex: 0 0 33.333%;
      max-width: 33.333%;
    } */

   

    .product-img {
      height: 100px;
    }

   
  }

  @media (max-width: 576px) {
    .product-img {
      height: 90px;
    }

    .add-btn {
      font-size: 11px;
      padding: 2px 8px;
    }

    .team-img {
      height: 120px;
    }
  }



  


  .small-card {
    border-radius: 10px;
    transition: all 0.3s ease;
    min-height: 140px; /* smaller card height */
  }

  .small-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
  }

  .small-card .card-title {
    font-size: 0.95rem;
  }

  .small-card .btn {
    font-size: 0.85rem;
    padding: 4px 6px;
  }

  .dropdown-menu {
    border-radius: 8px;
    font-size: 0.9rem;
  }

  .dropdown-item:hover {
    background-color: #eef5ff;
    color: #0d6efd;
  }

  .bgv{
    background-color: white !important;
  }







/* .category-card {
    position: relative;
    display: block;
    border-radius: 8px;
    overflow: hidden;
    height: 130px;
    box-shadow: 0 8px 25px rgba(189, 185, 185, 0.1);
}

.category-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}

.category-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,.7),
        rgba(0,0,0,.1)
    );
    display: flex;
    align-items: flex-end;
    padding: 12px;
}

.category-overlay span {
    color: #fff;
    font-size: 12px;
    font-weight: 600;
}

.category-card:hover img {
    transform: scale(1.1);
} */

/* Mobile tweaks */
/* @media (max-width: 576px) {
    .category-card {
        height: 100px;
    }
    .category-overlay span {
        font-size: 12px;
    }
} */








/* ===== BRAND SECTION ===== */
.brands-section {
    background: linear-gradient(180deg, #f9fafb, #ffffff);
    overflow: hidden;
}

.brands-slider {
    position: relative;
    width: 100%;
    overflow: hidden;
}

/* ===== SLIDE TRACK ===== */
/* .brands-track {
    display: flex;
    gap: 30px;
    animation: slideBrands 25s linear infinite;
} */

/* Pause on hover */
/* .brands-slider:hover .brands-track {
    animation-play-state: paused;
} */

/* ===== BRAND CARD ===== */
/* .brand-card {
    min-width: 180px;
    height: 100px;
    background: #fff;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
    transition: transform .3s ease, box-shadow .3s ease;
}

.brand-card img {
    max-width: 120px;
    max-height: 60px;
    filter: grayscale(100%);
    opacity: .85;
    transition: all .3s ease;
} */

/* Hover effect */
/* .brand-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.brand-card:hover img {
    filter: grayscale(0);
    opacity: 1;
} */

/* ===== ANIMATION ===== */
/* @keyframes slideBrands {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
} */

/* ===== RESPONSIVE ===== */
/* @media (max-width: 768px) {
    .brand-card {
        min-width: 140px;
        height: 90px;
    }

    .brand-card img {
        max-width: 100px;
    }
} */



/* SERVICE CARD */
.service-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 12px;
    border-radius: 10px;
    text-decoration: none;
    height: 100%;
    background: #ffffff;
    border: 1px solid #eaeaea;
}

/* IMAGE */
.service-image img {
    width: 75px;
    height: 65px;
    object-fit: contain;
}

/* TITLE FIX */
.service-title {
    font-size: 14px;
    font-weight: 600;
    line-height: 1.3;
    margin-bottom: 8px;

    /* Force equal height */
    min-height: 38px;

    /* Prevent ugly breaking */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* LINK FIX */
.service-link {
    font-size: 13px;
    font-weight: 500;
    color: #0d6efd;

    white-space: nowrap;   /* 🚀 PREVENT BREAKING */
}




/* .service-tile {
    display: block;
    background: #fff;
    border-radius: 16px;
    padding: 16px;
    height: 100%;
    text-decoration: none;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    transition: transform .3s ease;
}

.service-tile:hover {
    transform: translateY(-5px);
} */

/* Image container */
/* .icon-box {
    width: 100%;
    height: 140px;
    margin-bottom: 12px;
    overflow: hidden;
    border-radius: 12px;
} */

/* .icon-box img {
    width: 100%;
    height: 100%;
    object-fit: cover; 🔥 critical
} */

/* Text */
/* .service-name {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 6px;
    color: #111;
}

.service-text {
    font-size: 0.85rem;
    color: #666;
    line-height: 1.4;
}

.service-link {
    font-size: 0.85rem;
    color: #f59e0b;
    font-weight: 600;
} */


/* @media (max-width: 480px) {
    .icon-box {
        height: 120px;
    }

    .service-name {
        font-size: 0.95rem;
    }

    .service-text {
        font-size: 0.8rem;
    }
} */





.ticker-wrapper {
  width: 100%;
  overflow: hidden;
  background: #0f172a; /* dark professional background */
  padding: 12px 0;
}

.ticker {
  display: flex;
  width: max-content;
  animation: scroll 18s linear infinite;
}

.ticker span {
  white-space: nowrap;
  padding-right: 3rem;
  font-size: clamp(0.9rem, 2.5vw, 1.1rem);
  font-weight: 500;
  color: #e5e7eb;
  letter-spacing: 0.02em;
}

/* Pause on hover */
.ticker-wrapper:hover .ticker {
  animation-play-state: paused;
}

@keyframes scroll {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-50%);
  }
}

/* Accessibility: respect reduced motion */
@media (prefers-reduced-motion: reduce) {
  .ticker {
    animation: none;
  }
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




/* SECTION */
.category-section {
    padding: 30px 0;
}

/* WRAPPER */
.category-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

/* CARD */
.category-card {
    display: flex;
    align-items: center;
    gap: 15px;
    background: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.3s ease;
    flex-direction: column;
    justify-content: space-between;
    height: 100%; /* important */
}

/* HOVER EFFECT */
.category-card:hover {
    background: #ffffff;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transform: translateY(-3px);
}

/* IMAGE */
.category-image img {
    width: 70px;
    height: auto;
}

/* TEXT */
.category-content h5 {
    font-size: 14px;
    font-weight: 600;
    color: #222;
    margin-bottom: 5px;

    display: -webkit-box;
    -webkit-line-clamp: 2;   /* show max 2 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;

    /* min-height: 40px; keeps same height */
}

.shop-link {
    font-size: 14px;
    color: #555;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: 0.3s;
}

.category-card:hover .shop-link {
    color: #f5b400;
}

.arrow {
    font-size: 14px;
}



/* TABLET */
@media (max-width: 992px) {
    .category-wrapper {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* WRAPPER GRID */
.category-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* Desktop */
    gap: 20px;
}

/* TABLET */
@media (max-width: 992px) {
    .category-wrapper {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* MOBILE (2 PER ROW) */
@media (max-width: 576px) {
    .category-wrapper {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .category-card {
        flex-direction: column; /* stack image + text */
        text-align: center;
        padding: 15px;
    }

    

    .category-image img {
        width: 60px;
        margin-bottom: 10px;
        object-fit: contain;
    }
}

.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;

    display: flex;
    align-items: center;
    gap: 10px;

    background: #25D366;
    color: white;
    padding: 12px 18px;
    border-radius: 50px;

    font-weight: 500;
    font-size: 14px;
    text-decoration: none;

    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: all 0.3s ease;

    z-index: 9999;
}

.whatsapp-float:hover {
    background: #1ebe5d;
    transform: translateY(-4px);
}

/* Mobile responsive */
@media (max-width: 576px) {
    .whatsapp-float {
        padding: 12px;
        border-radius: 50%;
    }

    .whatsapp-float span {
        display: none;
    }
}


/* Floating container - Middle Right Edge */
.lux-promo {
    position: fixed;
    top: 50%;
    right: -400px; /* hidden initially */
    transform: translateY(-50%);
    z-index: 9999;
    /* animation: luxSlideInRight 0.7s ease forwards;
    animation-delay: 1.5s; */
}

/* Slide from right animation */
@keyframes luxSlideInRight {
    from {
        right: -400px;
        opacity: 0;
    }
    to {
        right: 30px;
        opacity: 1;
    }
}

/* Base hidden state */
.lux-promo {
    position: fixed;
    top: 50%;
    right: -400px; /* hidden outside screen */
    transform: translateY(-50%);
    opacity: 0;
    transition: right 0.6s ease, opacity 0.6s ease;
    z-index: 9999;
}

/* When visible */
.lux-promo.show {
    right: 20px;
    opacity: 1;
}



/* Keep arrow pointing right */
.lux-arrow {
    position: absolute;
    right: -10px;
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
    width: 20px;
    height: 20px;
    background: #ffffff;
}

/* Mobile adjustments (STILL middle-right) */
@media (max-width: 576px) {

    .lux-promo {
        top: 50%;
        right: -300px; /* hidden */
        transform: translateY(-50%);
    }

    .lux-promo.show {
        right: 10px; /* smaller margin for mobile */
    }

    .lux-card {
        width: 250px;
        padding: 18px;
    }
}

/* Premium Card */
.lux-card {
    width: 320px;
    padding: 22px;
    border-radius: 22px;
    background: linear-gradient(145deg, #ffffff, #f8f9fa);
    box-shadow: 0 20px 60px rgba(0,0,0,0.12);
    position: relative;
    backdrop-filter: blur(10px);
}

/* Close button */
.lux-close {
    position: absolute;
    top: 12px;
    right: 16px;
    font-size: 18px;
    cursor: pointer;
    color: #999;
}

.lux-close:hover {
    color: #000;
}

/* Premium badge */
.lux-badge {
    display: inline-block;
    background: #000;
    color: #fff;
    font-size: 10px;
    padding: 5px 10px;
    border-radius: 20px;
    margin-bottom: 12px;
    letter-spacing: 1px;
}

/* Title */
.lux-title {
    font-weight: 600;
    margin-bottom: 8px;
}

/* Text */
.lux-text {
    font-size: 14px;
    color: #666;
    margin-bottom: 18px;
}

/* Luxury Button */
.lux-btn {
    display: block;
    text-align: center;
    padding: 11px;
    border-radius: 30px;
    text-decoration: none;
    background: #f1c603ee;
    color: #fff;
    font-weight: 500;
    transition: 0.3s ease;
}

.lux-btn:hover {
    background: #333;
    color: #fff;
}

/* Pulse Animation */
@keyframes pulseEffect {
    0% { box-shadow: 0 0 0 0 rgba(0,0,0,0.4); }
    70% { box-shadow: 0 0 0 15px rgba(0,0,0,0); }
    100% { box-shadow: 0 0 0 0 rgba(0,0,0,0); }
}

.pulse-btn {
    animation: pulseEffect 2s infinite;
}

/* Arrow pointing up (towards cart area) */
/* Arrow pointing to the right (towards cart area) */
/* .lux-arrow {
    position: absolute;
    right: -10px;
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
    width: 20px;
    height: 20px;
    background: #ffffff;
    box-shadow: 5px -5px 15px rgba(0,0,0,0.05);
} */

/* Slide animation */
@keyframes luxSlideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* @media (max-width: 576px) {
    .lux-promo {
        top: auto;
        bottom: 20px;
        right: 15px;
        left: 15px;
        transform: none;
        animation: luxSlideUp 0.6s ease forwards;
    }

    .lux-card {
        width: 100%;
    }

    .lux-arrow {
        display: none; 
    }
} */
</style>

@endsection
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

@include('users.slider') 




<!-- ===== SERVICES SECTION (ALT DESIGN) ===== -->
<section id="services" class="py-5 service-tiles">
  <div class="container">

    <div class="text-center mb-5">
      <span class="badge bg-success-subtle text-success mb-2">
        What We Do
      </span>
      <h4 class="fw-bold">Our Professional Services</h4>
      <p class="text-muted small">
        End-to-end renewable energy solutions tailored for you.
      </p>
    </div>

    {{-- <div class="row g-3">
      @foreach ($service as $serv)
        <!-- Mobile: 3 per row -->
        <div class="col-4 col-md-4 col-lg-3">
          <a href="{{ route('service.details', encrypt($serv->id)) }}" class="service-tile h-100">
            
            <div class="icon-box">
              <img src="{{ asset('images/services/'.$serv->images) }}" alt="{{ $serv->title }}">
            </div>

            <h6 class="service-name">
              {{ $serv->title }}
            </h6>

            <p class="service-text">
              {{ trim(strip_tags($serv->short_description)) }}
            </p>

            <span class="service-link">
              Learn more →
            </span>

          </a>
        </div>
      @endforeach
    </div> --}}



    {{-- <div class="row g-3">
  @foreach ($service as $serv)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <a href="{{ route('service.details', encrypt($serv->id)) }}" class="service-tile h-100">

        <div class="icon-box">
          <img src="{{ asset('images/services/'.$serv->images) }}" alt="{{ $serv->title }}">
        </div>

        <h6 class="service-name">{{ $serv->title }}</h6>

        <p class="service-text">
          {{ trim(strip_tags($serv->short_description)) }}
        </p>

        <span class="service-link">Learn more →</span>

      </a>
    </div>
  @endforeach
</div> --}}





<div class="row g-4">
    @foreach ($service as $serv)
    <div class="col-6 col-md-6 col-lg-3">

        <a href="{{ route('service.details', encrypt($serv->id)) }}" 
           class="service-card">

            <div class="service-image">
                <img src="{{ asset('images/services/'.$serv->images) }}" 
                     alt="{{ $serv->title }}">
            </div>

            <div class="service-content">
                <h6>{{ $serv->title }}</h6>
                <span class="service-link">
                    Learn more 
                    <i class="arrow">➜</i>
                </span>
            </div>

        </a>

    </div>
    @endforeach
</div>


  </div>
</section>


<!-- Luxury Offer Popup -->
<div class="lux-promo" id="luxPromo">
    <div class="lux-card">

        <span class="lux-close" onclick="closeLuxPromo()">×</span>

        <div class="lux-badge">EXCLUSIVE</div>

        <h6 class="lux-title">Latest Full Package Offer</h6>
        <p class="lux-text">
            Upgrade your power solution with our premium full solar package.
            Limited-time professional installation included.
        </p>

        <a href="{{ route('users.package') }}" class="lux-btn pulse-btn">
            View Full Package
        </a>

        <!-- Arrow pointing to cart -->
        <div class="lux-arrow"></div>

    </div>
</div>



<section class="category-section">
  <div class="text-center mb-5">
      <h4 class="fw-bold">Categories</h4>
      <p class="text-muted small">
        End-to-end renewable energy solutions tailored for you.
      </p>
    </div>
    <div class="container category-wrapper">

        @foreach ($categories as $cat)
        <a href="{{ route('category.products', $cat->id) }}" class="category-card">
            
            <div class="category-image">
               <img src="{{ asset('images/category/'.$cat->image_path) }}"
                   alt="{{ $cat->name }}">
            </div>

            <div class="category-content">
                <h5>{{ $cat->name }}</h5>
                <span class="shop-link">
                    Shop now 
                    <i class="arrow">➜</i>
                </span>
            </div>

        </a>
        @endforeach

    </div>
</section>




<div class="ticker-wrapper">
  <div class="ticker">
    <span>
      🚀 Our Product helps teams move faster • Secure • Scalable • Built for growth •
    </span>
    <span>
      🚀 Our Product helps teams move faster • Secure • Scalable • Built for growth •
    </span>
  </div>
</div>




<section id="shop" class="py-5">
  <div class="container">

    <div class="row row-cols-2 row-cols-md-4 g-3">

      @forelse ($products as $item)
      <div class="col">
        <div class="product-card-elegant">

          <!-- Product Name -->
          <h6 class="product-title">
            <a href="{{ route('product.details', encrypt($item->id)) }}">
              <b>{{ $item->name }}</b>
            </a>
          </h6>

          <!-- Image -->
          <a href="{{ route('product.details', encrypt($item->id)) }}" class="product-image">
            <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
          </a>

          <!-- Price ONLY (no side icon anymore) -->
          <div class="price">
            <span class="old-price">₦{{ number_format($item->price) }}</span> 

            <span class="new-price">₦{{ number_format($item->sale_price) }}</span>
          </div>
          <br>
          <!-- Add to Cart (YOUR preferred design) -->
          <a href="{{ route('product.details', encrypt($item->id)) }}" class="add-cart-btn">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Add to Cart</span>
          </a>

        </div>
      </div>
      @empty
        <p class="text-center">No products available.</p>
      @endforelse

    </div>

  </div>
</section>







{{-- <section class="team-section">
  <div class="container"> 
    <h2>Meet Our Team</h2>
    <div class="team-grid">
      <div class="team-card">
        <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?auto=format&fit=crop&w=800&q=80">


        <h4>Jane Doe</h4>
        <p>Founder & CEO</p>
      </div>
      <div class="team-card">
        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=800&q=80">

        <h4>John Smith</h4>
        <p>Lead Developer</p>
      </div>
      <div class="team-card">
        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=800&q=80">
        <h4>Mary Johnson</h4>
        <p>Creative Director</p>
      </div>
      <div class="team-card">
        <img src="https://images.unsplash.com/photo-1590650153855-d9e808231d41?auto=format&fit=crop&w=800&q=80">
        <h4>David Brown</h4>
        <p>Marketing Strategist</p>
      </div>
    </div>

    </div>
  </section> --}}



{{-- <section id="brands" class="brands-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h4 class="fw-bold">Trusted Solar Partners</h4>
      <p class="text-muted small">
        We collaborate with leading renewable energy brands worldwide
      </p>
    </div>

    <div class="brands-slider">
      <div class="brands-track">
        @foreach ([
          'a.jpg','b.jpg','c.jpg','d.jpg','e.jpg','c.jpg',
          'a.jpg','b.jpg','c.jpg','d.jpg','e.jpg','c.jpg'
        ] as $brand)
          <div class="brand-card">
            <img src="{{ asset('frontend/images/brands/' . $brand) }}" alt="Solar Brand">
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section> --}}



<a href="https://wa.me/2347051000600?text=Hello%20Solar%20Solutions%20Africa!%20I%20have%20a%20question%20about%20your%20products." 
   class="whatsapp-float" 
   target="_blank">

    <svg xmlns="http://www.w3.org/2000/svg" 
         viewBox="0 0 24 24" 
         width="24" 
         height="24" 
         fill="white">
        <path d="M20.52 3.48A11.79 11.79 0 0012.02 0C5.38 0 .02 5.36.02 12c0 2.12.56 4.19 1.63 6.01L0 24l6.18-1.62A11.96 11.96 0 0012.02 24c6.64 0 12-5.36 12-12 0-3.2-1.25-6.21-3.5-8.52zM12.02 21.8c-1.88 0-3.72-.5-5.33-1.46l-.38-.23-3.67.96.98-3.58-.25-.37A9.74 9.74 0 012.22 12c0-5.4 4.4-9.8 9.8-9.8s9.8 4.4 9.8 9.8-4.4 9.8-9.8 9.8zm5.4-7.36c-.29-.15-1.72-.85-1.99-.95-.27-.1-.47-.15-.67.15-.2.29-.77.95-.95 1.15-.17.2-.35.22-.64.07-.29-.15-1.22-.45-2.32-1.45-.86-.77-1.45-1.72-1.62-2.01-.17-.29-.02-.45.13-.6.13-.13.29-.35.43-.52.15-.17.2-.29.29-.49.1-.2.05-.37-.02-.52-.07-.15-.67-1.6-.92-2.19-.24-.57-.48-.49-.67-.5-.17-.01-.37-.01-.57-.01s-.52.07-.8.37c-.27.29-1.05 1.03-1.05 2.52s1.08 2.93 1.23 3.13c.15.2 2.13 3.25 5.17 4.56.72.31 1.28.49 1.72.63.72.23 1.38.2 1.9.12.58-.09 1.72-.7 1.97-1.38.24-.68.24-1.27.17-1.38-.07-.12-.27-.2-.56-.35z"/>
    </svg>

    <span>Chat with us</span>
</a>

<h6 class="related__products-title text-center mb-4">
    Recent Products
</h6>

<div class="container">
  <div class="swiper recentSwiper">
    <div class="swiper-wrapper">

      @forelse ($products as $item)
        <div class="swiper-slide">
          <div class="product-card-elegant">

            <h6 class="product-title">
              <a href="{{ route('product.details', encrypt($item->id)) }}">
                {{ $item->name }}
              </a>
            </h6>

            <a href="{{ route('product.details', encrypt($item->id)) }}" class="product-image">
              <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
            </a>

            <div class="price-row">
              <div class="price">
                <span class="old-price">&#8358;{{ number_format($item->price) }}</span>
                <span class="new-price">&#8358;{{ number_format($item->sale_price) }}</span>
              </div>
            </div>

            <a class="add-cart-btn" href="{{ route('product.details', encrypt($item->id)) }}">
              Add to Cart
            </a>

          </div>
        </div>
      @empty
        <p>No products available.</p>
      @endforelse

    </div>
  </div>
</div>


@endsection

@section('script')
<script>

let index = 0;
const track = document.querySelector('.carousel-track');
const items = document.querySelectorAll('.carousel-item');

document.querySelector('.next').addEventListener('click', () => moveSlide(1));
document.querySelector('.prev').addEventListener('click', () => moveSlide(-1));

function moveSlide(step) {
    index = (index + step + items.length) % items.length;
    track.style.transform = `translateX(-${index * 100}%)`;
}

// Auto slide every 3 seconds


var swiper = new Swiper(".recentProductSwiper", {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: true,
    speed: 800,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        }
    }
});




</script>

<script>
function closeLuxPromo() {
    const popup = document.getElementById("luxPromo");
    popup.style.transform = "translateY(-50%) translateX(120%)";
    setTimeout(() => popup.style.display = "none", 400);
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("luxPromo");

    function showPopup() {
        popup.classList.add("show");

        // Hide after 5 seconds
        setTimeout(() => {
            popup.classList.remove("show");
        }, 5000);
    }

    // First appearance
    setTimeout(showPopup, 2000);

    // Repeat every 1 minute
    setInterval(showPopup, 60000);

});
</script>
@endsection


