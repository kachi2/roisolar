@extends('layouts.app')
@section('title')
<title> Blogs - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')




 
{{-- <section class="page-title page-title-layout5 text-center"> --}}
  {{-- <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="pagetitle__heading">Our Blogs</h1> --}}
        {{-- <nav>
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">blog</li>
          </ol>
        </nav> --}}
        <section class="page-title">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
      </ol>
    </nav>
  </div>
</section>
   
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
  .blogs-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  .blogs-title {
    text-align: center;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #333;
  }
  .blogs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  @media (min-width: 768px) {
    .blogs-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media (min-width: 1024px) {
    .blogs-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  .blog-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,.08);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,.15);
  }

  .blog-image {
    width: 100%;
    height: 180px;
    overflow: hidden;
  }
  .blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .blog-card:hover img {
    transform: scale(1.08);
  }

  .blog-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
    flex: 1;
  }
  .blog-body h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #222;

     flex: 1;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1; /* limits excerpt to 1 lines */
    -webkit-box-orient: vertical;
  }
  .blog-body p {
    font-size: 14px;
    color: #555;
    
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* limits excerpt to 2 lines */
    -webkit-box-orient: vertical;
  }
  .blog-footer {            
    margin-top: 12px;
  }
  .blog-btn {
    display: inline-block;
    background: #080629;
    color: #fff;
    padding: 10px 12px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: background 0.3s ease;
  }
  .blog-btn:hover {
    background: #1b1a30;
  }
  .no-blogs {
    text-align: center;
    margin-top: 30px;
    color: #888;
  }
</style>
@endsection
<div class="blogs-wrapper">
  <h5 class="blogs-title">Latest Blog Posts</h5>

  <div class="blogs-grid">
    @foreach($blogs as $item)
      <article class="blog-card">
        <div class="blog-image">
          <img src="{{asset('images/blog/'.$item->image)}}" alt="{{ $blog['title'] ?? '' }}">
        </div>
        <div class="blog-body">
        <div class="post__meta d-flex">
                    <span class="post__meta-date">{{$item->created_at->format('M d, Y')}}.</span> | &nbsp;

                    <a class="post__meta-author" href="#">{{_('By'). ' '.$settings->site_name}}</a>
                  </div>
          <h3>{{ $item['title'] ?? $item->title }}</h3>
          <p>{{trim(strip_tags($item->content))}}</p>
          <div class="blog-footer">
            <a href="{{route('blogs.details', $item->hashid)}}" class="blog-btn">Read More</a>   
          </div>
        </div>
      </article>
    @endforeach
  </div>

  @if(count($blogs) === 0)
    <p class="no-blogs">No blog posts available at the moment.</p>
  @endif
</div>
@endsection