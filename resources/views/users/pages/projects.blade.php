@extends('layouts.app')

@section('title')
<title>Our Projects — {{ config('app.name') }}</title>
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
.proj-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 55%,#0284c7 100%);padding:42px 0 34px;position:relative;overflow:hidden;}
.proj-hero::before{content:'';position:absolute;width:400px;height:400px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-130px;right:-80px;pointer-events:none;}
.proj-hero::after{content:'';position:absolute;width:220px;height:220px;border-radius:50%;border:1px solid rgba(255,255,255,.05);bottom:-80px;left:60px;pointer-events:none;}
.proj-hero-inner{position:relative;z-index:1;}
.proj-hero-eyebrow{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3);color:#fde68a;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;}
.proj-hero h1{font-size:clamp(1.5rem,4vw,2.4rem);font-weight:900;color:#fff;letter-spacing:-.03em;line-height:1.15;margin:0 0 10px;}
.proj-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.proj-hero p{font-size:15px;color:rgba(255,255,255,.75);margin:0 0 16px;max-width:540px;line-height:1.65;}
.proj-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.proj-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.proj-breadcrumb a:hover{color:#fde68a;}
.proj-breadcrumb .sep{font-size:9px;opacity:.5;}
.proj-breadcrumb .current{color:#fde68a;font-weight:600;}

/* STATS STRIP */
.proj-stats{background:var(--primary);padding:0;}
.proj-stats-inner{display:flex;align-items:stretch;justify-content:center;flex-wrap:wrap;}
.proj-stat{display:flex;align-items:center;gap:10px;padding:14px 28px;border-right:1px solid rgba(255,255,255,.1);}
.proj-stat:last-child{border-right:none;}
.proj-stat-icon{width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:#fde68a;font-size:16px;flex-shrink:0;}
.proj-stat-text strong{display:block;font-size:1.05rem;font-weight:800;color:#fff;line-height:1.1;}
.proj-stat-text span{font-size:11px;color:rgba(255,255,255,.65);}

/* LAYOUT */
.proj-section{padding:52px 0 72px;background:var(--surface);}
.proj-layout{display:grid;grid-template-columns:1fr 300px;gap:32px;align-items:start;}

/* MAIN GRID */
.proj-grid-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;}
.proj-grid-title{font-size:1.1rem;font-weight:800;color:var(--primary);letter-spacing:-.02em;margin:0;}
.proj-count-badge{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:50px;background:rgba(12,74,110,.08);color:var(--primary);font-size:12px;font-weight:700;}

.proj-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:22px;}

.proj-card{
  background:var(--white);border-radius:var(--r);overflow:hidden;
  border:1px solid var(--line);box-shadow:var(--shadow-xs);
  display:flex;flex-direction:column;
  transition:transform var(--dur) var(--ease),box-shadow var(--dur),border-color var(--dur);
}
.proj-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-md);border-color:rgba(3,105,161,.2);}

.proj-card-img{width:100%;height:210px;overflow:hidden;position:relative;background:#e2e8f0;}
.proj-card-img img{width:100%;height:100%;object-fit:cover;transition:transform .5s var(--ease);}
.proj-card:hover .proj-card-img img{transform:scale(1.07);}

/* image count badge */
.proj-img-count{position:absolute;top:10px;right:10px;background:rgba(0,0,0,.55);backdrop-filter:blur(4px);color:#fff;font-size:11px;font-weight:700;padding:3px 9px;border-radius:50px;display:flex;align-items:center;gap:5px;}

.proj-card-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(12,74,110,.75) 0%,transparent 55%);
  opacity:0;transition:opacity var(--dur);
  display:flex;align-items:flex-end;padding:16px;
}
.proj-card:hover .proj-card-overlay{opacity:1;}
.proj-card-overlay .view-badge{
  display:inline-flex;align-items:center;gap:6px;
  padding:6px 14px;border-radius:var(--r-sm);
  background:var(--accent);color:var(--ink);
  font-size:12px;font-weight:700;text-decoration:none;
}

.proj-card-body{padding:18px 20px;flex:1;display:flex;flex-direction:column;}
.proj-card-title{font-size:15px;font-weight:800;color:var(--ink);margin:0 0 8px;line-height:1.3;}
.proj-card-excerpt{
  font-size:13px;color:var(--muted);line-height:1.65;flex:1;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
  margin-bottom:14px;
}
.proj-card-footer{display:flex;align-items:center;justify-content:space-between;padding-top:12px;border-top:1px solid var(--line);}
.proj-date{font-size:11.5px;color:var(--muted);}
.proj-view-btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:7px 16px;border-radius:var(--r-sm);
  background:var(--primary);color:#fff;
  font-size:12.5px;font-weight:700;text-decoration:none;
  transition:background var(--dur),transform var(--dur);
}
.proj-view-btn:hover{background:var(--primary-l);color:#fff;transform:translateX(2px);}
.proj-view-btn i{font-size:10px;transition:transform var(--dur);}
.proj-view-btn:hover i{transform:translateX(3px);}

/* SIDEBAR */
.proj-sidebar{display:flex;flex-direction:column;gap:20px;}

.proj-aside-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-xs);overflow:hidden;position:sticky;top:90px;}
.proj-aside-head{background:var(--primary);padding:14px 18px;}
.proj-aside-head h5{font-size:13px;font-weight:800;color:#fff;margin:0;letter-spacing:.04em;text-transform:uppercase;}
.proj-aside-list{padding:8px 0;}
.proj-aside-item{
  display:flex;align-items:center;gap:12px;
  padding:10px 16px;text-decoration:none;
  border-bottom:1px solid var(--line);transition:background var(--dur);
}
.proj-aside-item:last-child{border-bottom:none;}
.proj-aside-item:hover{background:var(--surface);}
.proj-aside-img{width:54px;height:54px;border-radius:8px;object-fit:cover;flex-shrink:0;border:1px solid var(--line);}
.proj-aside-info{flex:1;min-width:0;}
.proj-aside-title{font-size:12.5px;font-weight:700;color:var(--ink);line-height:1.3;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:4px;}
.proj-aside-link{font-size:11.5px;color:var(--primary-l);font-weight:600;}

/* CTA */
.proj-cta-card{
  background:linear-gradient(135deg,#0c4a6e,#0369a1);
  border-radius:var(--r);padding:22px;text-align:center;
}
.proj-cta-card i{font-size:2rem;color:#fde68a;margin-bottom:10px;}
.proj-cta-card h5{font-size:14.5px;font-weight:800;color:#fff;margin:0 0 6px;}
.proj-cta-card p{font-size:12px;color:rgba(255,255,255,.75);margin:0 0 14px;}
.proj-cta-btn{
  display:inline-flex;align-items:center;justify-content:center;gap:7px;width:100%;
  padding:10px;border-radius:var(--r-sm);
  background:var(--accent);color:var(--ink);
  text-decoration:none;font-size:13px;font-weight:800;
  transition:background var(--dur),transform var(--dur);
}
.proj-cta-btn:hover{background:var(--accent-l);color:var(--ink);transform:translateY(-2px);}

/* EMPTY */
.proj-empty{text-align:center;padding:72px 24px;background:var(--white);border-radius:var(--r);border:1.5px dashed var(--line);}
.proj-empty i{font-size:3.5rem;color:#cbd5e1;margin-bottom:16px;}
.proj-empty h3{font-size:1.2rem;font-weight:800;color:var(--ink-soft);margin-bottom:6px;}
.proj-empty p{font-size:14px;color:var(--muted);}

/* RESPONSIVE */
@media(max-width:991px){
  .proj-layout{grid-template-columns:1fr;}
  .proj-aside-card{position:static;}
}
@media(max-width:576px){
  .proj-stat{padding:12px 16px;}
  .proj-grid{grid-template-columns:1fr;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="proj-hero">
  <div class="container proj-hero-inner">
    <div class="proj-hero-eyebrow"><i class="fas fa-hard-hat"></i> Our Work</div>
    <h1>Completed <span>Solar Projects</span></h1>
    <p>Explore our portfolio of residential, commercial, and industrial solar installations across Nigeria.</p>
    <nav aria-label="breadcrumb">
      <ol class="proj-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">Projects</span></li>
      </ol>
    </nav>
  </div>
</section>

{{-- STATS --}}
<div class="proj-stats">
  <div class="container">
    <div class="proj-stats-inner">
      <div class="proj-stat">
        <div class="proj-stat-icon"><i class="fas fa-solar-panel"></i></div>
        <div class="proj-stat-text"><strong>500+</strong><span>Panels Installed</span></div>
      </div>
      <div class="proj-stat">
        <div class="proj-stat-icon"><i class="fas fa-map-marker-alt"></i></div>
        <div class="proj-stat-text"><strong>30+ States</strong><span>Across Nigeria</span></div>
      </div>
      <div class="proj-stat">
        <div class="proj-stat-icon"><i class="fas fa-leaf"></i></div>
        <div class="proj-stat-text"><strong>500+ Tons</strong><span>CO₂ Saved</span></div>
      </div>
      <div class="proj-stat">
        <div class="proj-stat-icon"><i class="fas fa-users"></i></div>
        <div class="proj-stat-text"><strong>1,200+</strong><span>Happy Clients</span></div>
      </div>
    </div>
  </div>
</div>

{{-- MAIN SECTION --}}
<section class="proj-section">
  <div class="container">
    <div class="proj-layout">

      {{-- LEFT: Project grid --}}
      <div>
        <div class="proj-grid-head">
          <h2 class="proj-grid-title">All Projects</h2>
          <span class="proj-count-badge"><i class="fas fa-th"></i> {{ $projects->count() }} project{{ $projects->count() != 1 ? 's' : '' }}</span>
        </div>

        @if($projects->count() > 0)
          <div class="proj-grid">
            @foreach($projects as $item)
              @php $firstImg = $item->images->first(); @endphp
              <article class="proj-card">
                <div class="proj-card-img">
                  @if($firstImg)
                    <img src="{{ asset($firstImg->image_path) }}" alt="{{ $item->title }}" loading="lazy">
                  @else
                    <img src="{{ asset('images/no-image.png') }}" alt="{{ $item->title }}" loading="lazy">
                  @endif
                  @if($item->images->count() > 1)
                    <span class="proj-img-count"><i class="fas fa-images"></i> {{ $item->images->count() }}</span>
                  @endif
                  <div class="proj-card-overlay">
                    <a href="{{ route('project.details', $item->slug) }}" class="view-badge">
                      <i class="fas fa-eye"></i> View Project
                    </a>
                  </div>
                </div>
                <div class="proj-card-body">
                  <h3 class="proj-card-title">{{ $item->title }}</h3>
                  <p class="proj-card-excerpt">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                  <div class="proj-card-footer">
                    <span class="proj-date"><i class="fas fa-calendar-alt" style="color:var(--accent)"></i> {{ $item->created_at->format('M Y') }}</span>
                    <a href="{{ route('project.details', $item->slug) }}" class="proj-view-btn">
                      Details <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </article>
            @endforeach
          </div>
        @else
          <div class="proj-empty">
            <i class="fas fa-hard-hat"></i>
            <h3>No projects yet</h3>
            <p>Check back soon — we're adding our completed installations.</p>
          </div>
        @endif
      </div>

      {{-- RIGHT: Sidebar --}}
      <aside class="proj-sidebar">
        <div class="proj-aside-card">
          <div class="proj-aside-head"><h5><i class="fas fa-clock me-2"></i>Recent Projects</h5></div>
          <div class="proj-aside-list">
            @forelse($latest as $item)
              @php $img = $item->images->first(); @endphp
              <a href="{{ route('project.details', $item->slug) }}" class="proj-aside-item">
                <img src="{{ $img ? asset($img->image_path) : asset('images/no-image.png') }}" alt="{{ $item->title }}" class="proj-aside-img">
                <div class="proj-aside-info">
                  <div class="proj-aside-title">{{ $item->title }}</div>
                  <span class="proj-aside-link">View Project <i class="fas fa-arrow-right" style="font-size:10px"></i></span>
                </div>
              </a>
            @empty
              <div style="padding:16px;font-size:13px;color:var(--muted)">No recent projects.</div>
            @endforelse
          </div>
        </div>

        <div class="proj-cta-card">
          <i class="fas fa-phone-alt"></i>
          <h5>Start Your Project</h5>
          <p>Ready to go solar? Get a free site assessment from our team.</p>
          <a href="{{ route('contact-us') }}" class="proj-cta-btn">
            <i class="fas fa-comments"></i> Contact Us
          </a>
        </div>
      </aside>

    </div>
  </div>
</section>

@endsection
