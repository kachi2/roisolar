@extends('layouts.app')
@section('title')<title>My Orders | Roisolar NG</title>@endsection
@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
<style>
:root{--ink:#0f172a;--ink-soft:#334155;--muted:#64748b;--line:#e2e8f0;--surface:#f8fafc;--white:#ffffff;--primary:#0c4a6e;--primary-l:#0369a1;--accent:#f59e0b;--r:14px;--r-sm:8px;--shadow-sm:0 1px 3px rgba(0,0,0,.08),0 4px 12px rgba(0,0,0,.05)}
*{font-family:'Inter',sans-serif;box-sizing:border-box}
.acct-page{background:var(--surface);min-height:100vh;padding:2rem 0 4rem}
.acct-card{background:#fff;border-radius:var(--r);box-shadow:var(--shadow-sm);overflow:hidden}
.acct-card__header{padding:1.25rem 1.5rem;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;gap:.75rem}
.acct-card__title{font-size:1rem;font-weight:700;color:var(--ink);margin:0;display:flex;align-items:center;gap:.625rem}
.acct-card__title i{color:var(--primary);font-size:.95rem}
.order-row{display:flex;align-items:center;gap:1rem;padding:1rem 1.5rem;border-bottom:1px solid var(--line);transition:background .2s;text-decoration:none;color:inherit}
.order-row:last-child{border-bottom:none}
.order-row:hover{background:var(--surface)}
.order-thumb{width:64px;height:64px;border-radius:var(--r-sm);object-fit:cover;flex-shrink:0;background:var(--surface)}
.order-thumb-placeholder{width:64px;height:64px;border-radius:var(--r-sm);background:var(--surface);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.order-thumb-placeholder i{color:var(--line);font-size:1.4rem}
.order-info{flex:1;min-width:0}
.order-name{font-size:.9rem;font-weight:600;color:var(--ink);margin:0 0 .25rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.order-meta{font-size:.78rem;color:var(--muted);margin:0 0 .4rem}
.order-price{font-size:.95rem;font-weight:700;color:var(--primary)}
.order-right{text-align:right;flex-shrink:0}
.badge-order{display:inline-flex;align-items:center;gap:.3rem;padding:.25rem .65rem;border-radius:20px;font-size:.72rem;font-weight:600}
.badge-pending{background:#fef9c3;color:#854d0e}
.badge-processing{background:#dbeafe;color:#1d4ed8}
.badge-delivered{background:#dcfce7;color:#15803d}
.badge-cancelled{background:#fee2e2;color:#dc2626}
.btn-view-order{display:inline-flex;align-items:center;gap:.35rem;font-size:.78rem;font-weight:600;color:var(--primary);text-decoration:none;padding:.35rem .75rem;border:1.5px solid var(--primary);border-radius:6px;margin-top:.5rem;transition:all .2s}
.btn-view-order:hover{background:var(--primary);color:#fff}
.empty-state{text-align:center;padding:3rem 1rem}
.empty-state i{font-size:2.5rem;color:var(--line);margin-bottom:.75rem;display:block}
.empty-state p{color:var(--muted);font-size:.9rem;margin:0 0 1rem}
.btn-primary-acct{background:linear-gradient(135deg,var(--primary) 0%,var(--primary-l) 100%);color:#fff;border:none;border-radius:var(--r-sm);padding:.6rem 1.25rem;font-size:.875rem;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem}
.btn-primary-acct:hover{opacity:.88;color:#fff}
.section-eyebrow{font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);margin-bottom:.25rem}
.paginate-wrapper{padding:1rem 1.5rem;border-top:1px solid var(--line)}
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
          <h1 class="h4 fw-bold mb-0" style="color:var(--ink)">My Orders</h1>
        </div>

        <div class="acct-card">
          <div class="acct-card__header">
            <h2 class="acct-card__title"><i class="fa-solid fa-box"></i> Order History</h2>
            <span style="font-size:.8rem;color:var(--muted)">{{ $orders->count() }} on this page</span>
          </div>

          @forelse($orders as $order)
          <a href="{{ route('users.orders.details', $order->order_no) }}" class="order-row">
            {{-- Thumbnail --}}
            @if(isset($order->image) && $order->image)
              <img src="{{ asset('images/products/'.$order->image) }}" class="order-thumb" alt="{{ $order->product_name ?? '' }}">
            @else
              <div class="order-thumb-placeholder"><i class="fa-solid fa-solar-panel"></i></div>
            @endif

            {{-- Info --}}
            <div class="order-info">
              <p class="order-name">{{ $order->product_name ?? 'Solar Product' }}</p>
              <p class="order-meta">
                Order #{{ $order->order_no }}
                @if($order->created_at)
                  &nbsp;·&nbsp; {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
                @endif
              </p>
              <span class="order-price">{{ moneyFormat($order->total ?? $order->unit_price ?? 0) }}</span>
            </div>

            {{-- Status + CTA --}}
            <div class="order-right">
              @php
                $status = strtolower($order->status ?? 'pending');
              @endphp
              @if($status === 'delivered' || $status === 'completed')
                <span class="badge-order badge-delivered"><i class="fa-solid fa-circle-check" style="font-size:.65rem"></i> Delivered</span>
              @elseif($status === 'processing' || $status === 'shipped')
                <span class="badge-order badge-processing"><i class="fa-solid fa-truck" style="font-size:.65rem"></i> {{ ucfirst($status) }}</span>
              @elseif($status === 'cancelled')
                <span class="badge-order badge-cancelled"><i class="fa-solid fa-xmark" style="font-size:.65rem"></i> Cancelled</span>
              @else
                <span class="badge-order badge-pending"><i class="fa-solid fa-clock" style="font-size:.65rem"></i> Pending</span>
              @endif
              <div>
                <span class="btn-view-order">View <i class="fa-solid fa-arrow-right" style="font-size:.65rem"></i></span>
              </div>
            </div>
          </a>
          @empty
          <div class="empty-state">
            <i class="fa-solid fa-box-open"></i>
            <p>No orders yet. Start shopping for solar solutions!</p>
            <a href="{{ route('users.products') }}" class="btn-primary-acct">
              <i class="fa-solid fa-solar-panel"></i> Shop Now
            </a>
          </div>
          @endforelse

          @if($orders->hasPages())
          <div class="paginate-wrapper">
            {{ $orders->links() }}
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
