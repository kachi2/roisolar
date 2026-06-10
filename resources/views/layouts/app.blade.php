<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
{{-- <title>@if(isset($breadcrum)){{$breadcrum}} @else {{$settings->site_name}} @endif </title> --}}
<!-- Stylesheets -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;family=Roboto:wght@400;700&amp;display=swap">
{{-- Font Awesome v5 removed — v6.6.0 already loaded above --}}
<!-- Bootstrap 5 scripts (deferred — non-render-blocking) -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="{{asset('/frontend/css/libraries.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

<link rel="shortcut icon" href="{{asset('images/'.$settings->fav)}}" type="image/x-icon">

{{-- Bootstrap Icons duplicate removed — already loaded above --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script defer src="https://js.paystack.co/v1/inline.js"></script>

@yield('styles')

</head>
<body>
    <div class="wrapper">
      {{-- <div class="preloader">
        <div class="loading"><span></span><span></span><span></span><span></span></div>
      </div><!-- /.preloader --> --}}
      @include('layouts.header_top')
   @include('layouts.header')
    @yield('content')

<!--== Start Footer Area Wrapper ==-->
@include('layouts.footer')
<!-- End Off Canvas Menu Wrapper -->
@yield('script')


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

  const swiper = new Swiper(".recentSwiper", {
      slidesPerView: 4,
      spaceBetween: 20,
      loop: true,
      speed: 800,

      autoplay: {
          delay: 3000,
          disableOnInteraction: false,
      },

      breakpoints: {
          0: {
              slidesPerView: 2,
          },
          992: {
              slidesPerView: 4,
          }
      }
  });

});
</script>

<script>
                // var url = 'https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?55031';
                // var s = document.createElement('script');
                // s.type = 'text/javascript';
                // s.async = true;
                // s.src = url;
                // var options = {
                // "enabled":true,
                // "chatButtonSetting":{
                //     "backgroundColor":"#00e785",
                //     "ctaText":"Chat with us",
                //     "borderRadius":"25",
                //     "marginLeft": "0",
                //     "marginRight": "20",
                //     "marginBottom": "20",
                //     "ctaIconWATI":true,
                //     "position":"right"
                // },
                // "brandSetting":{
                //     "brandName":"Roisolar",
                //     "brandSubTitle":"undefined",
                //     "brandImg":"https://www.wati.io/wp-content/uploads/2023/04/Wati-logo.svg",
                //     "welcomeText":"Hi there!\nHow can I help you?",
                    
                //     "backgroundColor":"#00e785",
                //     "ctaText":"Chat with us",
                //     "borderRadius":"25",
                //     "autoShow":true,
                //     "phoneNumber":"2347051000600"
                // }
                // };
                // s.onload = function() {
                //     CreateWhatsappChatWidget(options);
                // };
                // var x = document.getElementsByTagName('script')[0];
                // x.parentNode.insertBefore(s, x);
            </script>
</body>
</html>