<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create Account — {{ config('app.name') }}</title>
  <link rel="icon" href="{{ asset('images/'.$settings->fav) }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
  <style>
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
    :root{
      --primary:#0c4a6e;--primary-l:#0369a1;--primary-xl:#0284c7;
      --accent:#f59e0b;--accent-l:#fbbf24;
      --ink:#0f172a;--ink-soft:#334155;--muted:#64748b;
      --line:#e2e8f0;--surface:#f8fafc;--white:#ffffff;
      --r:14px;--r-sm:8px;--dur:.25s;--ease:cubic-bezier(.4,0,.2,1);
    }
    html,body{height:100%;font-family:'Inter','Segoe UI',sans-serif;}
    body{
      min-height:100vh;display:flex;align-items:stretch;
      background:var(--surface);
    }

    /* LEFT PANEL */
    .rg-left{
      flex:0 0 46%;display:flex;flex-direction:column;justify-content:center;align-items:center;
      background:linear-gradient(150deg,#0c4a6e 0%,#0369a1 50%,#0284c7 100%);
      padding:48px 48px;position:relative;overflow:hidden;
    }
    .rg-left::before{
      content:'';position:absolute;width:500px;height:500px;border-radius:50%;
      border:1.5px solid rgba(255,255,255,.06);top:-140px;right:-140px;pointer-events:none;
    }
    .rg-left::after{
      content:'';position:absolute;width:260px;height:260px;border-radius:50%;
      border:1px solid rgba(255,255,255,.05);bottom:-80px;left:-60px;pointer-events:none;
    }
    .rg-left-inner{position:relative;z-index:1;text-align:center;max-width:360px;}
    .rg-logo{margin-bottom:32px;}
    .rg-logo img{max-width:160px;height:auto;}
    .rg-left h2{
      font-size:1.9rem;font-weight:900;color:#fff;letter-spacing:-.03em;
      line-height:1.2;margin-bottom:14px;
    }
    .rg-left h2 span{
      background:linear-gradient(90deg,#fde68a,#f59e0b);
      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
    }
    .rg-left p{font-size:14px;color:rgba(255,255,255,.7);line-height:1.7;margin-bottom:36px;}

    .rg-benefits{display:flex;flex-direction:column;gap:14px;text-align:left;}
    .rg-benefit{
      display:flex;align-items:flex-start;gap:12px;
      background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);
      border-radius:10px;padding:14px 16px;
    }
    .rg-benefit-icon{
      width:36px;height:36px;border-radius:8px;
      background:rgba(245,158,11,.2);display:flex;align-items:center;justify-content:center;
      flex-shrink:0;
    }
    .rg-benefit-icon i{color:#fde68a;font-size:15px;}
    .rg-benefit-text h6{font-size:13px;font-weight:700;color:#fff;margin-bottom:2px;}
    .rg-benefit-text p{font-size:12px;color:rgba(255,255,255,.65);line-height:1.5;}

    /* RIGHT PANEL */
    .rg-right{
      flex:1;display:flex;align-items:center;justify-content:center;
      padding:40px 32px;overflow-y:auto;
    }
    .rg-card{width:100%;max-width:460px;}
    .rg-card-head{margin-bottom:28px;}
    .rg-card-head h1{
      font-size:1.6rem;font-weight:900;color:var(--primary);
      letter-spacing:-.03em;line-height:1.2;margin-bottom:6px;
    }
    .rg-card-head p{font-size:13.5px;color:var(--muted);}
    .rg-divider{height:3px;border-radius:2px;background:linear-gradient(90deg,var(--accent),transparent);margin-bottom:26px;}

    /* FORM */
    .rg-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
    .rg-group{margin-bottom:16px;}
    .rg-group label{
      display:block;font-size:12.5px;font-weight:700;color:var(--ink-soft);
      margin-bottom:6px;letter-spacing:.01em;
    }
    .rg-group label span{color:#ef4444;}
    .rg-input-wrap{position:relative;}
    .rg-input-icon{
      position:absolute;left:13px;top:50%;transform:translateY(-50%);
      color:var(--muted);font-size:14px;pointer-events:none;
    }
    .rg-control{
      width:100%;padding:11px 14px 11px 38px;
      border:1.5px solid var(--line);border-radius:var(--r-sm);
      font-size:14px;font-family:inherit;color:var(--ink);
      background:var(--surface);outline:none;
      transition:border-color var(--dur),box-shadow var(--dur);
    }
    .rg-control:focus{border-color:var(--primary-l);box-shadow:0 0 0 3px rgba(3,105,161,.12);background:#fff;}
    .rg-control.is-invalid{border-color:#ef4444;}
    .rg-control::placeholder{color:#94a3b8;}

    /* Password toggle */
    .rg-pw-toggle{
      position:absolute;right:13px;top:50%;transform:translateY(-50%);
      background:none;border:none;cursor:pointer;color:var(--muted);font-size:14px;padding:2px;
      transition:color var(--dur);
    }
    .rg-pw-toggle:hover{color:var(--primary);}
    .rg-pw-control{padding-right:40px;}

    /* Error */
    .rg-err{font-size:11.5px;color:#dc2626;margin-top:4px;display:flex;align-items:center;gap:4px;}
    .rg-err i{font-size:10px;}

    /* Alert */
    .rg-alert-err{
      display:flex;align-items:flex-start;gap:10px;
      padding:12px 16px;background:#fef2f2;border:1.5px solid #fecaca;border-radius:var(--r-sm);
      font-size:13px;color:#b91c1c;margin-bottom:18px;
    }
    .rg-alert-err ul{margin:0;padding-left:16px;}

    /* Submit */
    .rg-submit{
      width:100%;padding:13px 24px;
      background:linear-gradient(135deg,var(--primary),var(--primary-l));
      color:#fff;border:none;border-radius:var(--r-sm);
      font-size:15px;font-weight:800;font-family:inherit;cursor:pointer;
      box-shadow:0 6px 20px rgba(12,74,110,.25);
      transition:all var(--dur) var(--ease);margin-bottom:14px;
      display:flex;align-items:center;justify-content:center;gap:8px;
    }
    .rg-submit:hover{background:linear-gradient(135deg,#083756,var(--primary));transform:translateY(-2px);box-shadow:0 10px 28px rgba(12,74,110,.35);}
    .rg-submit:active{transform:translateY(0);}

    /* Google */
    .rg-google{
      width:100%;padding:11px 24px;
      background:var(--white);border:1.5px solid var(--line);border-radius:var(--r-sm);
      font-size:14px;font-weight:600;font-family:inherit;cursor:pointer;
      display:flex;align-items:center;justify-content:center;gap:10px;
      color:var(--ink-soft);text-decoration:none;
      transition:all var(--dur);margin-bottom:20px;
      box-shadow:0 1px 4px rgba(0,0,0,.06);
    }
    .rg-google:hover{border-color:#cbd5e1;box-shadow:0 4px 12px rgba(0,0,0,.1);color:var(--ink);}
    .rg-google img{width:18px;height:18px;}

    /* Separator */
    .rg-sep{display:flex;align-items:center;gap:12px;margin-bottom:18px;}
    .rg-sep hr{flex:1;border:none;border-top:1px solid var(--line);}
    .rg-sep span{font-size:12px;color:var(--muted);font-weight:500;white-space:nowrap;}

    /* Login link */
    .rg-login-link{text-align:center;font-size:13.5px;color:var(--muted);}
    .rg-login-link a{color:var(--primary-l);font-weight:700;text-decoration:none;}
    .rg-login-link a:hover{text-decoration:underline;}

    /* Terms */
    .rg-terms{font-size:11.5px;color:var(--muted);text-align:center;margin-bottom:16px;line-height:1.5;}
    .rg-terms a{color:var(--primary-l);text-decoration:none;}
    .rg-terms a:hover{text-decoration:underline;}

    /* RESPONSIVE */
    @media(max-width:900px){
      .rg-left{display:none;}
      body{align-items:flex-start;}
      .rg-right{padding:32px 20px;min-height:100vh;}
    }
    @media(max-width:480px){.rg-row{grid-template-columns:1fr;}}
  </style>
</head>
<body>

  {{-- LEFT --}}
  <div class="rg-left">
    <div class="rg-left-inner">
      <div class="rg-logo">
        <img src="{{ asset('images/'.$settings->site_logo) }}" alt="{{ config('app.name') }}">
      </div>
      <h2>Join <span>Roisolar</span> Today</h2>
      <p>Create your account and start your journey to clean, affordable solar energy.</p>
      <div class="rg-benefits">
        <div class="rg-benefit">
          <div class="rg-benefit-icon"><i class="fas fa-solar-panel"></i></div>
          <div class="rg-benefit-text">
            <h6>Custom Solar Packages</h6>
            <p>Get tailored solar solutions for your home or business.</p>
          </div>
        </div>
        <div class="rg-benefit">
          <div class="rg-benefit-icon"><i class="fas fa-truck-fast"></i></div>
          <div class="rg-benefit-text">
            <h6>Track Your Orders</h6>
            <p>Monitor deliveries and installations from your dashboard.</p>
          </div>
        </div>
        <div class="rg-benefit">
          <div class="rg-benefit-icon"><i class="fas fa-headset"></i></div>
          <div class="rg-benefit-text">
            <h6>24/7 Support Access</h6>
            <p>Get help from our solar experts anytime you need.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- RIGHT --}}
  <div class="rg-right">
    <div class="rg-card">
      <div class="rg-card-head">
        <h1>Create your account</h1>
        <p>Fill in your details to get started — it's free.</p>
      </div>
      <div class="rg-divider"></div>

      @if($errors->any())
        <div class="rg-alert-err">
          <i class="fas fa-circle-xmark" style="flex-shrink:0;margin-top:2px;font-size:15px"></i>
          <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="rg-row">
          <div class="rg-group">
            <label for="rg_first">First Name <span>*</span></label>
            <div class="rg-input-wrap">
              <i class="fas fa-user rg-input-icon"></i>
              <input type="text" id="rg_first" name="first_name"
                     class="rg-control @error('first_name') is-invalid @enderror"
                     placeholder="John" value="{{ old('first_name') }}" required autofocus>
            </div>
            @error('first_name')<p class="rg-err"><i class="fas fa-circle-xmark"></i>{{ $message }}</p>@enderror
          </div>
          <div class="rg-group">
            <label for="rg_last">Last Name <span>*</span></label>
            <div class="rg-input-wrap">
              <i class="fas fa-user rg-input-icon"></i>
              <input type="text" id="rg_last" name="last_name"
                     class="rg-control @error('last_name') is-invalid @enderror"
                     placeholder="Doe" value="{{ old('last_name') }}" required>
            </div>
            @error('last_name')<p class="rg-err"><i class="fas fa-circle-xmark"></i>{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="rg-group">
          <label for="rg_email">Email Address <span>*</span></label>
          <div class="rg-input-wrap">
            <i class="fas fa-envelope rg-input-icon"></i>
            <input type="email" id="rg_email" name="email"
                   class="rg-control @error('email') is-invalid @enderror"
                   placeholder="you@example.com" value="{{ old('email') }}" required>
          </div>
          @error('email')<p class="rg-err"><i class="fas fa-circle-xmark"></i>{{ $message }}</p>@enderror
        </div>

        <div class="rg-group">
          <label for="rg_phone">Phone Number <span>*</span></label>
          <div class="rg-input-wrap">
            <i class="fas fa-phone rg-input-icon"></i>
            <input type="tel" id="rg_phone" name="phone"
                   class="rg-control @error('phone') is-invalid @enderror"
                   placeholder="+234 800 000 0000" value="{{ old('phone') }}" required>
          </div>
          @error('phone')<p class="rg-err"><i class="fas fa-circle-xmark"></i>{{ $message }}</p>@enderror
        </div>

        <div class="rg-group">
          <label for="rg_pw">Password <span>*</span></label>
          <div class="rg-input-wrap">
            <i class="fas fa-lock rg-input-icon"></i>
            <input type="password" id="rg_pw" name="password"
                   class="rg-control rg-pw-control" placeholder="Min. 8 characters" required>
            <button type="button" id="pwToggle" class="rg-pw-toggle" tabindex="-1" aria-label="Toggle password">
              <i id="pwIcon" class="fas fa-eye"></i>
            </button>
          </div>
          @error('password')<p class="rg-err"><i class="fas fa-circle-xmark"></i>{{ $message }}</p>@enderror
        </div>

        <p class="rg-terms">
          By creating an account you agree to our
          <a href="{{ route('pages.terms') }}">Terms of Service</a> and
          <a href="{{ route('PrivacyPolicy') }}">Privacy Policy</a>.
        </p>

        <button type="submit" class="rg-submit">
          <i class="fas fa-user-plus"></i> Create Account
        </button>
      </form>

      <div class="rg-sep"><hr><span>or continue with</span><hr></div>

      <a href="{{ route('google.login') }}" class="rg-google">
        <img src="{{ asset('frontend/images/icons/google-icon.svg') }}" alt="Google">
        Sign up with Google
      </a>

      <p class="rg-login-link">
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
      </p>
    </div>
  </div>

  <script>
    var pwToggle = document.getElementById('pwToggle');
    var pwField  = document.getElementById('rg_pw');
    var pwIcon   = document.getElementById('pwIcon');
    if (pwToggle) {
      pwToggle.addEventListener('click', function () {
        var isText = pwField.type === 'text';
        pwField.type = isText ? 'password' : 'text';
        pwIcon.className = isText ? 'fas fa-eye' : 'fas fa-eye-slash';
      });
    }
  </script>
</body>
</html>
