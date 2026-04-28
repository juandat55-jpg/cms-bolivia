<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $config['site_name'] ?? 'Hola Bolivia Travel' }}</title>
<meta name="description" content="{{ $config['meta_descripcion'] ?? 'Tours y destinos auténticos en Bolivia.' }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito+Sans:wght@300;400;600;700;900&display=swap" rel="stylesheet">
<style>
:root {
  --bg: oklch(9% 0.015 250);
  --bg2: oklch(13% 0.018 240);
  --white: oklch(97% 0.008 80);
  --muted: oklch(60% 0.01 80);
  --gold: oklch(68% 0.14 195);
  --gold-dim: oklch(52% 0.12 195);
  --blue: oklch(62% 0.13 215);
  --font-display: 'Bebas Neue', sans-serif;
  --font-body: 'Nunito Sans', sans-serif;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { background: var(--bg); color: var(--white); font-family: var(--font-body); overflow-x: hidden; }
a { color: inherit; text-decoration: none; }
img { display: block; width: 100%; }

/* NAV */
nav { position: fixed; top: 0; left: 0; right: 0; z-index: 100; display: flex; align-items: center; justify-content: space-between; padding: 20px 48px; transition: background 0.4s, padding 0.4s; }
nav.scrolled { background: rgba(8,10,18,0.88); backdrop-filter: blur(12px); padding: 14px 48px; border-bottom: 1px solid rgba(255,255,255,0.06); }
.nav-logo-img { display:flex; align-items:center; }
.nav-links { display: flex; gap: 36px; align-items: center; }
.nav-links a { font-size: 13px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; color: oklch(80% 0.01 80); transition: color 0.2s; }
.nav-links a:hover { color: var(--gold); }
.nav-cta { background: var(--gold); color: var(--bg) !important; padding: 10px 24px; font-weight: 700 !important; transition: background 0.2s, transform 0.2s !important; }
.nav-cta:hover { background: oklch(80% 0.16 65) !important; transform: translateY(-1px); }
.nav-burger { display: none; flex-direction: column; gap: 5px; cursor: pointer; }
.nav-burger span { width: 24px; height: 2px; background: var(--white); border-radius: 2px; }

/* HERO */
.hero { position: relative; height: 100vh; min-height: 600px; display: flex; align-items: flex-end; overflow: hidden; }
.hero-media { position: absolute; inset: 0; background: var(--bg); }
.hero-media video, .hero-media img { width: 100%; height: 100%; object-fit: cover; transform: scale(1.08); animation: heroZoom 8s ease-out forwards; }
@keyframes heroZoom { to { transform: scale(1); } }
.hero-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(5,8,18,0.85) 0%, rgba(5,8,18,0.3) 50%, rgba(5,8,18,0.1) 100%); }
.hero-content { position: relative; z-index: 2; padding: 0 48px 72px; max-width: 900px; }
.hero-eyebrow { font-size: 12px; font-weight: 700; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); margin-bottom: 16px; opacity: 0; animation: fadeUp 0.8s 0.5s forwards; }
.hero-title { font-family: var(--font-display); font-size: clamp(72px, 10vw, 140px); line-height: 0.92; letter-spacing: 2px; color: var(--white); opacity: 0; animation: fadeUp 0.8s 0.7s forwards; }
.hero-title span { color: var(--gold); }
.hero-sub { font-size: 17px; font-weight: 300; line-height: 1.6; color: oklch(80% 0.01 80); max-width: 480px; margin: 24px 0 36px; opacity: 0; animation: fadeUp 0.8s 0.9s forwards; }
.hero-actions { display: flex; gap: 16px; flex-wrap: wrap; opacity: 0; animation: fadeUp 0.8s 1.1s forwards; }
.btn-primary { background: var(--gold); color: var(--bg); padding: 16px 36px; font-weight: 700; font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase; transition: background 0.2s, transform 0.2s; cursor: pointer; border: none; font-family: var(--font-body); }
.btn-primary:hover { background: oklch(80% 0.16 65); transform: translateY(-2px); }
.btn-ghost { border: 1.5px solid rgba(255,255,255,0.3); color: var(--white); padding: 16px 36px; font-weight: 600; font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase; transition: border-color 0.2s, background 0.2s; cursor: pointer; background: transparent; font-family: var(--font-body); }
.btn-ghost:hover { border-color: var(--gold); background: rgba(255,255,255,0.04); }
.hero-scroll { position: absolute; right: 48px; bottom: 72px; z-index: 2; display: flex; flex-direction: column; align-items: center; gap: 8px; font-size: 11px; letter-spacing: 2px; text-transform: uppercase; color: var(--muted); opacity: 0; animation: fadeUp 0.8s 1.3s forwards; }
.scroll-line { width: 1px; height: 48px; background: var(--muted); animation: scrollPulse 2s ease-in-out infinite; }
@keyframes scrollPulse { 0%,100%{transform:scaleY(1);opacity:0.4} 50%{transform:scaleY(0.5);opacity:1} }
@keyframes fadeUp { from { opacity: 0; transform: translateY(32px); } to { opacity: 1; transform: translateY(0); } }

/* TICKER */
.ticker { background: var(--gold); padding: 14px 0; overflow: hidden; white-space: nowrap; }
.ticker-inner { display: inline-flex; animation: ticker 28s linear infinite; }
.ticker-item { font-family: var(--font-display); font-size: 22px; letter-spacing: 2px; color: var(--bg); padding: 0 40px; }
.ticker-sep { color: var(--bg); opacity: 0.4; }
@keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }

/* SECTIONS */
section { padding: 100px 48px; }
.section-eyebrow { font-size: 11px; font-weight: 700; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); margin-bottom: 16px; }
.section-title { font-family: var(--font-display); font-size: clamp(48px, 6vw, 80px); line-height: 0.95; letter-spacing: 1px; color: var(--white); }
.section-title span { color: var(--gold); }
.reveal { opacity: 0; transform: translateY(40px); transition: opacity 0.7s, transform 0.7s; }
.reveal.visible { opacity: 1; transform: translateY(0); }
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }

/* INTRO */
.intro-section { padding: 120px 48px; background: var(--bg); display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
.intro-big { font-family: var(--font-display); font-size: clamp(56px, 7vw, 96px); line-height: 0.95; letter-spacing: 1px; }
.intro-big span { color: var(--gold); display: block; }
.intro-right { max-width: 480px; }
.intro-right p { font-size: 17px; font-weight: 300; line-height: 1.8; color: oklch(75% 0.01 80); margin-bottom: 24px; }
.stats-row { display: flex; gap: 40px; margin-top: 40px; }
.stat-num { font-family: var(--font-display); font-size: 52px; color: var(--gold); line-height: 1; }
.stat-label { font-size: 12px; letter-spacing: 1.5px; text-transform: uppercase; color: var(--muted); margin-top: 4px; }

/* DESTINATIONS */
.destinations-section { background: var(--bg2); padding: 100px 48px; }
.destinations-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 60px; flex-wrap: wrap; gap: 20px; }
.destinations-header p { font-size: 15px; color: var(--muted); max-width: 340px; line-height: 1.6; }
.dest-grid { display: grid; grid-template-columns: repeat(3, 1fr); grid-template-rows: auto auto; gap: 16px; }
.dest-card { position: relative; overflow: hidden; cursor: pointer; aspect-ratio: 3/4; }
.dest-card.wide { grid-column: span 2; aspect-ratio: 16/9; }
.dest-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.25,0.46,0.45,0.94); }
.dest-card:hover img { transform: scale(1.06); }
.dest-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(5,8,18,0.9) 0%, rgba(5,8,18,0.1) 60%); display: flex; flex-direction: column; justify-content: flex-end; padding: 28px; }
.dest-tag { font-size: 10px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); margin-bottom: 8px; }
.dest-name { font-family: var(--font-display); font-size: 34px; letter-spacing: 1px; color: var(--white); }
.dest-card.wide .dest-name { font-size: 52px; }
.dest-desc { font-size: 13px; color: oklch(70% 0.01 80); margin-top: 8px; opacity: 0; transform: translateY(8px); transition: opacity 0.3s, transform 0.3s; }
.dest-card:hover .dest-desc { opacity: 1; transform: translateY(0); }
.dest-arrow { position: absolute; top: 24px; right: 24px; width: 40px; height: 40px; border: 1.5px solid rgba(255,255,255,0.3); display: flex; align-items: center; justify-content: center; font-size: 18px; opacity: 0; transform: translateY(-8px); transition: opacity 0.3s, transform 0.3s, border-color 0.3s; }
.dest-card:hover .dest-arrow { opacity: 1; transform: translateY(0); border-color: var(--gold); }

/* MARQUEE */
.marquee-section { padding: 60px 0; overflow: hidden; background: var(--bg); }
.marquee-row { display: flex; gap: 16px; margin-bottom: 16px; }
.marquee-row.row1 { animation: marqueeL 35s linear infinite; }
.marquee-row.row2 { animation: marqueeR 40s linear infinite; }
.marquee-photo { flex-shrink: 0; width: 320px; height: 220px; overflow: hidden; }
.marquee-photo img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
.marquee-photo:hover img { transform: scale(1.06); }
@keyframes marqueeL { from{transform:translateX(0)} to{transform:translateX(-50%)} }
@keyframes marqueeR { from{transform:translateX(-50%)} to{transform:translateX(0)} }

/* TOURS */
.tours-section { background: var(--bg); padding: 100px 48px; }
.tours-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 60px; flex-wrap: wrap; gap: 20px; }
.tours-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.tour-card { background: var(--bg2); overflow: hidden; transition: transform 0.3s; cursor: pointer; }
.tour-card:hover { transform: translateY(-6px); }
.tour-thumb { position: relative; height: 260px; overflow: hidden; }
.tour-thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
.tour-card:hover .tour-thumb img { transform: scale(1.06); }
.tour-badge { position: absolute; top: 16px; left: 16px; background: var(--gold); color: var(--bg); font-size: 10px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; padding: 6px 12px; }
.tour-body { padding: 24px 28px 32px; }
.tour-days { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); margin-bottom: 10px; }
.tour-name { font-family: var(--font-display); font-size: 26px; letter-spacing: 0.5px; color: var(--white); margin-bottom: 12px; line-height: 1.1; }
.tour-desc { font-size: 13px; color: var(--muted); line-height: 1.7; margin-bottom: 20px; }
.tour-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(255,255,255,0.07); padding-top: 20px; }
.tour-price { font-family: var(--font-display); font-size: 28px; color: var(--gold); }
.tour-price-label { font-size: 11px; color: var(--muted); display: block; }
.tour-link { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--white); display: flex; align-items: center; gap: 8px; transition: color 0.2s; }
.tour-link:hover { color: var(--gold); }
.tour-link::after { content: '→'; transition: transform 0.2s; }
.tour-link:hover::after { transform: translateX(4px); }

/* ABOUT */
.about-section { background: var(--bg2); padding: 100px 48px; display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
.about-images { position: relative; height: 600px; }
.about-img-main { position: absolute; top: 0; left: 0; right: 60px; bottom: 60px; overflow: hidden; }
.about-img-main img { width: 100%; height: 100%; object-fit: cover; }
.about-img-accent { position: absolute; bottom: 0; right: 0; width: 55%; height: 55%; overflow: hidden; border: 4px solid var(--bg2); }
.about-img-accent img { width: 100%; height: 100%; object-fit: cover; }
.about-content p { font-size: 16px; line-height: 1.8; color: oklch(72% 0.01 80); margin: 24px 0; }
.about-features { list-style: none; display: flex; flex-direction: column; gap: 14px; margin-top: 32px; }
.about-features li { display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 600; color: oklch(85% 0.01 80); }
.about-features li::before { content: ''; width: 6px; height: 6px; background: var(--gold); flex-shrink: 0; }

/* GALLERY */
.gallery-section { background: var(--bg); padding: 100px 48px; }
.gallery-grid { display: grid; grid-template-columns: repeat(4, 1fr); grid-auto-rows: 220px; gap: 12px; margin-top: 56px; }
.gallery-item { overflow: hidden; position: relative; cursor: pointer; }
.gallery-item.tall { grid-row: span 2; }
.gallery-item.wide { grid-column: span 2; }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s cubic-bezier(0.25,0.46,0.45,0.94); }
.gallery-item:hover img { transform: scale(1.08); }
.gallery-item-overlay { position: absolute; inset: 0; background: rgba(5,8,18,0.5); display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s; }
.gallery-item:hover .gallery-item-overlay { opacity: 1; }
.gallery-item-overlay span { font-family: var(--font-display); font-size: 18px; letter-spacing: 2px; color: var(--white); }

/* CTA */
.cta-section { background: var(--gold); padding: 100px 48px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 40px; }
.cta-text h2 { font-family: var(--font-display); font-size: clamp(48px, 6vw, 80px); letter-spacing: 1px; color: var(--bg); line-height: 0.95; }
.cta-text p { font-size: 16px; color: var(--bg); opacity: 0.7; margin-top: 16px; max-width: 400px; line-height: 1.6; }
.btn-dark { background: var(--bg); color: var(--white); padding: 18px 44px; font-weight: 700; font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase; transition: background 0.2s, transform 0.2s; cursor: pointer; border: none; font-family: var(--font-body); flex-shrink: 0; }
.btn-dark:hover { background: var(--bg2); transform: translateY(-2px); }

/* CONTACT */
.contact-section { background: var(--bg); padding: 100px 48px; }
.contact-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; }
.contact-form { display: flex; flex-direction: column; gap: 16px; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.form-group { display: flex; flex-direction: column; gap: 8px; }
.form-group label { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--muted); }
.form-group input, .form-group select, .form-group textarea { background: var(--bg2); border: 1px solid rgba(255,255,255,0.08); color: var(--white); padding: 14px 16px; font-family: var(--font-body); font-size: 14px; outline: none; transition: border-color 0.2s; }
.form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--gold); }
.form-group textarea { resize: vertical; min-height: 120px; }
.contact-info { display: flex; flex-direction: column; gap: 32px; }
.contact-info-item { border-left: 2px solid var(--gold); padding-left: 20px; }
.contact-info-label { font-size: 10px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); margin-bottom: 6px; }
.contact-info-value { font-size: 16px; color: var(--white); }
.contact-info-value a:hover { color: var(--gold); }
.social-links { display: flex; gap: 16px; margin-top: 8px; }
.social-link { width: 44px; height: 44px; border: 1.5px solid rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; transition: border-color 0.2s, background 0.2s; cursor: pointer; }
.social-link:hover { border-color: var(--gold); }

/* FOOTER */
footer { background: oklch(6% 0.012 250); padding: 40px 48px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; border-top: 1px solid rgba(255,255,255,0.06); }
.footer-copy { font-size: 12px; color: var(--muted); }
.footer-links { display: flex; gap: 24px; }
.footer-links a { font-size: 12px; color: var(--muted); letter-spacing: 1px; transition: color 0.2s; }
.footer-links a:hover { color: var(--gold); }

/* WA FLOAT */
.wa-float { position: fixed; bottom: 28px; right: 24px; z-index: 200; width: 58px; height: 58px; border-radius: 50%; background: #25D366; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 20px rgba(37,211,102,0.4); transition: transform 0.2s; cursor: pointer; }
.wa-float:hover { transform: scale(1.1); }
.wa-float svg { width: 28px; height: 28px; }

/* RESPONSIVE */
@media (max-width: 1024px) { .tours-grid { grid-template-columns: 1fr 1fr; } .dest-grid { grid-template-columns: 1fr 1fr; } .gallery-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 900px) {
  nav { padding: 14px 20px; } nav.scrolled { padding: 10px 20px; }
  .nav-links { display: none; } .nav-burger { display: flex; }
  .nav-links.open { display: flex; flex-direction: column; position: fixed; inset: 0; background: oklch(7% 0.015 250); justify-content: center; align-items: center; gap: 32px; z-index: 99; }
  section { padding: 60px 20px; } .intro-section { grid-template-columns: 1fr; gap: 40px; padding: 60px 20px; }
  .hero-content { padding: 0 20px 80px; } .hero-scroll { display: none; }
  .dest-grid { grid-template-columns: 1fr 1fr; gap: 10px; } .dest-card.wide { grid-column: span 2; aspect-ratio: 3/2; }
  .tours-grid { grid-template-columns: 1fr; } .about-section { grid-template-columns: 1fr; }
  .about-images { height: 320px; } .gallery-grid { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 180px; }
  .contact-inner { grid-template-columns: 1fr; } .form-row { grid-template-columns: 1fr; }
  .cta-section { flex-direction: column; padding: 60px 20px; }
  footer { flex-direction: column; text-align: center; padding: 32px 20px; }
}
@media (max-width: 600px) {
  .hero-title { font-size: clamp(54px, 14vw, 80px); }
  .hero-actions { flex-direction: column; } .dest-grid { grid-template-columns: 1fr; }
  .gallery-grid { grid-template-columns: 1fr 1fr; grid-auto-rows: 140px; }
  .marquee-photo { width: 220px; height: 150px; }
}
</style>
</head>
<body>

<!-- NAV -->
<nav id="nav">
  <a href="#" class="nav-logo-img">
    @if(\App\Models\CmsSetting::get('logo'))
      <img src="{{ asset('storage/'.\App\Models\CmsSetting::get('logo')) }}" alt="{{ $config['site_name'] ?? 'Hola Bolivia Travel' }}" style="height:52px;width:52px;object-fit:contain;display:block;">
    @else
      <img src="{{ asset('uploads/logo con circulo-02.png') }}" alt="Hola Bolivia Travel" style="height:52px;width:52px;object-fit:contain;display:block;">
    @endif
  </a>
  <div class="nav-links" id="navLinks">
    <a href="#destinos">Destinos</a>
    <a href="#tours">Tours</a>
    <a href="#galeria">Galería</a>
    <a href="#nosotros">Nosotros</a>
    <a href="#contacto" class="nav-cta">Reservar</a>
  </div>
  <div class="nav-burger" id="burger" onclick="toggleNav()">
    <span></span><span></span><span></span>
  </div>
</nav>

<!-- HERO -->
<section class="hero" style="padding:0;">
  <div class="hero-media">
    @if($hero['video_fondo'] ?? false)
      <video autoplay muted loop playsinline
        poster="{{ $hero['imagen_fondo'] ? asset('storage/'.$hero['imagen_fondo']) : '' }}">
        <source src="{{ asset('storage/'.$hero['video_fondo']) }}" type="video/mp4">
      </video>
    @elseif($hero['imagen_fondo'] ?? false)
      <img src="{{ asset('storage/'.$hero['imagen_fondo']) }}" alt="Bolivia">
    @else
      <img src="{{ asset('uploads/salardeuyuni2.jpg') }}" alt="Bolivia">
    @endif
  </div>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <p class="hero-eyebrow">{{ $hero['eyebrow'] ?? 'Agencia de Turismo · Bolivia' }}</p>
    <h1 class="hero-title">
      {{ $hero['titulo'] ?? 'BOLIVIA' }}<br>
      <span>{{ $hero['titulo_acento'] ?? 'TE ESPERA' }}</span>
    </h1>
    <p class="hero-sub">{{ $hero['subtitulo'] ?? 'Descubre paisajes que desafían la imaginación.' }}</p>
    <div class="hero-actions">
      <a href="{{ $hero['btn1_url'] ?? '#tours' }}">
        <button class="btn-primary">{{ $hero['btn1_texto'] ?? 'Ver Tours' }}</button>
      </a>
      <a href="{{ $hero['btn2_url'] ?? '#contacto' }}">
        <button class="btn-ghost">{{ $hero['btn2_texto'] ?? 'Contáctanos' }}</button>
      </a>
    </div>
  </div>
  <div class="hero-scroll">
    <div class="scroll-line"></div>
    <span>Scroll</span>
  </div>
</section>

<!-- TICKER -->
<div class="ticker">
  <div class="ticker-inner">
    @php
      $tickerItems = array_filter(explode('|', $ticker['items'] ?? 'Salar de Uyuni|Lago Titicaca|Valle de la Luna|La Paz|Reserva Abaroa|Copacabana'));
      $tickerItems = array_merge($tickerItems, $tickerItems); // duplicar para loop infinito
    @endphp
    @foreach($tickerItems as $item)
      <span class="ticker-item">{{ trim($item) }} <span class="ticker-sep">✦</span></span>
    @endforeach
  </div>
</div>

<!-- INTRO -->
<div class="intro-section reveal" id="nosotros">
  <div class="intro-big">
    EL PAÍS<br>MÁS<br><span>INCREÍBLE</span><br>DEL MUNDO
  </div>
  <div class="intro-right">
    <div class="section-eyebrow">Por qué Bolivia</div>
    <p>{{ $nosotros['texto'] ?? 'Bolivia guarda secretos que pocos viajeros han descubierto.' }}</p>
    <div class="stats-row">
      <div>
        <div class="stat-num">{{ $nosotros['stat1_num'] ?? '500+' }}</div>
        <div class="stat-label">{{ $nosotros['stat1_label'] ?? 'Viajeros felices' }}</div>
      </div>
      <div>
        <div class="stat-num">{{ $nosotros['stat2_num'] ?? '25+' }}</div>
        <div class="stat-label">{{ $nosotros['stat2_label'] ?? 'Destinos' }}</div>
      </div>
      <div>
        <div class="stat-num">{{ $nosotros['stat3_num'] ?? '8+' }}</div>
        <div class="stat-label">{{ $nosotros['stat3_label'] ?? 'Años de experiencia' }}</div>
      </div>
    </div>
  </div>
</div>

<!-- DESTINATIONS -->
<section class="destinations-section" id="destinos">
  <div class="destinations-header reveal">
    <div>
      <div class="section-eyebrow">Explorar</div>
      <h2 class="section-title">NUESTROS<br><span>DESTINOS</span></h2>
    </div>
    <p>Cada rincón de Bolivia es un universo propio. Elige tu aventura y nosotros nos encargamos del resto.</p>
  </div>
  <div class="dest-grid">
    @forelse($destinos as $i => $destino)
      <div class="dest-card {{ $i === 0 ? 'wide' : '' }} reveal {{ $i > 0 ? 'reveal-delay-'.min($i,3) : '' }}">
        <img src="{{ $destino->imagen_url }}" alt="{{ $destino->nombre }}" loading="lazy">
        <div class="dest-overlay">
          <div class="dest-tag">{{ $destino->ubicacion ?? 'Bolivia' }}</div>
          <div class="dest-name">{{ $destino->nombre }}</div>
          <div class="dest-desc">{{ $destino->descripcion_corta }}</div>
        </div>
        <div class="dest-arrow">↗</div>
      </div>
    @empty
      {{-- Fallback con imágenes del HTML original --}}
      <div class="dest-card wide reveal">
        <img src="{{ asset('uploads/salardeuyuni.jpg') }}" alt="Salar de Uyuni" loading="lazy">
        <div class="dest-overlay">
          <div class="dest-tag">Sur de Bolivia</div>
          <div class="dest-name">Salar de Uyuni</div>
          <div class="dest-desc">El espejo más grande del mundo.</div>
        </div>
        <div class="dest-arrow">↗</div>
      </div>
    @endforelse
  </div>
</section>

<!-- PHOTO MARQUEE -->
@php $fotos = $galeria->values(); $mitad = (int)($fotos->count()/2); @endphp
@if($fotos->count() > 0)
<div class="marquee-section">
  <div class="marquee-row row1">
    @foreach($fotos->take($mitad ?: 6) as $foto)
      <div class="marquee-photo"><img src="{{ $foto->url }}" alt="{{ $foto->alt ?? '' }}" loading="lazy"></div>
    @endforeach
    @foreach($fotos->take($mitad ?: 6) as $foto)
      <div class="marquee-photo"><img src="{{ $foto->url }}" alt="" loading="lazy"></div>
    @endforeach
  </div>
  <div class="marquee-row row2">
    @foreach($fotos->skip($mitad)->take($mitad ?: 6) as $foto)
      <div class="marquee-photo"><img src="{{ $foto->url }}" alt="" loading="lazy"></div>
    @endforeach
    @foreach($fotos->skip($mitad)->take($mitad ?: 6) as $foto)
      <div class="marquee-photo"><img src="{{ $foto->url }}" alt="" loading="lazy"></div>
    @endforeach
  </div>
</div>
@endif

<!-- TOURS -->
<section class="tours-section" id="tours">
  <div class="tours-header reveal">
    <div>
      <div class="section-eyebrow">Paquetes</div>
      <h2 class="section-title">TOURS<br><span>DESTACADOS</span></h2>
    </div>
    <a href="#contacto" class="tour-link" style="font-size:13px;">Ver todos los tours</a>
  </div>
  <div class="tours-grid">
    @forelse($tours as $i => $tour)
    <div class="tour-card reveal {{ $i > 0 ? 'reveal-delay-'.$i : '' }}">
      <div class="tour-thumb">
        <img src="{{ $tour->imagen_url }}" alt="{{ $tour->nombre }}" loading="lazy">
        @if($tour->destacado)<div class="tour-badge">Destacado</div>@endif
      </div>
      <div class="tour-body">
        <div class="tour-days">{{ $tour->duracion }}</div>
        <div class="tour-name">{{ $tour->nombre }}</div>
        <div class="tour-desc">{{ $tour->descripcion_corta }}</div>
        <div class="tour-footer">
          <div>
            <span class="tour-price-label">Desde</span>
            <div class="tour-price">{{ $tour->precio_desde }}</div>
          </div>
          <a href="#contacto" class="tour-link">Reservar</a>
        </div>
      </div>
    </div>
    @empty
    <div style="grid-column:span 3;text-align:center;padding:60px 0;color:var(--muted);">
      <p>Pronto agregaremos nuestros tours. <a href="#contacto" style="color:var(--gold)">Contáctanos</a> para más información.</p>
    </div>
    @endforelse
  </div>
</section>

<!-- ABOUT -->
<section class="about-section">
  <div class="about-images reveal">
    @php $fotosAbout = $galeria->values(); @endphp
    <div class="about-img-main">
      <img src="{{ $fotosAbout->get(0)?->url ?? asset('uploads/salardeuyuni3.jpg') }}" alt="Bolivia" loading="lazy">
    </div>
    <div class="about-img-accent">
      <img src="{{ $fotosAbout->get(1)?->url ?? asset('uploads/Copacabana4.jpg') }}" alt="Bolivia" loading="lazy">
    </div>
  </div>
  <div class="about-content reveal reveal-delay-2">
    <div class="section-eyebrow">Nuestra historia</div>
    <h2 class="section-title">{{ $nosotros['titulo'] ?? 'APASIONADOS<br>POR BOLIVIA' }}</h2>
    <p>{{ $nosotros['texto'] ?? 'Con años de experiencia mostrando lo mejor de Bolivia, nuestro equipo local te lleva a descubrir paisajes únicos, culturas ancestrales y aventuras inolvidables.' }}</p>
    <ul class="about-features">
      <li>Guías locales certificados y apasionados</li>
      <li>Tours personalizados a tu medida</li>
      <li>Atención 24/7 durante tu viaje</li>
      <li>Precios transparentes sin sorpresas</li>
    </ul>
  </div>
</section>

<!-- GALLERY -->
<section class="gallery-section" id="galeria">
  <div class="reveal">
    <div class="section-eyebrow">Momentos</div>
    <h2 class="section-title">NUESTRA<br><span>GALERÍA</span></h2>
  </div>
  <div class="gallery-grid">
    @foreach($galeria->take(12) as $i => $foto)
    <div class="gallery-item {{ $i % 5 === 0 ? 'tall' : '' }} {{ $i % 7 === 0 ? 'wide' : '' }}">
      <img src="{{ $foto->url }}" alt="{{ $foto->alt ?? 'Bolivia' }}" loading="lazy">
      <div class="gallery-item-overlay"><span>Ver foto</span></div>
    </div>
    @endforeach
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-text">
    <h2>¿LISTO PARA<br>TU AVENTURA?</h2>
    <p>Cotiza tu viaje personalizado hoy. Nuestro equipo te contacta en menos de 24 horas.</p>
  </div>
  <a href="https://wa.me/{{ $contacto['whatsapp'] ?? '59163105721' }}" target="_blank">
    <button class="btn-dark">Cotizar por WhatsApp →</button>
  </a>
</section>

<!-- CONTACT -->
<section class="contact-section" id="contacto">
  <div class="reveal" style="margin-bottom:56px;">
    <div class="section-eyebrow">Contacto</div>
    <h2 class="section-title">{{ $contacto['titulo'] ?? 'PLANIFICA TU' }}<br><span>AVENTURA</span></h2>
  </div>
  <div class="contact-inner">
    <form class="contact-form" onsubmit="handleForm(event)">
      <div class="form-row">
        <div class="form-group"><label>Nombre</label><input type="text" placeholder="Tu nombre" required></div>
        <div class="form-group"><label>Email</label><input type="email" placeholder="tu@email.com" required></div>
      </div>
      <div class="form-row">
        <div class="form-group"><label>Teléfono / WhatsApp</label><input type="tel" placeholder="+591..."></div>
        <div class="form-group">
          <label>Destino de interés</label>
          <select>
            <option value="">— Seleccionar —</option>
            @foreach($destinos as $d)<option>{{ $d->nombre }}</option>@endforeach
            <option>Otro</option>
          </select>
        </div>
      </div>
      <div class="form-group"><label>Mensaje</label><textarea placeholder="Cuéntanos sobre tu viaje ideal..."></textarea></div>
      <button type="submit" class="btn-primary" style="align-self:flex-start;">Enviar mensaje →</button>
    </form>
    <div class="contact-info">
      @if($contacto['telefono'] ?? false)
      <div class="contact-info-item">
        <div class="contact-info-label">Teléfono</div>
        <div class="contact-info-value"><a href="tel:{{ $contacto['telefono'] }}">{{ $contacto['telefono'] }}</a></div>
      </div>
      @endif
      @if($contacto['whatsapp'] ?? false)
      <div class="contact-info-item">
        <div class="contact-info-label">WhatsApp</div>
        <div class="contact-info-value"><a href="https://wa.me/{{ $contacto['whatsapp'] }}" target="_blank">+{{ $contacto['whatsapp'] }}</a></div>
      </div>
      @endif
      @if($contacto['email'] ?? false)
      <div class="contact-info-item">
        <div class="contact-info-label">Email</div>
        <div class="contact-info-value"><a href="mailto:{{ $contacto['email'] }}">{{ $contacto['email'] }}</a></div>
      </div>
      @endif
      @if($contacto['direccion'] ?? false)
      <div class="contact-info-item">
        <div class="contact-info-label">Oficina</div>
        <div class="contact-info-value">{{ $contacto['direccion'] }}</div>
      </div>
      @endif
      <div class="contact-info-item">
        <div class="contact-info-label">Redes sociales</div>
        <div class="contact-info-value">
          <div class="social-links">
            @if($contacto['instagram'] ?? false)
            <a class="social-link" href="{{ $contacto['instagram'] }}" target="_blank" title="Instagram">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.2" fill="currentColor" stroke="none"/></svg>
            </a>
            @endif
            @if($contacto['facebook'] ?? false)
            <a class="social-link" href="{{ $contacto['facebook'] }}" target="_blank" title="Facebook">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            @endif
            @if($contacto['tiktok'] ?? false)
            <a class="social-link" href="{{ $contacto['tiktok'] }}" target="_blank" title="TikTok">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.76a4.85 4.85 0 0 1-1.01-.07z"/></svg>
            </a>
            @endif
          </div>
        </div>
      </div>
      <div style="margin-top:20px; background:var(--bg2); padding:28px;">
        <div class="section-eyebrow" style="margin-bottom:12px;">¿Prefieres WhatsApp?</div>
        <p style="font-size:14px; color:var(--muted); line-height:1.7; margin-bottom:20px;">Escríbenos directamente y te respondemos en menos de 1 hora.</p>
        <a href="https://wa.me/{{ $contacto['whatsapp'] ?? '59163105721' }}" target="_blank">
          <button class="btn-primary" style="width:100%; display:flex; align-items:center; justify-content:center; gap:10px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
            Chatear por WhatsApp
          </button>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- WA FLOAT -->
<a class="wa-float" href="https://wa.me/{{ $contacto['whatsapp'] ?? '59163105721' }}" target="_blank">
  <svg viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
</a>

<!-- FOOTER -->
<footer>
  <a href="#" class="nav-logo-img">
    @if(\App\Models\CmsSetting::get('logo'))
      <img src="{{ asset('storage/'.\App\Models\CmsSetting::get('logo')) }}" alt="{{ $config['site_name'] ?? 'Hola Bolivia Travel' }}" style="height:48px;width:48px;object-fit:contain;">
    @else
      <img src="{{ asset('uploads/logo con circulo-02.png') }}" alt="Hola Bolivia Travel" style="height:48px;width:48px;object-fit:contain;">
    @endif
  </a>
  <div class="footer-links">
    <a href="#destinos">Destinos</a>
    <a href="#tours">Tours</a>
    <a href="#galeria">Galería</a>
    <a href="#nosotros">Nosotros</a>
    <a href="#contacto">Contacto</a>
  </div>
  <div class="footer-copy">© {{ date('Y') }} {{ $config['site_name'] ?? 'Hola Bolivia Travel' }}. Todos los derechos reservados.</div>
</footer>

<script>
window.addEventListener('scroll', () => {
  document.getElementById('nav').classList.toggle('scrolled', window.scrollY > 60);
});
function toggleNav() {
  document.getElementById('navLinks').classList.toggle('open');
}
document.querySelectorAll('.nav-links a').forEach(a => a.addEventListener('click', () => {
  document.getElementById('navLinks').classList.remove('open');
}));
const revealEls = document.querySelectorAll('.reveal');
const io = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
}, { threshold: 0.1 });
revealEls.forEach(el => io.observe(el));
function handleForm(e) {
  e.preventDefault();
  const btn = e.target.querySelector('button[type=submit]');
  btn.textContent = '✓ Mensaje enviado — ¡Te contactamos pronto!';
  btn.style.background = 'oklch(55% 0.15 150)';
  setTimeout(() => { btn.textContent = 'Enviar mensaje →'; btn.style.background = ''; e.target.reset(); }, 4000);
}
</script>
</body>
</html>
