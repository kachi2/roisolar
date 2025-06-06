@extends('layouts.app')

@section('title')
<title>{{$products[0]?->categories?->name }}</title>
@endsection
@section('head')
<link rel="canonical" href="{{ url('catalogs/'.Str::slug($products[0]?->categories?->name)) }}">

@endsection
 <style>
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

  </style>
@section('content')


{{-- <div class="ps-categogy ps-categogy--dark" style="background: #e8e8e8;">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">Category</a></li>
            <li class="ps-breadcrumb__item"><a href="">Products</a></li>
        </ul>
        <div class="ps-categogy__content">
            <div class="row row-reverse">
                <div class="col-12 col-md-9" style="
                background: #fff;
                padding: 10px;
                border-radius: 10px; top:-40px">
                    <div class="ps-categogy__wrapper">
                      
                        <div class="ps-categogy__onsale">
                            <form>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="onSaleProduct" checked >
                                    <label class="custom-control-label" for="onSaleProduct">@if(isset($searchterm)) {{$searchterm}} @else Showing All Results @endif</label>
                                </div>
                            </form>
                        </div>
                        <div class="ps-categogy__sort">
                            <form><span>Sort by</span>
                                <select class="form-select">
                                    <option selected="">Latest</option>
                                    <option value="Popularity">Popularity</option>
                                </select>
                            </form>
                        </div>
                       
                    </div>
                    <div class="ps-categogy--grid">
                        <div class="row m-0">
                            @forelse ($products as $prods )
                            <div class="col-6 col-lg-4 col-xl-3 p-0">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('users.products',[$prods->hashid, $prods->productUrl])}}">
                                            <!--<figure><img src="{{$prods->image_path}}" alt="{{$prods->image_path}}"><img src="{{$prods->image_path }}" alt="{{$prods->name }}">-->
                                                   <figure><img src="{{asset('images/products/'.$prods->image_path)}}" alt="{{$prods->name }}" /><img src="{{asset('images/products/'.$prods->image_path)}}" alt="{{$prods->name }}" /> 
                                            </figure>
                                        </a>
                                        <div class="ps-product__badge">
                                            <span class="badge badge-warning"> -{{number_format($prods->discount,0)}}%</span>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__tite"><a href="{{route('users.products',[$prods->hashid, $prods->productUrl])}}">{{$prods->name}}</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price">{{moneyFormat($prods->sale_price)}}</span>
                                        <span class="ps-product__price "> <small> <del> {{moneyFormat($prods->price)}}</del> </small></span>
                                        </div>
                                    </div>
                                     <center> <a
                                                        href="{{ route('users.products', [$prods->hashid, $prods->productUrl]) }}"
                                                        class="btn  btn-lg" style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px"> Add to
                                                    Cart <i class="fa fa-shopping-basket"></i></a>
                                                       <a target="_blank" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text=Please i need {{ $prods->name }}, the  price on your website is {{ moneyFormat($prods->sale_price) }} ">
                                                             <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; border:1px solid #eee; padding:5px; color:#73c2fb "> 
                                                             </i></a> 
                                                    </center>
                                </div>
                            </div> 
                             
                            @empty
                            <div class="ps-delivery ps-delivery--info">
                                <div class="ps-delivery__content">
                                    <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>No Item found </strong></span></div>
                                </div>
                            </div>
                            @endforelse
                          
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3" style="top:-40px">
                    <div class="ps-widget ps-widget--product" style="
                    background: #fff;
                    border-radius: 10px;
                    padding: 10px 20px;">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content ps-widget__category">
                                <ul class="menu--mobile">
                                  
                                 @forelse ($categories as $cat )
                                    <li><a href="{{route('products.search',$cat->hashid)}}" style="font-size: 14px">{{substr($cat->name, 0,30)}}</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            @foreach ($cat->products as $prod )
                                           
                                            <li><a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}">{{$prod->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                     
                                 @empty
                                     
                                 @endforelse 

                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div> --}}



 <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5 text-center">
        <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="pagetitle__heading">Product Categories</h1>
              <nav>
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
              </nav>
            </div><!-- /.col-xl-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ========================
         shop 
      =========================== -->
  {{-- <div class="container py-5">
  <div class="row g-4">

    <!-- Example of looping through categories -->
    @foreach($categories as $category)
      <div class="col-md-4">
        <div class="card category-card shadow-sm">
          @if($category->image_path)
            <img src="{{ asset('images/category/'.$category->image_path) }}" class="card-img-top category-img" alt="{{ $category->name }}">
          @else
            <img src="https://via.placeholder.com/300x180" class="card-img-top category-img" alt="Category">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <a href="{{ route('category.products', $category->id) }}" class="btn btn-primary btn-sm">View Products</a>
          </div>
        </div>
      </div>
    @endforeach
    
  </div>
</div> --}}



<div class="container py-5">
    <div class="row">
        <!-- Categories Sidebar -->
        <div class="col-md-3">
            <h4 class="mb-3">Categories</h4>
            <!-- Search -->
                <div class="mb-3">
                    <input type="text" name="search" value="" class="form-control" placeholder="Search Category...">
                    
                </div>
            <ul class="list-group">
                @foreach ($categories as $cat)
                    <li class="list-group-item {{ request('category') == $cat->id ? 'active' : '' }}">
                        <a href="{{route('category.products',$cat->id)}}" style="color: inherit; text-decoration: none;" class="text-decoration-none d-block {{ request()->category == $cat->id ? 'text-yellow' : '' }}">
                            {{ $cat->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <h4 class="mb-3">{{ $currentCategory->name ?? 'All Products' }}</h4>
            <div class="row">
<div class="container my-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                @forelse ($products as $product)
            <div class="col">
      <div class="card h-100 shadow-sm rounded-4">
        <img src="{{ asset('images/products/' . $product->image_path) }}" class="card-img-top" alt="Product Image">
        <div class="card-body">
          <b class="card-title"><a href="{{ route('product.details',encrypt($product->id)) }}"> {{ $product->name }}</a> </b>
          <p class="card-text mb-1">
            <small class="text-muted text-decoration-line-through">${{ number_format($product->price, 2) }}</small>
            <span class="text-danger fw-bold ms-2">${{ number_format($product->sale_price, 2) }}</span>
          </p>
         <center><a href="{{ route('product.details',encrypt($product->id)) }}" class="btn btn-sm btn-primary mt-2 w-100">Add to Cart</a></center> 
        </div>
      </div>
    </div>
                @empty
                    <p>No products found in this category.</p>
                @endforelse
            </div>
  </div>
</div>
            <div class="mt-4">
                
            </div>
        </div>


{{-- 

        <div class="container my-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <!-- Card 1 -->
     @forelse ($products as $product)
    <div class="col">
      <div class="card h-100 shadow-sm rounded-4">
        <img src="{{ asset('images/products/' . $product->image_path) }}" class="card-img-top" alt="Product Image">
        <div class="card-body">
          <h5 class="card-title"><a href="{{ route('product.details',encrypt($product->id)) }}"> {{ $product->name }}</a> </h5>
          <p class="card-text mb-1">
            <small class="text-muted text-decoration-line-through">${{ number_format($product->price, 2) }}</small>
            <span class="text-danger fw-bold ms-2">${{ number_format($product->sale_price, 2) }}</span>
          </p>
          <a href="{{ route('product.details',encrypt($product->id)) }}" class="btn btn-sm btn-primary mt-2 w-100">Add to Cart</a>
        </div>
      </div>
    </div>
 @empty
                    
 @endforelse
    </div>
</div> --}}



@endsection