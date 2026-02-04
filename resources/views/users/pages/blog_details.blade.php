@extends('layouts.app')
@section('title')
<title> Blog Details - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')

@section('styles')
<style>

/* ===== BLOG SINGLE ===== */
.blog-title {
  font-weight: 600;
  color: #0b1c2d;
  font-size: 1.8rem;
}

.blog-meta {
  font-size: 0.85rem;
  color: #6c757d;
}

.blog-content {
  line-height: 1.8;
  color: #333;
}

/* ===== ASIDE ===== */
.blog-aside {
  background: #f8f9fa;
  padding: 22px;
  border-radius: 16px;
}

/* Sticky on desktop */
.sticky-aside {
  position: sticky;
  top: 90px;
}

.aside-title {
  font-weight: 600;
  font-size: 1.1rem;
  margin-bottom: 18px;
  padding-bottom: 10px;
  border-bottom: 2px solid #e5e5e5;
}

/* ASIDE WRAPPER */
.blog-aside {
  background: #f8f9fa;
  padding: 18px;
  border-radius: 14px;
}

/* TITLE */
.aside-title {
  font-weight: 600;
  margin-bottom: 15px;
  border-bottom: 2px solid #e5e5e5;
  padding-bottom: 8px;
}

/* GRID ITEM */
.latest-blog-item {
  display: flex;
  gap: 12px;
  align-items: flex-start;
  background: #fff;
  padding: 12px;
  border-radius: 12px;
  height: 100%;
  transition: all 0.25s ease;
}

.latest-blog-item:hover {
  box-shadow: 0 8px 22px rgba(0,0,0,0.08);
  transform: translateY(-2px);
}

/* IMAGE */
.latest-blog-item img {
  width: 70px;
  height: 60px;
  object-fit: cover;
  border-radius: 8px;
  flex-shrink: 0;
}

/* INFO WRAPPER */
.latest-blog-info {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 60px;
}

/* 🔒 FIXED TITLE (NO SCATTER) */
.latest-blog-info h6 {
  font-size: 0.9rem;
  line-height: 1.35;
  margin: 0 0 4px;

  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;

  min-height: calc(1.35em * 2);
}

.latest-blog-info a {
  color: #0b1c2d;
  text-decoration: none;
}

.latest-blog-info a:hover {
  color: #0d6efd;
}

.latest-blog-info small {
  font-size: 0.75rem;
  color: #6c757d;
}

/* 📱 MOBILE TWEAK */
@media (max-width: 576px) {
  .latest-blog-item img {
    width: 60px;
    height: 50px;
  }
}



</style>
@endsection

 <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30 text-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{route('users.index')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('users.blogs')}}">Blog</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
                </ol>
              </nav>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
<div class="container my-5">
  <div class="row g-4">

    <!-- MAIN BLOG -->
    <div class="col-lg-8">
      <article class="blog-single">
        @if($blog->image)
          <img src="{{ asset('images/blog/'.$blog->image) }}"
               class="img-fluid rounded-4 mb-4 blog-featured-img"
               alt="{{ $blog->title }}">
        @endif

        <h3 class="blog-title mb-3">{{ $blog->title }}</h3>

        <div class="blog-meta mb-4">
          <span><i class="fa-regular fa-calendar"></i> {{ $blog->created_at->format('M d, Y') }}</span>
          <span class="mx-2">•</span>
          <span><i class="fa-regular fa-user"></i> Admin</span>
        </div>

        <div class="blog-content">
          {!! $blog->content !!}
        </div>
      </article>
    </div>

    <!-- ASIDE -->
    <div class="col-lg-4">
  <aside class="blog-aside sticky-aside">
    <h5 class="aside-title">Latest Blogs</h5>

    <div class="row g-3 latest-blog-grid">
      @forelse($latestBlogs as $item)
        <div class="col-6 col-lg-12">
          <div class="latest-blog-item">
            <img src="{{ asset('images/blog/'.$item->image) }}"
                 alt="{{ $item->title }}">

            <div class="latest-blog-info">
              <h6>
                <a href="{{ route('blogs.details', $item->hashid) }}">
                  {{ $item->title }}
                </a>
              </h6>
              <small>{{ $item->created_at->format('M d, Y') }}</small>
            </div>
          </div>
        </div>
      @empty
        <p class="text-muted">No recent posts.</p>
      @endforelse
    </div>
  </aside>
</div>


  </div>
</div>




@endsection

      <!-- ======================
        Blog Single
      ========================= -->

  