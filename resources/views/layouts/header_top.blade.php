{{-- <div class="header-topbar">
    <div class="container-fluid">
      <div class="row align-items-center">
        
        <div class="col-12">
          <div class="d-flex align-items-center justify-content-between">
            <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
              <li>
                <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: {{$settings->site_phone}}</a>
              </li>
              <li>
                <i class="icon-location"></i><a href="#">{{$settings->address}}</a>
              </li>
              <li>
                <i class="icon-clock"></i><a href="contact-us.html">{{$settings->opening_hours}}</a>
              </li>
            </ul><!-- /.contact__list -->
            <div class="d-flex">
              <ul class="social-icons list-unstyled mb-0 mr-30">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul><!-- /.social-icons -->
              <form class="header-topbar__search">
                <input type="text" class="form-control" placeholder="Search...">
                <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.header-top -->




 --}}

<style>
.top-announcement {
  background: #0a3d62;
  color: rgba(255,255,255,.9);
  font-size: .8rem;
  font-weight: 500;
  padding: 7px 0;
  overflow: hidden;
  position: relative;
  z-index: 1031;
}
.top-announcement-inner {
  display: flex;
  width: max-content;
  animation: topBarScroll 40s linear infinite;
}
.top-announcement-inner:hover { animation-play-state: paused; }
.top-announcement-item {
  white-space: nowrap;
  padding: 0 3rem;
  display: flex;
  align-items: center;
  gap: 8px;
}
.top-announcement-item i { color: #f39c12; font-size: .85rem; }
.top-announcement-item a {
  color: inherit;
  text-decoration: none;
  font-weight: 600;
}
.top-announcement-item a:hover { color: #f39c12; }
@keyframes topBarScroll {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
@media (prefers-reduced-motion: reduce) { .top-announcement-inner { animation: none; } }
</style>

<div class="top-announcement">
  <div class="top-announcement-inner">
    @foreach (array_fill(0, 2, null) as $_)
    <span class="top-announcement-item">
      <i class="fas fa-phone-alt"></i>
      <a href="tel:{{ $settings->site_phone }}">{{ $settings->site_phone }}</a>
    </span>
    <span class="top-announcement-item">
      <i class="fas fa-map-marker-alt"></i>
      <span>{{ $settings->address }}</span>
    </span>
    <span class="top-announcement-item">
      <i class="fas fa-truck"></i> Free Delivery on Qualifying Orders
    </span>
    <span class="top-announcement-item">
      {{-- <i class="fas fa-bolt"></i> {!! $announcment->content ?? 'Nigeria\'s #1 Solar Energy Store — Premium Panels &amp; Inverters' !!} --}}
      <i class="fas fa-bolt"></i> Nigerian's #1 Solar Energy Store — Premium Panels &amp; Inverters
    </span>
    <span class="top-announcement-item">
      <i class="fas fa-shield-alt"></i> 100% Secure Payments &amp; Expert Installation
    </span>
    @endforeach
  </div>
</div>

