@extends('layouts.app')
@section('title', 'Payment History')
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
.pay-table{width:100%;border-collapse:collapse}
.pay-table thead th{font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--muted);padding:.875rem 1.25rem;border-bottom:2px solid var(--line);white-space:nowrap;background:var(--surface)}
.pay-table tbody td{padding:.875rem 1.25rem;border-bottom:1px solid var(--line);font-size:.85rem;color:var(--ink);vertical-align:middle}
.pay-table tbody tr:last-child td{border-bottom:none}
.pay-table tbody tr:hover td{background:var(--surface)}
.pay-ref{font-family:'Courier New',monospace;font-size:.78rem;color:var(--muted);background:var(--surface);padding:.2rem .5rem;border-radius:4px}
.pay-amount{font-weight:700;color:var(--primary);font-size:.9rem}
.badge-pay{display:inline-flex;align-items:center;gap:.3rem;padding:.25rem .65rem;border-radius:20px;font-size:.72rem;font-weight:600}
.badge-success{background:#dcfce7;color:#15803d}
.badge-pending{background:#fef9c3;color:#854d0e}
.badge-failed{background:#fee2e2;color:#dc2626}
.empty-state{text-align:center;padding:3rem 1rem}
.empty-state i{font-size:2.5rem;color:var(--line);margin-bottom:.75rem;display:block}
.empty-state p{color:var(--muted);font-size:.9rem;margin:0}
.section-eyebrow{font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);margin-bottom:.25rem}
@media(max-width:640px){
  .pay-table thead th:nth-child(3),.pay-table tbody td:nth-child(3){display:none}
}
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
          <h1 class="h4 fw-bold mb-0" style="color:var(--ink)">Payment History</h1>
        </div>

        <div class="acct-card">
          <div class="acct-card__header">
            <h2 class="acct-card__title"><i class="fa-solid fa-credit-card"></i> Transactions</h2>
            <span style="font-size:.8rem;color:var(--muted)">{{ count($payments) }} record(s)</span>
          </div>

          @if(count($payments) > 0)
          <div style="overflow-x:auto">
            <table class="pay-table">
              <thead>
                <tr>
                  <th>Order No</th>
                  <th>Payment Ref</th>
                  <th>External Ref</th>
                  <th>Amount</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($payments as $pay)
                <tr>
                  <td>
                    <a href="{{ route('users.orders.details', $pay->order_id) }}"
                       style="color:var(--primary);font-weight:600;font-size:.83rem;text-decoration:none">
                      #{{ $pay->order_id }}
                    </a>
                  </td>
                  <td><span class="pay-ref">{{ $pay->payment_ref }}</span></td>
                  <td><span class="pay-ref">{{ $pay->external_ref ?? '—' }}</span></td>
                  <td><span class="pay-amount">{{ moneyFormat($pay->payable) }}</span></td>
                  <td>
                    @if($pay->status == 1)
                      <span class="badge-pay badge-success"><i class="fa-solid fa-circle-check" style="font-size:.65rem"></i> Success</span>
                    @elseif($pay->status == 2)
                      <span class="badge-pay badge-failed"><i class="fa-solid fa-circle-xmark" style="font-size:.65rem"></i> Failed</span>
                    @else
                      <span class="badge-pay badge-pending"><i class="fa-solid fa-clock" style="font-size:.65rem"></i> Pending</span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <div class="empty-state">
            <i class="fa-solid fa-receipt"></i>
            <p>No payment records found.</p>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
