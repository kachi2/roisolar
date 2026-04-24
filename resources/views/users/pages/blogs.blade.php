@extends('layouts.app')

@section('title')
<title>Blog — {{ config('app.name') }}</title>
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
.bl-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 55%,#0284c7 100%);padding:42px 0 34px;position:relative;overflow:hidden;}
.bl-hero::before{content:'';position:absolute;width:420px;height:420px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-130px;right:-90px;pointer-events:none;}
.bl-hero::after{content:'';position:absolute;width:200px;height:200px;border-radius:50%;border:1px solid rgba(255,255,255,.05);bottom:-70px;left:50px;pointer-events:none;}
.bl-hero-inner{position:relative;z-index:1;}
.bl-hero-eyebrow{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3);color:#fde68a;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;}
.bl-hero h1{font-size:clamp(1.5rem,4vw,2.4rem);font-weight:900;color:#fff;letter-spacing:-.03em;line-height:1.15;margin:0 0 10px;}
.bl-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.bl-hero p{font-size:15px;color:rgba(255,255,255,.75);margin:0 0 16px;max-width:520px;line-height:1.65;}
.bl-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.bl-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.bl-breadcrumb a:hover{color:#fde68a;}
.bl-breadcrumb .sep{font-size:9px;opacity:.5;}
.bl-breadcrumb .current{color:#fde68a;font-weight:600;}

/* MAIN */
.bl-main{padding:52px 0 72px;background:var(--surface);}
.bl-layout{display:grid;grid-template-columns:1fr 300px;gap:36px;align-items:start;}

/* GRID */
.bl-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:24px;}

/* CARD */
.bl-card{
  background:var(--white);border-radius:var(--r);overflow:hidden;
  border:1px solid var(--line);box-shadow:var(--shadow-sm);
  display:flex;flex-direction:column;
  transition:box-shadow var(--dur) var(--ease),border-color var(--dur),transform var(--dur);
}
.bl-card:hover{box-shadow:var(--shadow-md);border-color:rgba(3,105,161,.2);transform:translateY(-4px);}
.bl-card-img{
  position:relative;overflow:hidden;height:200px;background:#e2e8f0;flex-shrink:0;
}
.bl-card-img img{width:100%;height:100%;object-fit:cover;transition:transform .6s var(--ease);}
.bl-card:hover .bl-card-img img{transform:scale(1.06);}
.bl-card-img-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(12,74,110,.55) 0%,transparent 50%);
  opacity:0;transition:opacity var(--dur);
  display:flex;align-items:flex-end;padding:14px;
}
.bl-card:hover .bl-card-img-overlay{opacity:1;}
.bl-card-img-overlay span{
  color:#fff;font-size:12px;font-weight:700;
  background:var(--accent);padding:4px 12px;border-radius:50px;
}
.bl-card-body{padding:20px;flex:1;display:flex;flex-direction:column;}
.bl-card-date{font-size:11.5px;color:var(--muted);margin-bottom:8px;display:flex;align-items:center;gap:6px;}
.bl-card-date i{color:var(--accent);font-size:10px;}
.bl-card-title{
  font-size:1rem;font-weight:800;color:var(--ink);letter-spacing:-.02em;
  margin:0 0 10px;line-height:1.4;
}
.bl-card-title a{color:inherit;text-decoration:none;}
.bl-card-title a:hover{color:var(--primary-l);}
.bl-card-excerpt{font-size:13px;color:var(--ink-soft);line-height:1.7;margin:0 0 16px;flex:1;}
.bl-card-footer{display:flex;align-items:center;justify-content:space-between;margin-top:auto;padding-top:14px;border-top:1px solid var(--line);}
.bl-card-views{font-size:12px;color:var(--muted);display:flex;align-items:center;gap:5px;}
.bl-card-views i{font-size:11px;}
.bl-card-link{
  display:inline-flex;align-items:center;gap:6px;
  font-size:12.5px;font-weight:700;color:var(--primary);text-decoration:none;
  transition:gap var(--dur),color var(--dur);
}
.bl-card-link:hover{color:var(--primary-l);gap:10px;}

/* FEATURED (first card — full width) */
.bl-card-featured{grid-column:1/-1;}
.bl-card-featured .bl-card-img{height:300px;}
.bl-card-featured .bl-card-title{font-size:1.25rem;}

/* SIDEBAR */
.bl-sidebar{display:flex;flex-direction:column;gap:24px;position:sticky;top:90px;}
.bl-sidebar-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-xs);overflow:hidden;}
.bl-sidebar-head{
  padding:14px 18px;
  background:linear-gradient(135deg,var(--primary),var(--primary-l));
}
.bl-sidebar-head h3{font-size:13px;font-weight:800;color:#fff;margin:0;letter-spacing:.02em;}
.bl-sidebar-body{padding:14px 18px;}

/* Recent posts */
.bl-recent-item{
  display:flex;gap:12px;align-items:center;
  padding:10px 0;border-bottom:1px solid var(--line);
}
.bl-recent-item:last-child{border-bottom:none;}
.bl-recent-thumb{width:52px;height:52px;border-radius:8px;object-fit:cover;flex-shrink:0;background:#e2e8f0;}
.bl-recent-info{flex:1;min-width:0;}
.bl-recent-title{
  font-size:12.5px;font-weight:700;color:var(--ink);
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
  text-decoration:none;display:block;margin-bottom:3px;
}
.bl-recent-title:hover{color:var(--primary-l);}
.bl-recent-date{font-size:11px;color:var(--muted);}

/* CTA sidebar card */
.bl-sidebar-cta{
  background:linear-gradient(135deg,var(--primary),var(--primary-l));
  border-radius:var(--r);padding:22px;text-align:center;
}
.bl-sidebar-cta i{font-size:2rem;color:#fde68a;margin-bottom:10px;}
.bl-sidebar-cta h4{font-size:1rem;font-weight:900;color:#fff;margin:0 0 6px;letter-spacing:-.02em;}
.bl-sidebar-cta p{font-size:12.5px;color:rgba(255,255,255,.75);margin:0 0 14px;}
.bl-sidebar-cta a{
  display:inline-flex;align-items:center;gap:7px;
  padding:10px 20px;background:var(--accent);color:var(--ink);
  border-radius:var(--r-sm);font-size:13px;font-weight:800;text-decoration:none;
  transition:background var(--dur);
}
.bl-sidebar-cta a:hover{background:var(--accent-l);color:var(--ink);}

/* Empty */
.bl-empty{
  grid-column:1/-1;text-align:center;padding:72px 24px;
  background:var(--white);border-radius:var(--r);border:1.5px dashed var(--line);
}
.bl-empty i{font-size:3.5rem;color:#cbd5e1;margin-bottom:16px;}
.bl-empty h3{font-size:1.2rem;font-weight:800;color:var(--ink-soft);margin-bottom:6px;}
.bl-empty p{font-size:14px;color:var(--muted);}

/* RESPONSIVE */
@media(max-width:991px){
  .bl-layout{grid-template-columns:1fr;}
  .bl-sidebar{position:static;}
}
@media(max-width:640px){
  .bl-grid{grid-template-columns:1fr;}
  .bl-card-featured{grid-column:auto;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="bl-hero">
  <div class="container bl-hero-inner">
    <div class="bl-hero-eyebrow"><i class="fas fa-newspaper"></i> Knowledge Hub</div>
    <h1>Solar Energy <span>Blog</span></h1>
    <p>Expert insights, tips, and news about solar power, energy efficiency, and sustainable living in Nigeria.</p>
    <nav aria-label="breadcrumb">
      <ol class="bl-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">Blog</span></li>
      </ol>
    </nav>
  </div>
</section>

{{-- MAIN --}}
<section class="bl-main">
  <div class="container">
    <div class="bl-layout">

      {{-- BLOG GRID --}}
      <div>
        @if($blogs->count() > 0)
          <div class="bl-grid">
            @foreach($blogs as $i => $blog)
              <div class="bl-card {{ $i === 0 ? 'bl-card-featured' : '' }}">
                <div class="bl-card-img">
                  <img src="{{ asset('images/blogs/'.$blog->image) }}"
                       alt="{{ $blog->title }}" loading="lazy"
                       onerror="this.src='{{ asset('images/no-image.png') }}'">
                  <div class="bl-card-img-overlay"><span>Read Article</span></div>
                </div>
                <div class="bl-card-body">
                  <div class="bl-card-date">
                    <i class="fas fa-calendar-alt"></i>
                    {{ $blog->created_at ? $blog->created_at->format('d M Y') : '' }}
                  </div>
                  <h2 class="bl-card-title">
                    <a href="{{ route('blogs.details', $blog->hashid) }}">{{ $blog->title }}</a>
                  </h2>
                  <p class="bl-card-excerpt">
                    {{ Str::limit(strip_tags($blog->content ?? ''), $i === 0 ? 180 : 100) }}
                  </p>
                  <div class="bl-card-footer">
                    <span class="bl-card-views">
                      <i class="fas fa-eye"></i>
                      {{ number_format($blog->views ?? 0) }} views
                    </span>
                    <a href="{{ route('blogs.details', $blog->hashid) }}" class="bl-card-link">
                      Read More <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="bl-grid">
            <div class="bl-empty">
              <i class="fas fa-newspaper"></i>
              <h3>No blog posts yet</h3>
              <p>Check back soon — we're preparing articles about solar energy for you.</p>
            </div>
          </div>
        @endif
      </div>

      {{-- SIDEBAR --}}
      <aside class="bl-sidebar">

        {{-- Recent Posts --}}
        <div class="bl-sidebar-card">
          <div class="bl-sidebar-head"><h3><i class="fas fa-clock" style="margin-right:6px;color:#fde68a"></i> Recent Posts</h3></div>
          <div class="bl-sidebar-body">
            @forelse($blogs->take(5) as $rb)
              <div class="bl-recent-item">
                <img class="bl-recent-thumb"
                     src="{{ asset('images/blogs/'.$rb->image) }}"
                     alt="{{ $rb->title }}"
                     onerror="this.src='{{ asset('images/no-image.png') }}'">
                <div class="bl-recent-info">
                  <a href="{{ route('blogs.details', $rb->hashid) }}" class="bl-recent-title" title="{{ $rb->title }}">
                    {{ Str::limit($rb->title, 45) }}
                  </a>
                  <div class="bl-recent-date">{{ $rb->created_at ? $rb->created_at->format('d M Y') : '' }}</div>
                </div>
              </div>
            @empty
              <p style="font-size:13px;color:var(--muted);margin:0">No posts yet.</p>
            @endforelse
          </div>
        </div>

        {{-- CTA --}}
        <div class="bl-sidebar-cta">
          <i class="fas fa-solar-panel"></i>
          <h4>Ready to Go Solar?</h4>
          <p>Get a free consultation with our solar energy experts today.</p>
          <a href="{{ route('contact-us') }}"><i class="fas fa-comments"></i> Talk to an Expert</a>
        </div>

      </aside>

    </div>
  </div>
</section>

@endsection
