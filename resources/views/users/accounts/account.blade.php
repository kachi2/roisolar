@extends('layouts.app')
@section('title')<title>My Account | Roisolar NG</title>@endsection
@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
<style>
:root{--ink:#0f172a;--ink-soft:#334155;--muted:#64748b;--line:#e2e8f0;--surface:#f8fafc;--white:#ffffff;--primary:#0c4a6e;--primary-l:#0369a1;--accent:#f59e0b;--r:14px;--r-sm:8px;--shadow-sm:0 1px 3px rgba(0,0,0,.08),0 4px 12px rgba(0,0,0,.05);--ease:cubic-bezier(.4,0,.2,1);--dur:.25s}
*{font-family:'Inter',sans-serif;box-sizing:border-box}
.acct-page{background:var(--surface);min-height:100vh;padding:2rem 0 4rem}
.acct-card{background:#fff;border-radius:var(--r);box-shadow:var(--shadow-sm);overflow:hidden}
.acct-card__header{padding:1.25rem 1.5rem;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;gap:.75rem}
.acct-card__title{font-size:1rem;font-weight:700;color:var(--ink);margin:0;display:flex;align-items:center;gap:.625rem}
.acct-card__title i{color:var(--primary);font-size:.95rem}
.acct-card__body{padding:1.5rem}
.info-row{display:flex;align-items:flex-start;gap:.5rem;padding:.5rem 0;border-bottom:1px solid var(--line)}
.info-row:last-child{border-bottom:none}
.info-label{font-size:.8rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:.04em;width:110px;flex-shrink:0;padding-top:.1rem}
.info-value{font-size:.9rem;color:var(--ink);font-weight:500}
.badge-status{display:inline-flex;align-items:center;gap:.35rem;padding:.3rem .75rem;border-radius:20px;font-size:.75rem;font-weight:600}
.badge-active{background:#dcfce7;color:#15803d}
.stat-card{background:#fff;border-radius:var(--r);box-shadow:var(--shadow-sm);padding:1.25rem 1.5rem;display:flex;align-items:center;gap:1rem}
.stat-icon{width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
.stat-icon--orders{background:#eff6ff;color:#2563eb}
.stat-icon--address{background:#fef3c7;color:#d97706}
.stat-icon--views{background:#f0fdf4;color:#16a34a}
.stat-icon--payments{background:#fdf4ff;color:#9333ea}
.stat-count{font-size:1.6rem;font-weight:800;color:var(--ink);line-height:1}
.stat-label{font-size:.8rem;color:var(--muted);font-weight:500;margin-top:.2rem}
.acct-link{color:var(--primary);font-size:.85rem;font-weight:600;text-decoration:none}
.acct-link:hover{color:var(--accent)}
.empty-state{text-align:center;padding:2.5rem 1rem}
.empty-state i{font-size:2.5rem;color:var(--line);margin-bottom:.75rem;display:block}
.empty-state p{color:var(--muted);font-size:.9rem;margin:0 0 1rem}
.btn-primary-acct{background:linear-gradient(135deg,var(--primary) 0%,var(--primary-l) 100%);color:#fff;border:none;border-radius:var(--r-sm);padding:.6rem 1.25rem;font-size:.875rem;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem;transition:opacity var(--dur)}
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
        {{-- Page Title --}}
        <div class="mb-3">
          <p class="section-eyebrow mb-0">Dashboard</p>
          <h1 class="h4 fw-bold mb-0" style="color:var(--ink)">Welcome back, {{ $account->first_name ?? 'there' }} 👋</h1>
        </div>

        {{-- Stats Row --}}
        <div class="row g-3 mb-4">
          <div class="col-6 col-sm-3">
            <a href="{{ route('users.orderList') }}" style="text-decoration:none">
              <div class="stat-card">
                <div class="stat-icon stat-icon--orders"><i class="fa-solid fa-box"></i></div>
                <div>
                  <div class="stat-count">{{ $orderCount ?? 0 }}</div>
                  <div class="stat-label">Orders</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-3">
            <a href="{{ route('users.account.address') }}" style="text-decoration:none">
              <div class="stat-card">
                <div class="stat-icon stat-icon--address"><i class="fa-solid fa-map-location-dot"></i></div>
                <div>
                  <div class="stat-count">{{ $addressCount ?? 0 }}</div>
                  <div class="stat-label">Addresses</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-3">
            <a href="{{ route('users.recent.views') }}" style="text-decoration:none">
              <div class="stat-card">
                <div class="stat-icon stat-icon--views"><i class="fa-solid fa-clock-rotate-left"></i></div>
                <div>
                  <div class="stat-count">{{ $recentCount ?? 0 }}</div>
                  <div class="stat-label">Viewed</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-sm-3">
            <a href="{{ route('users.order.payments') }}" style="text-decoration:none">
              <div class="stat-card">
                <div class="stat-icon stat-icon--payments"><i class="fa-solid fa-credit-card"></i></div>
                <div>
                  <div class="stat-count">{{ $paymentCount ?? 0 }}</div>
                  <div class="stat-label">Payments</div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="row g-4">
          {{-- Account Information --}}
          <div class="col-12 col-lg-6">
            <div class="acct-card h-100">
              <div class="acct-card__header">
                <h2 class="acct-card__title"><i class="fa-solid fa-user"></i> Account Information</h2>
                <span class="badge-status badge-active"><i class="fa-solid fa-circle" style="font-size:.45rem"></i> Active</span>
              </div>
              <div class="acct-card__body">
                <div class="info-row">
                  <span class="info-label">Full Name</span>
                  <span class="info-value">{{ ucfirst($account->first_name ?? '') }} {{ ucfirst($account->last_name ?? '') }}</span>
                </div>
                <div class="info-row">
                  <span class="info-label">Email</span>
                  <span class="info-value" style="word-break:break-all">{{ $account->email ?? '—' }}</span>
                </div>
                <div class="info-row">
                  <span class="info-label">Phone</span>
                  <span class="info-value">{{ $account->phone ?? '—' }}</span>
                </div>
                <div class="info-row">
                  <span class="info-label">Last Login</span>
                  <span class="info-value" style="color:var(--muted)">{{ $account->last_login ?? '—' }}</span>
                </div>
                <div class="mt-3">
                  <a href="{{ route('users.account.settings') }}" class="acct-link">
                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profile
                  </a>
                </div>
              </div>
            </div>
          </div>

          {{-- Default Shipping Address --}}
          <div class="col-12 col-lg-6">
            <div class="acct-card h-100">
              <div class="acct-card__header">
                <h2 class="acct-card__title"><i class="fa-solid fa-map-location-dot"></i> Default Shipping</h2>
                @if(isset($address))
                  <span class="badge-status" style="background:#fef3c7;color:#92400e"><i class="fa-solid fa-star" style="font-size:.7rem"></i> Default</span>
                @endif
              </div>
              <div class="acct-card__body">
                @if(isset($address))
                  <div class="info-row">
                    <span class="info-label">Name</span>
                    <span class="info-value">{{ ucfirst($address->name) }}</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Contact</span>
                    <span class="info-value">{{ $address->email ?? '' }} @if($address->phone) | {{ $address->phone }} @endif</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Address</span>
                    <span class="info-value">{{ $address->address }}</span>
                  </div>
                  <div class="info-row">
                    <span class="info-label">Location</span>
                    <span class="info-value">{{ $address->city }}@if($address->state), {{ $address->state }}@endif, {{ $address->country }}</span>
                  </div>
                  <div class="mt-3">
                    <a href="{{ route('users.account.address') }}" class="acct-link">
                      <i class="fa-solid fa-pen-to-square me-1"></i> Manage Addresses
                    </a>
                  </div>
                @else
                  <div class="empty-state">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <p>No shipping address saved yet.</p>
                    <a href="{{ route('users.address.create') }}" class="btn-primary-acct">
                      <i class="fa-solid fa-plus"></i> Add Address
                    </a>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
