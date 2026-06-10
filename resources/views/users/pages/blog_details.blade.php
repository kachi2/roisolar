@extends('layouts.app')

@section('title', $blog->title)

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
.bd-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 55%,#0284c7 100%);padding:42px 0 34px;position:relative;overflow:hidden;}
.bd-hero::before{content:'';position:absolute;width:420px;height:420px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-130px;right:-90px;pointer-events:none;}
.bd-hero::after{content:'';position:absolute;width:200px;height:200px;border-radius:50%;border:1px solid rgba(255,255,255,.05);bottom:-70px;left:50px;pointer-events:none;}
.bd-hero-inner{position:relative;z-index:1;}
.bd-hero-eyebrow{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3);color:#fde68a;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;}
.bd-hero h1{font-size:clamp(1.3rem,3.5vw,2rem);font-weight:900;color:#fff;letter-spacing:-.03em;line-height:1.25;margin:0 0 14px;max-width:820px;}
.bd-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.bd-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.bd-breadcrumb a:hover{color:#fde68a;}
.bd-breadcrumb .sep{font-size:9px;opacity:.5;}
.bd-breadcrumb .current{color:#fde68a;font-weight:600;}

/* MAIN */
.bd-main{padding:52px 0 72px;background:var(--surface);}
.bd-layout{display:grid;grid-template-columns:1fr 300px;gap:36px;align-items:start;}

/* ARTICLE CARD */
.bd-article{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-sm);overflow:hidden;}
.bd-article-img{width:100%;max-height:420px;object-fit:cover;display:block;}
.bd-article-body{padding:32px 36px;}
.bd-article-meta{
  display:flex;align-items:center;gap:18px;flex-wrap:wrap;
  margin-bottom:24px;padding-bottom:18px;border-bottom:1px solid var(--line);
}
.bd-meta-item{display:flex;align-items:center;gap:6px;font-size:12.5px;color:var(--muted);}
.bd-meta-item i{color:var(--accent);font-size:11px;}
.bd-meta-item strong{color:var(--ink-soft);font-weight:600;}
.bd-article-content{font-size:15px;color:var(--ink-soft);line-height:1.8;}
.bd-article-content h1,.bd-article-content h2,.bd-article-content h3,.bd-article-content h4{
  color:var(--primary);font-weight:800;letter-spacing:-.02em;margin:1.5em 0 .6em;
}
.bd-article-content p{margin:0 0 1em;}
.bd-article-content ul,.bd-article-content ol{padding-left:22px;margin:0 0 1em;}
.bd-article-content li{margin-bottom:.4em;}
.bd-article-content img{max-width:100%;border-radius:var(--r-sm);margin:1em 0;}
.bd-article-content a{color:var(--primary-l);text-decoration:underline;}
.bd-article-content blockquote{
  border-left:4px solid var(--accent);padding:14px 18px;
  background:rgba(245,158,11,.05);border-radius:0 var(--r-sm) var(--r-sm) 0;
  margin:1.5em 0;font-style:italic;color:var(--ink-soft);
}

/* SHARE BAR */
.bd-share{
  display:flex;align-items:center;gap:10px;flex-wrap:wrap;
  margin-top:28px;padding-top:20px;border-top:1px solid var(--line);
}
.bd-share-label{font-size:12.5px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.05em;}
.bd-share-btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:8px 16px;border-radius:50px;font-size:12.5px;font-weight:700;
  text-decoration:none;transition:all var(--dur);border:none;cursor:pointer;
}
.bd-share-btn.wa{background:#25d366;color:#fff;}
.bd-share-btn.wa:hover{background:#1da851;}
.bd-share-btn.fb{background:#1877f2;color:#fff;}
.bd-share-btn.fb:hover{background:#0d6efd;}
.bd-share-btn.tw{background:#000;color:#fff;}
.bd-share-btn.tw:hover{background:#333;}
.bd-share-btn.cp{background:var(--surface);color:var(--ink-soft);border:1.5px solid var(--line);}
.bd-share-btn.cp:hover{background:var(--line);}

/* BACK LINK */
.bd-back{
  display:inline-flex;align-items:center;gap:7px;
  font-size:13px;font-weight:700;color:var(--primary);text-decoration:none;
  margin-bottom:22px;transition:gap var(--dur),color var(--dur);
}
.bd-back:hover{color:var(--primary-l);gap:11px;}

/* SIDEBAR */
.bd-sidebar{display:flex;flex-direction:column;gap:24px;position:sticky;top:90px;}
.bd-sidebar-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-xs);overflow:hidden;}
.bd-sidebar-head{padding:14px 18px;background:linear-gradient(135deg,var(--primary),var(--primary-l));}
.bd-sidebar-head h3{font-size:13px;font-weight:800;color:#fff;margin:0;letter-spacing:.02em;}
.bd-sidebar-body{padding:14px 18px;}
.bd-recent-item{display:flex;gap:12px;align-items:center;padding:10px 0;border-bottom:1px solid var(--line);}
.bd-recent-item:last-child{border-bottom:none;}
.bd-recent-thumb{width:52px;height:52px;border-radius:8px;object-fit:cover;flex-shrink:0;background:#e2e8f0;}
.bd-recent-info{flex:1;min-width:0;}
.bd-recent-title{font-size:12.5px;font-weight:700;color:var(--ink);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-decoration:none;display:block;margin-bottom:3px;}
.bd-recent-title:hover{color:var(--primary-l);}
.bd-recent-date{font-size:11px;color:var(--muted);}
.bd-sidebar-cta{background:linear-gradient(135deg,var(--primary),var(--primary-l));border-radius:var(--r);padding:22px;text-align:center;}
.bd-sidebar-cta i{font-size:2rem;color:#fde68a;margin-bottom:10px;}
.bd-sidebar-cta h4{font-size:1rem;font-weight:900;color:#fff;margin:0 0 6px;letter-spacing:-.02em;}
.bd-sidebar-cta p{font-size:12.5px;color:rgba(255,255,255,.75);margin:0 0 14px;}
.bd-sidebar-cta a{display:inline-flex;align-items:center;gap:7px;padding:10px 20px;background:var(--accent);color:var(--ink);border-radius:var(--r-sm);font-size:13px;font-weight:800;text-decoration:none;transition:background var(--dur);}
.bd-sidebar-cta a:hover{background:var(--accent-l);color:var(--ink);}

/* RESPONSIVE */
@media(max-width:991px){
  .bd-layout{grid-template-columns:1fr;}
  .bd-sidebar{position:static;}
}
@media(max-width:576px){
  .bd-article-body{padding:20px;}
  .bd-article-content{font-size:14px;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="bd-hero">
  <div class="container bd-hero-inner">
    <div class="bd-hero-eyebrow"><i class="fas fa-newspaper"></i> Blog Article</div>
    <h1>{{ $blog->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="bd-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><a href="{{ route('users.blogs') }}">Blog</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">{{ Str::limit($blog->title, 40) }}</span></li>
      </ol>
    </nav>
  </div>
</section>

{{-- MAIN --}}
<section class="bd-main">
  <div class="container">

    <a href="{{ route('users.blogs') }}" class="bd-back">
      <i class="fas fa-arrow-left"></i> Back to Blog
    </a>

    <div class="bd-layout">

      {{-- ARTICLE --}}
      <div>
        <article class="bd-article">
          @if($blog->image)
            <img class="bd-article-img"
                 src="{{ asset('images/blogs/'.$blog->image) }}"
                 alt="{{ $blog->title }}"
                 onerror="this.src='{{ asset('images/no-image.png') }}'">
          @endif
          <div class="bd-article-body">
            <div class="bd-article-meta">
              <div class="bd-meta-item">
                <i class="fas fa-calendar-alt"></i>
                <strong>{{ $blog->created_at ? $blog->created_at->format('d M Y') : 'N/A' }}</strong>
              </div>
              <div class="bd-meta-item">
                <i class="fas fa-eye"></i>
                <strong>{{ number_format($blog->views ?? 0) }} views</strong>
              </div>
              <div class="bd-meta-item">
                <i class="fas fa-clock"></i>
                <strong>{{ max(1, round(str_word_count(strip_tags($blog->content ?? '')) / 200)) }} min read</strong>
              </div>
            </div>

            <div class="bd-article-content">
              {!! $blog->content !!}
            </div>

            {{-- SHARE BAR --}}
            @php
              $shareUrl  = urlencode(url()->current());
              $shareText = urlencode($blog->title);
              $waPhone   = preg_replace('/[^0-9]/', '', $settings->site_phone ?? '');
            @endphp
            <div class="bd-share">
              <span class="bd-share-label">Share:</span>
              <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank" rel="noopener" class="bd-share-btn wa">
                <i class="fab fa-whatsapp"></i> WhatsApp
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener" class="bd-share-btn fb">
                <i class="fab fa-facebook-f"></i> Facebook
              </a>
              <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}" target="_blank" rel="noopener" class="bd-share-btn tw">
                <i class="fab fa-x-twitter"></i> X
              </a>
              <button onclick="navigator.clipboard.writeText(window.location.href);this.innerHTML='<i class=\'fas fa-check\'></i> Copied!'" class="bd-share-btn cp">
                <i class="fas fa-link"></i> Copy Link
              </button>
            </div>
          </div>
        </article>
      </div>

      {{-- SIDEBAR --}}
      <aside class="bd-sidebar">

        <div class="bd-sidebar-card">
          <div class="bd-sidebar-head"><h3><i class="fas fa-clock" style="margin-right:6px;color:#fde68a"></i> Recent Posts</h3></div>
          <div class="bd-sidebar-body">
            @forelse($latestBlogs as $lb)
              <div class="bd-recent-item">
                <img class="bd-recent-thumb"
                     src="{{ asset('images/blogs/'.$lb->image) }}"
                     alt="{{ $lb->title }}"
                     onerror="this.src='{{ asset('images/no-image.png') }}'">
                <div class="bd-recent-info">
                  <a href="{{ route('blogs.details', $lb->hashid) }}" class="bd-recent-title" title="{{ $lb->title }}">
                    {{ Str::limit($lb->title, 45) }}
                  </a>
                  <div class="bd-recent-date">{{ $lb->created_at ? $lb->created_at->format('d M Y') : '' }}</div>
                </div>
              </div>
            @empty
              <p style="font-size:13px;color:var(--muted);margin:0">No other posts yet.</p>
            @endforelse
          </div>
        </div>

        <div class="bd-sidebar-cta">
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
