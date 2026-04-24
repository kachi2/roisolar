@extends('layouts.app')
@section('title')<title>Account Settings | Roisolar NG</title>@endsection
@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
<style>
:root{--ink:#0f172a;--ink-soft:#334155;--muted:#64748b;--line:#e2e8f0;--surface:#f8fafc;--primary:#0c4a6e;--primary-l:#0369a1;--accent:#f59e0b;--r:14px;--r-sm:8px;--shadow-sm:0 1px 3px rgba(0,0,0,.08),0 4px 12px rgba(0,0,0,.05);--dur:.25s}
*{font-family:'Inter',sans-serif;box-sizing:border-box}
.acct-page{background:var(--surface);min-height:100vh;padding:2rem 0 4rem}
.acct-card{background:#fff;border-radius:var(--r);box-shadow:var(--shadow-sm);overflow:hidden;margin-bottom:1.5rem}
.acct-card__header{padding:1.25rem 1.5rem;border-bottom:1px solid var(--line);display:flex;align-items:center;gap:.75rem}
.acct-card__title{font-size:1rem;font-weight:700;color:var(--ink);margin:0;display:flex;align-items:center;gap:.625rem}
.acct-card__title i{color:var(--primary)}
.acct-card__body{padding:1.5rem}
.form-group{margin-bottom:1.25rem}
.form-label-modern{display:block;font-size:.8rem;font-weight:600;color:var(--ink-soft);margin-bottom:.4rem;letter-spacing:.02em}
.form-control-modern{width:100%;padding:.65rem .9rem;border:1.5px solid var(--line);border-radius:var(--r-sm);font-size:.875rem;color:var(--ink);background:#fff;transition:border-color var(--dur),box-shadow var(--dur);outline:none}
.form-control-modern:focus{border-color:var(--primary);box-shadow:0 0 0 3px rgba(12,74,110,.1)}
.form-control-modern.is-invalid{border-color:#ef4444}
.form-error{font-size:.75rem;color:#ef4444;margin-top:.3rem}
.input-group-modern{position:relative}
.input-toggle{position:absolute;right:.75rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--muted);padding:.25rem;line-height:1;font-size:.9rem}
.input-toggle:hover{color:var(--primary)}
.btn-save{background:linear-gradient(135deg,var(--primary) 0%,var(--primary-l) 100%);color:#fff;border:none;border-radius:var(--r-sm);padding:.7rem 1.75rem;font-size:.9rem;font-weight:600;cursor:pointer;transition:opacity var(--dur);display:inline-flex;align-items:center;gap:.5rem}
.btn-save:hover{opacity:.88}
.section-divider{height:1px;background:var(--line);margin:1.5rem 0}
.section-eyebrow{font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--accent);margin-bottom:.25rem}
/* Flash alerts */
.flash-alert{padding:.875rem 1.25rem;border-radius:var(--r-sm);font-size:.875rem;font-weight:500;margin-bottom:1rem;display:flex;align-items:center;gap:.625rem}
.flash-success{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534}
.flash-error{background:#fef2f2;border:1px solid #fecaca;color:#991b1b}
.pwd-hint{font-size:.75rem;color:var(--muted);margin-top:.3rem}
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
          <h1 class="h4 fw-bold mb-0" style="color:var(--ink)">Settings</h1>
        </div>

        {{-- Flash Messages --}}
        @if(session('msg'))
          <div class="flash-alert {{ session('alert') === 'success' ? 'flash-success' : 'flash-error' }}">
            <i class="fa-solid {{ session('alert') === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation' }}"></i>
            {{ session('msg') }}
          </div>
        @endif

        @if($errors->any())
          <div class="flash-alert flash-error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div>
              @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
              @endforeach
            </div>
          </div>
        @endif

        <form method="POST" action="{{ route('users.settings.update') }}">
          @csrf

          {{-- Personal Info --}}
          <div class="acct-card">
            <div class="acct-card__header">
              <h2 class="acct-card__title"><i class="fa-solid fa-user"></i> Personal Information</h2>
            </div>
            <div class="acct-card__body">
              <div class="row g-3">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label class="form-label-modern" for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                           class="form-control-modern @error('first_name') is-invalid @enderror"
                           value="{{ old('first_name', $user->first_name) }}" required>
                    @error('first_name')<p class="form-error">{{ $message }}</p>@enderror
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label class="form-label-modern" for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                           class="form-control-modern @error('last_name') is-invalid @enderror"
                           value="{{ old('last_name', $user->last_name) }}" required>
                    @error('last_name')<p class="form-error">{{ $message }}</p>@enderror
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label class="form-label-modern" for="email">Email Address</label>
                    <input type="email" id="email" name="email"
                           class="form-control-modern @error('email') is-invalid @enderror"
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')<p class="form-error">{{ $message }}</p>@enderror
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label class="form-label-modern" for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone"
                           class="form-control-modern @error('phone') is-invalid @enderror"
                           value="{{ old('phone', $user->phone) }}">
                    @error('phone')<p class="form-error">{{ $message }}</p>@enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Change Password --}}
          <div class="acct-card">
            <div class="acct-card__header">
              <h2 class="acct-card__title"><i class="fa-solid fa-lock"></i> Change Password</h2>
            </div>
            <div class="acct-card__body">
              <p style="font-size:.82rem;color:var(--muted);margin:0 0 1.25rem">Leave blank to keep your current password.</p>
              <div class="row g-3">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label class="form-label-modern" for="password">New Password</label>
                    <div class="input-group-modern">
                      <input type="password" id="password" name="password"
                             class="form-control-modern @error('password') is-invalid @enderror"
                             style="padding-right:2.5rem"
                             placeholder="Min. 8 characters">
                      <button type="button" class="input-toggle" onclick="togglePwd('password','eyeIcon1')">
                        <i class="fa-solid fa-eye" id="eyeIcon1"></i>
                      </button>
                    </div>
                    @error('password')<p class="form-error">{{ $message }}</p>@enderror
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label class="form-label-modern" for="password_confirmation">Confirm New Password</label>
                    <div class="input-group-modern">
                      <input type="password" id="password_confirmation" name="password_confirmation"
                             class="form-control-modern"
                             style="padding-right:2.5rem"
                             placeholder="Repeat password">
                      <button type="button" class="input-toggle" onclick="togglePwd('password_confirmation','eyeIcon2')">
                        <i class="fa-solid fa-eye" id="eyeIcon2"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Save Button --}}
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn-save">
              <i class="fa-solid fa-floppy-disk"></i> Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function togglePwd(inputId, iconId) {
  const input = document.getElementById(inputId);
  const icon = document.getElementById(iconId);
  if (input.type === 'password') {
    input.type = 'text';
    icon.classList.replace('fa-eye', 'fa-eye-slash');
  } else {
    input.type = 'password';
    icon.classList.replace('fa-eye-slash', 'fa-eye');
  }
}
</script>
@endsection
