@extends('layouts.app')

@section('title')
<title>About Us — {{ config('app.name') }}</title>
@endsection

@section('head')
<link rel="canonical" href="{{ url()->current() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@endsection

@section('styles')
<style>
/* ============================================================
   ABOUT US PAGE — ROISOLAR 2025 PREMIUM DESIGN
   ============================================================ */
*, *::before, *::after { box-sizing: border-box; }

:root {
  --ink:       #0f172a;
  --ink-soft:  #334155;
  --muted:     #64748b;
  --line:      #e2e8f0;
  --surface:   #f8fafc;
  --white:     #ffffff;
  --primary:   #0c4a6e;
  --primary-l: #0369a1;
  --accent:    #f59e0b;
  --accent-l:  #fbbf24;
  --green:     #10b981;
  --r:         14px;
  --r-sm:      8px;
  --r-lg:      24px;
  --shadow-xs: 0 1px 3px rgba(0,0,0,.06);
  --shadow-sm: 0 4px 12px rgba(0,0,0,.07);
  --shadow-md: 0 12px 36px rgba(0,0,0,.12);
  --shadow-lg: 0 24px 64px rgba(0,0,0,.16);
  --ease:      cubic-bezier(.4,0,.2,1);
  --dur:       .25s;
}

body { font-family: 'Inter', 'Segoe UI', sans-serif !important; }

/* Override global section padding */
.about-hero-section,
.about-content-section { padding: 0 !important; margin: 0 !important; }

/* ---- HERO BANNER ---- */
.about-hero {
  background: linear-gradient(120deg, #0c4a6e 0%, #0369a1 55%, #0284c7 100%);
  padding: 52px 0 48px;
  position: relative;
  overflow: hidden;
}
.about-hero::before {
  content: '';
  position: absolute;
  width: 560px; height: 560px;
  border-radius: 50%;
  border: 1.5px solid rgba(255,255,255,.08);
  top: -160px; right: -120px;
}
.about-hero::after {
  content: '';
  position: absolute;
  width: 320px; height: 320px;
  border-radius: 50%;
  background: rgba(245,158,11,.08);
  bottom: -80px; left: -60px;
}
.about-hero-inner { position: relative; z-index: 1; }
.about-hero-tag {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(245,158,11,.15);
  border: 1px solid rgba(245,158,11,.35);
  color: #fde68a;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 6px 16px;
  border-radius: 50px;
  margin-bottom: 18px;
}
.about-hero h1 {
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 900;
  color: #fff;
  letter-spacing: -.03em;
  line-height: 1.15;
  margin-bottom: 16px;
}
.about-hero h1 span {
  background: linear-gradient(90deg, #fde68a, #f59e0b);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.about-hero p {
  font-size: 1rem;
  color: rgba(255,255,255,.75);
  line-height: 1.7;
  max-width: 560px;
  margin-bottom: 28px;
}
.about-breadcrumb {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  color: rgba(255,255,255,.55);
  list-style: none;
  padding: 0; margin: 0;
  flex-wrap: wrap;
}
.about-breadcrumb a { color: rgba(255,255,255,.7); text-decoration: none; transition: color .2s; }
.about-breadcrumb a:hover { color: #fde68a; }
.about-breadcrumb .sep { font-size: 9px; opacity: .5; }
.about-breadcrumb .current { color: #fde68a; font-weight: 600; }

/* ---- STATS STRIP ---- */
.stats-strip {
  background: var(--white);
  border-bottom: 1px solid var(--line);
}
.stats-strip-inner {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  divide-x: var(--line);
}
.stat-item {
  padding: 28px 24px;
  text-align: center;
  border-right: 1px solid var(--line);
}
.stat-item:last-child { border-right: none; }
.stat-num {
  font-size: 2rem;
  font-weight: 900;
  color: var(--primary);
  letter-spacing: -.03em;
  line-height: 1;
  margin-bottom: 6px;
}
.stat-num span { color: var(--accent); }
.stat-label {
  font-size: 12.5px;
  color: var(--muted);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .06em;
}

/* ---- MAIN CONTENT SECTION ---- */
.about-main-section {
  padding: 72px 0;
  background: var(--surface);
}
.about-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
.about-text-col .section-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(12,74,110,.08);
  color: var(--primary);
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 5px 14px;
  border-radius: 50px;
  margin-bottom: 16px;
}
.about-text-col h2 {
  font-size: clamp(1.5rem, 2.5vw, 2rem);
  font-weight: 800;
  color: var(--ink);
  letter-spacing: -.025em;
  line-height: 1.2;
  margin-bottom: 20px;
}
.about-text-col h2 em {
  font-style: normal;
  color: var(--primary-l);
}
.about-text-col .about-body {
  font-size: 15px;
  color: var(--ink-soft);
  line-height: 1.75;
  margin-bottom: 28px;
}
.about-checks {
  list-style: none;
  padding: 0; margin: 0 0 32px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.about-checks li {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 14px;
  color: var(--ink-soft);
  font-weight: 500;
}
.about-checks li i {
  width: 22px; height: 22px;
  background: rgba(16,185,129,.12);
  color: var(--green);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 10px;
  flex-shrink: 0;
}
.btn-about-cta {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 13px 28px;
  background: var(--primary);
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  border-radius: var(--r-sm);
  text-decoration: none;
  box-shadow: 0 4px 16px rgba(12,74,110,.3);
  transition: all var(--dur) var(--ease);
}
.btn-about-cta:hover {
  background: var(--primary-l);
  color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(12,74,110,.4);
}

/* About image side */
.about-img-col { position: relative; }
.about-img-main {
  width: 100%;
  border-radius: var(--r-lg);
  box-shadow: var(--shadow-lg);
  object-fit: cover;
  aspect-ratio: 4/3;
}
.about-img-badge {
  position: absolute;
  bottom: -20px;
  left: -20px;
  background: var(--white);
  border-radius: var(--r);
  padding: 18px 22px;
  box-shadow: var(--shadow-md);
  display: flex;
  align-items: center;
  gap: 14px;
  min-width: 200px;
  border: 1px solid var(--line);
}
.about-img-badge .badge-icon {
  width: 44px; height: 44px;
  background: linear-gradient(135deg, var(--accent), #d97706);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 20px;
  flex-shrink: 0;
}
.about-img-badge .badge-text .num {
  font-size: 1.3rem;
  font-weight: 900;
  color: var(--ink);
  line-height: 1;
}
.about-img-badge .badge-text .lbl {
  font-size: 12px;
  color: var(--muted);
  font-weight: 500;
}

/* ---- VALUES / PILLARS ---- */
.values-section {
  padding: 72px 0;
  background: var(--white);
}
.section-heading {
  text-align: center;
  margin-bottom: 48px;
}
.section-heading .tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(12,74,110,.08);
  color: var(--primary);
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 5px 14px;
  border-radius: 50px;
  margin-bottom: 14px;
}
.section-heading h2 {
  font-size: clamp(1.4rem, 2.5vw, 1.9rem);
  font-weight: 800;
  color: var(--ink);
  letter-spacing: -.025em;
  margin-bottom: 12px;
}
.section-heading p {
  font-size: 15px;
  color: var(--muted);
  max-width: 520px;
  margin: 0 auto;
  line-height: 1.65;
}

.values-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.value-card {
  background: var(--surface);
  border-radius: var(--r);
  padding: 32px 28px;
  border: 1px solid var(--line);
  transition: transform var(--dur) var(--ease), box-shadow var(--dur) var(--ease), border-color var(--dur);
  position: relative;
  overflow: hidden;
}
.value-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--primary), var(--primary-l));
  opacity: 0;
  transition: opacity var(--dur);
}
.value-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-md);
  border-color: rgba(3,105,161,.2);
}
.value-card:hover::before { opacity: 1; }
.value-icon {
  width: 52px; height: 52px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  margin-bottom: 20px;
}
.value-icon.blue  { background: rgba(12,74,110,.1);  color: var(--primary); }
.value-icon.amber { background: rgba(245,158,11,.12); color: #d97706; }
.value-icon.green { background: rgba(16,185,129,.1);  color: var(--green); }
.value-card h3 {
  font-size: 1rem;
  font-weight: 700;
  color: var(--ink);
  margin-bottom: 10px;
  letter-spacing: -.01em;
}
.value-card p {
  font-size: 14px;
  color: var(--muted);
  line-height: 1.65;
  margin: 0;
}

/* ---- WHY CHOOSE US ---- */
.why-section {
  padding: 72px 0;
  background: linear-gradient(120deg, #0c4a6e 0%, #0369a1 100%);
  position: relative;
  overflow: hidden;
}
.why-section::before {
  content: '';
  position: absolute;
  width: 500px; height: 500px;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,.06);
  top: -150px; right: -100px;
}
.why-inner { position: relative; z-index: 1; }
.why-section .section-heading .tag {
  background: rgba(255,255,255,.12);
  color: rgba(255,255,255,.9);
}
.why-section .section-heading h2 { color: #fff; }
.why-section .section-heading p { color: rgba(255,255,255,.65); }

.why-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
}
.why-item {
  display: flex;
  gap: 16px;
  padding: 22px;
  background: rgba(255,255,255,.07);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: var(--r);
  backdrop-filter: blur(4px);
  transition: background var(--dur) var(--ease);
}
.why-item:hover { background: rgba(255,255,255,.12); }
.why-item-icon {
  width: 44px; height: 44px;
  background: rgba(245,158,11,.2);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fbbf24;
  font-size: 18px;
  flex-shrink: 0;
}
.why-item h4 {
  font-size: 14.5px;
  font-weight: 700;
  color: #fff;
  margin-bottom: 6px;
}
.why-item p { font-size: 13px; color: rgba(255,255,255,.65); line-height: 1.55; margin: 0; }

/* ---- CTA BAND ---- */
.about-cta-band {
  padding: 64px 0;
  background: var(--surface);
}
.cta-band-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 32px;
  flex-wrap: wrap;
  background: var(--white);
  border-radius: var(--r-lg);
  padding: 40px 48px;
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--line);
}
.cta-band-inner h2 {
  font-size: clamp(1.2rem, 2vw, 1.6rem);
  font-weight: 800;
  color: var(--ink);
  letter-spacing: -.02em;
  margin-bottom: 8px;
}
.cta-band-inner p { font-size: 14.5px; color: var(--muted); margin: 0; }
.cta-band-btns { display: flex; gap: 14px; flex-wrap: wrap; }
.btn-cta-primary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 13px 28px;
  background: var(--primary);
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  border-radius: var(--r-sm);
  text-decoration: none;
  box-shadow: 0 4px 16px rgba(12,74,110,.3);
  transition: all var(--dur) var(--ease);
  white-space: nowrap;
}
.btn-cta-primary:hover { background: var(--primary-l); color: #fff; transform: translateY(-2px); }
.btn-cta-ghost {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 26px;
  background: transparent;
  color: var(--primary);
  font-size: 14px;
  font-weight: 700;
  border-radius: var(--r-sm);
  text-decoration: none;
  border: 2px solid var(--primary);
  transition: all var(--dur) var(--ease);
  white-space: nowrap;
}
.btn-cta-ghost:hover { background: var(--primary); color: #fff; }

/* ---- RESPONSIVE ---- */
@media (max-width: 991px) {
  .stats-strip-inner { grid-template-columns: repeat(2, 1fr); }
  .stat-item:nth-child(2) { border-right: none; }
  .stat-item:nth-child(3) { border-top: 1px solid var(--line); }
  .stat-item:nth-child(4) { border-top: 1px solid var(--line); border-right: none; }
  .about-grid { grid-template-columns: 1fr; gap: 40px; }
  .about-img-badge { left: 16px; bottom: -16px; }
  .values-grid { grid-template-columns: repeat(2, 1fr); }
  .why-grid { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
  .about-hero { padding: 36px 0 32px; }
  .values-grid { grid-template-columns: 1fr; }
  .stats-strip-inner { grid-template-columns: repeat(2, 1fr); }
  .cta-band-inner { padding: 28px 24px; flex-direction: column; text-align: center; }
  .cta-band-btns { justify-content: center; }
  .about-main-section, .values-section, .why-section, .about-cta-band { padding: 48px 0; }
  .about-img-badge { display: none; }
}
@media (max-width: 480px) {
  .stats-strip-inner { grid-template-columns: repeat(2, 1fr); }
  .stat-num { font-size: 1.5rem; }
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<div class="about-hero-section">
  <div class="about-hero">
    <div class="container">
      <div class="about-hero-inner">
        <div class="about-hero-tag"><i class="fas fa-sun"></i> Our Story</div>
        <h1>Powering Nigeria with <span>Clean Solar</span> Energy</h1>
        <p>We are Nigeria's leading solar energy store — committed to making clean, affordable, and reliable solar solutions accessible to every home and business.</p>
        <nav aria-label="breadcrumb">
          <ol class="about-breadcrumb">
            <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li><span class="current">About Us</span></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

{{-- STATS STRIP --}}
<div class="stats-strip">
  <div class="container">
    <div class="stats-strip-inner">
      <div class="stat-item">
        <div class="stat-num">10<span>K+</span></div>
        <div class="stat-label">Happy Customers</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">500<span>+</span></div>
        <div class="stat-label">Products Listed</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">36<span></span></div>
        <div class="stat-label">States Covered</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">5<span>★</span></div>
        <div class="stat-label">Average Rating</div>
      </div>
    </div>
  </div>
</div>

{{-- MAIN CONTENT --}}
<div class="about-content-section">
  <section class="about-main-section" style="padding:72px 0 !important">
    <div class="container">
      <div class="about-grid">

        {{-- Text column --}}
        <div class="about-text-col">
          <span class="section-tag"><i class="fas fa-bolt"></i> Who We Are</span>
          <h2>Nigeria's #1 <em>Solar Energy</em> Marketplace</h2>
          
          @if($aboutUs && $aboutUs->content)
            {{-- <div class="about-body">{!! $aboutUs->content !!}</div> --}}
          @else
            <p class="about-body">
              Roisolar NG is Nigeria's premier online destination for solar energy products. From solar panels and inverters to batteries and accessories, we deliver premium quality products directly to your doorstep — across all 36 states and the FCT.
            </p>
            <p class="about-body">
              Founded with a clear mission: to accelerate Nigeria's transition to clean, renewable energy. We partner with world-class solar brands to bring you certified, warranted products at the best prices.
            </p>
          @endif

          <ul class="about-checks">
            <li><i class="fas fa-check"></i> Certified premium solar products</li>
            <li><i class="fas fa-check"></i> Nationwide delivery to all 36 states</li>
            <li><i class="fas fa-check"></i> Expert installation support available</li>
            <li><i class="fas fa-check"></i> Secure payments & buyer protection</li>
          </ul>

          <a href="{{ route('contact-us') }}" class="btn-about-cta">
            <i class="fas fa-envelope"></i> Get In Touch
          </a>

          <p> <br>
            <b>VISION</b> <br> 
To drive Africa’s transition to a sustainable energy future by empowering individuals, communities, 
and industries through innovative solar technologies and clean energy solutions. <br> <br>

<b>MISSION</b> <br>

Our mission is to deliver cutting-edge, affordable, and reliable solar energy systems that unlock 
the full potential of African businesses and communities. We are committed to leading the continent’s 
energy transformation by providing sustainable solutions that foster economic growth, environmental stewardship, 
and a better tomorrow for all.
          </p>
        </div>

        {{-- Image column --}}
        <div class="about-img-col">
          <img
            src="{{ asset('images/Picture1.png') }}"
            alt="Roisolar — Solar Energy Nigeria"
            class="about-img-main"
            onerror="this.src='https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=800&q=80'"
          >
          <div class="about-img-badge">
            <div class="badge-icon"><i class="fas fa-award"></i></div>
            <div class="badge-text">
              <div class="num">7+ Years</div>
              <div class="lbl">of Solar Excellence</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- VALUES --}}
  <section class="values-section" style="padding:72px 0 !important">
    <div class="container">
      <div class="section-heading">
        <span class="tag"><i class="fas fa-heart"></i> Our Values</span>
        <h2>What Drives Us Every Day</h2>
        <p>Our core values shape everything we do — from how we source products to how we serve our customers.</p>
      </div>
      <div class="values-grid">
        <div class="value-card">
          <div class="value-icon blue"><i class="fas fa-shield-halved"></i></div>
          <h3>Quality & Reliability</h3>
          <p>Every product on our platform is certified and tested. We only carry brands that meet international quality standards so you can shop with confidence.</p>
        </div>
        <div class="value-card">
          <div class="value-icon amber"><i class="fas fa-handshake"></i></div>
          <h3>Customer First</h3>
          <p>From pre-sales consultation to after-sales support, our team is dedicated to ensuring every customer gets the best solar solution for their needs.</p>
        </div>
        <div class="value-card">
          <div class="value-icon green"><i class="fas fa-leaf"></i></div>
          <h3>Sustainability</h3>
          <p>We believe in a cleaner Nigeria. Every solar installation reduces carbon emissions and moves us closer to a sustainable energy future for all.</p>
        </div>
        <div class="value-card">
          <div class="value-icon blue"><i class="fas fa-truck-fast"></i></div>
          <h3>Fast Nationwide Delivery</h3>
          <p>Our logistics network covers all 36 states. Order today and get your solar equipment delivered quickly, safely, and affordably to your location.</p>
        </div>
        <div class="value-card">
          <div class="value-icon amber"><i class="fas fa-tag"></i></div>
          <h3>Competitive Pricing</h3>
          <p>We work directly with manufacturers and authorised distributors to offer you the best prices on premium solar products — no hidden fees.</p>
        </div>
        <div class="value-card">
          <div class="value-icon green"><i class="fas fa-headset"></i></div>
          <h3>Expert Support</h3>
          <p>Our in-house solar experts are available to guide you through product selection, system sizing, and installation requirements — free of charge.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- WHY CHOOSE US --}}
  <section class="why-section" style="padding:72px 0 !important">
    <div class="container">
      <div class="why-inner">
        <div class="section-heading">
          <span class="tag"><i class="fas fa-star"></i> Why Roisolar</span>
          <h2>Why Thousands Choose Us</h2>
          <p>We're not just a store — we're your solar energy partner.</p>
        </div>
        <div class="why-grid">
          <div class="why-item">
            <div class="why-item-icon"><i class="fas fa-certificate"></i></div>
            <div>
              <h4>100% Genuine Products</h4>
              <p>All products come with manufacturer warranties and authenticity certificates. Zero counterfeit — guaranteed.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-item-icon"><i class="fas fa-lock"></i></div>
            <div>
              <h4>Secure Payments</h4>
              <p>Pay safely via Paystack, bank transfer or USSD. Your financial data is always encrypted and protected.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-item-icon"><i class="fas fa-undo"></i></div>
            <div>
              <h4>Easy Returns</h4>
              <p>Not satisfied? Our hassle-free returns policy ensures you get a replacement or full refund within 7 days.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-item-icon"><i class="fas fa-solar-panel"></i></div>
            <div>
              <h4>System Design Help</h4>
              <p>Not sure what size system you need? Our engineers will calculate your energy needs and recommend the perfect setup.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA BAND --}}
  <div class="about-cta-band" style="padding:64px 0 !important">
    <div class="container">
      <div class="cta-band-inner">
        <div>
          <h2>Ready to Go Solar?</h2>
          <p>Browse our full range of solar panels, inverters, batteries and accessories — delivered to your door.</p>
        </div>
        <div class="cta-band-btns">
          <a href="{{ route('products.search') }}" class="btn-cta-primary">
            <i class="fas fa-bolt"></i> Shop Products
          </a>
          <a href="{{ route('contact-us') }}" class="btn-cta-ghost">
            <i class="fas fa-phone-alt"></i> Talk to an Expert
          </a>
        </div>
      </div>
    </div>
  </div>

</div>{{-- /about-content-section --}}

@endsection
