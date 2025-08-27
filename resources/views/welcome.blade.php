<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Selamat Datang</title>
  <meta name="description" content="Halaman ringkas dan moden bertema Selamat Datang." />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg: #0b1220;
      --grad-1: #6a5af9;
      --grad-2: #00d4ff;
      --glass-bg: rgba(255,255,255,.08);
      --glass-br: rgba(255,255,255,.25);
      --text: #eaf0ff;
      --muted: #b8c0d9;
      --accent: #9ef3ff;
      --accent-2: #a78bfa;
      --ring: rgba(158, 243, 255, .35);
    }

    @media (prefers-color-scheme: light){
      :root{
        --bg: #f7f8ff;
        --text: #0b1220;
        --muted: #475073;
        --glass-bg: rgba(255,255,255,.7);
        --glass-br: rgba(10, 20, 40, .08);
        --ring: rgba(80, 110, 255, .25);
      }
    }

    *{ box-sizing: border-box; }
    html, body{ height: 100%; }
    body{
      margin: 0;
      font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color: var(--text);
      background: radial-gradient(1200px 800px at 10% 10%, rgba(167,139,250,.25), transparent 60%),
                  radial-gradient(1000px 700px at 90% 20%, rgba(0,212,255,.22), transparent 60%),
                  linear-gradient(135deg, var(--bg), #0f162d 70%);
      display: grid;
      grid-template-rows: auto 1fr auto;
      min-height: 100vh;
    }

    header{
      display: flex; align-items: center; justify-content: space-between;
      padding: 1rem 1.25rem; max-width: 1120px; margin: 0 auto; width: 100%;
    }
    .brand{
      display: inline-flex; align-items: center; gap: .6rem; text-decoration: none; color: var(--text);
      font-weight: 800; letter-spacing: .5px;
    }
    .brand .logo{
      width: 36px; height: 36px; border-radius: 12px;
      background: conic-gradient(from 120deg, var(--grad-1), var(--grad-2));
      display: grid; place-items: center;
      box-shadow: 0 8px 24px rgba(0,0,0,.25), 0 0 0 6px var(--ring);
    }
    nav a{
      color: var(--muted); text-decoration: none; margin-left: 1rem; font-weight: 600;
    }
    nav a:hover{ color: var(--text); }

    main{ display: grid; place-items: center; padding: 2rem 1.25rem; }

    .hero{
      position: relative;
      max-width: 1000px; width: 100%; margin: 1rem auto;
      backdrop-filter: blur(8px);
      background: var(--glass-bg);
      border: 1px solid var(--glass-br);
      border-radius: 28px;
      padding: clamp(1.25rem, 2vw + 1rem, 2.5rem);
      box-shadow: 0 20px 60px rgba(0,0,0,.25), inset 0 1px 0 rgba(255,255,255,.08);
      overflow: hidden;
    }

    .hero::before, .hero::after{
      content: ""; position: absolute; border-radius: 50%; filter: blur(40px); opacity: .6; pointer-events: none;
    }
    .hero::before{
      width: 420px; height: 420px; background: radial-gradient(circle, var(--grad-1), transparent 60%);
      top: -120px; left: -120px;
      animation: float1 12s ease-in-out infinite;
    }
    .hero::after{
      width: 380px; height: 380px; background: radial-gradient(circle, var(--grad-2), transparent 60%);
      bottom: -140px; right: -120px;
      animation: float2 14s ease-in-out infinite;
    }
    @keyframes float1{ 0%,100%{transform: translateY(0)} 50%{ transform: translateY(18px)} }
    @keyframes float2{ 0%,100%{transform: translateY(0)} 50%{ transform: translateY(-14px)} }

    .badge{
      display: inline-flex; align-items: center; gap: .5rem;
      padding: .45rem .75rem; border-radius: 999px; border: 1px solid var(--glass-br);
      background: rgba(0,0,0,.15);
      box-shadow: inset 0 1px 0 rgba(255,255,255,.08);
      font-size: .85rem; color: var(--accent);
    }
    .badge svg{ width: 18px; height: 18px; }

    h1{
      font-size: clamp(2rem, 3.8vw + 1rem, 3.5rem);
      line-height: 1.1; margin: .75rem 0 .5rem; letter-spacing: -0.02em;
      text-shadow: 0 1px 0 rgba(255,255,255,.05);
    }
    .subtitle{
      color: var(--muted); font-size: clamp(1rem, 1vw + .75rem, 1.125rem);
      max-width: 70ch; margin: 0 0 1.25rem;
    }

    .cta{ display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1rem; }
    .btn{
      appearance: none; border: 0; padding: .9rem 1.15rem; border-radius: 14px; font-weight: 700;
      cursor: pointer; transition: transform .08s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
    }
    .btn-primary{
      background: linear-gradient(135deg, var(--grad-1), var(--grad-2)); color: #fff;
      box-shadow: 0 12px 30px rgba(0,0,0,.25), 0 0 0 6px var(--ring);
    }
    .btn-primary:hover{ transform: translateY(-1px); }
    .btn-ghost{
      background: transparent; color: var(--text); border: 1px solid var(--glass-br);
      backdrop-filter: blur(8px);
    }
    .btn-ghost:hover{ box-shadow: inset 0 1px 0 rgba(255,255,255,.08); }

    .grid{
      display: grid; gap: 1rem; margin-top: 2rem;
      grid-template-columns: repeat(12, minmax(0,1fr));
    }
    .card{
      grid-column: span 12;
      border-radius: 20px; padding: 1.2rem; border: 1px solid var(--glass-br);
      background: rgba(0,0,0,.18);
    }
    .card h3{ margin: 0 0 .35rem; }
    .card p{ margin: 0; color: var(--muted); }

    @media (min-width: 720px){
      .card{ grid-column: span 4; }
    }

    footer{ color: var(--muted); text-align: center; padding: 1.25rem; font-size: .9rem; }
    footer a{ color: inherit; }

    /* Small confetti for fun */
    .confetti{ position: fixed; inset: 0; pointer-events: none; z-index: 50; }
  </style>
</head>
<body>
  <header>
    <a href="#" class="brand" aria-label="Laman Utama">
      <span class="logo" aria-hidden="true">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 3l7 5-7 5-7-5 7-5Z" fill="white" opacity=".9"/>
          <path d="M12 13l7 5-7 3-7-3 7-5Z" fill="white" opacity=".55"/>
        </svg>
      </span>
      <span>Portal Kita</span>
    </a>
    <nav aria-label="Navigasi utama">
      <a href="#tentang">Tentang</a>
      <a href="#ciri">Ciri</a>
      <a href="#hubungi">Hubungi</a>
    </nav>
  </header>

  <main>
    <section class="hero" aria-labelledby="tajuk">
      <div class="badge" role="status" aria-live="polite">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12 2v20M2 12h20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        Selamat Datang
      </div>
      <h1 id="tajuk">Assalamualaikum & Selamat Datang 👋</h1>
      <p class="subtitle">Kami komited menyediakan pengalaman digital yang pantas, selamat dan mesra pengguna. Teroka portal ini untuk mendapatkan maklumat, perkhidmatan dan kemas kini terkini.</p>

      <div class="cta">
        <button class="btn btn-primary" id="btn-masuk">Masuk Sekarang</button>
        <a class="btn btn-ghost" href="#tentang">Ketahui Lagi</a>
      </div>

      <div class="grid" id="ciri">
        <article class="card" aria-label="Antara muka moden">
          <h3>Antara Muka Moden</h3>
          <p>Reka bentuk responsif dengan tipografi kemas dan animasi lembut untuk pengalaman terbaik pada semua peranti.</p>
        </article>
        <article class="card" aria-label="Prestasi pantas">
          <h3>Prestasi Pantas</h3>
          <p>Dioptimumkan dengan aset minimum dan gaya terbina untuk masa muat yang lebih laju.</p>
        </article>
        <article class="card" aria-label="Aksesibiliti">
          <h3>Aksesibiliti</h3>
          <p>Kontras warna baik, kawalan papan kekunci dan struktur semantik yang jelas.</p>
        </article>
      </div>
    </section>
  </main>

  <footer id="hubungi">
    &copy; <span id="year"></span> Portal Kita. Dibina dengan kasih dan perhatian terhadap butiran.
  </footer>

  <canvas class="confetti" id="confetti" width="0" height="0" aria-hidden="true"></canvas>

  <script>
    // Tahun semasa
    document.getElementById('year').textContent = new Date().getFullYear();

    // Confetti mini ketika klik "Masuk"
    const btn = document.getElementById('btn-masuk');
    const canvas = document.getElementById('confetti');
    const ctx = canvas.getContext('2d');

    function resize(){
      canvas.width = innerWidth; canvas.height = innerHeight;
    }
    addEventListener('resize', resize); resize();

    function burst(x, y){
      const pieces = Array.from({length: 90}).map(() => ({
        x, y,
        vx: (Math.random()*2-1) * (Math.random()*6+3),
        vy: (Math.random()*-8 - 6),
        g: .3 + Math.random()*.2,
        s: 2 + Math.random()*3,
        a: 1,
        r: Math.random()*Math.PI*2
      }));

      let frame = 0;
      function tick(){
        ctx.clearRect(0,0,canvas.width,canvas.height);
        pieces.forEach(p => {
          p.vy += p.g; p.x += p.vx; p.y += p.vy; p.a -= .012; p.r += .08;
          ctx.save();
          ctx.globalAlpha = Math.max(p.a, 0);
          ctx.translate(p.x, p.y); ctx.rotate(p.r);
          ctx.fillStyle = `hsl(${Math.random()*360}, 90%, 60%)`;
          ctx.fillRect(-p.s/2, -p.s/2, p.s, p.s*2);
          ctx.restore();
        });
        frame++;
        if(frame < 140) requestAnimationFrame(tick); else ctx.clearRect(0,0,canvas.width,canvas.height);
      }
      tick();
    }

    btn.addEventListener('click', (e) => {
      const rect = e.target.getBoundingClientRect();
      const x = rect.left + rect.width/2; const y = rect.top + rect.height/2;
      burst(x, y);
      // Demo: you can redirect here if needed
      // window.location.href = '/dashboard';
    });
  </script>
</body>
</html>
