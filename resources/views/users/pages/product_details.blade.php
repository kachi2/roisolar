@extends('layouts.app')
@section('title')
<title> Product Details - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
<style>





/* Product Card */
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

/* Title */
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
    color: #0a2540;
    text-decoration: none;
}

.product-title a:hover {
    color: #163a5f;
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

.product-card-elegant:hover .product-image img {
    transform: scale(1.05);
}

/* Price */
.price-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}

.old-price {
    font-size: 12px;
    color: #dc3545;
    text-decoration: line-through;
}

.new-price {
    font-size: 14px;
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

/* Button */
.product-card-elegant a.add-cart-btn {
    margin-top: auto;
    width: 100%;
    background: transparent;
    /* border: 1px solid #ddd; */
    text-align: center;
    padding: 7px;
    font-size: 13px;
    border-radius: 6px;
    color: #0a2540;
    transition: all 0.25s ease;
}

.product-card-elegant a.add-cart-btn:hover {
   background: #e0dbdb;
    border-color: #0a2540;
}

/* Mobile */
@media (max-width: 576px) {
    .product-image {
        height: 95px;
    }

    .add-cart-btn {
        font-size: 12px;
        padding: 6px;
    }
}

.product__title{
  font-size: 18px !important;
  font-weight: 600 !important;
}


.product__price{
  font-size: 18px !important;
  font-weight: 600 !important;
  color: #0a2540 !important;
}



.alert-message {
    position: fixed;
    top: 20px;
    right: 20px;
    max-width: 320px;
    padding: 15px 20px;
    border-radius: 8px;
    font-size: 0.95rem;
    color: #fff;
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    z-index: 9999;
    opacity: 1;
    transition: opacity 0.5s ease, transform 0.5s ease;
    margin-top: 10px;
}

/* Close button */
.close-alert {
    position: absolute;
    top: 8px;
    right: 10px;
    background: transparent;
    border: none;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    transition: color 0.25s;
}

.close-alert:hover {
    color: #ddd;
}

/* Success & Error */
.alert-success { background-color: #0a2540; }
.alert-danger { background-color: #dc3545; }

/* Fade out */
.alert-message.fade-out {
    opacity: 0;
    transform: translateY(-20px);
}

/* Mobile */
@media (max-width: 576px) {
    .alert-message {
        max-width: 90%;
        left: 5%;
        right: 5%;
        top: 10px;
        font-size: 0.9rem;
    }
}



</style>

@endsection



@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert-message alert-danger">
            <button type="button" class="close-alert">&times;</button>
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert-message alert-success">
        <button type="button" class="close-alert">&times;</button>
        {{ session('success') }}
    </div>
@endif





{{-- @if(session('success'))
        <div class="cart-success" id="cartSuccess">{{ session('success') }}</div>
    @endif --}}

@section('content')
    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-0">
                  <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Product Details</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
              </nav>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ========================
         shop single
      =========================== -->
      <section class="shop pb-40 pt-0">
        <div class="container">
          <div class="row">
            <div class="col-12">

              {{-- <div  class="alert alert-primary d-flex flex-wrap justify-content-between align-items-center mb-40">
                <h3 class="alert__title my-1">“{{ $product->name }}” </h3>
                <a href="{{ route('carts.index') }}" class="btn btn__secondary btn__rounded">View Cart</a>
              </div><!-- /.alert-panel--> --}}

              <div class="row product-item-single">
                <div class="col-sm-6">
                  <div class="product__img">
                    <img src="{{ asset('images/products/'.$product->image_path) }}" height="200px" width="300px" class="zoomin" alt="product" loading="lazy">
                  </div><!-- /.product-img -->
                </div>
                <div class="col-sm-6">
                  <h6 class="product__title">{{ $product->name }}</h6>
                  <div class="product__meta-review mb-20">
                    <span class="product__rating">
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star active"></i>
                      <i class="fa fa-star"></i>
                    </span>
                    <span>4 Review(s)</span>
                    <a href="#">Add Review</a>
                  </div><!-- /.product-meta-review -->
                  <span class="product__price mb-20"> {{ moneyFormat($product->sale_price)  }}</span>
                  {{-- <div class="product__desc">
                    <p>EGCG is one of the most powerful compounds in green tea. Research has tested its ability to help
                      treat various diseases. It appears to be one of the main compounds that gives green tea its
                      medicinal properties (2
                    </p>
                  </div><!-- /.product-desc --> --}}
                  <div class="product__quantity d-flex mb-30">
                    <form  action="{{ route('carts.add', encrypt($product->id)) }}" method="POST" style="display:inline;">
                      @csrf
                    <div class="quantity__input-wrap mr-20">
                     
                      <i class="decrease-qty fa fa-minus"></i>
                      
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" class="qty-input" id="quantiy" name="quantity" value="1" min="1">
                      <i class="increase-qty fa fa-plus"></i>
                      
                    </div>
                    <button  type="submit" class="btn btn__secondary"> add to cart <i class="icon-cart"></i></button>
                   
                  </form>
      
                  </div><!-- /.product-quantity -->
                  <div class="product__meta-details">
                    <ul class="list-unstyled mb-30">
                      <li><span>SKU :</span> <span>#{{ $product->sku }}</span></li>
                      <li><span>Category :</span> <span><strong>{{ $prod->category ? $product->category->name : 'Uncategorized' }}</strong></span></li>
                      {{-- <li><span>Tags :</span> <span>Beauty, Supplements</span></li> --}}
                    </ul>
                  </div><!-- /.product__meta-details -->
                  {{-- <ul class="social-icons list-unstyled mb-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul><!-- /.social-icons --> --}}
                </div>
              </div><!-- /.row -->


              <div class="product__details mt-100">
                <nav class="nav nav-tabs">
                  <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
                  {{-- <a class="nav__link" data-toggle="tab" href="#Details">Details</a> --}}
                  <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews (3)</a>
                </nav>
                <div class="tab-content mb-50" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="Description">
                    <p>{!! $product->description !!}.</p> 
                  </div><!-- /.desc-tab -->
                  {{-- <div class="tab-pane fade" id="Details">
                    <p>Yorks is not just about graphic design; it's more than that. We offer integral communication
                      services, and we're responsible for our process and results. We thank each of our clients and their
                      portfolios; thanks to them we have grown and built what we are today! After all</p>
                    <p>as described in Web
                      Design Trends 2015 & 2016, vision dominates a lot of our subconscious interpretation of the world
                      around us. On top of that, pleasing images create a better user experience.
                      At League Agency, we shows only the best websites and portfolios built completely with passion,
                      simplicity & creativity !</p>
                  </div><!-- /.details-tab --> --}}
                  <div class="tab-pane fade" id="Reviews">
                    <form class="reviews__form">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email">
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <textarea class="form-control" placeholder="Review"></textarea>
                      </div><!-- /.form-group -->
                      <button  class="btn btn__primary btn__rounded">Submit </button>
                    </form>
                  </div><!-- /.reviews-tab -->
                </div>
              </div><!-- /.product-tabs -->
              
             
      <h6 class="related__products-title text-center mb-4">
    Related Products
</h6>

<div class="container">
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

                <!-- Price + Cart -->
                <div class="price-row">
                    <div class="price">
                        <span class="old-price">${{ $item->price }}</span>
                        <span class="new-price">${{ $item->sale_price }}</span>
                    </div>

                    <i class="fa-solid fa-cart-shopping cart-icon"></i>
                </div>

                <!-- Add to Cart -->
                <a class="add-cart-btn" href="{{ route('product.details', encrypt($item->id)) }}"> 
                        Add to cart
                    </a>

            </div>
        </div>
        @empty
            <p class="text-center">No related products.</p>
        @endforelse

    </div>
</div>

            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.shop single -->

      @endsection

      @section('scripts')

<script>
document.addEventListener('DOMContentLoaded', () => {
    const alerts = document.querySelectorAll('.alert-message');

    alerts.forEach(alert => {
        // Auto hide after 4 seconds
        setTimeout(() => {
            alert.classList.add('fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 4000);

        // Manual close
        const closeBtn = alert.querySelector('.close-alert');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                alert.classList.add('fade-out');
                setTimeout(() => alert.remove(), 500);
            });
        }
    });
});
</script>



@endsection