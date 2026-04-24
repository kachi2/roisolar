<style>
/* ============================================================
   ROISOLAR FOOTER — 2025 DESIGN
   ============================================================ */
.roi-footer {
  background: linear-gradient(160deg, #0c4a6e 0%, #083756 100%);
  color: rgba(255,255,255,.75);
  font-family: 'Inter','Segoe UI',sans-serif;
  padding: 64px 0 0;
  margin-top: 60px;
  position: relative;
  overflow: hidden;
}

/* Background pattern */
.roi-footer::before {
  content: '';
  position: absolute;
  width: 500px; height: 500px;
  border-radius: 50%;
  border: 1.5px solid rgba(255,255,255,.04);
  bottom: -180px; right: -100px;
  pointer-events: none;
}
.roi-footer::after {
  content: '';
  position: absolute;
  width: 300px; height: 300px;
  border-radius: 50%;
  border: 1.5px solid rgba(255,255,255,.04);
  top: -80px; left: -80px;
  pointer-events: none;
}

/* ---- Columns ---- */
.footer-brand .footer-logo img { height: 44px; width: auto; filter: brightness(0) invert(1); }
.footer-brand .footer-tagline {
  font-size: 13px; color: rgba(255,255,255,.55);
  line-height: 1.6; margin: 14px 0 20px;
  max-width: 280px;
}

/* Phone strip */
.footer-phone-strip {
  display: flex; align-items: center; gap: 10px;
  background: rgba(255,255,255,.07);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 10px;
  padding: 12px 16px; margin-bottom: 20px;
  text-decoration: none;
  transition: background .2s;
}
.footer-phone-strip:hover { background: rgba(255,255,255,.12); }
.footer-phone-strip .ph-icon {
  width: 36px; height: 36px; border-radius: 50%;
  background: rgba(245,158,11,.2);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.footer-phone-strip .ph-icon i { color: #f59e0b; font-size: 14px; }
.footer-phone-strip .ph-label { font-size: 11px; color: rgba(255,255,255,.5); }
.footer-phone-strip .ph-num { font-size: 14.5px; font-weight: 700; color: #fff; line-height: 1.2; }

/* Social icons */
.footer-socials { display: flex; gap: 10px; }
.footer-socials a {
  width: 36px; height: 36px; border-radius: 8px;
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.1);
  display: flex; align-items: center; justify-content: center;
  color: rgba(255,255,255,.7);
  font-size: 14px; text-decoration: none;
  transition: all .25s;
}
.footer-socials a:hover { background: #f59e0b; border-color: #f59e0b; color: #fff; transform: translateY(-3px); }

/* Column headings */
.footer-col-title {
  font-size: 12px; font-weight: 800;
  text-transform: uppercase; letter-spacing: .1em;
  color: #fff; margin-bottom: 20px;
  display: flex; align-items: center; gap: 8px;
}
.footer-col-title::after {
  content: ''; flex: 1; height: 1.5px;
  background: linear-gradient(to right, rgba(245,158,11,.5), transparent);
  border-radius: 2px;
}

/* Links */
.footer-links { list-style: none; padding: 0; margin: 0; }
.footer-links li { margin-bottom: 2px; }
.footer-links li a {
  display: flex; align-items: center; gap: 8px;
  padding: 7px 0;
  font-size: 13.5px; color: rgba(255,255,255,.65);
  text-decoration: none;
  transition: color .2s, padding-left .2s;
  border-bottom: 1px solid rgba(255,255,255,.05);
}
.footer-links li:last-child a { border-bottom: none; }
.footer-links li a i { font-size: 9px; color: rgba(245,158,11,.7); flex-shrink: 0; }
.footer-links li a:hover { color: #fde68a; padding-left: 4px; }

/* Contact items */
.footer-contact-item {
  display: flex; gap: 12px; margin-bottom: 14px;
  align-items: flex-start;
}
.footer-contact-item .ci-icon {
  width: 32px; height: 32px; border-radius: 8px;
  background: rgba(255,255,255,.07);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; margin-top: 1px;
}
.footer-contact-item .ci-icon i { color: #f59e0b; font-size: 13px; }
.footer-contact-item .ci-text .ci-label { font-size: 11px; color: rgba(255,255,255,.45); font-weight: 600; text-transform: uppercase; letter-spacing: .06em; }
.footer-contact-item .ci-text .ci-val { font-size: 13.5px; color: rgba(255,255,255,.85); font-weight: 500; line-height: 1.4; }

/* Newsletter */
.footer-newsletter {
  background: rgba(255,255,255,.05);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 12px;
  padding: 18px;
  margin-top: 6px;
}
.footer-newsletter p { font-size: 12.5px; color: rgba(255,255,255,.55); margin-bottom: 12px; }
.footer-newsletter-form { display: flex; gap: 8px; }
.footer-newsletter-form input {
  flex: 1; padding: 10px 14px;
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.15);
  border-radius: 8px; color: #fff;
  font-size: 13px; outline: none;
  font-family: 'Inter', sans-serif;
  transition: border-color .2s;
}
.footer-newsletter-form input::placeholder { color: rgba(255,255,255,.35); }
.footer-newsletter-form input:focus { border-color: #f59e0b; }
.footer-newsletter-form button {
  padding: 10px 16px;
  background: #f59e0b; color: #fff;
  border: none; border-radius: 8px;
  font-size: 13px; font-weight: 700;
  cursor: pointer; white-space: nowrap;
  font-family: 'Inter', sans-serif;
  transition: background .2s, transform .2s;
}
.footer-newsletter-form button:hover { background: #d97706; transform: scale(1.03); }

/* Divider */
.footer-divider {
  border: none; border-top: 1px solid rgba(255,255,255,.08);
  margin: 48px 0 0;
}

/* Bottom bar */
.footer-bottom {
  padding: 18px 0;
  display: flex; align-items: center;
  justify-content: space-between; flex-wrap: wrap; gap: 12px;
}
.footer-copyright { font-size: 12.5px; color: rgba(255,255,255,.45); }
.footer-copyright strong { color: rgba(255,255,255,.7); }
.footer-bottom-links { display: flex; gap: 20px; }
.footer-bottom-links a {
  font-size: 12.5px; color: rgba(255,255,255,.45);
  text-decoration: none; transition: color .2s;
}
.footer-bottom-links a:hover { color: #fde68a; }

/* Trust badges */
.footer-trust {
  display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
  margin-top: 10px;
}
.trust-badge {
  display: flex; align-items: center; gap: 6px;
  font-size: 11.5px; color: rgba(255,255,255,.5);
  font-weight: 600;
}
.trust-badge i { color: #10b981; font-size: 13px; }

/* Responsive */
@media (max-width: 767px) {
  .roi-footer { padding: 40px 0 0; }
  .footer-bottom { flex-direction: column; align-items: center; text-align: center; }
  .footer-bottom-links { justify-content: center; }
}
</style>

<footer class="roi-footer">
  <div class="container">
    <div class="row gy-5">

      {{-- BRAND COLUMN --}}
      <div class="col-12 col-lg-4">
        <div class="footer-brand">
          <div class="footer-logo mb-4">
            <a href="{{ route('users.index') }}">
              <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ $settings->site_name ?? 'Roisolar' }}">
            </a>
          </div>
          <p class="footer-tagline">
            Nigeria's trusted solar energy partner. Premium solar panels, inverters, batteries, and complete energy solutions for homes and businesses.
          </p>
          <a href="tel:{{ $settings->site_phone }}" class="footer-phone-strip">
            <div class="ph-icon"><i class="fas fa-phone-alt"></i></div>
            <div>
              <div class="ph-label">Call us 24/7</div>
              <div class="ph-num">{{ $settings->site_phone }}</div>
            </div>
          </a>
          <div class="footer-socials">
            <a href="https://www.facebook.com/profile.php?id=61567981810199" title="Facebook" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/contactroisolar?igsh=YzljYTk1ODg3Zg==" title="Instagram" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com/Roisolar01" title="Twitter" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/@ROISOLAR-x3b" title="YouTube" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
            <a href="https://wa.me/{{ preg_replace('/\D/','',$settings->site_phone) }}" title="WhatsApp" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
      </div>

      {{-- CATEGORIES COLUMN --}}
      <div class="col-6 col-md-4 col-lg-2">
        <h6 class="footer-col-title">Categories</h6>
        <ul class="footer-links">
          @foreach ($site_categories as $cat)
            <li>
              <a href="{{ route('category.products', $cat->id) }}">
                <i class="fas fa-circle"></i> {{ $cat->name }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      {{-- QUICK LINKS COLUMN --}}
      <div class="col-6 col-md-4 col-lg-2">
        <h6 class="footer-col-title">Quick Links</h6>
        <ul class="footer-links">
          <li><a href="{{ route('users.index') }}"><i class="fas fa-circle"></i> Home</a></li>
          <li><a href="{{ route('users.products') }}"><i class="fas fa-circle"></i> All Products</a></li>
          <li><a href="{{ route('about-us') }}"><i class="fas fa-circle"></i> About Us</a></li>
          <li><a href="{{ route('contact-us') }}"><i class="fas fa-circle"></i> Contact Us</a></li>
          <li><a href="{{ route('pages.terms') }}"><i class="fas fa-circle"></i> Terms &amp; Conditions</a></li>
          <li><a href="{{ route('PrivacyPolicy') }}"><i class="fas fa-circle"></i> Privacy Policy</a></li>
          @forelse ($footer_menu as $menu)
            @if(!in_array($menu->name, ['Home','About Us','Contact Us','Products']))
              <li>
                @if($menu->name == 'Home')
                  <a href="{{ route('dashboard') }}"><i class="fas fa-circle"></i> {{ $menu->name }}</a>
                @else
                  <a href="{{ route($menu->slug) }}"><i class="fas fa-circle"></i> {{ $menu->name }}</a>
                @endif
              </li>
            @endif
          @empty
          @endforelse
        </ul>
      </div>

      {{-- CONTACT COLUMN --}}
      <div class="col-12 col-md-4 col-lg-4">
        <h6 class="footer-col-title">Contact Us</h6>
        <div class="footer-contact-item">
          <div class="ci-icon"><i class="fas fa-phone-alt"></i></div>
          <div class="ci-text">
            <div class="ci-label">Phone</div>
            <div class="ci-val">{{ $settings->site_phone }}</div>
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="ci-icon"><i class="fas fa-envelope"></i></div>
          <div class="ci-text">
            <div class="ci-label">Email</div>
            <div class="ci-val">{{ $settings->site_email }}</div>
          </div>
        </div>
        <div class="footer-contact-item">
          <div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div class="ci-text">
            <div class="ci-label">Address</div>
            <div class="ci-val">{{ $settings->address }}</div>
          </div>
        </div>

        {{-- Newsletter --}}
        <div class="footer-newsletter">
          <h6 class="footer-col-title mb-2" style="font-size:11px;">Newsletter</h6>
          <p>Get solar tips &amp; exclusive deals in your inbox.</p>
          <form class="footer-newsletter-form" onsubmit="event.preventDefault();">
            <input type="email" placeholder="your@email.com">
            <button type="submit"><i class="fas fa-paper-plane"></i></button>
          </form>
        </div>
      </div>

    </div>{{-- /row --}}

    {{-- Trust badges --}}
    <div class="footer-trust mt-4">
      <div class="trust-badge"><i class="fas fa-shield-alt"></i> Verified Seller</div>
      <div class="trust-badge"><i class="fas fa-truck"></i> Fast Delivery</div>
      <div class="trust-badge"><i class="fas fa-headset"></i> 24/7 Support</div>
      <div class="trust-badge"><i class="fas fa-undo"></i> Easy Returns</div>
      <div class="trust-badge"><i class="fas fa-lock"></i> Secure Payments</div>
    </div>

    <hr class="footer-divider">

    <div class="footer-bottom">
      <p class="footer-copyright">
        &copy; {{ date('Y') }} <strong>{{ $settings->site_copyright }}</strong> &mdash; All rights reserved.
      </p>
      <div class="footer-bottom-links">
        <a href="{{ route('pages.terms') }}">Terms</a>
        <a href="{{ route('PrivacyPolicy') }}">Privacy</a>
        <a href="{{ route('contact-us') }}">Contact</a>
      </div>
    </div>

  </div>{{-- /container --}}
</footer>

  @include('layouts.js')
