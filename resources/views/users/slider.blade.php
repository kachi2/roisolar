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
             
                <h1 class="hero-h1">
                  {!! $slider->title
                      ? preg_replace('/\b(Solar|Energy|Clean|Power)\b/i', '<em>$0</em>', e($slider->title))
                      : '' !!}
                </h1>
                <p class="hero-p">
                  {{ $slider->content ?? '' }}
                </p>
                {{-- <div class="hero-actions">
                  <a href="{{ $slider->links ?? route('products.search') }}" class="btn-hero-primary">
                    Shop Now <i class="fas fa-arrow-right"></i>
                  </a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
@endif
      </div>
      @empty
     
      @endforelse

    </div>

    <div class="swiper-pagination hero-swiper-pagination"></div>
    <div class="swiper-button-prev hero-swiper-prev"></div>
    <div class="swiper-button-next hero-swiper-next"></div>
  </div>
</section>
</section>