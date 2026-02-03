@extends('layouts.app')

@section('title')
<title>Project- Roisolar</title>
@endsection

@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection


@section('styles')
<style>

/* MAIN PROJECT */
.project-card-main {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.project-card-main:hover {
    transform: translateY(-4px);
}

.project-main-img {
    width: 100%;
    height: 280px;
    object-fit: cover;
}

.project-content {
    padding: 22px;
}

.project-title {
    font-weight: 700;
    color: #0a2540;
    margin-bottom: 12px;
}

.project-desc {
    color: #555;
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 18px;
}

.btn-project {
    background: #021633;
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: background 0.25s ease;
}

.btn-project:hover {
    background: #084298;
    color: #fff;
}

/* ASIDE */
.project-aside {
    background: #fff;
    border-radius: 16px;
    padding: 18px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.06);
}

.aside-title {
    font-weight: 600;
    margin-bottom: 16px;
    color: #0a2540;
}

/* RECENT PROJECT ITEM */
.recent-project {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid #eef1f5;
}

.recent-project:last-child {
    border-bottom: none;
}

.recent-project img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: cover;
}

.recent-info h6 {
    font-size: 0.9rem;
    margin-bottom: 4px;
    color: #0a2540;
}

.view-project {
    font-size: 0.8rem;
    color: #0d6efd;
    text-decoration: none;
    font-weight: 500;
}

.view-project:hover {
    text-decoration: underline;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .project-main-img {
        height: 220px;
    }

    .project-aside {
        margin-top: 20px;
    }
}


</style>
@endsection

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
                  
                </ol>
              </nav>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
<div class="container my-5">
  <div class="row g-4">

    <!-- MAIN PROJECT -->
 
    <div class="col-lg-8">
      @forelse ($projects as $item)
      <div class="project-card-main">
        <img src="{{ asset('storage/' . $item->images->first()->image_path) }}">

        <div class="project-content">
          <h4 class="project-title">
            {{$item->title}}
          </h4>

          <p class="project-desc">
            {!! $item->description !!}
          </p>

          <a href="{{ route('project.details', $item->slug) }}" class="btn btn-project">
    Read More
</a>

        </div>
      </div>
 @empty
    <div> No project found</div>
@endforelse
    </div>

   


    <!-- ASIDE / RECENT PROJECTS -->
    <div class="col-lg-4">
      <div class="project-aside">
        <h5 class="aside-title">Recent Projects</h5>

@forelse ($latest as $item)

        <!-- Item -->
        <div class="recent-project">
          <img src="{{ asset('storage/' . $item->images->first()->image_path) }}">
          <div class="recent-info">
            <h6>{{$item->title}}</h6>
            <a href="{{ route('project.details', $item->slug) }}" class="view-project">View Project</a>
          </div>
        </div>
 @empty
 <div>no recent post available</div>
@endforelse
        <!-- Item -->
        {{-- <div class="recent-project">
          <img src="images/projects/solar-2.jpg" alt="Project">
          <div class="recent-info">
            <h6>Industrial Power System</h6>
            <a href="#" class="view-project">View Project</a>
          </div>
        </div> --}}

        


      </div>
    </div>

  </div>
</div>





@endsection