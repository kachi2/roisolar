@extends('layouts.app')

@section('title', 'Our Services')

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
  --danger:#ef4444;--green:#10b981;--r:14px;--r-sm:8px;
  --shadow-xs:0 1px 3px rgba(0,0,0,.06);--shadow-sm:0 4px 12px rgba(0,0,0,.08);
  --shadow-md:0 12px 36px rgba(0,0,0,.12);--ease:cubic-bezier(.4,0,.2,1);--dur:.25s;
}
body{font-family:'Inter','Segoe UI',sans-serif!important;}

/* HERO */
.svc-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 60%,#0284c7 100%);padding:40px 0 34px;position:relative;overflow:hidden;}
.svc-hero::before{content:'';position:absolute;width:380px;height:380px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-120px;right:-70px;pointer-events:none;}
.svc-hero::after{content:'';position:absolute;width:220px;height:220px;border-radius:50%;border:1px solid rgba(255,255,255,.05);bottom:-80px;left:40px;pointer-events:none;}
.svc-hero-inner{position:relative;z-index:1;}
.svc-hero-eyebrow{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3);color:#fde68a;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;}
.svc-hero h1{font-size:clamp(1.5rem,4vw,2.4rem);font-weight:900;color:#fff;letter-spacing:-.03em;line-height:1.15;margin:0 0 10px;}
.svc-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.svc-hero p{font-size:15px;color:rgba(255,255,255,.75);margin:0 0 16px;max-width:560px;line-height:1.65;}
.svc-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.svc-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.svc-breadcrumb a:hover{color:#fde68a;}
.svc-breadcrumb .sep{font-size:9px;opacity:.5;}
.svc-breadcrumb .current{color:#fde68a;font-weight:600;}

/* STATS STRIP */
.svc-stats{background:var(--primary);padding:16px 0;}
.svc-stats-inner{display:flex;align-items:center;justify-content:center;gap:0;flex-wrap:wrap;}
.svc-stat{display:flex;align-items:center;gap:10px;padding:10px 28px;border-right:1px solid rgba(255,255,255,.12);}
.svc-stat:last-child{border-right:none;}
.svc-stat-icon{width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.12);display:flex;align-items:center;justify-content:center;color:#fde68a;font-size:16px;flex-shrink:0;}
.svc-stat-text strong{display:block;font-size:1.05rem;font-weight:800;color:#fff;line-height:1.1;}
.svc-stat-text span{font-size:11px;color:rgba(255,255,255,.65);}

/* SECTION */
.svc-section{padding:56px 0 72px;background:var(--surface);}
.svc-section-head{text-align:center;margin-bottom:44px;}
.svc-section-head .eyebrow{display:inline-block;padding:4px 14px;border-radius:50px;background:rgba(12,74,110,.08);color:var(--primary);font-size:11.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:10px;}
.svc-section-head h2{font-size:clamp(1.3rem,3vw,2rem);font-weight:900;color:var(--primary);letter-spacing:-.03em;margin:0 0 8px;}
.svc-section-head p{font-size:14.5px;color:var(--muted);max-width:500px;margin:0 auto;}

/* SERVICE CARDS GRID */
.svc-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:24px;}

.svc-card{
  background:var(--white);border-radius:var(--r);overflow:hidden;
  border:1px solid var(--line);box-shadow:var(--shadow-xs);
  display:flex;flex-direction:column;
  transition:transform var(--dur) var(--ease),box-shadow var(--dur),border-color var(--dur);
}
.svc-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-md);border-color:rgba(3,105,161,.2);}

.svc-card-img{
  width:100%;height:200px;overflow:hidden;position:relative;
  background:#e2e8f0;
}
.svc-card-img img{width:100%;height:100%;object-fit:cover;transition:transform .5s var(--ease);}
.svc-card:hover .svc-card-img img{transform:scale(1.07);}
.svc-card-img-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(12,74,110,.7) 0%,transparent 55%);
  opacity:0;transition:opacity var(--dur);
  display:flex;align-items:flex-end;padding:16px;
}
.svc-card:hover .svc-card-img-overlay{opacity:1;}
.svc-card-img-overlay .read-badge{
  display:inline-flex;align-items:center;gap:6px;
  padding:6px 14px;border-radius:var(--r-sm);
  background:var(--accent);color:var(--ink);
  font-size:12px;font-weight:700;text-decoration:none;
}

.svc-card-body{padding:20px 22px;flex:1;display:flex;flex-direction:column;}
.svc-card-title{font-size:15.5px;font-weight:800;color:var(--ink);margin:0 0 8px;line-height:1.3;}
.svc-card-excerpt{
  font-size:13.5px;color:var(--muted);line-height:1.65;flex:1;
  display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;
  margin-bottom:16px;
}
.svc-card-footer{display:flex;align-items:center;justify-content:space-between;margin-top:auto;padding-top:14px;border-top:1px solid var(--line);}
.svc-read-btn{
  display:inline-flex;align-items:center;gap:7px;
  padding:8px 18px;border-radius:var(--r-sm);
  background:var(--primary);color:#fff;
  font-size:13px;font-weight:700;text-decoration:none;
  transition:background var(--dur),transform var(--dur);
}
.svc-read-btn:hover{background:var(--primary-l);color:#fff;transform:translateX(3px);}
.svc-read-btn i{font-size:11px;transition:transform var(--dur);}
.svc-read-btn:hover i{transform:translateX(3px);}

/* EMPTY STATE */
.svc-empty{
  text-align:center;padding:72px 24px;
  background:var(--white);border-radius:var(--r);
  border:1.5px dashed var(--line);
}
.svc-empty i{font-size:3.5rem;color:#cbd5e1;margin-bottom:16px;}
.svc-empty h3{font-size:1.2rem;font-weight:800;color:var(--ink-soft);margin-bottom:6px;}
.svc-empty p{font-size:14px;color:var(--muted);}

/* CTA STRIP */
.svc-cta{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 100%);padding:48px 0;margin-top:16px;}
.svc-cta-inner{display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;}
.svc-cta h3{font-size:1.5rem;font-weight:900;color:#fff;letter-spacing:-.02em;margin:0;}
.svc-cta p{font-size:14px;color:rgba(255,255,255,.75);margin:6px 0 0;}
.svc-cta-btn{
  display:inline-flex;align-items:center;gap:9px;
  padding:13px 28px;background:var(--accent);color:var(--ink);
  border-radius:var(--r-sm);font-size:14px;font-weight:800;
  text-decoration:none;flex-shrink:0;
  transition:background var(--dur),transform var(--dur);
  box-shadow:0 6px 20px rgba(245,158,11,.3);
}
.svc-cta-btn:hover{background:var(--accent-l);color:var(--ink);transform:translateY(-2px);}

@media(max-width:768px){
  .svc-stats-inner{gap:0;}
  .svc-stat{padding:10px 16px;}
  .svc-cta-inner{flex-direction:column;text-align:center;}
}
@media(max-width:576px){
  .svc-stat{flex:1;min-width:140px;border-right:none;border-bottom:1px solid rgba(255,255,255,.12);}
  .svc-stat:last-child{border-bottom:none;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="svc-hero">
  <div class="container svc-hero-inner">
    <div class="svc-hero-eyebrow"><i class="fas fa-solar-panel"></i> What We Offer</div>
    <h1>Professional <span>Solar Services</span></h1>
    <p>End-to-end renewable energy solutions — from consultation and installation to maintenance and support.</p>
    <nav aria-label="breadcrumb">
      <ol class="svc-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">Services</span></li>
      </ol>
    </nav>
  </div>
</section>

{{-- STATS STRIP --}}
<div class="svc-stats">
  <div class="container">
    <div class="svc-stats-inner">
      <div class="svc-stat">
        <div class="svc-stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="svc-stat-text"><strong>500+</strong><span>Installations Done</span></div>
      </div>
      <div class="svc-stat">
        <div class="svc-stat-icon"><i class="fas fa-users"></i></div>
        <div class="svc-stat-text"><strong>1,200+</strong><span>Happy Clients</span></div>
      </div>
      <div class="svc-stat">
        <div class="svc-stat-icon"><i class="fas fa-star"></i></div>
        <div class="svc-stat-text"><strong>4.9 / 5</strong><span>Customer Rating</span></div>
      </div>
      <div class="svc-stat">
        <div class="svc-stat-icon"><i class="fas fa-headset"></i></div>
        <div class="svc-stat-text"><strong>24 / 7</strong><span>Support Available</span></div>
      </div>
    </div>
  </div>
</div>

{{-- SERVICES GRID --}}
<section class="svc-section">
  <div class="container">
    <div class="svc-section-head">
      <span class="eyebrow">Our Expertise</span>
      <h2>Services We Provide</h2>
      <p>Explore our comprehensive range of solar energy services tailored for homes and businesses.</p>
    </div>

    @if(count($services) > 0)
      <div class="svc-grid">
        @foreach($services as $service)
          <article class="svc-card">
            <div class="svc-card-img">
              <img src="{{ asset('/images/services/'.$service->images) }}" alt="{{ $service->title }}" loading="lazy">
              <div class="svc-card-img-overlay">
                <a href="{{ route('service.details', $service->slug) }}" class="read-badge">
                  <i class="fas fa-arrow-right"></i> Read More
                </a>
              </div>
            </div>
            <div class="svc-card-body">
              <h3 class="svc-card-title">{{ $service->title }}</h3>
              <p class="svc-card-excerpt">{{ trim(strip_tags($service->contents)) }}</p>
              <div class="svc-card-footer">
                <a href="{{ route('service.details', $service->slug) }}" class="svc-read-btn">
                  Learn More <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    @else
      <div class="svc-empty">
        <i class="fas fa-tools"></i>
        <h3>No services listed yet</h3>
        <p>Check back soon — we're updating our service offerings.</p>
      </div>
    @endif
  </div>
</section>

{{-- CTA STRIP --}}
<div class="svc-cta">
  <div class="container">
    <div class="svc-cta-inner">
      <div>
        <h3>Ready to switch to solar?</h3>
        <p>Talk to our experts today and get a free consultation.</p>
      </div>
      <a href="{{ route('contact-us') }}" class="svc-cta-btn">
        <i class="fas fa-phone-alt"></i> Contact Us Now
      </a>
    </div>
  </div>
</div>

@endsection
