<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Barber & Lounge — Premium Men's Grooming Experience</title>
    <meta name="description" content="Atma Barber & Lounge - Pengalaman cukur rambut pria premium, perawatan jenggot, dan relaksasi eksklusif di Yogyakarta.">
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-dark: #0A0A0A;
            --bg-card: #141414;
            --bg-surface: #1E1E1E;
            --gold: #E0AC53;
            --gold-light: #F4C776;
            --gold-dark: #9B722B;
            --gold-glow: rgba(224, 172, 83, 0.15);
            --border-gold: rgba(224, 172, 83, 0.28);
            --text-main: #FFFFFF;
            --text-muted: #A3A3A3;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Ambient Glow Elements */
        .ambient-glow-1 {
            position: absolute;
            top: -120px;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 380px;
            background: radial-gradient(circle, rgba(224, 172, 83, 0.18) 0%, rgba(10, 10, 10, 0) 70%);
            z-index: 0;
            pointer-events: none;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        /* Navbar */
        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(10, 10, 10, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        }

        .nav-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 76px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--gold);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            font-size: 20px;
            box-shadow: 0 4px 14px rgba(224, 172, 83, 0.35);
        }

        .brand-title {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 1.2px;
            color: var(--gold);
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .api-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34D399;
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .api-pulse {
            width: 8px;
            height: 8px;
            background-color: #10B981;
            border-radius: 50%;
            box-shadow: 0 0 8px #10B981;
            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.3); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }

        /* Hero Section */
        .hero {
            padding: 90px 0 60px;
            text-align: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gold-glow);
            border: 1px solid var(--border-gold);
            color: var(--gold);
            padding: 7px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 24px;
        }

        .hero-title {
            font-size: 52px;
            font-weight: 900;
            letter-spacing: -1.2px;
            line-height: 1.15;
            max-width: 820px;
            margin: 0 auto 20px;
        }

        .hero-title span {
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            font-size: 18px;
            color: var(--text-muted);
            max-width: 640px;
            margin: 0 auto 36px;
            font-weight: 400;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--gold), #BF8B34);
            color: #0A0A0A;
            padding: 14px 28px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 8px 24px rgba(224, 172, 83, 0.35);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(224, 172, 83, 0.5);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--bg-surface);
            color: #FFF;
            padding: 14px 26px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: all 0.25s ease;
        }

        .btn-secondary:hover {
            background: #282828;
            border-color: var(--gold);
            color: var(--gold);
        }

        /* Stats Bar */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-gold);
            border-radius: 20px;
            padding: 24px 32px;
            margin: 60px 0;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.6);
        }

        .stat-item {
            text-align: center;
        }

        .stat-val {
            font-size: 32px;
            font-weight: 900;
            color: var(--gold);
            margin-bottom: 4px;
        }

        .stat-lbl {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        /* Section Titles */
        .section-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-tag {
            color: var(--gold);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
            display: block;
        }

        .section-title {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            margin-bottom: 80px;
        }

        .service-card {
            background: var(--bg-card);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            padding: 28px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-card:hover {
            border-color: var(--gold);
            transform: translateY(-4px);
            box-shadow: 0 14px 30px var(--gold-glow);
        }

        .service-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .service-icon {
            width: 50px;
            height: 50px;
            background: rgba(224, 172, 83, 0.1);
            border: 1px solid var(--border-gold);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 22px;
        }

        .service-price {
            font-size: 18px;
            font-weight: 800;
            color: var(--gold-light);
        }

        .service-name {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .service-desc {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.6;
        }

        /* Barber Team Grid */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            margin-bottom: 90px;
        }

        .barber-card {
            background: var(--bg-card);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .barber-card:hover {
            border-color: var(--gold);
            transform: translateY(-4px);
        }

        .avatar-wrap {
            width: 100px;
            height: 100px;
            margin: 0 auto 16px;
            border-radius: 50%;
            padding: 4px;
            border: 2px solid var(--gold);
            background: var(--bg-surface);
        }

        .avatar-wrap img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .barber-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .barber-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            color: var(--gold);
            font-size: 12px;
            margin-bottom: 12px;
        }

        .barber-desc {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* Location & Hours Card */
        .info-card {
            background: linear-gradient(135deg, #1C1811, #12100C);
            border: 1px solid var(--border-gold);
            border-radius: 24px;
            padding: 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
            align-items: center;
            margin-bottom: 80px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .info-icon {
            font-size: 24px;
            color: var(--gold);
            margin-top: 4px;
        }

        .info-text h4 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .info-text p {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.5;
        }

        /* Footer */
        footer {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 36px 0;
            text-align: center;
            color: var(--text-muted);
            font-size: 13px;
        }

        footer span {
            color: var(--gold);
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title { font-size: 36px; }
            .nav-links { display: none; }
            .stats-bar { grid-template-columns: repeat(2, 1fr); gap: 24px; }
            .info-card { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="ambient-glow-1"></div>

    <!-- Navigation Header -->
    <header>
        <div class="container nav-content">
            <a href="/" class="brand">
                <div class="brand-icon">
                    <i class="fa-solid fa-scissors"></i>
                </div>
                <div class="brand-title">Atma Barber</div>
            </a>

            <ul class="nav-links">
                <li><a href="#services">Layanan</a></li>
                <li><a href="#barbers">Master Capster</a></li>
                <li><a href="#location">Lokasi & Jam</a></li>
                <li><a href="/api/barber" target="_blank">Dokumentasi API</a></li>
            </ul>

            <div class="api-badge">
                <div class="api-pulse"></div>
                API Cloud Online
            </div>
        </div>
    </header>

    <main class="container">
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-badge">
                <i class="fa-solid fa-crown"></i> The Gentleman's Sanctuary in Yogyakarta
            </div>
            <h1 class="hero-title">
                Seni Cukur Presisi & Perawatan Pria <span>Kelas Dunia.</span>
            </h1>
            <p class="hero-desc">
                Nikmati potongan rambut trendi, perawatan jenggot berkelas, dan relaksasi handuk hangat eksklusif yang dipandu oleh para master capster berpengalaman.
            </p>
            <div class="hero-actions">
                <a href="#services" class="btn-primary">
                    <i class="fa-solid fa-calendar-check"></i> Jelajahi Layanan
                </a>
                <a href="/api/barber" target="_blank" class="btn-secondary">
                    <i class="fa-solid fa-code"></i> Uji API Mobile (JSON)
                </a>
            </div>
        </section>

        <!-- Quick Stats -->
        <section class="stats-bar">
            <div class="stat-item">
                <div class="stat-val">4.9 ★</div>
                <div class="stat-lbl">Kepuasan Pelanggan</div>
            </div>
            <div class="stat-item">
                <div class="stat-val">4+</div>
                <div class="stat-lbl">Master Capsters</div>
            </div>
            <div class="stat-item">
                <div class="stat-val">6</div>
                <div class="stat-lbl">Layanan Premium</div>
            </div>
            <div class="stat-item">
                <div class="stat-val">100%</div>
                <div class="stat-lbl">Uptime API Cloud</div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services">
            <div class="section-header">
                <span class="section-tag">Menu & Tarif</span>
                <h2 class="section-title">Layanan Resmi Atma Barber</h2>
            </div>

            <div class="services-grid">
                <!-- Haircut -->
                <div class="service-card">
                    <div>
                        <div class="service-top">
                            <div class="service-icon"><i class="fa-solid fa-scissors"></i></div>
                            <div class="service-price">Rp 50.000</div>
                        </div>
                        <h3 class="service-name">Haircut & Styling</h3>
                        <p class="service-desc">Potong rambut rapi dan stylish sesuai tren kekinian (Fade, Pompadour, Textured Crop) lengkap dengan konsultasi bentuk wajah.</p>
                    </div>
                </div>

                <!-- Treatment -->
                <div class="service-card">
                    <div>
                        <div class="service-top">
                            <div class="service-icon"><i class="fa-solid fa-spa"></i></div>
                            <div class="service-price">Rp 40.000</div>
                        </div>
                        <h3 class="service-name">Hair Treatment</h3>
                        <p class="service-desc">Perawatan rambut lengkap, creambath bernutrisi, dan relaksasi pijat kepala untuk menyegarkan pikiran dan kulit kepala.</p>
                    </div>
                </div>

                <!-- Hot Towel Shaving -->
                <div class="service-card">
                    <div>
                        <div class="service-top">
                            <div class="service-icon"><i class="fa-solid fa-spray-can-sparkles"></i></div>
                            <div class="service-price">Rp 25.000</div>
                        </div>
                        <h3 class="service-name">Hot Towel Shave</h3>
                        <p class="service-desc">Cukur halus higienis menggunakan pisau silet steril dan kompres handuk hangat aromaterapi yang melembutkan pori-pori.</p>
                    </div>
                </div>

                <!-- Beard Sculpting -->
                <div class="service-card">
                    <div>
                        <div class="service-top">
                            <div class="service-icon"><i class="fa-solid fa-user-ninja"></i></div>
                            <div class="service-price">Rp 30.000</div>
                        </div>
                        <h3 class="service-name">Beard Grooming</h3>
                        <p class="service-desc">Perapihan, trimming simetris, dan pembentukan kontur jenggot maskulin dengan minyak pelembut premium.</p>
                    </div>
                </div>

                <!-- Mustache -->
                <div class="service-card">
                    <div>
                        <div class="service-top">
                            <div class="service-icon"><i class="fa-solid fa-signature"></i></div>
                            <div class="service-price">Rp 20.000</div>
                        </div>
                        <h3 class="service-name">Mustache Trimming</h3>
                        <p class="service-desc">Detailing dan perapihan kumis presisi tinggi agar tampak bersih, simetris, dan elegan.</p>
                    </div>
                </div>

                <!-- Hair Coloring -->
                <div class="service-card">
                    <div>
                        <div class="service-top">
                            <div class="service-icon"><i class="fa-solid fa-palette"></i></div>
                            <div class="service-price">Rp 85.000</div>
                        </div>
                        <h3 class="service-name">Hair Coloring</h3>
                        <p class="service-desc">Pewarnaan rambut trendi (Highlight, Ash Grey, Deep Brown) dengan produk berkualitas yang menjaga kelembutan rambut.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Capsters Team -->
        <section id="barbers">
            <div class="section-header">
                <span class="section-tag">Talenta Ahli</span>
                <h2 class="section-title">Kenali Master Capster Kami</h2>
            </div>

            <div class="team-grid">
                <div class="barber-card">
                    <div class="avatar-wrap">
                        <img src="https://drive.usercontent.google.com/download?id=1eKqFqigcme6f1SKOLYWsUIjMf7bCGdAs" alt="Alex Rivers" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=200&h=200&fit=crop'">
                    </div>
                    <h3 class="barber-name">Alex Rivers</h3>
                    <div class="barber-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(5.0)</span>
                    </div>
                    <p class="barber-desc">Senior Stylist & Fade Master dengan 7 tahun pengalaman dalam potongan rambut modern.</p>
                </div>

                <div class="barber-card">
                    <div class="avatar-wrap">
                        <img src="https://drive.usercontent.google.com/download?id=18gSwk7y7t_4_z6aTj5S3b7b0URVmTGvq" alt="Budi Santoso" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop'">
                    </div>
                    <h3 class="barber-name">Budi Santoso</h3>
                    <div class="barber-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <span>(4.8)</span>
                    </div>
                    <p class="barber-desc">Ahli potongan klasik pria, pompadour, dan teknik tradisional cukur handuk hangat.</p>
                </div>

                <div class="barber-card">
                    <div class="avatar-wrap">
                        <img src="https://drive.usercontent.google.com/download?id=1C4rr6Q6pUSIUA09ub5sSLN7qjB_1Espe" alt="David Kurnia" onerror="this.src='https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&h=200&fit=crop'">
                    </div>
                    <h3 class="barber-name">David Kurnia</h3>
                    <div class="barber-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(4.9)</span>
                    </div>
                    <p class="barber-desc">Spesialis pembentukan jenggot modern maskulin dan hair-tattoo artistry.</p>
                </div>

                <div class="barber-card">
                    <div class="avatar-wrap">
                        <img src="https://drive.usercontent.google.com/download?id=1mZwiDqZYL-098jws22YHT4uZSE3taPSH" alt="Reza Pratama" onerror="this.src='https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=200&h=200&fit=crop'">
                    </div>
                    <h3 class="barber-name">Reza Pratama</h3>
                    <div class="barber-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <span>(4.7)</span>
                    </div>
                    <p class="barber-desc">Kreator pewarnaan rambut trendi dan perombakan tekstur rambut kekinian.</p>
                </div>
            </div>
        </section>

        <!-- Location & Operational Hours -->
        <section id="location" class="info-card">
            <div class="info-item">
                <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
                <div class="info-text">
                    <h4>Jam Operasional</h4>
                    <p>Senin – Minggu : 09.00 – 21.00 WIB<br>Melayani reservasi online via Aplikasi Mobile Atma Barber.</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="info-text">
                    <h4>Lokasi Barbershop</h4>
                    <p>Jl. Malioboro No. 99, Gedung A Lt. 2<br>Daerah Istimewa Yogyakarta - 55271</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2026 <span>Atma Barber & Lounge</span>. Integrated Backend & Mobile Architecture.</p>
            <p style="margin-top: 6px; font-size: 11px; opacity: 0.7;">Powered by Laravel 11 • Docker on Render • TiDB Cloud Serverless</p>
        </div>
    </footer>

</body>
</html>
