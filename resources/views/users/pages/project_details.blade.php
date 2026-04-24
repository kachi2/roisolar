@extends('layouts.app')

@section('title')
<title>{{ $project->title }} — {{ config('app.name') }}</title>
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
  --r:14px;--r-sm:8px;
  --shadow-xs:0 1px 3px rgba(0,0,0,.06);--shadow-sm:0 4px 12px rgba(0,0,0,.08);
  --shadow-md:0 12px 36px rgba(0,0,0,.12);--ease:cubic-bezier(.4,0,.2,1);--dur:.25s;
}
body{font-family:'Inter','Segoe UI',sans-serif!important;}

/* HERO */
.pdtl-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 55%,#0284c7 100%);padding:36px 0 30px;position:relative;overflow:hidden;}
.pdtl-hero::before{content:'';position:absolute;width:350px;height:350px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-100px;right:-60px;pointer-events:none;}
.pdtl-hero-inner{position:relative;z-index:1;}
.pdtl-hero h1{font-size:clamp(1.2rem,3.5vw,2rem);font-weight:900;color:#fff;letter-spacing:-.03em;margin:0 0 12px;line-height:1.2;max-width:700px;}
.pdtl-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.pdtl-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.pdtl-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.pdtl-breadcrumb a:hover{color:#fde68a;}
.pdtl-breadcrumb .sep{font-size:9px;opacity:.5;}
.pdtl-breadcrumb .current{color:#fde68a;font-weight:600;}

/* MAIN SECTION */
.pdtl-section{padding:52px 0 72px;background:var(--surface);}
.pdtl-layout{display:grid;grid-template-columns:1fr 300px;gap:32px;align-items:start;}

/* MAIN CARD */
.pdtl-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-sm);overflow:hidden;}

/* Carousel */
.pdtl-carousel{border-radius:0;overflow:hidden;}
.pdtl-carousel .carousel-item img{width:100%;height:400px;object-fit:cover;display:block;}
.pdtl-carousel .carousel-control-prev,
.pdtl-carousel .carousel-control-next{width:44px;height:44px;top:50%;transform:translateY(-50%);border-radius:50%;background:rgba(255,255,255,.9);opacity:1;margin:0 10px;}
.pdtl-carousel .carousel-control-prev-icon,
.pdtl-carousel .carousel-control-next-icon{filter:invert(1) brightness(0);width:16px;height:16px;}
.pdtl-carousel .carousel-indicators{bottom:10px;}
.pdtl-carousel .carousel-indicators button{width:8px;height:8px;border-radius:50%;background:rgba(255,255,255,.6);border:none;}
.pdtl-carousel .carousel-indicators button.active{background:#fff;}

/* Single image (no carousel) */
.pdtl-single-img{width:100%;height:400px;object-fit:cover;display:block;}

/* Image grid for multiple */
.pdtl-img-strip{display:flex;gap:6px;padding:8px;background:var(--surface);border-bottom:1px solid var(--line);}
.pdtl-img-strip img{width:64px;height:48px;object-fit:cover;border-radius:6px;cursor:pointer;opacity:.65;transition:opacity var(--dur);border:2px solid transparent;}
.pdtl-img-strip img.active-thumb{opacity:1;border-color:var(--primary);}
.pdtl-img-strip img:hover{opacity:1;}

/* Content */
.pdtl-card-body{padding:32px 36px;}
.pdtl-card-meta{display:flex;align-items:center;gap:14px;flex-wrap:wrap;margin-bottom:18px;}
.pdtl-meta-tag{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:50px;background:rgba(12,74,110,.08);color:var(--primary);font-size:12px;font-weight:700;}
.pdtl-card-body h2{font-size:1.55rem;font-weight:900;color:var(--primary);letter-spacing:-.03em;margin:0 0 18px;}
.pdtl-description{font-size:15px;color:var(--ink-soft);line-height:1.85;}
.pdtl-description p{margin-bottom:1em;}
.pdtl-contact-strip{
  display:flex;align-items:center;justify-content:space-between;gap:16px;
  padding:18px 22px;margin-top:28px;
  border-radius:var(--r-sm);
  background:linear-gradient(135deg,rgba(12,74,110,.06),rgba(3,105,161,.04));
  border:1px solid rgba(3,105,161,.12);
  flex-wrap:wrap;
}
.pdtl-contact-strip p{font-size:14px;color:var(--ink-soft);margin:0;font-weight:500;}
.pdtl-contact-strip p strong{color:var(--primary);}
.pdtl-contact-btn{
  display:inline-flex;align-items:center;gap:7px;
  padding:10px 22px;border-radius:var(--r-sm);
  background:var(--primary);color:#fff;
  text-decoration:none;font-size:13.5px;font-weight:700;
  transition:background var(--dur),transform var(--dur);flex-shrink:0;
}
.pdtl-contact-btn:hover{background:var(--primary-l);color:#fff;transform:translateY(-2px);}

/* SIDEBAR */
.pdtl-sidebar{display:flex;flex-direction:column;gap:20px;}
.pdtl-aside-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-xs);overflow:hidden;position:sticky;top:90px;}
.pdtl-aside-head{background:var(--primary);padding:14px 18px;}
.pdtl-aside-head h5{font-size:13px;font-weight:800;color:#fff;margin:0;letter-spacing:.04em;text-transform:uppercase;}
.pdtl-aside-list{padding:8px 0;}
.pdtl-aside-item{
  display:flex;align-items:center;gap:12px;
  padding:10px 16px;text-decoration:none;
  border-bottom:1px solid var(--line);transition:background var(--dur);
}
.pdtl-aside-item:last-child{border-bottom:none;}
.pdtl-aside-item:hover{background:var(--surface);}
.pdtl-aside-img{width:54px;height:54px;border-radius:8px;object-fit:cover;flex-shrink:0;border:1px solid var(--line);}
.pdtl-aside-info{flex:1;min-width:0;}
.pdtl-aside-title{font-size:12.5px;font-weight:700;color:var(--ink);line-height:1.3;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:4px;}
.pdtl-aside-date{font-size:11px;color:var(--muted);}

/* Help card */
.pdtl-help-card{background:linear-gradient(135deg,#0c4a6e,#0369a1);border-radius:var(--r);padding:22px;text-align:center;}
.pdtl-help-card i{font-size:2rem;color:#fde68a;margin-bottom:10px;}
.pdtl-help-card h5{font-size:14.5px;font-weight:800;color:#fff;margin:0 0 6px;}
.pdtl-help-card p{font-size:12px;color:rgba(255,255,255,.75);margin:0 0 14px;}
.pdtl-help-btn{
  display:inline-flex;align-items:center;justify-content:center;gap:7px;width:100%;
  padding:10px;border-radius:var(--r-sm);
  background:var(--accent);color:var(--ink);
  text-decoration:none;font-size:13px;font-weight:800;
  transition:background var(--dur),transform var(--dur);
}
.pdtl-help-btn:hover{background:var(--accent-l);color:var(--ink);transform:translateY(-2px);}

/* Back btn */
.pdtl-back{display:inline-flex;align-items:center;gap:7px;margin-bottom:20px;font-size:13px;font-weight:700;color:var(--primary);text-decoration:none;transition:gap var(--dur);}
.pdtl-back:hover{gap:10px;color:var(--primary-l);}

@media(max-width:991px){
  .pdtl-layout{grid-template-columns:1fr;}
  .pdtl-aside-card{position:static;}
  .pdtl-carousel .carousel-item img,.pdtl-single-img{height:260px;}
  .pdtl-card-body{padding:20px;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="pdtl-hero">
  <div class="container pdtl-hero-inner">
    <h1><span>Project:</span> {{ $project->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="pdtl-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><a href="{{ route('users.project') }}">Projects</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">{{ Str::limit($project->title, 35) }}</span></li>
      </ol>
    </nav>
  </div>
</section>

<div class="pdtl-section">
  <div class="container">
    <a href="{{ route('users.project') }}" class="pdtl-back"><i class="fas fa-arrow-left"></i> Back to Projects</a>

    <div class="pdtl-layout">

      {{-- MAIN --}}
      <div>
        <div class="pdtl-card">

          {{-- Images --}}
          @if($project->images->count() > 1)
            <div id="pdtlSlider" class="carousel slide pdtl-carousel" data-bs-ride="carousel">
              <div class="carousel-indicators">
                @foreach($project->images as $k => $img)
                  <button type="button" data-bs-target="#pdtlSlider" data-bs-slide-to="{{ $k }}" {{ $k == 0 ? 'class=active aria-current=true' : '' }}></button>
                @endforeach
              </div>
              <div class="carousel-inner">
                @foreach($project->images as $k => $img)
                  <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                    <img src="{{ asset($img->image_path) }}" alt="{{ $project->title }}">
                  </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#pdtlSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#pdtlSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
              </button>
            </div>

            {{-- Thumbnail strip --}}
            <div class="pdtl-img-strip" id="thumbStrip">
              @foreach($project->images as $k => $img)
                <img src="{{ asset($img->image_path) }}" alt="thumb {{ $k+1 }}"
                     class="{{ $k == 0 ? 'active-thumb' : '' }}"
                     data-slide="{{ $k }}" onclick="goToSlide(this, {{ $k }})">
              @endforeach
            </div>

          @else
            @php $firstImg = $project->images->first(); @endphp
            @if($firstImg)
              <img src="{{ asset($firstImg->image_path) }}" alt="{{ $project->title }}" class="pdtl-single-img">
            @endif
          @endif

          {{-- Content --}}
          <div class="pdtl-card-body">
            <div class="pdtl-card-meta">
              <span class="pdtl-meta-tag"><i class="fas fa-calendar-alt"></i> {{ $project->created_at->format('d M Y') }}</span>
              @if($project->images->count() > 1)
                <span class="pdtl-meta-tag"><i class="fas fa-images"></i> {{ $project->images->count() }} Photos</span>
              @endif
            </div>
            <h2>{{ $project->title }}</h2>
            <div class="pdtl-description">{!! $project->description !!}</div>
            <div class="pdtl-contact-strip">
              <p><strong>Want a similar installation?</strong> Our team can design a system for your needs.</p>
              <a href="{{ route('contact-us') }}" class="pdtl-contact-btn">
                <i class="fas fa-phone-alt"></i> Get a Quote
              </a>
            </div>
          </div>

        </div>
      </div>

      {{-- SIDEBAR --}}
      <aside class="pdtl-sidebar">
        <div class="pdtl-aside-card">
          <div class="pdtl-aside-head"><h5><i class="fas fa-th-list me-2"></i>Other Projects</h5></div>
          <div class="pdtl-aside-list">
            @forelse($latestProjects as $item)
              @php $img = $item->images->first(); @endphp
              <a href="{{ route('project.details', $item->slug) }}" class="pdtl-aside-item">
                <img src="{{ $img ? asset($img->image_path) : asset('images/no-image.png') }}" alt="{{ $item->title }}" class="pdtl-aside-img">
                <div class="pdtl-aside-info">
                  <div class="pdtl-aside-title">{{ $item->title }}</div>
                  <div class="pdtl-aside-date"><i class="fas fa-calendar-alt" style="color:var(--accent)"></i> {{ $item->created_at->format('M Y') }}</div>
                </div>
              </a>
            @empty
              <div style="padding:16px;font-size:13px;color:var(--muted)">No other projects yet.</div>
            @endforelse
          </div>
        </div>

        <div class="pdtl-help-card">
          <i class="fas fa-solar-panel"></i>
          <h5>Ready to Go Solar?</h5>
          <p>Get a free consultation and site assessment from our engineers.</p>
          <a href="{{ route('contact-us') }}" class="pdtl-help-btn">
            <i class="fas fa-comments"></i> Talk to Us
          </a>
        </div>
      </aside>

    </div>
  </div>
</div>

@endsection

@section('script')
<script>
function goToSlide(el, index) {
  var carousel = bootstrap.Carousel.getOrCreateInstance(document.getElementById('pdtlSlider'));
  carousel.to(index);
  document.querySelectorAll('#thumbStrip img').forEach(function(t){ t.classList.remove('active-thumb'); });
  el.classList.add('active-thumb');
}
// Sync thumbs when carousel slides via controls
var pdtlEl = document.getElementById('pdtlSlider');
if (pdtlEl) {
  pdtlEl.addEventListener('slid.bs.carousel', function(e) {
    var thumbs = document.querySelectorAll('#thumbStrip img');
    thumbs.forEach(function(t){ t.classList.remove('active-thumb'); });
    if (thumbs[e.to]) thumbs[e.to].classList.add('active-thumb');
  });
}
</script>
@endsection
