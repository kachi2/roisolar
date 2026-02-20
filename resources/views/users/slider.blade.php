<section class="slider">
    <div class="slick-carousel m-slides-0" 
      data-slick='{"slidesToShow": 1, "arrows": true,"autoplay": true, "dots": false, "speed": 3000,"fade": true,"cssEase": "linear"}'>
      
      @forelse($sliders as $slider)
      <div class="custom-slide">
        <div class="bg-img"> <img src="{{asset('images/sliders/'.$slider->image_path)}}" alt=""></div>
   
      </div><!-- /.slide-item -->
      @empty 
      @endforelse
    </div><!-- /.carousel -->
  </section><!-- /.slider -->


{{-- 
  <section class="custom-slider">
    <div class="custom-carousel"
         data-slick='{"slidesToShow": 1, "arrows": true,"autoplay": true, "dots": false, "speed": 3000,"fade": true,"cssEase": "linear"}'>
      
        @forelse($sliders as $slider)
        <div class="custom-slide"
             style="background-image: url('{{ asset('images/sliders/'.$slider->image_path) }}');">  </div>
        @empty 
        @endforelse

    </div>
</section> --}}