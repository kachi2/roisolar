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