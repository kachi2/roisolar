<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In — {{config('app.name')}}</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/'.$settings->fav) }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --primary:   #0c4a6e;
      --primary-l: #0369a1;
      --accent:    #f59e0b;
      --ink:       #0f172a;
      --ink-soft:  #334155;
      --muted:     #64748b;
      --line:      #e2e8f0;
      --surface:   #f8fafc;
      --white:     #ffffff;
      --danger:    #ef4444;
      --r:         12px;
      --ease:      cubic-bezier(.4,0,.2,1);
    }
    body {
      font-family: 'Inter', 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: stretch;
      background: var(--surface);
    }
    /* LEFT PANEL */
    .auth-left {
      flex: 0 0 44%;
      background: linear-gradient(145deg, #0c4a6e 0%, #0369a1 55%, #0284c7 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 48px 40px;
      position: relative;
      overflow: hidden;
    }
    .auth-left::before {
      content: '';
      position: absolute;
      width: 480px; height: 480px;
      border-radius: 50%;
      border: 1.5px solid rgba(255,255,255,.1);
      top: -100px; right: -120px;
    }
    .auth-left::after {
      content: '';
      position: absolute;
      width: 280px; height: 280px;
      border-radius: 50%;
      border: 1.5px solid rgba(255,255,255,.08);
      bottom: -60px; left: -80px;
    }
    .auth-left .brand { z-index: 1; text-align: center; margin-bottom: 40px; }
    .auth-left .brand img { max-width: 160px; filter: brightness(0) invert(1); }
    .auth-left .tagline { z-index: 1; text-align: center; }
    .auth-left .tagline h2 {
      font-size: clamp(1.5rem, 2.5vw, 2rem);
      font-weight: 800; color: #fff;
      letter-spacing: -.02em; line-height: 1.2;
      margin-bottom: 14px;
    }
    .auth-left .tagline h2 span {
      background: linear-gradient(90deg, #fde68a, #f59e0b);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .auth-left .tagline p {
      font-size: 14px; color: rgba(255,255,255,.7);
      line-height: 1.65; max-width: 320px;
      margin: 0 auto 32px;
    }
    .feat-list { list-style: none; z-index: 1; }
    .feat-list li {
      display: flex; align-items: center;
      gap: 10px; font-size: 13.5px;
      color: rgba(255,255,255,.8); margin-bottom: 12px;
    }
    .feat-list li i {
      width: 28px; height: 28px;
      background: rgba(245,158,11,.2);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      color: #fbbf24; font-size: 11px; flex-shrink: 0;
    }
    /* RIGHT PANEL */
    .auth-right {
      flex: 1;
      display: flex; align-items: center; justify-content: center;
      padding: 40px 24px;
      background: var(--white);
    }
    .auth-card { width: 100%; max-width: 420px; }
    .auth-head { margin-bottom: 28px; }
    .auth-head h1 {
      font-size: 1.7rem; font-weight: 800;
      color: var(--ink); letter-spacing: -.02em;
      margin-bottom: 6px;
    }
    .auth-head p { font-size: 14px; color: var(--muted); }
    .auth-head p a { color: var(--primary-l); font-weight: 600; text-decoration: none; }
    .auth-head p a:hover { text-decoration: underline; }
    /* Google button */
    .btn-google {
      display: flex; align-items: center; justify-content: center;
      gap: 10px; width: 100%;
      padding: 12px 16px;
      background: var(--white);
      border: 1.5px solid var(--line);
      border-radius: var(--r);
      font-size: 14px; font-weight: 600;
      color: var(--ink); text-decoration: none;
      transition: border-color .2s, box-shadow .2s, background .2s;
      box-shadow: 0 1px 4px rgba(0,0,0,.06);
    }
    .btn-google:hover {
      border-color: #4285f4;
      box-shadow: 0 4px 14px rgba(66,133,244,.15);
      background: #f8fbff; color: var(--ink);
    }
    .btn-google img { width: 20px; height: 20px; }
    /* Divider */
    .auth-divider {
      display: flex; align-items: center;
      gap: 14px; margin: 22px 0;
      color: var(--muted); font-size: 12px; font-weight: 500;
    }
    .auth-divider::before, .auth-divider::after {
      content: ''; flex: 1; height: 1px; background: var(--line);
    }
    /* Form */
    .form-group { margin-bottom: 18px; }
    .form-group label {
      display: block; font-size: 13px;
      font-weight: 600; color: var(--ink-soft); margin-bottom: 7px;
    }
    .form-control {
      width: 100%; padding: 11px 14px;
      border: 1.5px solid var(--line);
      border-radius: var(--r);
      font-size: 14px; font-family: 'Inter', sans-serif;
      color: var(--ink); background: var(--surface);
      outline: none;
      transition: border-color .2s, box-shadow .2s;
    }
    .form-control:focus {
      border-color: var(--primary-l);
      box-shadow: 0 0 0 3px rgba(3,105,161,.12);
      background: var(--white);
    }
    .form-control.is-invalid { border-color: var(--danger); }
    .invalid-feedback { font-size: 12px; color: var(--danger); margin-top: 5px; }
    .pw-wrap { position: relative; }
    .pw-wrap .form-control { padding-right: 44px; }
    .pw-toggle {
      position: absolute; right: 14px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none;
      cursor: pointer; color: var(--muted);
      font-size: 14px; padding: 0;
      transition: color .2s;
    }
    .pw-toggle:hover { color: var(--primary); }
    .auth-row {
      display: flex; align-items: center;
      justify-content: space-between; margin-bottom: 22px;
    }
    .auth-row label {
      display: flex; align-items: center;
      gap: 8px; font-size: 13px;
      color: var(--ink-soft); cursor: pointer;
    }
    .auth-row input[type=checkbox] { width: 16px; height: 16px; accent-color: var(--primary); }
    .auth-row a { font-size: 13px; color: var(--primary-l); font-weight: 600; text-decoration: none; }
    .auth-row a:hover { text-decoration: underline; }
    .btn-submit {
      display: flex; align-items: center; justify-content: center;
      gap: 8px; width: 100%;
      padding: 13px 16px;
      background: var(--primary); color: #fff;
      border: none; border-radius: var(--r);
      font-size: 15px; font-weight: 700;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: background .2s, box-shadow .2s, transform .15s;
      box-shadow: 0 4px 14px rgba(12,74,110,.3);
    }
    .btn-submit:hover {
      background: var(--primary-l);
      box-shadow: 0 8px 22px rgba(12,74,110,.4);
      transform: translateY(-1px);
    }
    /* Register CTA */
    .auth-register-cta {
      margin-top: 28px; padding: 20px;
      background: var(--surface);
      border-radius: var(--r);
      border: 1px solid var(--line);
      text-align: center;
    }
    .auth-register-cta p { font-size: 14px; color: var(--ink-soft); margin-bottom: 12px; }
    .btn-register {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 11px 28px;
      background: transparent;
      border: 2px solid var(--primary);
      color: var(--primary);
      border-radius: var(--r);
      font-size: 14px; font-weight: 700;
      font-family: 'Inter', sans-serif;
      text-decoration: none;
      transition: background .2s, color .2s;
    }
    .btn-register:hover { background: var(--primary); color: #fff; }
    /* Alert */
    .auth-alert {
      padding: 12px 16px;
      background: #fef2f2; border: 1px solid #fecaca;
      border-radius: var(--r);
      font-size: 13px; color: var(--danger);
      margin-bottom: 20px;
      display: flex; align-items: center; gap: 10px;
    }
    @media (max-width: 768px) {
      .auth-left { display: none; }
      .auth-right { padding: 32px 20px; }
    }
  </style>
</head>
<body>

  <div class="auth-left">
    <div class="brand">
      <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ config('app.name') }}">
    </div>
    <div class="tagline">
      <h2>Nigeria's #1 <span>Solar Energy</span> Store</h2>
      <p>Sign in to track your orders and shop premium solar solutions delivered nationwide.</p>
    </div>
    <ul class="feat-list">
      <li><i class="fas fa-bolt"></i> Premium panels, inverters &amp; batteries</li>
      <li><i class="fas fa-truck"></i> Fast delivery to all 36 states</li>
      <li><i class="fas fa-shield-halved"></i> Secure checkout &amp; buyer protection</li>
      <li><i class="fas fa-headset"></i> Expert solar support team</li>
    </ul>
  </div>

  <div class="auth-right">
    <div class="auth-card">

      <div class="auth-head">
        <h1>Welcome back</h1>
        <p>New to Roisolar? <a href="{{ route('register') }}">Create a free account</a></p>
      </div>

      @if(session('error'))
        <div class="auth-alert"><i class="fas fa-circle-exclamation"></i> {{ session('error') }}</div>
      @endif
      @if($errors->any())
        <div class="auth-alert"><i class="fas fa-circle-exclamation"></i> {{ $errors->first() }}</div>
      @endif

      <a href="{{ route('google.login') }}" class="btn-google">
        <img src="{{ asset('frontend/images/icons/google-icon.svg') }}" alt="Google">
        Continue with Google
      </a>

      <div class="auth-divider">or sign in with email</div>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" id="email" name="email"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="you@example.com"
            value="{{ old('email') }}"
            required autofocus autocomplete="email">
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="pw-wrap">
            <input type="password" id="password" name="password"
              class="form-control @error('password') is-invalid @enderror"
              placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
              required autocomplete="current-password">
            <button type="button" class="pw-toggle" id="pwToggle">
              <i class="fas fa-eye" id="pwIcon"></i>
            </button>
          </div>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="auth-row">
          <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            Remember me
          </label>
          <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>

        <button type="submit" class="btn-submit">
          <i class="fas fa-arrow-right-to-bracket"></i> Sign In
        </button>
      </form>

      <div class="auth-register-cta">
        <p>Don't have an account? Join us</p>
        <a href="{{ route('register') }}" class="btn-register">
          <i class="fas fa-user-plus"></i> Create Account
        </a>
      </div>

    </div>
  </div>

  <script>
    var pwToggle = document.getElementById("pwToggle");
    var pwField  = document.getElementById("password");
    var pwIcon   = document.getElementById("pwIcon");
    if (pwToggle) {
      pwToggle.addEventListener("click", function () {
        var isText = pwField.type === "text";
        pwField.type = isText ? "password" : "text";
        pwIcon.className = isText ? "fas fa-eye" : "fas fa-eye-slash";
      });
    }
  </script>

</body>
</html>