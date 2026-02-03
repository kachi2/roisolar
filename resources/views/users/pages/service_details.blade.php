@extends('layouts.app')
@section('title')
<title> Product Details - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
<style>
  .object-fit-cover {
    object-fit: cover;
  }

  .card {
    transition: all 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 2px 0px rgba(0,0,0,0.1);
  }

  @media (max-width: 768px) {
    .card img {
      height: 240px;
    }
  }



</style>

@endsection
@section('content')
    
 {{-- <section class="page-title">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section> --}}




<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <!-- === SERVICE CARD === -->
      <div class="card border-0  overflow-hidden rounded-4">
        <div class="row g-0 align-items-center flex-column flex-md-row">

          <!-- IMAGE SECTION -->
          <div class="col-md-6">
          <img src="{{asset('/images/services/'.$service->images)}}" alt="banner"
            {{-- <img src="{{ asset('storage/' . $service->image) }}"  --}}
                 class="img-fluid h-100 w-100 object-fit-cover" 
                 alt="{{ $service->name }}">
          </div>

          <!-- DETAILS SECTION -->
          <div class="col-md-6 p-4 p-md-5">
            <h2 class="fw-bold text-primary mb-3">{{ $service->title }}</h2>
            <p class="text-muted mb-4">{{ strip_tags($service->contents) }}</p>

            <a href="" class="btn btn-primary shadow-sm">
              Contact Us
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>




@endsection