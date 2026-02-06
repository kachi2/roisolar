

<style>

.footer {
  background: #fff !important
  color: #333;
  font-family: 'Inter', sans-serif;
}

.footer a:hover {
  color: #fbbf24; /* yellow hover */
}

.footer .fa {
  transition: color 0.3s ease;
}

.footer .fa:hover {
  color: #fbbf24;
}

.footer .list-unstyled a {
  transition: color 0.3s ease;
}

.footer .list-unstyled a:hover {
  color: #000;
  text-decoration: underline;
}

@media (max-width: 768px) {
  .footer {
    text-align: center;
  }
  .footer .d-flex {
    justify-content: center;
  }
}



</style>

<footer class="footer bg-light pt-5 pb-3 mt-5 border-top">
  <div class="container">
    <div class="row gy-4">

      <!-- Logo & Contact Info -->
      <div class="col-12 col-md-4">
        <div class="footer-logo mb-3">
           <a href="{{route('dashboard')}}"><img src="{{asset('images/'.$settings->site_logo)}}"  alt=""  width="150px"/></a>
        </div>
        <p class="small mb-2"><i class="fa fa-headphones me-2 text-warning"></i> Got questions? Call us 24/7!</p>
        <p class="fw-semibold mb-3">{{$settings->site_phone}}</p>
        <h6 class="fw-bold mb-2">Contact Info</h6>
        <p class="small text-muted">
          {{$settings->address}}
        </p>
        <div class="d-flex gap-3 mt-3">
          <a href="#" class="text-dark"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-google"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-github"></i></a>
        </div>
      </div>




      <!-- Categories -->
      <div class="col-6 col-md-3">
        <h6 class="fw-bold mb-3">Categories</h6>
        <ul class="list-unstyled small">
          @foreach ($site_categories as $cat)
          <li {{ request('category') == $cat->id ? 'active' : '' }}>
            <a href="{{route('category.products',$cat->id)}}" {{ request()->category == $cat->id ? 'text-yellow' : '' }} class="text-decoration-none text-muted d-block mb-1">
              {{ $cat->name }}</a></li>
               @endforeach
         
        </ul>
      </div>


      <!-- Links -->
      <div class="col-6 col-md-2">
        <h6 class="fw-bold mb-3">Links</h6>
        <ul class="list-unstyled small">
        @forelse ($footer_menu as $menu )
          <li>
          @if($menu->name == 'Home')
          <a href="{{route('dashboard')}}" class="text-decoration-none text-muted d-block mb-1">{{$menu->name}}</a>
           @else <a href="{{route($menu->slug)}}" class="text-decoration-none text-muted d-block mb-1">{{$menu->name}}</a> @endif
          </li>
           @empty
           @endforelse












           


          <li><a href="{{ route('pages.terms') }}" class="text-decoration-none text-muted d-block mb-1">Terms & Conditions</a></li>
          <li><a href="" class="text-decoration-none text-muted d-block mb-1">Privacy</a></li>
          <li><a href="" class="text-decoration-none text-muted d-block mb-1">Cookies</a></li>
                
      </div>

      <!-- Contact Us -->
      <div class="col-12 col-md-3">
        <h6 class="fw-bold mb-3">Contact Us</h6>
        <p class="small mb-1 fw-semibold">Got questions? Call us 24/7!</p>
        <p class="small mb-1"><strong>Phone:</strong> {{$settings->site_phone}}</p>
        <p class="small mb-1"><strong>Email:</strong> {{$settings->site_email}}</p>
        <p class="small mb-0"><strong>Address:</strong><br>
         {{$settings->address}}
        </p>
      </div>

    </div>

    <hr class="my-4">

    <div class="text-center small text-muted">
      © <span class="fw-bold">{{$settings->site_copyright}}</span> - All rights reserved
    </div>
  </div>
</footer>




  @include('layouts.js')