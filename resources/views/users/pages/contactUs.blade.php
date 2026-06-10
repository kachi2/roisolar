@extends('layouts.app')

@section('title', 'Contact Us')

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
.ct-hero{background:linear-gradient(120deg,#0c4a6e 0%,#0369a1 55%,#0284c7 100%);padding:42px 0 34px;position:relative;overflow:hidden;}
.ct-hero::before{content:'';position:absolute;width:420px;height:420px;border-radius:50%;border:1.5px solid rgba(255,255,255,.07);top:-130px;right:-90px;pointer-events:none;}
.ct-hero::after{content:'';position:absolute;width:200px;height:200px;border-radius:50%;border:1px solid rgba(255,255,255,.05);bottom:-70px;left:50px;pointer-events:none;}
.ct-hero-inner{position:relative;z-index:1;}
.ct-hero-eyebrow{display:inline-flex;align-items:center;gap:7px;padding:5px 14px;border-radius:50px;background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3);color:#fde68a;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-bottom:14px;}
.ct-hero h1{font-size:clamp(1.5rem,4vw,2.4rem);font-weight:900;color:#fff;letter-spacing:-.03em;line-height:1.15;margin:0 0 10px;}
.ct-hero h1 span{background:linear-gradient(90deg,#fde68a,#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ct-hero p{font-size:15px;color:rgba(255,255,255,.75);margin:0 0 16px;max-width:520px;line-height:1.65;}
.ct-breadcrumb{display:flex;align-items:center;gap:7px;font-size:12.5px;color:rgba(255,255,255,.6);list-style:none;padding:0;margin:0;}
.ct-breadcrumb a{color:rgba(255,255,255,.75);text-decoration:none;transition:color .2s;}
.ct-breadcrumb a:hover{color:#fde68a;}
.ct-breadcrumb .sep{font-size:9px;opacity:.5;}
.ct-breadcrumb .current{color:#fde68a;font-weight:600;}

/* MAIN */
.ct-main{padding:56px 0 72px;background:var(--surface);}
.ct-grid{display:grid;grid-template-columns:1fr 1.5fr;gap:36px;align-items:start;}

/* INFO COLUMN */
.ct-info-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-sm);overflow:hidden;}
.ct-info-header{background:linear-gradient(135deg,var(--primary),var(--primary-l));padding:24px 26px;}
.ct-info-header h2{font-size:1.1rem;font-weight:800;color:#fff;margin:0 0 4px;}
.ct-info-header p{font-size:13px;color:rgba(255,255,255,.75);margin:0;}
.ct-info-body{padding:24px 26px;}
.ct-info-item{display:flex;gap:14px;align-items:flex-start;padding:14px 0;border-bottom:1px solid var(--line);}
.ct-info-item:last-of-type{border-bottom:none;}
.ct-info-icon{width:40px;height:40px;border-radius:10px;background:rgba(12,74,110,.08);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;}
.ct-info-icon i{color:var(--primary);font-size:16px;}
.ct-info-text h6{font-size:13px;font-weight:700;color:var(--ink);margin:0 0 4px;}
.ct-info-text p{font-size:12.5px;color:var(--ink-soft);margin:0;line-height:1.6;}
.ct-info-text a{color:var(--primary);text-decoration:none;}
.ct-info-text a:hover{text-decoration:underline;}

/* HOURS */
.ct-hours{margin-top:20px;padding-top:20px;border-top:1px solid var(--line);}
.ct-hours-label{font-size:11.5px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--muted);margin-bottom:10px;}
.ct-hours-row{display:flex;justify-content:space-between;font-size:12.5px;padding:5px 0;border-bottom:1px dashed var(--line);}
.ct-hours-row:last-child{border-bottom:none;}
.ct-hours-row .day{color:var(--ink-soft);font-weight:500;}
.ct-hours-row .time{color:var(--primary);font-weight:600;}

/* SOCIAL LINKS */
.ct-social{margin-top:20px;display:flex;gap:10px;flex-wrap:wrap;}
.ct-social a{width:36px;height:36px;border-radius:8px;background:var(--surface);border:1px solid var(--line);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:14px;transition:all var(--dur);text-decoration:none;}
.ct-social a:hover{background:var(--primary);color:#fff;border-color:var(--primary);}

/* FORM COLUMN */
.ct-form-card{background:var(--white);border-radius:var(--r);border:1px solid var(--line);box-shadow:var(--shadow-sm);overflow:hidden;}
.ct-form-header{padding:24px 28px 0;}
.ct-form-header h2{font-size:1.2rem;font-weight:900;color:var(--primary);margin:0 0 4px;letter-spacing:-.02em;}
.ct-form-header p{font-size:13px;color:var(--muted);margin:0 0 20px;}
.ct-form-divider{height:2px;background:linear-gradient(90deg,var(--accent),transparent);border:none;margin:0 0 24px;}
.ct-form-body{padding:0 28px 28px;}

.ct-form-group{margin-bottom:16px;}
.ct-form-group label{display:block;font-size:12.5px;font-weight:700;color:var(--ink-soft);margin-bottom:6px;letter-spacing:.01em;}
.ct-form-group label span{color:#ef4444;}
.ct-form-control{
  width:100%;padding:11px 14px;
  border:1.5px solid var(--line);border-radius:var(--r-sm);
  font-size:14px;font-family:inherit;color:var(--ink);background:var(--surface);
  transition:border-color var(--dur),box-shadow var(--dur);outline:none;
}
.ct-form-control:focus{border-color:var(--primary-l);box-shadow:0 0 0 3px rgba(3,105,161,.12);background:#fff;}
.ct-form-control::placeholder{color:#94a3b8;}
textarea.ct-form-control{resize:vertical;min-height:120px;}
.ct-form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;}

/* Alert */
.ct-alert-success{
  display:flex;align-items:center;gap:10px;
  padding:12px 16px;background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:var(--r-sm);
  font-size:13.5px;font-weight:600;color:#15803d;margin-bottom:18px;
}
.ct-alert-success i{font-size:16px;flex-shrink:0;}
.ct-alert-error{
  display:flex;align-items:flex-start;gap:10px;
  padding:12px 16px;background:#fef2f2;border:1.5px solid #fecaca;border-radius:var(--r-sm);
  font-size:13px;color:#b91c1c;margin-bottom:18px;
}
.ct-alert-error ul{margin:0;padding-left:16px;}

/* Submit btn */
.ct-submit{
  display:flex;align-items:center;justify-content:center;gap:9px;
  width:100%;padding:14px 24px;
  background:linear-gradient(135deg,var(--primary),var(--primary-l));
  color:#fff;border:none;border-radius:var(--r-sm);
  font-size:15px;font-weight:800;font-family:inherit;cursor:pointer;
  box-shadow:0 6px 20px rgba(12,74,110,.25);
  transition:all var(--dur) var(--ease);
}
.ct-submit:hover{background:linear-gradient(135deg,#083756,var(--primary));transform:translateY(-2px);box-shadow:0 10px 28px rgba(12,74,110,.35);}
.ct-submit:active{transform:translateY(0);}

/* MAP STRIP */
.ct-map-strip{background:var(--white);border-top:1px solid var(--line);}
.ct-map-strip iframe{width:100%;height:320px;border:none;display:block;filter:grayscale(20%);}

/* RESPONSIVE */
@media(max-width:991px){
  .ct-grid{grid-template-columns:1fr;}
  .ct-form-row{grid-template-columns:1fr;}
}
@media(max-width:576px){
  .ct-form-body,.ct-form-header{padding-left:18px;padding-right:18px;}
  .ct-info-body,.ct-info-header{padding-left:18px;padding-right:18px;}
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="ct-hero">
  <div class="container ct-hero-inner">
    <div class="ct-hero-eyebrow"><i class="fas fa-comments"></i> Let's Talk</div>
    <h1>Get in <span>Touch</span></h1>
    <p>We'd love to hear from you. Reach out with any questions, feedback, or business opportunities.</p>
    <nav aria-label="breadcrumb">
      <ol class="ct-breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
        <li><span class="current">Contact Us</span></li>
      </ol>
    </nav>
  </div>
</section>

{{-- MAIN CONTENT --}}
<section class="ct-main">
  <div class="container">
    <div class="ct-grid">

      {{-- INFO COLUMN --}}
      <div>
        <div class="ct-info-card">
          <div class="ct-info-header">
            <h2>Contact Information</h2>
            <p>Find us at any of our offices or reach us online.</p>
          </div>
          <div class="ct-info-body">

            <div class="ct-info-item">
              <div class="ct-info-icon"><i class="fas fa-location-dot"></i></div>
              <div class="ct-info-text">
                <h6>Our Offices</h6>
                @if(!empty($settings->address))
                  <p>{{ $settings->address }}</p>
                @else
                  <p><strong>Lagos:</strong> Alaba Int'l Market F1946, Facing Blockline after First Bank.</p>
                  <p style="margin-top:6px"><strong>Abuja:</strong> Unit C2-30 GSM Village, Olusegun Obasanjo Way, Wuse Zone 1.</p>
                  <p style="margin-top:6px"><strong>Benue:</strong> Unit 2 Ground Floor, Athans Plaza, 75 Lyorchia Ayu Road, Makurdi.</p>
                @endif
              </div>
            </div>

            <div class="ct-info-item">
              <div class="ct-info-icon"><i class="fas fa-phone"></i></div>
              <div class="ct-info-text">
                <h6>Phone</h6>
                @if(!empty($settings->site_phone))
                  <p><a href="tel:{{ $settings->site_phone }}">{{ $settings->site_phone }}</a></p>
                @else
                  <p><a href="tel:+2349064838447">+234 906 483 8447</a></p>
                  <p><a href="tel:+2347951000600">+234 795 100 0600</a></p>
                @endif
              </div>
            </div>

            <div class="ct-info-item">
              <div class="ct-info-icon"><i class="fas fa-envelope"></i></div>
              <div class="ct-info-text">
                <h6>Email</h6>
                @if(!empty($settings->site_email))
                  <p><a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a></p>
                @else
                  <p><a href="mailto:support@roisolar.com.ng">support@roisolar.com.ng</a></p>
                @endif
              </div>
            </div>

            <div class="ct-hours">
              <div class="ct-hours-label"><i class="fas fa-clock" style="color:var(--accent);margin-right:5px"></i> Opening Hours</div>
              @if(!empty($settings->opening_hours))
                <p style="font-size:13px;color:var(--ink-soft)">{{ $settings->opening_hours }}</p>
              @else
                <div class="ct-hours-row"><span class="day">Monday – Friday</span><span class="time">8:00am – 6:00pm</span></div>
                <div class="ct-hours-row"><span class="day">Saturday</span><span class="time">9:00am – 4:00pm</span></div>
                <div class="ct-hours-row"><span class="day">Sunday</span><span class="time">Closed</span></div>
              @endif
            </div>

            <div class="ct-social">
              @if(!empty($settings->facebook))
                <a href="{{ $settings->facebook }}" target="_blank" rel="noopener" title="Facebook"><i class="fab fa-facebook-f"></i></a>
              @else
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
              @endif
              @if(!empty($settings->instagram))
                <a href="{{ $settings->instagram }}" target="_blank" rel="noopener" title="Instagram"><i class="fab fa-instagram"></i></a>
              @else
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
              @endif
              @if(!empty($settings->twitter))
                <a href="{{ $settings->twitter }}" target="_blank" rel="noopener" title="Twitter / X"><i class="fab fa-x-twitter"></i></a>
              @endif
              @if(!empty($settings->linkedIn))
                <a href="{{ $settings->linkedIn }}" target="_blank" rel="noopener" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
              @endif
              @php
                $waPhone = preg_replace('/[^0-9]/', '', $settings->site_phone ?? '09064838447');
                $waLink  = 'https://wa.me/234'.ltrim($waPhone,'0');
              @endphp
              <a href="{{ $waLink }}" target="_blank" rel="noopener" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>

          </div>
        </div>
      </div>

      {{-- FORM COLUMN --}}
      <div>
        <div class="ct-form-card">
          <div class="ct-form-header">
            <h2>Send Us a Message</h2>
            <p>Fill in the form below and we'll respond within 24 hours.</p>
            <hr class="ct-form-divider">
          </div>
          <div class="ct-form-body">

            @if(session('success'))
              <div class="ct-alert-success">
                <i class="fas fa-circle-check"></i>
                {{ session('success') }}
              </div>
            @endif

            @if($errors->any())
              <div class="ct-alert-error">
                <i class="fas fa-circle-xmark" style="flex-shrink:0;margin-top:1px"></i>
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
              </div>
            @endif

            <form action="{{ route('contact-us.store') }}" method="POST" id="ctForm">
              @csrf

              <div class="ct-form-row">
                <div class="ct-form-group">
                  <label for="ct_name">Full Name <span>*</span></label>
                  <input type="text" id="ct_name" name="name" class="ct-form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                </div>
                <div class="ct-form-group">
                  <label for="ct_email">Email Address <span>*</span></label>
                  <input type="email" id="ct_email" name="email" class="ct-form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
                </div>
              </div>

              <div class="ct-form-row">
                <div class="ct-form-group">
                  <label for="ct_phone">Phone Number</label>
                  <input type="tel" id="ct_phone" name="phone" class="ct-form-control" placeholder="+234 800 000 0000" value="{{ old('phone') }}">
                </div>
                <div class="ct-form-group">
                  <label for="ct_subject">Subject <span>*</span></label>
                  <input type="text" id="ct_subject" name="subject" class="ct-form-control" placeholder="How can we help?" value="{{ old('subject') }}" required>
                </div>
              </div>

              <div class="ct-form-group">
                <label for="ct_message">Your Message <span>*</span></label>
                <textarea id="ct_message" name="message" class="ct-form-control" placeholder="Tell us more about your solar needs…" required>{{ old('message') }}</textarea>
              </div>

              <button type="submit" class="ct-submit">
                <i class="fas fa-paper-plane"></i> Send Message
              </button>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
