<style>
/* ====================================================
   ROISOLAR 2025 — PREMIUM NAVBAR
   ==================================================== */
:root {
  --nav-bg:      #ffffff;
  --nav-primary: #0c4a6e;
  --nav-pl:      #0369a1;
  --nav-accent:  #f59e0b;
  --nav-ink:     #0f172a;
  --nav-muted:   #64748b;
  --nav-line:    #e2e8f0;
  --nav-surface: #f8fafc;
  --nav-h:       68px;
  --nav-ease:    cubic-bezier(.4,0,.2,1);
  --nav-dur:     .22s;
}

.site-header {
  position: sticky;
  top: 0;
  z-index: 1030;
  background: var(--nav-bg);
  border-bottom: 1px solid var(--nav-line);
  box-shadow: 0 2px 12px rgba(0,0,0,.06);
}

.navbar-main {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: var(--nav-h);
  gap: 16px;
}

/* ---- Logo ---- */
.nav-logo img {
  height: 44px;
  width: auto;
  object-fit: contain;
}

/* ---- Search bar ---- */
.nav-search {
  flex: 1;
  max-width: 460px;
}
.nav-search form {
  display: flex;
  align-items: center;
  background: #f1f5f9;
  border-radius: 8px;
  border: 1px solid var(--nav-line);
  overflow: hidden;
  transition: border-color var(--nav-dur) var(--nav-ease), box-shadow var(--nav-dur) var(--nav-ease);
}
.nav-search form:focus-within {
  border-color: var(--nav-primary);
  box-shadow: 0 0 0 3px rgba(10,61,98,.1);
}
.nav-search input {
  flex: 1;
  border: none;
  background: transparent;
  padding: 10px 14px;
  font-size: .88rem;
  color: var(--nav-ink);
  outline: none;
}
.nav-search input::placeholder { color: #94a3b8; }
.nav-search button {
  padding: 10px 16px;
  background: var(--nav-primary);
  color: #fff;
  border: none;
  font-size: .85rem;
  font-weight: 600;
  cursor: pointer;
  transition: background var(--nav-dur) var(--nav-ease);
  white-space: nowrap;
}
.nav-search button:hover { background: #082d4a; }

/* ---- Action icons ---- */
.nav-actions {
  display: flex;
  align-items: center;
  gap: 6px;
}
.nav-action-btn {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 8px 10px;
  border-radius: 8px;
  text-decoration: none;
  color: var(--nav-ink);
  font-size: .72rem;
  font-weight: 600;
  line-height: 1.3;
  transition: all var(--nav-dur) var(--nav-ease);
  white-space: nowrap;
  border: 1px solid transparent;
  gap: 2px;
  min-width: 56px;
}
.nav-action-btn i { font-size: 20px; color: var(--nav-primary); }
.nav-action-btn:hover {
  background: #f1f5f9;
  color: var(--nav-primary);
  border-color: var(--nav-line);
}
.nav-action-badge {
  position: absolute;
  top: 4px;
  right: 4px;
  min-width: 18px;
  height: 18px;
  padding: 0 4px;
  background: var(--nav-accent);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  border-radius: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
}

.nav-divider {
  width: 1px;
  height: 32px;
  background: var(--nav-line);
  margin: 0 4px;
}

/* ---- Bottom nav menu ---- */
.nav-menu-bar {
  background: var(--nav-primary);
  border-top: 1px solid rgba(255,255,255,.08);
}
.nav-menu-bar .container {
  display: flex;
  align-items: center;
  gap: 0;
}
.nav-menu-link {
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 10px 18px;
  color: rgba(255,255,255,.88);
  font-size: .85rem;
  font-weight: 500;
  text-decoration: none;
  transition: all var(--nav-dur) var(--nav-ease);
  position: relative;
  white-space: nowrap;
}
.nav-menu-link:hover, .nav-menu-link.active {
  color: #fff;
  background: rgba(255,255,255,.1);
}
.nav-menu-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  right: 50%;
  height: 2px;
  background: var(--nav-accent);
  transition: left var(--nav-dur) var(--nav-ease), right var(--nav-dur) var(--nav-ease);
}
.nav-menu-link:hover::after, .nav-menu-link.active::after {
  left: 0;
  right: 0;
}

/* ---- Mega/dropdown for dynamic menu ---- */
.nav-has-dropdown { position: relative; }
.nav-has-dropdown .nav-dropdown {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  min-width: 200px;
  background: #fff;
  border-radius: 0 0 10px 10px;
  box-shadow: 0 12px 32px rgba(0,0,0,.12);
  padding: 8px 0;
  z-index: 200;
  border-top: 3px solid var(--nav-accent);
}
.nav-has-dropdown:hover .nav-dropdown { display: block; }
.nav-dropdown a {
  display: block;
  padding: 9px 18px;
  color: var(--nav-ink);
  font-size: .85rem;
  font-weight: 500;
  text-decoration: none;
  transition: background var(--nav-dur) var(--nav-ease), color var(--nav-dur) var(--nav-ease);
}
.nav-dropdown a:hover { background: #f1f5f9; color: var(--nav-primary); }

/* ---- Phone strip ---- */
.nav-phone-strip {
  font-size: .8rem;
  font-weight: 600;
  color: rgba(255,255,255,.75);
  margin-left: auto;
  display: flex;
  align-items: center;
  gap: 6px;
  padding-left: 18px;
}
.nav-phone-strip i { color: var(--nav-accent); }

/* ---- Hamburger (mobile) ---- */
.nav-toggler {
  display: none;
  flex-direction: column;
  gap: 5px;
  padding: 8px;
  background: none;
  border: none;
  cursor: pointer;
}
.nav-toggler span {
  display: block;
  width: 24px;
  height: 2px;
  background: var(--nav-primary);
  border-radius: 2px;
  transition: all .3s ease;
}

/* ---- Mobile drawer ---- */
.nav-mobile-drawer {
  display: none;
  position: fixed;
  inset: 0;
  z-index: 2000;
}
.nav-mobile-drawer.open { display: flex; }
.nav-mobile-backdrop {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.5);
}
.nav-mobile-panel {
  position: relative;
  width: 300px;
  height: 100%;
  background: #fff;
  overflow-y: auto;
  padding: 24px 0 40px;
  box-shadow: 4px 0 20px rgba(0,0,0,.15);
}
.nav-mobile-close {
  position: absolute;
  top: 14px;
  right: 16px;
  background: none;
  border: none;
  font-size: 22px;
  color: var(--nav-muted);
  cursor: pointer;
}
.nav-mobile-logo {
  padding: 0 20px 20px;
  border-bottom: 1px solid var(--nav-line);
}
.nav-mobile-logo img { height: 38px; }
.nav-mobile-link {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 13px 20px;
  color: var(--nav-ink);
  font-size: .92rem;
  font-weight: 500;
  text-decoration: none;
  border-bottom: 1px solid #f8fafc;
  transition: background var(--nav-dur) var(--nav-ease);
}
.nav-mobile-link:hover { background: #f8fafc; color: var(--nav-primary); }
.nav-mobile-link i { color: var(--nav-primary); font-size: 18px; width: 22px; text-align: center; }

.nav-mobile-actions {
  display: flex;
  gap: 10px;
  padding: 18px 20px 0;
  flex-wrap: wrap;
}
.nav-mobile-action-btn {
  flex: 1;
  text-align: center;
  padding: 10px;
  border-radius: 8px;
  font-size: .83rem;
  font-weight: 600;
  text-decoration: none;
}
.nav-mobile-action-btn.primary {
  background: var(--nav-primary);
  color: #fff;
}
.nav-mobile-action-btn.outline {
  background: transparent;
  color: var(--nav-primary);
  border: 1px solid var(--nav-primary);
}

/* ---- Responsive ---- */
@media (max-width: 991px) {
  .nav-search    { display: none; }
  .nav-menu-bar  { display: none; }
  .nav-toggler   { display: flex; }
  .nav-phone-strip { display: none; }
  .nav-action-btn span { display: none; }
  .nav-action-btn { min-width: 0; padding: 8px; }
}
@media (max-width: 576px) {
  :root { --nav-h: 60px; }
  .nav-logo img { height: 36px; }
}
</style>

{{-- ===== SITE HEADER ===== --}}
<header class="site-header">

  {{-- Top navbar --}}
  <div class="container">
    <div class="navbar-main">

      {{-- Logo --}}
      <a class="nav-logo" href="{{ route('users.index') }}">
        <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
      </a>

      {{-- Search --}}
      <div class="nav-search">
        <form action="{{ route('products.search') }}" method="get">
          <input name="q" type="text" value="{{ old('q') }}" placeholder="Search solar panels, inverters, batteries…">
          <button type="submit"><i class="fas fa-search"></i> Search</button>
        </form>
      </div>

      {{-- Actions --}}
      <div class="nav-actions">

        @guest
        <a href="{{ route('login') }}" class="nav-action-btn">
          <i class="icon-user"></i>
          <span>Login</span>
        </a>
        @else
        <a href="{{ route('users.account.index') }}" class="nav-action-btn dropdown-toggle" data-bs-toggle="dropdown">
          <i class="icon-user"></i>
          <span>{{ Str::ucfirst(Auth::user()->first_name) }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="{{ route('users.account.index') }}"><i class="fas fa-user me-2"></i>My Account</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
            </form>
          </li>
        </ul>
        @endguest

        <div class="nav-divider d-none d-lg-block"></div>

        <a href="{{ route('carts.index') }}" class="nav-action-btn">
          <i class="icon-cart"></i>
          <span>Cart</span>
          @php $cartCount = collect(session('cart', []))->sum('quantity'); @endphp
          <span class="nav-action-badge cartReload">{{ $cartCount }}</span>
        </a>

        {{-- Hamburger (mobile) --}}
        <button class="nav-toggler ms-2" id="navToggler" aria-label="Open menu">
          <span></span><span></span><span></span>
        </button>

      </div>{{-- /nav-actions --}}
    </div>{{-- /navbar-main --}}
  </div>

  {{-- Bottom menu bar (desktop) --}}
  <div class="nav-menu-bar">
    <div class="container">

      <a href="{{ route('users.index') }}" class="nav-menu-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <i class="fas fa-home" style="font-size:13px"></i> Home
      </a>
      <a href="{{ route('users.products') }}" class="nav-menu-link {{ request()->routeIs('users.products','product.details','category.products') ? 'active' : '' }}">
        <i class="" style="font-size:13px"></i> 
        Products
      </a>
      <a href="{{ route('users.services') }}" class="nav-menu-link {{ request()->routeIs('users.services','service.details') ? 'active' : '' }}">
        {{-- <i class="fas fa-tools" style="font-size:13px"></i> --}}
         Services
      </a>
      <a href="{{ route('users.project') }}" class="nav-menu-link {{ request()->routeIs('users.project','project.details') ? 'active' : '' }}">
        {{-- <i class="fas fa-project-diagram" style="font-size:13px"></i> --}}
         Projects
      </a>
      <a href="{{ route('users.package') }}" class="nav-menu-link {{ request()->routeIs('users.package','package.details') ? 'active' : '' }}">
        {{-- <i class="fas fa-box-open" style="font-size:13px"></i> --}}
         Packages
      </a>
      <a href="{{ route('about-us') }}" class="nav-menu-link {{ request()->routeIs('about-us') ? 'active' : '' }}">
        {{-- <i class="fas fa-info-circle" style="font-size:13px"></i> --}}
         About
      </a>
      <a href="{{ route('users.blogs') }}" class="nav-menu-link {{ request()->routeIs('users.blogs','blog.details') ? 'active' : '' }}">
        {{-- <i class="fas fa-newspaper" style="font-size:13px"></i> --}}
         Blog
      </a>
      {{-- <a href="{{ route('faq.index') }}" class="nav-menu-link {{ request()->routeIs('faq.index') ? 'active' : '' }}">
        <i class="fas fa-question-circle" style="font-size:13px"></i> FAQ
      </a> --}}
      <a href="{{ route('contact-us') }}" class="nav-menu-link {{ request()->routeIs('contact-us') ? 'active' : '' }}">
        {{-- <i class="fas fa-envelope" style="font-size:13px"></i>  --}}
        Contact
      </a>

      <span class="nav-phone-strip">
        <i class="fas fa-phone-alt"></i> {{ $settings->site_phone }}
      </span>

    </div>
  </div>

</header>

{{-- ===== MOBILE DRAWER ===== --}}
<div class="nav-mobile-drawer" id="navDrawer">
  <div class="nav-mobile-backdrop" id="navBackdrop"></div>
  <div class="nav-mobile-panel">
    <button class="nav-mobile-close" id="navClose">&#x2715;</button>
    <div class="nav-mobile-logo">
      <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name }}">
    </div>

    <a href="{{ route('users.index') }}" class="nav-mobile-link"><i class="fas fa-home"></i> Home</a>
    <a href="{{ route('users.products') }}" class="nav-mobile-link"><i class="fas fa-solar-panel"></i> Products</a>
    <a href="{{ route('users.services') }}" class="nav-mobile-link"><i class="fas fa-tools"></i> Services</a>
    <a href="{{ route('users.project') }}" class="nav-mobile-link"><i class="fas fa-project-diagram"></i> Projects</a>
    <a href="{{ route('users.package') }}" class="nav-mobile-link"><i class="fas fa-box-open"></i> Packages</a>
    <a href="{{ route('about-us') }}" class="nav-mobile-link"><i class="fas fa-info-circle"></i> About Us</a>
    <a href="{{ route('users.blogs') }}" class="nav-mobile-link"><i class="fas fa-newspaper"></i> Blog</a>
    <a href="{{ route('faq.index') }}" class="nav-mobile-link"><i class="fas fa-question-circle"></i> FAQ</a>
    <a href="{{ route('contact-us') }}" class="nav-mobile-link"><i class="fas fa-envelope"></i> Contact Us</a>
    <a href="{{ route('carts.index') }}" class="nav-mobile-link">
      <i class="icon-cart"></i> Cart
      @php $cartCountM = collect(session('cart', []))->sum('quantity'); @endphp
      @if($cartCountM > 0)<span class="badge ms-auto" style="background:var(--nav-accent)">{{ $cartCountM }}</span>@endif
    </a>

    <div class="nav-mobile-actions">
      @guest
      <a href="{{ route('login') }}" class="nav-mobile-action-btn primary">Login</a>
      <a href="{{ route('register') }}" class="nav-mobile-action-btn outline">Register</a>
      @else
      <a href="{{ route('users.account.index') }}" class="nav-mobile-action-btn primary">My Account</a>
      <form method="POST" action="{{ route('logout') }}" style="flex:1">
        @csrf
        <button type="submit" class="nav-mobile-action-btn outline w-100">Logout</button>
      </form>
      @endguest
    </div>

    <div style="padding:18px 20px 0; font-size:.82rem; color:var(--nav-muted)">
      <i class="fas fa-phone-alt" style="color:var(--nav-accent)"></i>
      &nbsp;{{ $settings->site_phone }}
    </div>
  </div>
</div>

<script>
(function () {
  const toggler  = document.getElementById('navToggler');
  const drawer   = document.getElementById('navDrawer');
  const backdrop = document.getElementById('navBackdrop');
  const closeBtn = document.getElementById('navClose');
  function openDrawer()  { drawer.classList.add('open'); document.body.style.overflow = 'hidden'; }
  function closeDrawer() { drawer.classList.remove('open'); document.body.style.overflow = ''; }
  if (toggler)  toggler.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (backdrop) backdrop.addEventListener('click', closeDrawer);
})();
</script>

