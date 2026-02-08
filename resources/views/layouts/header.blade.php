
<style>
<!-- .cart-count {
    position: absolute;
    top: -4px;
    right: -1px;
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 50%;
    font-weight: bold;
    min-width: 18px;
    text-align: center;
} -->

 @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
 

  <!-- .cart-icon {
    position: relative;
    display: inline-block;
  }

  .cart-icon i {
    transition: all 0.3s ease;
  }

  .cart-icon:hover i {
    color: #0d6efd;
    transform: scale(1.1);
  }

  .cart-badge {
    top: 0;
    right: -9px;
    font-size: 10px;
    padding: 3px 6px;
  } -->

  .cart-wrappers {
    margin-left: 20px;
}

.cart-link {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    background: #f8fafc;
    border-radius: 50%;
    color: #0f172a;
    text-decoration: none;
    transition: all 0.25s ease;
}

.cart-link i {
    font-size: 20px;
}

/* Hover effect */
.cart-link:hover {
    background: #0f172a;
    color: #ffffff;
}

/* Badge */
.cart-badge {
    position: absolute;
    top: -6px;
    right: -6px;
    min-width: 18px;
    height: 18px;
    padding: 0 5px;
    background: #f97316; /* Jumia-like orange */
    color: #ffffff;
    font-size: 11px;
    font-weight: 600;
    border-radius: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

/* Mobile adjustments */
@media (max-width: 768px) {
    .cart-link {
        width: 38px;
        height: 38px;
    }

    .cart-link i {
        font-size: 18px;
    }
}

</style>
<header class="header header-layout2">
    <nav class="navbar navbar-expand-lg sticky-navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('dashboard')}}">
          {{-- <img src="" class="logo-light" alt="logo"> --}}
          <img src="{{asset('images/'.$settings->site_logo)}}" class="logo-dark" width="120px" alt="logo">
          {{-- <a href="{{route('index')}}"><img src="{{asset('assets/'.$settings->logo)}}" alt="{{$settings->site_name}}" class="logo-dark" width="120px"></a> --}}
        </a>
        <button class="navbar-toggler" type="button">
          <span class="menu-lines"><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavigation">
          
          <ul class="navbar-nav ml-auto">

            <a class="navbar-brand d-lg-none" href="{{ route('dashboard') }}">
    <img src="{{ asset('images/'.$settings->site_logo) }}"
         class="logo-dark"
         width="120"
         alt="logo">
</a>


            @forelse ($site_menu as $menu)
            @if($menu->has_child)
            <li class="nav__item has-dropdown">
              <a href="{{route($menu->slug)}}" data-toggle="dropdown" class="dropdown-toggle nav__item-link">{{$menu->name}}</a>
              @if(count($menu->subMenu) > 0)
              <ul class="dropdown-menu">
                @forelse ($menu->subMenu as $sub) 
                <li class="nav__item">
                  <a href="{{route($sub->slug, $sub->hashid)}}" class="nav__item-link">{{$sub->name}}</a>
                </li>
                @empty
                
                @endforelse
                
              </ul>
              @endif
            </li><!-- /.nav-item -->
            @else 
            <li class="nav__item"> <a class="nav__item-link" href="{{route($menu->slug)}}">{{$menu->name}}</a>@endif
            @empty 
            <p> menu is empty </p>
            @endforelse

@guest
             <li class="nav__item"> 
<a href="" class=" btn-sm nav-link dropdown-toggle nav__item-link" role="button" data-bs-toggle="dropdown">
              <i class="icon-user"></i>
              <span>Get Started</span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
          </ul>
             </li>
          @else
          <li class="nav__item"> 
          <a class="nav-link dropdown-toggle nav__item-link " href="#" role="button" data-bs-toggle="dropdown">
            <i class="icon-user"></i>
            {{ Auth::user()->first_name }}
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('users.account.index') }}">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
          </li>
        </ul>
          @endguest


          </ul><!-- /.navbar-nav -->
          <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
        </div><!-- /.navbar-collapse -->


    
        {{-- <div class="d-none d-xl-flex align-items-center position-relative ml-30">
          
          @guest
              
         
            <a href="" class=" btn-sm nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
              <i class="icon-user"></i>
              <span>Get Started</span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
          </ul>
          @else
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="icon-user"></i>
            {{ Auth::user()->first_name }}
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('users.account.index') }}">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
          @endguest

          </div> --}}



<div class="cart-wrappers d-none d-lg-flex align-items-center position-relative">
    <a href="{{ route('carts.index') }}" class="cart-link">
        <i class="icon-cart"></i>

        @php
            $cartCount = collect(session('cart', []))->sum('quantity');
        @endphp

        <span class="cart-badge">
            {{ $cartCount > 0 ? $cartCount : 0 }}
        </span>
    </a>
</div>



        {{-- <button class="action__btn-search ml-30"><i class="fa fa-search"></i></button> --}}
      </div><!-- /.container -->
    </nav><!-- /.navabr -->
  </header><!-- /.Header -->



