@extends('layouts.app')
@section('title', 'Recently Viewed')
@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
<style>
:root{--ink:#0f172a;--ink-soft:#334155;--muted:#64748b;--line:#e2e8f0;--surface:#f8fafc;--primary:#0c4a6e;--primary-l:#0369a1;--accent:#f59e0b;--r:14px;--r-sm:8px;--shadow-sm:0 1px 3px rgba(0,0,0,.08),0 4px 12px rgba(0,0,0,.05)}
*{font-family:'Inter',sans-serif;box-sizing:border-box}
.acct-page{background:var(--surface);min-height:100vh;padding:2rem 0 4rem}
.acct-card{background:#fff;border-radius:var(--r);box-shadow:var(--shadow-sm);overflow:hidden}
.acct-card__header{padding:1.25rem 1.5rem;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;gap:.75rem}
.acct-card__title{font-size:1rem;font-weight:700;color:var(--ink);margin:0;display:flex;align-items:center;gap:.625rem}
.acct-card__title i{color:var(--primary)}
.prod-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:1rem;padding:1.5rem}
.prod-card{border:1.5px solid var(--line);border-radius:var(--r-sm);overflow:hidden;transition:border-color .2s,box-shadow .2s;text-decoration:none;display:block;color:inherit}
.prod-card:hover{border-color:var(--primary);box-shadow:0 4px 16px rgba(12,74,110,.1);color:inherit}
.prod-card__img-wrap{position:relative;overflow:hidden;aspect-ratio:1/1;background:var(--surface)}
.prod-card__img-wrap img{width:100%;height:100%;object-fit:cover;transition:transform .35s}
.prod-card:hover .prod-card__img-wrap img{transform:scale(1.06)}
.prod-card__overlay{position:absolute;inset:0;background:rgba(12,74,110,.5);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity .25s}
.prod-card:hover .prod-card__overlay{opacity:1}
.prod-card__overlay span{color:#fff;font-size:.78rem;font-weight:600;background:rgba(255,255,255,.2);border:1.5px solid rgba(255,255,255,.5);padding:.35rem .875rem;border-radius:20px}
.prod-discount{position:absolute;top:.5rem;left:.5rem;background:var(--accent);color:#fff;font-size:.7rem;font-weight:700;padding:.2rem .5rem;border-radius:20px}
.prod-card__body{padding:.75rem}
.prod-cat{font-size:.7rem;font-weight:600;color:var(--accent);text-transform:uppercase;letter-spacing:.04em;margin:0 0 .2rem}
.prod-name{font-size:.82rem;font-weight:600;color:var(--ink);margin:0 0 .4rem;line-height:1.35;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.prod-price{font-size:.9rem;font-weight:700;color:var(--primary)}
.prod-old{font-size:.75rem;color:var(--muted);text-decoration:line-through;margin-left:.35rem}
.empty-state{text-align:center;padding:3rem 1rem}
.empty-state i{font-size:2.5rem;color:var(--line);margin-bottom:.75rem;display:block}
.empty-state p{color:var(--muted);font-size:.9rem;margin:0 0 1rem}
.btn-primary-acct{background:linear-gradient(135deg,var(--primary) 0%,var(--primary-l) 100%);color:#fff;border:none;border-radius:var(--r-sm);padding:.6rem 1.25rem;font-size:.875rem;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem}
.btn-primary-acct:hover{opacity:.88;color:#fff}
.section-eyebrow{font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);margin-bottom:.25rem}
</style>
@endsection
@section('content')
<div class="acct-page">
  <div class="container">
    <div class="row g-4">
      @include('includes.sidebarAccount')

      <div class="col-12 col-md-9">
        <div class="mb-3">
          <p class="section-eyebrow mb-0">Account</p>
          <h1 class="h4 fw-bold mb-0" style="color:var(--ink)">Recently Viewed</h1>
        </div>

        <div class="acct-card">
          <div class="acct-card__header">
            <h2 class="acct-card__title"><i class="fa-solid fa-clock-rotate-left"></i> Products You've Viewed</h2>
            <span style="font-size:.8rem;color:var(--muted)">Last 10 items</span>
          </div>

          @if(isset($recent) && count($recent) > 0)
          <div class="prod-grid">
            @foreach($recent as $product)
            <a href="{{ route('product.details', $product->slug ?? $product->hashid) }}" class="prod-card">
              <div class="prod-card__img-wrap">
                <img src="{{ asset('images/products/'.$product->image_path) }}" alt="{{ $product->name }}">
                @if(isset($product->discount) && $product->discount > 0)
                <span class="prod-discount">-{{ number_format($product->discount) }}%</span>
                @endif
                <div class="prod-card__overlay"><span>View Product</span></div>
              </div>
              <div class="prod-card__body">
                @if(isset($product->category))
                <p class="prod-cat">{{ $product->category->name }}</p>
                @endif
                <p class="prod-name">{{ $product->name }}</p>
                <div>
                  <span class="prod-price">{{ moneyFormat($product->sale_price ?? $product->price) }}</span>
                  @if(isset($product->sale_price) && $product->sale_price < $product->price)
                  <span class="prod-old">{{ moneyFormat($product->price) }}</span>
                  @endif
                </div>
              </div>
            </a>
            @endforeach
          </div>
          @else
          <div class="empty-state">
            <i class="fa-solid fa-eye-slash"></i>
            <p>No recently viewed products. Start exploring!</p>
            <a href="{{ route('users.products') }}" class="btn-primary-acct">
              <i class="fa-solid fa-solar-panel"></i> Browse Products
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
