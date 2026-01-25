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
  section {
    scroll-margin-top: 80px;
  }

  /* ==== SERVICES ==== */
  .service-card {
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    background-color: #fff;
  }

  .service-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .service-img {
    height: 140px;
    width: 100%;
    object-fit: cover;
  }

  .text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  /* ==== PRODUCTS ==== */
  .product-card {
    transition: all 0.3s ease;
    border-radius: 10px;
    background-color: #fff;
  }

  .product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .product-img {
    height: 120px;
    width: 100%;
    object-fit: cover;
  }

  .add-btn {
    font-size: 14px;
    padding: 3px 10px;
    border-radius: 2px;
    color: #112e5aff;
    transition: all 0.2s ease;
  }

  .add-btn:hover {
    background-color: #0d6efd;
    color: #fff;
    border-color: #0d6efd;
  }

  /* ==== TEAM ==== */
  .team-card {
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    background-color: #fff;
  }

  .team-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
  }

  .team-img {
    height: 180px;
    width: 100%;
    object-fit: cover;
  }

  /* ==== RESPONSIVE ==== */
  @media (max-width: 992px) {
    .service-img {
      height: 120px;
    }
  }

  @media (max-width: 768px) {
    .col-4 {
      flex: 0 0 33.333%;
      max-width: 33.333%;
    }

    .service-card {
      font-size: 14px;
    }

    .product-img {
      height: 100px;
    }

    .team-img {
      height: 150px;
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



  /* ==== CATEGORY LIST ==== */
  .category-list {
    overflow-x: auto;
    white-space: nowrap;
    scrollbar-width: none;
  }
  .category-list::-webkit-scrollbar {
    display: none;
  }

  .category-btn {
    background: #f8f9fa;
    border: 1px solid #ddd;
    color: #333;
    font-size: 13px;
    padding: 6px 14px;
    border-radius: 20px;
    transition: all 0.3s ease;
  }

  .category-btn:hover,
  .category-btn.active {
    background: #0d6efd;
    color: #fff;
    border-color: #0d6efd;
  }

  /* ==== PRODUCT CARD ==== */
  .product-container {
    transition: all 0.3s ease;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
  }

  .product-container:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
  }

  .product-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid #eee;
  }

  .product-card h6 {
    font-size: 12px;
    font-weight: 300;
  }

  .product-card p {
    font-size: 13px;
  }

  .add-to-cart-btn {
    font-size: 12px;
    /* padding: 1px 2px; */
    /* border: 0.5px solid #222; */
    background: transparent;
    color: #222;
    border-radius: 4px;
    transition: all 0.3s ease;
  }

  .add-to-cart-btn:hover {
    background: #0d6efd;
    color: #fff;
    /* border-color: #0d6efd; */
  }

  .fa-cart-arrow-down {
    font-size: 14px;
  }

  /* ==== RESPONSIVE ==== */
  @media (max-width: 768px) {
    .product-img {
      height: 150px;
    }
    .add-to-cart-btn {
      font-size: 11px;
      padding: 3px 8px;
    }
  }

  @media (max-width: 576px) {
    .product-img {
      height: 130px;
    }
    .add-to-cart-btn {
      font-size: 10px;
      padding: 2px 6px;
    }
  }


#brands {
  overflow: hidden;
  position: relative;
}

.brand-slider {
  overflow: hidden;
  position: relative;
  width: 100%;
}

.brand-track {
  display: flex;
  width: calc(250px * 12); /* total width based on number of logos */
  animation: scroll 40s linear infinite;
}

.brand {
background-color: white;
  flex: 0 0 200px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
}

.brand img {
  width: 120px;
  height: auto;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
}

.brand img:hover {
  filter: grayscale(0%);
  opacity: 1;
  transform: scale(1.1);
}

@keyframes scroll {
  from { transform: translateX(0); }
  to { transform: translateX(-50%); }
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .brand img {
    width: 90px;
  }
  .brand {
    flex: 0 0 150px;
  }
  .brand-track {
    animation: scroll 30s linear infinite;
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

</style>

@endsection

@include('users.slider') 

<!-- ===== SERVICES SECTION ===== -->
<section id="services" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-4">
      <h6 class="fw-bold">Our Services</h6>
      <p class="text-muted">Empowering you with innovative and sustainable energy solutions.</p>
    </div>

    <div class="row g-3">
      @foreach ($service as $serv)
      <div class="col-4 col-md-4 col-lg-3">
        <div class="card border-0 shadow-sm service-card h-100 text-center p-3">
          <a href="{{ route('service.details', encrypt($serv->id)) }}">
            <img src="{{ asset('images/services/'.$serv->images) }}" class="img-fluid rounded mb-3 service-img" alt="{{ $serv->title }}">
          </a>
          <a href="{{ route('service.details', encrypt($serv->id)) }}">
            <h6 class="fw-semibold mb-1 text-truncate">{{ $serv->title }}</h6> </a>
          <p class="small text-muted text-truncate-2">{{ trim(strip_tags($serv->short_description)) }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ===== PRODUCTS SECTION ===== -->
<section id="shop" class="py-5">
 

{{-- <div class="container">
    <!-- ===== CATEGORY LIST ===== -->
    <div class="category-list mb-4 d-flex flex-wrap justify-content-center gap-2">
      @foreach ($categories as $category)
      <button class="btn category-btn">
        {{ $category->name }}
      </button>
      @endforeach
    </div> --}}


<div class="container my-4">
  <!-- ===== CAPTION ===== -->
  {{-- <h6 class="text-center mb-4 fw-bold text-uppercase text-primary">
    Categories
  </h6> --}}
  <h6 class=" text-center mb-4 fw-bold">Categories</h6>

  <div class="row g-3">
    @foreach ($categories as $category)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card shadow-sm border h-100 small-card">
          <div class="card-body text-center py-3 px-2">
            
            <!-- Category Title -->
            <h6 class="card-title fw-semibold text-dark mb-2">
              {{ $category->name }}
            </h6>

            <!-- Dropdown Button -->
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-primary dropdown-toggle w-100"
                      type="button"
                      id="dropdownMenu{{ $category->id }}"
                      data-bs-toggle="dropdown"
                      aria-expanded="false">
                View Products
              </button>

              <ul class="dropdown-menu w-100 text-start shadow-sm"
                  aria-labelledby="dropdownMenu{{ $category->id }}">
                @php
                  $items = $products->where('category_id', $category->id);
                @endphp

                @forelse ($items as $item)
                  <li>
                    <a class="dropdown-item" href="{{ route('category.products', $item->id) }}">
                      {{ $item->name }}
                    </a>
                  </li>
                @empty
                  <li><span class="dropdown-item text-muted">No items</span></li>
                @endforelse
              </ul>
            </div>

          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>





    <!-- ===== PRODUCT GRID ===== -->
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
      @forelse ($products as $item)
      <div class="col">
        <div class="card h-100 border-0 shadow-sm product-container">
          <a href="{{ route('product.details', encrypt($item->id)) }}">
            <img src="{{ asset('images/products/'.$item->image_path) }}" 
                 class="card-img-top product-img" 
                 alt="{{ $item->name }}">
          </a>

          <div class="card-body product-card text-center p-2">
            <h6 class="card-title mb-1 text-truncate">
              <a href="{{ route('product.details', encrypt($item->id)) }}" 
                 class="text-dark text-decoration-none">
                {{ $item->name }}
              </a>
            </h6>

            <p class="card-text mb-1 small">
              <small class="text-muted text-decoration-line-through">${{ $item->price }}</small>
              <span class="text-danger fw-bold ms-1">${{ $item->sale_price }}</span>
            </p>

            <div class="cart-action d-flex align-items-center justify-content-center mt-2">
              <a href="{{ route('product.details', encrypt($item->id)) }}"  <i class="fa-solid fa-cart-arrow-down text-primary me-2 fs-6"></i>
              <button class="btn add-to-cart-btn">Add to Cart</button> </a>
            </div>
          </div>
        </div>
      </div>
      @empty
        <p class="text-center">No products available.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- ===== TEAM SECTION ===== -->
<section id="team" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h6 class="fw-bold">Meet Our Team</h6>
      <p class="text-muted">The brilliant minds powering our mission to light up Africa sustainably.</p>
    </div>

    <div class="row g-4 justify-content-center">
      {{-- @foreach ($team as $member) --}}
      <div class="col-6 col-md-4 col-lg-3">
        <div class="card border-0 shadow-sm text-center team-card h-100">
          {{-- <img src="{{ asset('images/team/'.$member->photo) }}" class="card-img-top team-img" alt="{{ $member->name }}"> --}}
          <div class="card-body">
            <h6 class="fw-bold mb-0">John Doe</h6>
            <small class="text-muted">Solar Engineer</small>
          </div>
        </div>
      </div>
      {{-- @endforeach --}}
    </div>
  </div>
</section>


<section id="brands" class="py-5 bg-light border-top bgv">
  <div class="container">
    <div class="text-center mb-4">
      <h6 class="fw-bold">Our Trusted Brands</h6>
      <p class="text-muted small">We proudly work with top solar and energy brands.</p>
    </div>

    <div class="brand-slider">
      <div class="brand-track">
        <!-- Repeat logos to make infinite loop -->
        <div class="brand"><img src="{{ asset('frontend/images/brands/a.jpg') }}" alt="Brand 1"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/b.jpg') }}" alt="Brand 2"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/c.jpg') }}" alt="Brand 3"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/d.jpg') }}" alt="Brand 4"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/e.jpg') }}" alt="Brand 5"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/c.jpg') }}" alt="Brand 6"></div>

        <!-- Duplicate set for smooth looping -->
        <div class="brand"><img src="{{ asset('frontend/images/brands/a.jpg') }}" alt="Brand 1"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/b.jpg') }}" alt="Brand 2"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/c.jpg') }}" alt="Brand 3"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/d.jpg') }}" alt="Brand 4"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/e.jpg') }}" alt="Brand 5"></div>
        <div class="brand"><img src="{{ asset('frontend/images/brands/c.jpg') }}" alt="Brand 6"></div>
      </div>
    </div>
  </div>
</section>




 


@section('scripts')
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
setInterval(() => moveSlide(1), 3000);


<!-- Swiper CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


    var swiper = new Swiper('.team-swiper', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        }
    });


</script>



@endsection

@endsection
