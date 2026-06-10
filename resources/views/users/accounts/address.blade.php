@extends('layouts.app')
@section('title', 'Address Book')
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
.acct-card__header{padding:1.25rem 1.5rem;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;gap:.75rem;flex-wrap:wrap}
.acct-card__title{font-size:1rem;font-weight:700;color:var(--ink);margin:0;display:flex;align-items:center;gap:.625rem}
.acct-card__title i{color:var(--primary)}
.addr-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1.25rem;padding:1.5rem}
.addr-card{border:1.5px solid var(--line);border-radius:var(--r-sm);padding:1.25rem;position:relative;transition:border-color .2s,box-shadow .2s}
.addr-card:hover{border-color:var(--primary);box-shadow:0 0 0 3px rgba(12,74,110,.06)}
.addr-card--default{border-color:var(--accent);background:#fffbeb}
.addr-default-badge{display:inline-flex;align-items:center;gap:.3rem;padding:.2rem .6rem;background:#fef3c7;color:#92400e;border-radius:20px;font-size:.7rem;font-weight:700;margin-bottom:.75rem}
.addr-name{font-size:.95rem;font-weight:700;color:var(--ink);margin:0 0 .5rem}
.addr-line{display:flex;align-items:flex-start;gap:.5rem;font-size:.82rem;color:var(--muted);margin-bottom:.35rem}
.addr-line i{margin-top:.1rem;font-size:.75rem;color:var(--primary);flex-shrink:0;width:14px}
.addr-actions{display:flex;align-items:center;gap:.5rem;margin-top:1rem;padding-top:.875rem;border-top:1px solid var(--line)}
.btn-addr-edit{display:inline-flex;align-items:center;gap:.35rem;font-size:.78rem;font-weight:600;color:var(--primary);text-decoration:none;padding:.3rem .7rem;border:1.5px solid var(--primary);border-radius:6px;transition:all .2s}
.btn-addr-edit:hover{background:var(--primary);color:#fff}
.btn-addr-delete{display:inline-flex;align-items:center;gap:.35rem;font-size:.78rem;font-weight:600;color:#ef4444;text-decoration:none;padding:.3rem .7rem;border:1.5px solid #fca5a5;border-radius:6px;transition:all .2s;background:none;cursor:pointer}
.btn-addr-delete:hover{background:#fef2f2;border-color:#ef4444}
.empty-state{text-align:center;padding:3rem 1rem}
.empty-state i{font-size:2.5rem;color:var(--line);margin-bottom:.75rem;display:block}
.empty-state p{color:var(--muted);font-size:.9rem;margin:0 0 1rem}
.btn-primary-acct{background:linear-gradient(135deg,var(--primary) 0%,var(--primary-l) 100%);color:#fff;border:none;border-radius:var(--r-sm);padding:.6rem 1.25rem;font-size:.875rem;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:.5rem;transition:opacity .2s}
.btn-primary-acct:hover{opacity:.88;color:#fff}
.section-eyebrow{font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);margin-bottom:.25rem}
/* Flash alerts */
.flash-alert{padding:.875rem 1.25rem;border-radius:var(--r-sm);font-size:.875rem;font-weight:500;margin-bottom:1rem;display:flex;align-items:center;gap:.625rem}
.flash-success{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534}
.flash-error{background:#fef2f2;border:1px solid #fecaca;color:#991b1b}
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
          <h1 class="h4 fw-bold mb-0" style="color:var(--ink)">Address Book</h1>
        </div>

        {{-- Flash Messages --}}
        @if(session('msg'))
          <div class="flash-alert {{ session('alert') === 'success' ? 'flash-success' : 'flash-error' }}">
            <i class="fa-solid {{ session('alert') === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation' }}"></i>
            {{ session('msg') }}
          </div>
        @endif

        <div class="acct-card">
          <div class="acct-card__header">
            <h2 class="acct-card__title"><i class="fa-solid fa-map-location-dot"></i> Saved Addresses</h2>
            <a href="{{ route('users.address.create') }}" class="btn-primary-acct" style="font-size:.8rem;padding:.45rem 1rem">
              <i class="fa-solid fa-plus"></i> Add New
            </a>
          </div>

          <div style="padding:1.5rem;display:grid;grid-template-columns:repeat(auto-fill,minmax(270px,1fr));gap:1.25rem">
            @forelse($addresses as $address)
            <div class="addr-card {{ $address->is_default ? 'addr-card--default' : '' }}">
              @if($address->is_default)
                <div class="addr-default-badge"><i class="fa-solid fa-star"></i> Default</div>
              @endif
              <p class="addr-name">{{ ucfirst($address->name) }}</p>
              @if($address->email)
              <div class="addr-line"><i class="fa-solid fa-envelope"></i><span>{{ $address->email }}</span></div>
              @endif
              @if($address->phone)
              <div class="addr-line"><i class="fa-solid fa-phone"></i><span>{{ $address->phone }}</span></div>
              @endif
              <div class="addr-line"><i class="fa-solid fa-location-dot"></i><span>{{ $address->address }}</span></div>
              @if($address->city || $address->state)
              <div class="addr-line"><i class="fa-solid fa-city"></i><span>{{ $address->city }}{{ $address->state ? ', '.$address->state : '' }}</span></div>
              @endif
              @if($address->country)
              <div class="addr-line"><i class="fa-solid fa-flag"></i><span>{{ $address->country }}</span></div>
              @endif
              <div class="addr-actions">
                <a href="{{ route('users.address.edit', $address->hashid) }}" class="btn-addr-edit">
                  <i class="fa-solid fa-pen"></i> Edit
                </a>
                <a href="{{ route('users.address.delete', $address->hashid) }}"
                   class="btn-addr-delete"
                   onclick="return confirm('Remove this address?')">
                  <i class="fa-solid fa-trash"></i> Remove
                </a>
              </div>
            </div>
            @empty
            <div style="grid-column:1/-1" class="empty-state">
              <i class="fa-solid fa-map-location-dot"></i>
              <p>No addresses saved yet.</p>
              <a href="{{ route('users.address.create') }}" class="btn-primary-acct">
                <i class="fa-solid fa-plus"></i> Add Address
              </a>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
