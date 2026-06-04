{{-- ===== HERO SLIDER ===== --}}
<section class="hero-section" style="padding:0!important;margin:0!important;padding-top:24px!important">
  <div class="swiper heroSwiper">
    <div class="swiper-wrapper">

      @forelse($sliders as $slider)
      <div class="swiper-slide">
@php
    $ext = strtolower(pathinfo($slider->image_path, PATHINFO_EXTENSION));
@endphp

@if(in_array($ext, ['mp4','mov','avi','wmv','mkv']))
   <video autoplay muted loop playsinline class="hero-slide w-100">
    <source src="{{ asset('images/sliders/'.$slider->image_path) }}">
</video>
    @else
        <div class="hero-slide"
             style="background-image: url('{{ asset('images/sliders/'.$slider->image_path) }}');">
             
          <div class="hero-content">
            <div class="container">
              <div class="hero-inner">
                <span class="hero-tag">
                  <i class="fas fa-sun"></i> Nigeria's #1 Solar Energy Store
                </span>
                <h1 class="hero-h1">
                  {!! $slider->title
                      ? preg_replace('/\b(Solar|Energy|Clean|Power)\b/i', '<em>$0</em>', e($slider->title))
                      : 'Power Your World with <em>Clean Solar</em> Energy' !!}
                </h1>
                <p class="hero-p">
                  {{ $slider->content ?? 'Premium solar panels, inverters & batteries — delivered to every state in Nigeria.' }}
                </p>
                <div class="hero-actions">
                  <a href="{{ $slider->links ?? route('products.search') }}" class="btn-hero-primary">
                    Shop Now <i class="fas fa-arrow-right"></i>
                  </a>
                  <a href="{{ route('about-us') }}" class="btn-hero-ghost">
                    Learn More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
@endif
      </div>
      @empty
      <div class="swiper-slide">
        <div class="hero-slide" style="background: linear-gradient(135deg,#0c4a6e,#0369a1);">
          <div class="hero-content">
            <div class="container">
              <div class="hero-inner">
                <span class="hero-tag"><i class="fas fa-sun"></i> Clean Energy Solutions</span>
                <h1 class="hero-h1">Power Your World with <em>Solar Energy</em></h1>
                <p class="hero-p">Premium panels, inverters &amp; batteries — delivered nationwide.</p>
                <div class="hero-actions">
                  <a href="{{ route('products.search') }}" class="btn-hero-primary">Shop Now <i class="fas fa-arrow-right"></i></a>
                  <a href="{{ route('about-us') }}" class="btn-hero-ghost">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforelse

    </div>

    <div class="swiper-pagination hero-swiper-pagination"></div>
    <div class="swiper-button-prev hero-swiper-prev"></div>
    <div class="swiper-button-next hero-swiper-next"></div>
  </div>
</section>
</section>