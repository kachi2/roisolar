@extends('layouts.app')

@section('title', $service->title)

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
.sdtl-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 60%,#0284c7 100%);padding:36px 0 30px;position:relative;overflow:hidden;}
.sdtl-hero::before{content:'';position:absolute;width:350px;height:350px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-100px;right:-60px;pointer-events:none;}
.sdtl-hero-inner{position:relative;z-index:1;}
.sdtl-hero h1{font-size:clamp(1.2rem,3.5vw,2rem);font-weight:900;color:#fff;letter-spacing:-.03em;margin:0 0 12px;line-height:1.2;max-width:680px;}
.sdtl-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.sdtl-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.sdtl-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.sdtl-breadcrumb a:hover{color:#fde68a;}
.sdtl-breadcrumb .sep{font-size:9px;opacity:.5;}
.sdtl-breadcrumb .current{color:#fde68a;font-weight:600;}

/* MAIN */
.sdtl-section{padding:52px 0 72px;background:var(--surface);}
.sdtl-layout{display:grid;grid-template-columns:1fr 320px;gap:32px;align-items:start;}

/* MAIN CARD */
.sdtl-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-sm);overflow:hidden;}
.sdtl-card-hero-img{width:100%;height:360px;object-fit:cover;display:block;}
.sdtl-card-body{padding:32px 36px;}
.sdtl-card-body h2{font-size:1.5rem;font-weight:900;color:var(--primary);letter-spacing:-.03em;margin:0 0 18px;}
.sdtl-card-body .content-text{font-size:15px;color:var(--ink-soft);line-height:1.85;white-space:pre-line;}
.sdtl-contact-strip{
  display:flex;align-items:center;justify-content:space-between;gap:16px;
  padding:20px 24px;margin:28px 0 0;
  border-radius:var(--r-sm);
  background:linear-gradient(135deg,rgba(12,74,110,.06) 0%,rgba(3,105,161,.04) 100%);
  border:1px solid rgba(3,105,161,.12);
  flex-wrap:wrap;
}
.sdtl-contact-strip p{font-size:14px;color:var(--ink-soft);margin:0;font-weight:500;}
.sdtl-contact-strip p strong{color:var(--primary);}
.sdtl-contact-btn{
  display:inline-flex;align-items:center;gap:8px;
  padding:10px 22px;border-radius:var(--r-sm);
  background:var(--primary);color:#fff;
  text-decoration:none;font-size:13.5px;font-weight:700;
  transition:background var(--dur),transform var(--dur);
  flex-shrink:0;
}
.sdtl-contact-btn:hover{background:var(--primary-l);color:#fff;transform:translateY(-2px);}

/* SIDEBAR */
.sdtl-sidebar{display:flex;flex-direction:column;gap:20px;}

/* Other services list */
.sdtl-other-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-xs);overflow:hidden;}
.sdtl-other-head{background:var(--primary);padding:14px 18px;}
.sdtl-other-head h5{font-size:13px;font-weight:800;color:#fff;margin:0;letter-spacing:.04em;text-transform:uppercase;}
.sdtl-other-list{padding:12px 0;}
.sdtl-other-item{
  display:flex;align-items:center;gap:12px;
  padding:10px 18px;text-decoration:none;
  transition:background var(--dur);border-bottom:1px solid var(--line);
}
.sdtl-other-item:last-child{border-bottom:none;}
.sdtl-other-item:hover{background:var(--surface);}
.sdtl-other-img{width:48px;height:48px;border-radius:8px;object-fit:cover;flex-shrink:0;border:1px solid var(--line);}
.sdtl-other-title{font-size:13px;font-weight:700;color:var(--ink);line-height:1.3;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
.sdtl-other-item.active-svc .sdtl-other-title{color:var(--primary-l);}
.sdtl-other-item.active-svc{background:rgba(3,105,161,.05);}

/* Help card */
.sdtl-help-card{
  background:linear-gradient(135deg,#0c4a6e,#0369a1);
  border-radius:var(--r);padding:24px;text-align:center;
}
.sdtl-help-card i{font-size:2rem;color:#fde68a;margin-bottom:10px;}
.sdtl-help-card h5{font-size:15px;font-weight:800;color:#fff;margin:0 0 6px;}
.sdtl-help-card p{font-size:12.5px;color:rgba(255,255,255,.75);margin:0 0 16px;}
.sdtl-help-btn{
  display:inline-flex;align-items:center;justify-content:center;gap:7px;width:100%;
  padding:11px;border-radius:var(--r-sm);
  background:var(--accent);color:var(--ink);
  text-decoration:none;font-size:13px;font-weight:800;
  transition:background var(--dur),transform var(--dur);
}
.sdtl-help-btn:hover{background:var(--accent-l);color:var(--ink);transform:translateY(-2px);}

@media(max-width:991px){
  .sdtl-layout{grid-template-columns:1fr;}
  .sdtl-card-hero-img{height:240px;}
  .sdtl-card-body{padding:22px 20px;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="sdtl-hero">
  <div class="container sdtl-hero-inner">
    <h1>{{ $service->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="sdtl-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><a href="{{ route('users.services') }}">Services</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">{{ Str::limit($service->title, 30) }}</span></li>
      </ol>
    </nav>
  </div>
</section>

<div class="sdtl-section">
  <div class="container">
    <div class="sdtl-layout">

      {{-- MAIN --}}
      <div>
        <div class="sdtl-card">
          <img src="{{ asset('/images/services/'.$service->images) }}" alt="{{ $service->title }}" class="sdtl-card-hero-img">
          <div class="sdtl-card-body">
            <h2>{{ $service->title }}</h2>
            <div class="content-text">{{ strip_tags($service->contents) }}</div>
            <div class="sdtl-contact-strip">
              <p><strong>Interested in this service?</strong> Our team is ready to help you get started.</p>
              <a href="{{ route('contact-us') }}" class="sdtl-contact-btn">
                <i class="fas fa-phone-alt"></i> Get in Touch
              </a>
            </div>
          </div>
        </div>
      </div>

      {{-- SIDEBAR --}}
      <aside class="sdtl-sidebar">
        {{-- Other services --}}
        <div class="sdtl-other-card">
          <div class="sdtl-other-head"><h5><i class="fas fa-th-list me-2"></i>All Services</h5></div>
          <div class="sdtl-other-list">
            @foreach($se as $s)
              <a href="{{ route('service.details', $s->slug) }}"
                 class="sdtl-other-item {{ $s->id === $service->id ? 'active-svc' : '' }}">
                <img src="{{ asset('/images/services/'.$s->images) }}" alt="{{ $s->title }}" class="sdtl-other-img">
                <span class="sdtl-other-title">{{ $s->title }}</span>
              </a>
            @endforeach
          </div>
        </div>

        {{-- Help card --}}
        <div class="sdtl-help-card">
          <i class="fas fa-headset"></i>
          <h5>Need a Consultation?</h5>
          <p>Talk to our solar experts. Free consultation for new clients.</p>
          <a href="{{ route('contact-us') }}" class="sdtl-help-btn">
            <i class="fas fa-comments"></i> Chat with Us
          </a>
        </div>
      </aside>

    </div>
  </div>
</div>

@endsection
