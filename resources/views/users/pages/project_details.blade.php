@extends('layouts.app')

@section('title')
<title>{{ $project->title }} | Roisolar</title>
@endsection

@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('styles')
<style>
/* ===== LATEST PROJECTS ASIDE ===== */
.latest-projects {
  background: #fff;
  border-radius: 14px;
  padding: 1.4rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.06);
  position: sticky;
  top: 90px;
}

.aside-title {
  font-weight: 700;
  margin-bottom: 1rem;
  color: #0b2c4d;
}

.latest-project-card {
  display: flex;
  gap: 12px;
  margin-bottom: 1rem;
  align-items: center;
}

.latest-project-card img {
  width: 70px;
  height: 70px;
  object-fit: cover;
  border-radius: 10px;
}

.latest-info h6 {
  font-size: 0.85rem;
  margin-bottom: 6px;
  color: #333;
}

.latest-info a {
  font-size: 0.75rem;
  padding: 4px 10px;
}

/* Mobile */
@media (max-width: 991px) {
  .latest-projects {
    position: static;
    margin-top: 2rem;
  }
}

</style>
@endsection

@section('content')

<div class="container project-wrapper">
  <div class="row g-4">

    <!-- ===== MAIN PROJECT ===== -->
    <div class="col-lg-8">
      <div class="project-card">

        <!-- Slider -->
        <div id="projectSlider" class="carousel slide project-slider" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach($project->images as $key => $image)
              <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/'.$image->image_path) }}" class="d-block w-100" alt="{{ $project->title }}">
              </div>
            @endforeach
          </div>

          @if($project->images->count() > 1)
          <button class="carousel-control-prev" type="button" data-bs-target="#projectSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#projectSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
          @endif
        </div>

        <!-- Content -->
        <div class="project-body">
          <h4 class="project-title">{{ $project->title }}</h4>
          <div class="project-description">
            {!! $project->description !!}
          </div>
        </div>

      </div>
    </div>

    <!-- ===== LATEST PROJECTS ASIDE ===== -->
    <div class="col-lg-4">
      <aside class="latest-projects">

        <h5 class="aside-title">Latest Projects</h5>

        @foreach($latestProjects as $item)
          <div class="latest-project-card">

            <img
              src="{{ $item->images->first()
                    ? asset('storage/'.$item->images->first()->image_path)
                    : asset('images/no-image.png') }}"
              alt="{{ $item->title }}">

            <div class="latest-info">
              <h6>{{ Str::limit($item->title, 45) }}</h6>
              <a href="{{ route('project.details', $item->slug) }}" class="btn btn-sm btn-outline-primary">
                View Project
              </a>
            </div>

          </div>
        @endforeach

      </aside>
    </div>

  </div>
</div>


@endsection