@extends('layouts.app')
@section('title')
<title>Roisolar NG — Nigeria's #1 Solar Energy Store</title>
@endsection
@section('head')
<link rel="canonical" href="https://roisolar.com/">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@endsection
@section('content')

@section('styles')
<style>
/* ============================================================
   ROISOLAR 2025 — PREMIUM MODERN HOME PAGE
   ============================================================ */

*, *::before, *::after { box-sizing: border-box; }

:root {
  --ink:        #0f172a;
  --ink-soft:   #334155;
  --muted:      #64748b;
  --line:       #e2e8f0;
  --surface:    #f8fafc;
  --white:      #ffffff;
  --primary:    #0c4a6e;
  --primary-l:  #0369a1;
  --accent:     #f59e0b;
  --accent-l:   #fbbf24;
  --danger:     #ef4444;
  --green:      #10b981;
  --r:          14px;
  --r-sm:       8px;
  --r-lg:       20px;
  --shadow-xs:  0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
  --shadow-sm:  0 4px 12px rgba(0,0,0,.07);
  --shadow-md:  0 12px 36px rgba(0,0,0,.12);
  --shadow-lg:  0 24px 64px rgba(0,0,0,.16);
  --ease:       cubic-bezier(.4,0,.2,1);
  --dur:        .25s;
}

body { font-family: 'Inter', 'Segoe UI', sans-serif !important; }

/* ===================================================
   HERO SLIDER
   =================================================== */
.hero-section  { position: relative; width: 100%; padding: 0 !important; margin: 0 !important; }
.heroSwiper    { width: 100%; }

.hero-slide {
  width: 100%;
  height: 500px;
  max-height: 500px;
  background-size: cover;
  background-position: center;
  position: relative;
  display: flex;
  align-items: center;
}

.hero-slide::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(110deg,
    rgba(12,74,110,.92) 0%,
    rgba(12,74,110,.65) 45%,
    rgba(12,74,110,.12) 100%);
}

.hero-content {
  position: relative;
  z-index: 2;
  width: 100%;
  padding: 0 24px;
}

.hero-inner { max-width: 640px; }

.hero-tag {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(245,158,11,.15);
  border: 1px solid rgba(245,158,11,.4);
  color: #fde68a;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 7px 18px;
  border-radius: 50px;
  margin-bottom: 24px;
  backdrop-filter: blur(4px);
  animation: heroIn .6s var(--ease) both;
}
.hero-tag i { color: var(--accent-l); }

.hero-h1 {
  font-size: clamp(2rem, 4.5vw, 3.6rem);
  font-weight: 900;
  color: #fff;
  line-height: 1.15;
  letter-spacing: -.02em;
  margin-bottom: 20px;
  animation: heroIn .7s .1s var(--ease) both;
}
.hero-h1 em {
  font-style: normal;
  background: linear-gradient(90deg, #fde68a, #f59e0b);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero-p {
  font-size: clamp(.9rem, 1.8vw, 1.1rem);
  color: rgba(255,255,255,.82);
  line-height: 1.7;
  margin-bottom: 36px;
  font-weight: 400;
  animation: heroIn .7s .2s var(--ease) both;
}

.hero-actions {
  display: flex;
  gap: 14px;
  flex-wrap: wrap;
  animation: heroIn .7s .3s var(--ease) both;
}

.btn-hero-primary {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 15px 32px;
  background: var(--accent);
  color: #fff;
  font-weight: 700;
  font-size: .95rem;
  border-radius: var(--r-sm);
  text-decoration: none;
  box-shadow: 0 8px 24px rgba(245,158,11,.45);
  transition: all var(--dur) var(--ease);
  letter-spacing: .01em;
}
.btn-hero-primary:hover {
  background: #d97706;
  color: #fff;
  transform: translateY(-3px);
  box-shadow: 0 16px 36px rgba(245,158,11,.5);
}

.btn-hero-ghost {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 15px 28px;
  background: rgba(255,255,255,.1);
  border: 1.5px solid rgba(255,255,255,.5);
  color: #fff;
  font-weight: 600;
  font-size: .95rem;
  border-radius: var(--r-sm);
  text-decoration: none;
  backdrop-filter: blur(8px);
  transition: all var(--dur) var(--ease);
}
.btn-hero-ghost:hover {
  background: rgba(255,255,255,.22);
  border-color: #fff;
  color: #fff;
}

/* Hero swiper controls */
.hero-swiper-prev, .hero-swiper-next {
  width: 50px !important;
  height: 50px !important;
  background: rgba(255,255,255,.12) !important;
  backdrop-filter: blur(12px);
  border-radius: 50% !important;
  border: 1.5px solid rgba(255,255,255,.3) !important;
  color: #fff !important;
  --swiper-navigation-size: 17px;
  transition: background .2s;
}
.hero-swiper-prev:hover, .hero-swiper-next:hover {
  background: rgba(255,255,255,.3) !important;
}
.hero-swiper-pagination { bottom: 28px !important; }
.hero-swiper-pagination .swiper-pagination-bullet {
  width: 8px; height: 8px;
  background: rgba(255,255,255,.45);
  opacity: 1;
  transition: .3s;
}
.hero-swiper-pagination .swiper-pagination-bullet-active {
  width: 28px; border-radius: 4px;
  background: var(--accent);
}

@keyframes heroIn {
  from { opacity: 0; transform: translateY(30px); }
  to   { opacity: 1; transform: translateY(0); }
}

@media (max-width: 768px) {
  .hero-slide { height: 400px; max-height: 400px; }
  .hero-inner { text-align: center; }
  .hero-actions { justify-content: center; }
  .hero-swiper-prev, .hero-swiper-next { display: none !important; }
}
@media (max-width: 480px) {
  .hero-slide { height: 300px; max-height: 300px; }
  .hero-tag { font-size: 10px; padding: 5px 14px; margin-bottom: 14px; }
  .btn-hero-primary, .btn-hero-ghost { padding: 11px 20px; font-size: .85rem; }
}

/* ===================================================
   TRUST STRIP
   =================================================== */
.trust-strip {
  background: var(--white);
  border-bottom: 1px solid var(--line);
  padding: 0;
}
.trust-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border-left: 1px solid var(--line);
}
.trust-item {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 22px 24px;
  border-right: 1px solid var(--line);
  transition: background var(--dur);
}
.trust-item:hover { background: var(--surface); }
.trust-icon-box {
  width: 48px; height: 48px;
  border-radius: 12px;
  background: linear-gradient(135deg, #e0f2fe, #bae6fd);
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
  color: var(--primary-l);
  flex-shrink: 0;
}
.trust-label { font-size: .88rem; font-weight: 700; color: var(--ink); margin: 0 0 2px; }
.trust-sub   { font-size: .75rem; color: var(--muted); }

@media (max-width: 768px) {
  .trust-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 480px) {
  .trust-item { padding: 16px; gap: 10px; }
  .trust-icon-box { width: 40px; height: 40px; font-size: 17px; }
}

/* ===================================================
   SHARED SECTION STYLES
   =================================================== */
.section-wrap { padding: 88px 0; }
.section-wrap--alt { background: var(--surface); }

.sec-label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--accent);
  margin-bottom: 12px;
}
.sec-label::before, .sec-label::after {
  content: '';
  display: block;
  width: 24px;
  height: 1.5px;
  background: var(--accent);
  border-radius: 2px;
}

.sec-title {
  font-size: clamp(1.6rem, 3vw, 2.2rem);
  font-weight: 800;
  color: var(--ink);
  letter-spacing: -.02em;
  line-height: 1.2;
  margin-bottom: 14px;
}
.sec-title span { color: var(--primary-l); }

.sec-sub {
  font-size: .97rem;
  color: var(--muted);
  line-height: 1.7;
  max-width: 500px;
}
.sec-header { margin-bottom: 52px; }
.sec-header--center { text-align: center; }
.sec-header--center .sec-label { justify-content: center; }
.sec-header--center .sec-sub { margin: 0 auto; }

/* ===================================================
   STATS BANNER
   =================================================== */
.stats-banner {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-l) 100%);
  padding: 56px 0;
  position: relative;
  overflow: hidden;
}
.stats-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  position: relative;
  z-index: 1;
}
.stat-item {
  text-align: center;
  padding: 24px;
  border-right: 1px solid rgba(255,255,255,.15);
}
.stat-item:last-child { border-right: none; }
.stat-num {
  font-size: clamp(2rem, 3.5vw, 2.8rem);
  font-weight: 900;
  color: #fff;
  letter-spacing: -.03em;
  line-height: 1;
  margin-bottom: 6px;
}
.stat-num span { color: var(--accent-l); }
.stat-desc {
  font-size: .82rem;
  color: rgba(255,255,255,.75);
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: .8px;
}

@media (max-width: 768px) {
  .stats-grid { grid-template-columns: repeat(2, 1fr); }
  .stat-item:nth-child(2) { border-right: none; }
  .stat-item:nth-child(1), .stat-item:nth-child(2) { border-bottom: 1px solid rgba(255,255,255,.15); }
}

/* ===================================================
   SERVICES
   =================================================== */
.service-card {
  position: relative;
  background: var(--white);
  border-radius: var(--r);
  padding: 28px 22px;
  height: 100%;
  display: flex;
  flex-direction: column;
  gap: 14px;
  border: 1.5px solid var(--line);
  text-decoration: none;
  color: inherit;
  overflow: hidden;
  transition: all var(--dur) var(--ease);
}
.service-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 4px; height: 100%;
  background: linear-gradient(180deg, var(--primary-l), var(--accent));
  transform: scaleY(0);
  transform-origin: bottom;
  transition: transform .3s var(--ease);
}
.service-card:hover {
  border-color: rgba(3,105,161,.25);
  box-shadow: var(--shadow-md);
  transform: translateY(-6px);
  color: inherit;
}
.service-card:hover::before { transform: scaleY(1); }

.srv-icon {
  width: 64px; height: 64px;
  border-radius: 14px;
  background: linear-gradient(135deg, #e0f2fe, #bae6fd);
  display: flex; align-items: center; justify-content: center;
  overflow: hidden;
  flex-shrink: 0;
}
.srv-icon img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform .4s var(--ease);
}
.service-card:hover .srv-icon img { transform: scale(1.1); }

.srv-name {
  font-size: .95rem;
  font-weight: 700;
  color: var(--ink);
  line-height: 1.4;
  margin: 0;
}
.srv-link {
  margin-top: auto;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: .8rem;
  font-weight: 600;
  color: var(--primary-l);
  transition: gap var(--dur);
}
.service-card:hover .srv-link { gap: 12px; }

/* ===================================================
   CATEGORIES
   =================================================== */
.cat-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 28px 16px 22px;
  border-radius: var(--r);
  border: 1.5px solid var(--line);
  background: var(--white);
  text-decoration: none;
  height: 100%;
  transition: all var(--dur) var(--ease);
}
.cat-card:hover {
  border-color: var(--accent);
  box-shadow: var(--shadow-md);
  transform: translateY(-6px);
}
.cat-img-ring {
  width: 88px; height: 88px;
  border-radius: 50%;
  background: var(--surface);
  border: 2px solid var(--line);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 16px;
  overflow: hidden;
  transition: border-color var(--dur), box-shadow var(--dur);
}
.cat-card:hover .cat-img-ring {
  border-color: var(--accent);
  box-shadow: 0 0 0 4px rgba(245,158,11,.15);
}
.cat-img-ring img {
  width: 62px; height: 62px;
  object-fit: contain;
  transition: transform .3s var(--ease);
}
.cat-card:hover .cat-img-ring img { transform: scale(1.12); }

.cat-name {
  font-size: .88rem;
  font-weight: 700;
  color: var(--ink);
  line-height: 1.35;
  margin-bottom: 8px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.cat-cta {
  font-size: .75rem;
  font-weight: 600;
  color: var(--muted);
  display: inline-flex;
  align-items: center;
  gap: 5px;
  transition: color var(--dur), gap var(--dur);
}
.cat-card:hover .cat-cta { color: var(--accent); gap: 9px; }

/* ===================================================
   MARQUEE TICKER
   =================================================== */
.marquee-band {
  background: var(--primary);
  padding: 0;
  overflow: hidden;
  border-top: 3px solid var(--accent);
}
.marquee-track {
  display: flex;
  width: max-content;
  animation: marqueeRun 28s linear infinite;
  padding: 14px 0;
}
.marquee-track:hover { animation-play-state: paused; }
.marquee-item {
  white-space: nowrap;
  padding: 0 2.5rem;
  font-size: .82rem;
  font-weight: 600;
  color: rgba(255,255,255,.88);
  display: flex;
  align-items: center;
  gap: 10px;
  letter-spacing: .3px;
}
.marquee-dot { color: var(--accent); font-size: 6px; line-height: 1; }
@keyframes marqueeRun {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
@media (prefers-reduced-motion: reduce) { .marquee-track { animation: none; } }

/* ===================================================
   PRODUCT CARDS
   =================================================== */
.pcard {
  background: var(--white);
  border-radius: var(--r);
  border: 1.5px solid var(--line);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  height: 100%;
  transition: all var(--dur) var(--ease);
  position: relative;
}
.pcard:hover {
  border-color: rgba(3,105,161,.2);
  box-shadow: var(--shadow-md);
  transform: translateY(-5px);
}
.pcard-badge {
  position: absolute;
  top: 10px; left: 10px;
  z-index: 2;
  background: var(--danger);
  color: #fff;
  font-size: 9px;
  font-weight: 800;
  padding: 3px 9px;
  border-radius: 50px;
  letter-spacing: .5px;
  text-transform: uppercase;
}
.pcard-img {
  position: relative;
  width: 100%;
  height: 160px;
  background: var(--surface);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  flex-shrink: 0;
}
.pcard-img img {
  max-width: 85%;
  max-height: 130px;
  object-fit: contain;
  transition: transform .4s var(--ease);
}
.pcard:hover .pcard-img img { transform: scale(1.1); }

.pcard-overlay {
  position: absolute;
  inset: 0;
  background: rgba(12,74,110,.7);
  display: flex; align-items: center; justify-content: center;
  opacity: 0;
  transition: opacity .25s var(--ease);
}
.pcard:hover .pcard-overlay { opacity: 1; }
.pcard-quick {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #fff;
  color: var(--primary);
  font-size: .8rem;
  font-weight: 700;
  padding: 10px 18px;
  border-radius: 50px;
  text-decoration: none;
  transform: translateY(8px);
  transition: transform .2s var(--ease);
  white-space: nowrap;
}
.pcard:hover .pcard-quick { transform: translateY(0); }

.pcard-body {
  padding: 14px 16px 16px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.pcard-name {
  font-size: .85rem;
  font-weight: 600;
  color: var(--ink-soft);
  line-height: 1.45;
  margin-bottom: 10px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  min-height: 38px;
  text-decoration: none;
}
.pcard-name:hover { color: var(--primary-l); }
.pcard-prices {
  display: flex;
  align-items: baseline;
  gap: 8px;
  margin-bottom: 12px;
}
.p-was  { font-size: .72rem; color: #94a3b8; text-decoration: line-through; }
.p-now  { font-size: 1.05rem; font-weight: 800; color: var(--primary); letter-spacing: -.02em; }
.pcard-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 11px;
  background: var(--primary);
  color: #fff;
  font-size: .8rem;
  font-weight: 700;
  border-radius: var(--r-sm);
  text-decoration: none;
  margin-top: auto;
  letter-spacing: .3px;
  transition: all var(--dur) var(--ease);
}
.pcard-btn:hover {
  background: var(--primary-l);
  color: #fff;
  box-shadow: 0 6px 18px rgba(3,105,161,.35);
}

/* ===================================================
   RECENT SWIPER
   =================================================== */
.recent-swiper-wrap { padding-bottom: 46px !important; }
.recent-swiper-wrap .swiper-pagination-bullet        { background: var(--line); opacity: 1; }
.recent-swiper-wrap .swiper-pagination-bullet-active { background: var(--primary); }

/* ===================================================
   CTA BANNER
   =================================================== */
.cta-banner {
  background: linear-gradient(120deg, #0c4a6e 0%, #0369a1 50%, #0ea5e9 100%);
  padding: 72px 0;
  position: relative;
  overflow: hidden;
}
.cta-banner::after {
  content: '';
  position: absolute;
  right: -80px; bottom: -80px;
  width: 400px; height: 400px;
  background: radial-gradient(circle, rgba(245,158,11,.25) 0%, transparent 65%);
  border-radius: 50%;
}
.cta-banner h2 {
  font-size: clamp(1.6rem, 3vw, 2.4rem);
  font-weight: 900;
  color: #fff;
  letter-spacing: -.02em;
  margin-bottom: 12px;
}
.cta-banner p  { color: rgba(255,255,255,.8); font-size: 1rem; margin-bottom: 28px; }
.btn-cta-white {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #fff;
  color: var(--primary);
  font-weight: 700;
  font-size: .95rem;
  padding: 14px 30px;
  border-radius: var(--r-sm);
  text-decoration: none;
  transition: all var(--dur) var(--ease);
  box-shadow: 0 8px 24px rgba(0,0,0,.15);
}
.btn-cta-white:hover {
  background: var(--accent);
  color: #fff;
  transform: translateY(-3px);
  box-shadow: 0 16px 36px rgba(0,0,0,.2);
}
.btn-cta-ghost {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: rgba(255,255,255,.1);
  border: 1.5px solid rgba(255,255,255,.55);
  color: #fff;
  font-weight: 600;
  font-size: .95rem;
  padding: 14px 28px;
  border-radius: var(--r-sm);
  text-decoration: none;
  backdrop-filter: blur(6px);
  transition: all var(--dur) var(--ease);
}
.btn-cta-ghost:hover {
  background: rgba(255,255,255,.2);
  color: #fff;
  border-color: #fff;
}

/* ===================================================
   MOBILE STICKY CART
   =================================================== */
.m-cart-fab {
  position: fixed;
  bottom: 80px;
  right: 18px;
  z-index: 1050;
  display: none;
}
@media (max-width: 767px) { .m-cart-fab { display: block; } }
.m-cart-btn {
  position: relative;
  width: 56px; height: 56px;
  border-radius: 50%;
  background: var(--primary);
  color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  text-decoration: none;
  box-shadow: 0 8px 24px rgba(12,74,110,.45);
  transition: all var(--dur);
}
.m-cart-btn:hover { background: var(--primary-l); color: #fff; transform: scale(1.08); }
.m-cart-count {
  position: absolute;
  top: -5px; right: -5px;
  min-width: 20px; height: 20px;
  padding: 0 5px;
  background: var(--accent);
  color: #fff;
  font-size: 10px;
  font-weight: 800;
  border-radius: 50px;
  display: flex; align-items: center; justify-content: center;
  border: 2px solid #fff;
}

/* ===================================================
   WHATSAPP FAB
   =================================================== */
.wa-fab {
  position: fixed;
  bottom: 22px; right: 22px;
  z-index: 9999;
  display: flex;
  align-items: center;
  gap: 10px;
  background: #25d366;
  color: #fff;
  padding: 13px 20px;
  border-radius: 50px;
  font-weight: 600;
  font-size: .88rem;
  text-decoration: none;
  box-shadow: 0 8px 24px rgba(37,211,102,.35);
  transition: all .3s var(--ease);
}
.wa-fab:hover { background: #1ebe5d; color: #fff; transform: translateY(-4px); }
@media (max-width: 575px) {
  .wa-fab { padding: 14px; border-radius: 50%; }
  .wa-fab span { display: none; }
}

/* ===================================================
   PROMO POPUP
   =================================================== */
.promo-popup {
  position: fixed;
  bottom: -420px;
  right: 22px;
  z-index: 9998;
  opacity: 0;
  transition: bottom .5s var(--ease), opacity .5s var(--ease);
}
.promo-popup.show {
  bottom: 100px;
  opacity: 1;
}
.promo-card {
  width: 290px;
  background: var(--white);
  border-radius: var(--r-lg);
  padding: 24px;
  box-shadow: var(--shadow-lg);
  border-top: 4px solid var(--accent);
  position: relative;
}
.promo-close {
  position: absolute;
  top: 14px; right: 16px;
  background: none; border: none;
  font-size: 18px; color: var(--muted);
  cursor: pointer; line-height: 1;
  transition: color var(--dur);
}
.promo-close:hover { color: var(--ink); }
.promo-chip {
  display: inline-block;
  background: linear-gradient(90deg, var(--primary), var(--primary-l));
  color: #fff;
  font-size: 9px;
  font-weight: 800;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 4px 12px;
  border-radius: 50px;
  margin-bottom: 12px;
}
.promo-title { font-size: 1rem; font-weight: 800; color: var(--ink); margin-bottom: 8px; }
.promo-text  { font-size: .82rem; color: var(--muted); line-height: 1.6; margin-bottom: 18px; }
.promo-btn {
  display: block;
  text-align: center;
  padding: 12px;
  border-radius: var(--r-sm);
  background: var(--accent);
  color: #fff;
  font-weight: 700;
  font-size: .88rem;
  text-decoration: none;
  transition: background var(--dur);
}
.promo-btn:hover { background: #d97706; color: #fff; }
@media (max-width: 575px) {
  .promo-popup.show { bottom: 80px; right: 10px; }
  .promo-card { width: 260px; }
}

/* ===================================================
   REVEAL ANIMATION
   =================================================== */
.reveal {
  opacity: 0;
  transform: translateY(36px);
  transition: opacity .6s var(--ease), transform .6s var(--ease);
}
.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}
</style>
@endsection

{{-- ===== MOBILE CART FAB ===== --}}
<div class="m-cart-fab">
  @php $cartCount = collect(session('cart', []))->sum('quantity'); @endphp
  <a href="{{ route('carts.index') }}" class="m-cart-btn">
    <i class="fas fa-shopping-cart"></i>
    <span class="m-cart-count cartReload">{{ $cartCount }}</span>
  </a>
</div>

{{-- ===== HERO SLIDER ===== --}}
@include('users.slider')

{{-- ===== TRUST STRIP ===== --}}
<div class="trust-strip">
  <div class="container-fluid px-0">
    <div class="trust-grid">
      <div class="trust-item">
        <div class="trust-icon-box"><i class="fas fa-truck"></i></div>
        <div>
          <p class="trust-label">Free Delivery</p>
          <span class="trust-sub">On qualifying orders</span>
        </div>
      </div>
      <div class="trust-item">
        <div class="trust-icon-box"><i class="fas fa-shield-alt"></i></div>
        <div>
          <p class="trust-label">Secure Payment</p>
          <span class="trust-sub">100% protected</span>
        </div>
      </div>
      <div class="trust-item">
        <div class="trust-icon-box"><i class="fas fa-tools"></i></div>
        <div>
          <p class="trust-label">Expert Installation</p>
          <span class="trust-sub">Certified engineers</span>
        </div>
      </div>
      <div class="trust-item">
        <div class="trust-icon-box"><i class="fas fa-headset"></i></div>
        <div>
          <p class="trust-label">24 / 7 Support</p>
          <span class="trust-sub">Always here for you</span>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ===== SERVICES ===== --}}
<section class="section-wrap section-wrap--alt" id="services">
  <div class="container">
    <div class="sec-header sec-header--center reveal">
      <div class="sec-label">What We Do</div>
      <h2 class="sec-title">Professional <span>Solar Services</span></h2>
      <p class="sec-sub">End-to-end renewable energy solutions designed for homes and businesses across Nigeria.</p>
    </div>
    <div class="row g-4">
      @foreach ($service as $serv)
      <div class="col-6 col-md-4 col-lg-3 reveal">
        <a href="{{ route('service.details', encrypt($serv->id)) }}" class="service-card">
          <div class="srv-icon">
            <img src="{{ asset('images/services/'.$serv->images) }}" alt="{{ $serv->title }}">
          </div>
          <p class="srv-name">{{ $serv->title }}</p>
          <span class="srv-link">Learn more <i class="fas fa-arrow-right"></i></span>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ===== STATS ===== --}}
<div class="stats-banner">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-num">2,400<span>+</span></div>
        <div class="stat-desc">Installations Done</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">98<span>%</span></div>
        <div class="stat-desc">Customer Satisfaction</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">500<span>+</span></div>
        <div class="stat-desc">Products in Stock</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">36</div>
        <div class="stat-desc">States Covered</div>
      </div>
    </div>
  </div>
</div>

{{-- ===== CATEGORIES ===== --}}
<section class="section-wrap" id="categories">
  <div class="container">
    <div class="sec-header sec-header--center reveal">
      <div class="sec-label">Browse By Type</div>
      <h2 class="sec-title">Shop by <span>Category</span></h2>
    </div>
    <div class="row g-3">
      @foreach ($categories as $cat)
      <div class="col-6 col-md-4 col-lg-3 reveal">
        <a href="{{ route('category.products', $cat->id) }}" class="cat-card">
          <div class="cat-img-ring">
            <img src="{{ asset('images/category/'.$cat->image_path) }}" alt="{{ $cat->name }}">
          </div>
          <p class="cat-name">{{ $cat->name }}</p>
          <span class="cat-cta">Shop now <i class="fas fa-arrow-right" style="font-size:10px"></i></span>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ===== MARQUEE ===== --}}
<div class="marquee-band">
  <div class="marquee-track">
    @foreach (range(0, 1) as $_)
    {{-- <span class="marquee-item"><span class="marquee-dot">&#9679;</span> Free Nationwide Delivery on Qualifying Orders</span> --}}
    <span class="marquee-item"><span class="marquee-dot">&#9679;</span> Certified Solar Installation — Trusted Engineers</span>
    <span class="marquee-item"><span class="marquee-dot">&#9679;</span> Premium Panels, Inverters &amp; Batteries In Stock</span>
    <span class="marquee-item"><span class="marquee-dot">&#9679;</span> 24 / 7 Technical &amp; Customer Support</span>
    <span class="marquee-item"><span class="marquee-dot">&#9679;</span> 100% Secure Payments — Paystack &amp; Bank Transfer</span>
    <span class="marquee-item"><span class="marquee-dot">&#9679;</span> Scalable Solar Packages for Every Budget</span>
    @endforeach
  </div>
</div>

{{-- ===== FEATURED PRODUCTS ===== --}}
<section class="section-wrap section-wrap--alt" id="shop">
  <div class="container">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-5 reveal">
      <div>
        <div class="sec-label">Our Store</div>
        <h2 class="sec-title mb-0">Featured <span>Products</span></h2>
      </div>
      <a href="{{ route('products.search') }}" class="btn btn-outline-primary btn-sm px-4 py-2 fw-600" style="border-radius:50px;font-size:.82rem;font-weight:600">
        View All Products <i class="fas fa-arrow-right ms-1"></i>
      </a>
    </div>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
      @forelse ($products as $item)
      <div class="col reveal">
        <div class="pcard">
          @if ($item->sale_price < $item->price)
          <span class="pcard-badge">Sale</span>
          @endif
          <div class="pcard-img">
            <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
            <div class="pcard-overlay">
              <a href="{{ route('product.details', $item->slug) }}" class="pcard-quick">
                <i class="fas fa-eye"></i> Quick View
              </a>
            </div>
          </div>
          <div class="pcard-body">
            <a href="{{ route('product.details', $item->slug) }}" class="pcard-name">{{ $item->name }}</a>
            <div class="pcard-prices">
              <span class="p-was">&#8358;{{ number_format($item->price) }}</span>
              <span class="p-now">&#8358;{{ number_format($item->sale_price) }}</span>
            </div>
            <a href="{{ route('product.details', $item->slug) }}" class="pcard-btn">
              <i class="fas fa-cart-shopping"></i> Add to Cart
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center py-5">
        <i class="fas fa-box-open fa-3x text-muted mb-3 d-block"></i>
        <p class="text-muted">No products available yet.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>
{{-- ===== CTA BANNER ===== --}}


{{-- ===== RECENT PRODUCTS ===== --}}
<section class="section-wrap" id="recent">
  <div class="container">
    <div class="sec-header sec-header--center reveal">
      <div class="sec-label">Just Added</div>
      <h2 class="sec-title">Recent <span>Arrivals</span></h2>
    </div>
    <div class="swiper recent-swiper-wrap">
      <div class="swiper-wrapper">
        @forelse ($products as $item)
        <div class="swiper-slide">
          <div class="pcard">
            <div class="pcard-img">
              <img src="{{ asset('images/products/'.$item->image_path) }}" alt="{{ $item->name }}">
              <div class="pcard-overlay">
                <a href="{{ route('product.details', $item->slug) }}" class="pcard-quick">
                  <i class="fas fa-eye"></i> Quick View
                </a>
              </div>
            </div>
            <div class="pcard-body">
              <a href="{{ route('product.details', $item->slug) }}" class="pcard-name">{{ $item->name }}</a>
              <div class="pcard-prices">
                <span class="p-was">&#8358;{{ number_format($item->price) }}</span>
                <span class="p-now">&#8358;{{ number_format($item->sale_price) }}</span>
              </div>
              <a href="{{ route('product.details', $item->slug) }}" class="pcard-btn">
                <i class="fas fa-cart-shopping"></i> Add to Cart
              </a>
            </div>
          </div>
        </div>
        @empty
        <p class="text-muted text-center">No products available.</p>
        @endforelse
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

{{-- ===== PROMO POPUP ===== --}}
<div class="promo-popup" id="promoPopup">
  <div class="promo-card">
    <button class="promo-close" onclick="closePromo()">&#x2715;</button>
    <div class="promo-chip">Exclusive Offer</div>
    <h6 class="promo-title">Full Solar Package Deal</h6>
    <p class="promo-text">Upgrade your power with our premium full solar package. Limited-time professional installation included.</p>
    <a href="{{ route('users.package') }}" class="promo-btn">View Full Package &rarr;</a>
  </div>
</div>

{{-- ===== WHATSAPP FAB ===== --}}
<a href="https://wa.me/2347051000600?text=Hello%20Roisolar!%20I%20have%20a%20question."
   class="wa-fab" target="_blank" rel="noopener noreferrer">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="white">
    <path d="M20.52 3.48A11.79 11.79 0 0012.02 0C5.38 0 .02 5.36.02 12c0 2.12.56 4.19 1.63 6.01L0 24l6.18-1.62A11.96 11.96 0 0012.02 24c6.64 0 12-5.36 12-12 0-3.2-1.25-6.21-3.5-8.52zM12.02 21.8c-1.88 0-3.72-.5-5.33-1.46l-.38-.23-3.67.96.98-3.58-.25-.37A9.74 9.74 0 012.22 12c0-5.4 4.4-9.8 9.8-9.8s9.8 4.4 9.8 9.8-4.4 9.8-9.8 9.8zm5.4-7.36c-.29-.15-1.72-.85-1.99-.95-.27-.1-.47-.15-.67.15-.2.29-.77.95-.95 1.15-.17.2-.35.22-.64.07-.29-.15-1.22-.45-2.32-1.45-.86-.77-1.45-1.72-1.62-2.01-.17-.29-.02-.45.13-.6.13-.13.29-.35.43-.52.15-.17.2-.29.29-.49.1-.2.05-.37-.02-.52-.07-.15-.67-1.6-.92-2.19-.24-.57-.48-.49-.67-.5-.17-.01-.37-.01-.57-.01s-.52.07-.8.37c-.27.29-1.05 1.03-1.05 2.52s1.08 2.93 1.23 3.13c.15.2 2.13 3.25 5.17 4.56.72.31 1.28.49 1.72.63.72.23 1.38.2 1.9.12.58-.09 1.72-.7 1.97-1.38.24-.68.24-1.27.17-1.38-.07-.12-.27-.2-.56-.35z"/>
  </svg>
  <span>Chat with us</span>
</a>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {

  /* ---- HERO SWIPER ---- */
  new Swiper('.heroSwiper', {
    loop: true,
    speed: 1000,
    effect: 'fade',
    fadeEffect: { crossFade: true },
    autoplay: { delay: 5500, disableOnInteraction: false },
    pagination: { el: '.hero-swiper-pagination', clickable: true },
    navigation: { prevEl: '.hero-swiper-prev', nextEl: '.hero-swiper-next' },
  });

  /* ---- RECENT PRODUCTS SWIPER ---- */
  new Swiper('.recent-swiper-wrap', {
    loop: true,
    speed: 700,
    spaceBetween: 16,
    autoplay: { delay: 3500, disableOnInteraction: false },
    pagination: { el: '.recent-swiper-wrap .swiper-pagination', clickable: true },
    breakpoints: {
      0:   { slidesPerView: 2 },
      576: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      1024:{ slidesPerView: 4 },
    }
  });

  /* ---- SCROLL REVEAL ---- */
  const revealEls = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        // stagger within parent row
        const siblings = e.target.parentElement.querySelectorAll('.reveal');
        let idx = 0;
        siblings.forEach((s, si) => { if (s === e.target) idx = si; });
        setTimeout(() => e.target.classList.add('visible'), idx * 80);
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(el => io.observe(el));

  /* ---- PROMO POPUP ---- */
  const popup = document.getElementById('promoPopup');
  if (popup) {
    function showPromo() {
      popup.classList.add('show');
      setTimeout(() => popup.classList.remove('show'), 7000);
    }
    setTimeout(showPromo, 3000);
    setInterval(showPromo, 90000);
  }

});

function closePromo() {
  const p = document.getElementById('promoPopup');
  if (p) { p.classList.remove('show'); }
}
</script>
@endsection
