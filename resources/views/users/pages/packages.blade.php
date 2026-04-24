@extends('layouts.app')

@section('title')
<title>Solar Packages — {{ config('app.name') }}</title>
@endsection

@section('head')
<link rel="canonical" href="{{ url()->current() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@endsection

@section('styles')
<style>
*,*::before,*::after{box-sizing:border-box;}
:root{
  --ink:#0f172a;--ink-soft:#334155;--muted:#64748b;--line:#e2e8f0;--surface:#f8fafc;
  --white:#ffffff;--primary:#0c4a6e;--primary-l:#0369a1;--accent:#f59e0b;--accent-l:#fbbf24;
  --green:#10b981;--r:14px;--r-sm:8px;
  --shadow-xs:0 1px 3px rgba(0,0,0,.06);--shadow-sm:0 4px 12px rgba(0,0,0,.08);
  --shadow-md:0 18px 48px rgba(0,0,0,.12);--ease:cubic-bezier(.4,0,.2,1);--dur:.25s;
}
body{font-family:'Inter','Segoe UI',sans-serif!important;}

/* HERO */
.pkg-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 55%,#0284c7 100%);padding:42px 0 34px;position:relative;overflow:hidden;}
.pkg-hero::before{content:'';position:absolute;width:420px;height:420px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-130px;right:-90px;pointer-events:none;}
.pkg-hero::after{content:'';position:absolute;width:200px;height:200px;border-radius:50%;border:1px solid rgba(255,255,255,.05);bottom:-70px;left:50px;pointer-events:none;}
.pkg-hero-inner{position:relative;z-index:1;}
.pkg-hero-eyebrow{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3);color:#fde68a;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;}
.pkg-hero h1{font-size:clamp(1.5rem,4vw,2.4rem);font-weight:900;color:#fff;letter-spacing:-.03em;line-height:1.15;margin:0 0 10px;}
.pkg-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.pkg-hero p{font-size:15px;color:rgba(255,255,255,.75);margin:0 0 16px;max-width:560px;line-height:1.65;}
.pkg-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.pkg-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.pkg-breadcrumb a:hover{color:#fde68a;}
.pkg-breadcrumb .sep{font-size:9px;opacity:.5;}
.pkg-breadcrumb .current{color:#fde68a;font-weight:600;}

/* WHY STRIP */
.pkg-why{background:var(--primary);padding:14px 0;}
.pkg-why-inner{display:flex;align-items:stretch;justify-content:center;flex-wrap:wrap;}
.pkg-why-item{display:flex;align-items:center;gap:8px;padding:10px 24px;border-right:1px solid rgba(255,255,255,.1);}
.pkg-why-item:last-child{border-right:none;}
.pkg-why-item i{color:#fde68a;font-size:17px;flex-shrink:0;}
.pkg-why-item span{font-size:12.5px;font-weight:600;color:rgba(255,255,255,.85);}

/* SECTION */
.pkg-section{padding:52px 0 72px;background:var(--surface);}
.pkg-section-head{text-align:center;margin-bottom:44px;}
.pkg-section-head .eyebrow{display:inline-block;padding:4px 14px;border-radius:50px;background:rgba(12,74,110,.08);color:var(--primary);font-size:11.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:10px;}
.pkg-section-head h2{font-size:clamp(1.3rem,3vw,2rem);font-weight:900;color:var(--primary);letter-spacing:-.03em;margin:0 0 8px;}
.pkg-section-head p{font-size:14.5px;color:var(--muted);max-width:500px;margin:0 auto;}

/* PACKAGE CARD */
.pkg-card{
  background:var(--white);border-radius:var(--r);overflow:hidden;
  border:1px solid var(--line);box-shadow:var(--shadow-sm);
  display:grid;grid-template-columns:1fr 320px 280px;
  margin-bottom:28px;
  transition:box-shadow var(--dur) var(--ease),border-color var(--dur),transform var(--dur);
  position:relative;
}
.pkg-card:hover{box-shadow:var(--shadow-md);border-color:rgba(3,105,161,.2);transform:translateY(-3px);}

/* Popular badge */
.pkg-popular{
  position:absolute;top:0;left:0;
  background:var(--accent);color:var(--ink);
  font-size:11px;font-weight:800;padding:5px 14px;
  border-radius:0 0 var(--r-sm) 0;
  letter-spacing:.04em;text-transform:uppercase;
  z-index:2;
}

/* LEFT: info */
.pkg-left{padding:28px 30px;display:flex;flex-direction:column;justify-content:space-between;}
.pkg-left-inner{flex:1;}
.pkg-cat-tag{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:50px;background:rgba(12,74,110,.08);color:var(--primary);font-size:11.5px;font-weight:700;margin-bottom:12px;}
.pkg-title{font-size:1.15rem;font-weight:900;color:var(--ink);letter-spacing:-.02em;margin:0 0 12px;line-height:1.3;}
.pkg-desc{font-size:13.5px;color:var(--ink-soft);line-height:1.75;}
.pkg-desc ul{padding-left:18px;margin:6px 0;}
.pkg-desc ul li{margin-bottom:4px;}
.pkg-desc p{margin:0 0 8px;}

/* CENTER: image */
.pkg-center{
  background:#e2e8f0;overflow:hidden;
  display:flex;align-items:center;justify-content:center;
  min-height:280px;
}
.pkg-center img{
  width:100%;height:100%;object-fit:cover;
  transition:transform .6s var(--ease);
}
.pkg-card:hover .pkg-center img{transform:scale(1.05);}

/* RIGHT: pricing */
.pkg-right{
  padding:28px 26px;display:flex;flex-direction:column;
  justify-content:center;
  background:linear-gradient(160deg,var(--surface) 0%,#f0f9ff 100%);
  border-left:1px solid var(--line);
}
.pkg-right-label{font-size:11.5px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.06em;margin-bottom:6px;}
.pkg-price{font-size:2rem;font-weight:900;color:var(--primary);letter-spacing:-.03em;line-height:1;margin-bottom:4px;}
.pkg-price-sub{font-size:12px;color:var(--muted);margin-bottom:20px;}

.pkg-appliances{
  background:var(--white);border-radius:var(--r-sm);border:1px solid var(--line);
  padding:12px 14px;margin-bottom:18px;
}
.pkg-appliances-label{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--muted);margin-bottom:6px;}
.pkg-appliances-text{font-size:12.5px;color:var(--ink-soft);line-height:1.65;}

.pkg-cta-btn{
  display:flex;align-items:center;justify-content:center;gap:8px;
  padding:12px 20px;border-radius:var(--r-sm);
  background:linear-gradient(135deg,var(--primary),var(--primary-l));
  color:#fff;text-decoration:none;
  font-size:13.5px;font-weight:700;
  box-shadow:0 6px 20px rgba(12,74,110,.25);
  transition:all var(--dur) var(--ease);
  margin-bottom:10px;
}
.pkg-cta-btn:hover{background:linear-gradient(135deg,#083756,var(--primary));color:#fff;transform:translateY(-2px);box-shadow:0 10px 28px rgba(12,74,110,.35);}
.pkg-whatsapp-btn{
  display:flex;align-items:center;justify-content:center;gap:7px;
  padding:10px 20px;border-radius:var(--r-sm);
  background:rgba(16,185,129,.1);color:#047857;
  border:1px solid rgba(16,185,129,.25);
  text-decoration:none;font-size:13px;font-weight:700;
  transition:all var(--dur);
}
.pkg-whatsapp-btn:hover{background:#10b981;color:#fff;border-color:#10b981;}

/* EMPTY */
.pkg-empty{text-align:center;padding:72px 24px;background:var(--white);border-radius:var(--r);border:1.5px dashed var(--line);}
.pkg-empty i{font-size:3.5rem;color:#cbd5e1;margin-bottom:16px;}
.pkg-empty h3{font-size:1.2rem;font-weight:800;color:var(--ink-soft);margin-bottom:6px;}
.pkg-empty p{font-size:14px;color:var(--muted);}

/* BOTTOM CTA */
.pkg-cta-banner{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 100%);padding:52px 0;margin-top:12px;}
.pkg-cta-banner-inner{display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;}
.pkg-cta-banner h3{font-size:1.6rem;font-weight:900;color:#fff;letter-spacing:-.02em;margin:0;}
.pkg-cta-banner p{font-size:14px;color:rgba(255,255,255,.75);margin:6px 0 0;}
.pkg-cta-banner-btn{
  display:inline-flex;align-items:center;gap:9px;
  padding:14px 30px;background:var(--accent);color:var(--ink);
  border-radius:var(--r-sm);font-size:14.5px;font-weight:800;
  text-decoration:none;flex-shrink:0;
  transition:all var(--dur);box-shadow:0 6px 20px rgba(245,158,11,.3);
}
.pkg-cta-banner-btn:hover{background:var(--accent-l);color:var(--ink);transform:translateY(-2px);}

/* RESPONSIVE */
@media(max-width:991px){
  .pkg-card{grid-template-columns:1fr;grid-template-rows:auto auto auto;}
  .pkg-center{min-height:220px;max-height:240px;}
  .pkg-right{border-left:none;border-top:1px solid var(--line);}
  .pkg-cta-banner-inner{flex-direction:column;text-align:center;}
}
@media(max-width:576px){
  .pkg-left{padding:20px;}
  .pkg-right{padding:20px;}
  .pkg-price{font-size:1.6rem;}
  .pkg-why-item{padding:10px 14px;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="pkg-hero">
  <div class="container pkg-hero-inner">
    <div class="pkg-hero-eyebrow"><i class="fas fa-box-open"></i> Turnkey Solutions</div>
    <h1>Complete Solar <span>Packages</span></h1>
    <p>Everything you need to go solar — inverter, batteries, panels, and installation — in one ready-to-go bundle.</p>
    <nav aria-label="breadcrumb">
      <ol class="pkg-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">Packages</span></li>
      </ol>
    </nav>
  </div>
</section>

{{-- WHY STRIP --}}
<div class="pkg-why">
  <div class="container">
    <div class="pkg-why-inner">
      <div class="pkg-why-item"><i class="fas fa-tools"></i><span>Full Installation Included</span></div>
      <div class="pkg-why-item"><i class="fas fa-shield-alt"></i><span>Certified Components</span></div>
      <div class="pkg-why-item"><i class="fas fa-headset"></i><span>After-Sales Support</span></div>
      <div class="pkg-why-item"><i class="fas fa-bolt"></i><span>24 / 7 Power Guarantee</span></div>
      <div class="pkg-why-item"><i class="fas fa-handshake"></i><span>Flexible Payment Plans</span></div>
    </div>
  </div>
</div>

{{-- PACKAGES --}}
<section class="pkg-section">
  <div class="container">
    <div class="pkg-section-head">
      <span class="eyebrow">Choose Your Package</span>
      <h2>Solar Power Packages</h2>
      <p>Designed for homes and businesses across Nigeria. All packages include equipment supply and professional installation.</p>
    </div>

    @if($package->count() > 0)

      @foreach($package as $i => $sp)
        <div class="pkg-card">
          @if($i === 0)
            <div class="pkg-popular"><i class="fas fa-star" style="font-size:9px"></i> Most Popular</div>
          @endif

          {{-- LEFT: Description --}}
          <div class="pkg-left">
            <div class="pkg-left-inner">
              <div class="pkg-cat-tag"><i class="fas fa-solar-panel"></i> Full Package</div>
              <h3 class="pkg-title">{{ $sp->title }}</h3>
              <div class="pkg-desc">{!! $sp->description !!}</div>
            </div>
          </div>

          {{-- CENTER: Image --}}
          <div class="pkg-center">
            <img src="{{ asset('images/packages/'.$sp->image) }}" alt="{{ $sp->title }}" loading="lazy">
          </div>

          {{-- RIGHT: Pricing + CTA --}}
          <div class="pkg-right">
            <div class="pkg-right-label">Package Price</div>
            <div class="pkg-price">&#8358;{{ number_format($sp->price) }}</div>
            <div class="pkg-price-sub">Inclusive of VAT &amp; installation</div>

            <div class="pkg-appliances">
              <div class="pkg-appliances-label"><i class="fas fa-plug" style="color:var(--accent)"></i> What It Can Power</div>
              <div class="pkg-appliances-text">{!! $sp->usage_description !!}</div>
            </div>

            <a href="{{ route('contact-us') }}" class="pkg-cta-btn">
              <i class="fas fa-phone-alt"></i> Get a Quote
            </a>
            @php
              $phone = preg_replace('/[^0-9]/', '', $settings->site_phone ?? '');
              $waLink = 'https://wa.me/234'.ltrim($phone,'0').'?text='.urlencode('Hi, I\'m interested in the '.$sp->title.' package (₦'.number_format($sp->price).'). Please provide more details.');
            @endphp
            <a href="{{ $waLink }}" target="_blank" rel="noopener" class="pkg-whatsapp-btn">
              <i class="fab fa-whatsapp" style="font-size:16px"></i> WhatsApp Us
            </a>
          </div>
        </div>
      @endforeach

    @else
      <div class="pkg-empty">
        <i class="fas fa-box-open"></i>
        <h3>No packages available yet</h3>
        <p>Check back soon — we're preparing new solar packages for you.</p>
      </div>
    @endif
  </div>
</section>

{{-- BOTTOM CTA --}}
<div class="pkg-cta-banner">
  <div class="container">
    <div class="pkg-cta-banner-inner">
      <div>
        <h3>Not sure which package suits you?</h3>
        <p>Talk to our solar engineers — free consultation, no obligation.</p>
      </div>
      <a href="{{ route('contact-us') }}" class="pkg-cta-banner-btn">
        <i class="fas fa-comments"></i> Talk to an Expert
      </a>
    </div>
  </div>
</div>

@endsection
