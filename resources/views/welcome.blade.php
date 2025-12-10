<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yakizen - Restoran Masakan Jepang Autentik. Nikmati sushi, ramen, dan hidangan Jepang langsung di restoran.">
    <title>Yakizen - Japanese Authentic Cuisine</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #0f1419;
            color: #fff;
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.9);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffcc00;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            transition: transform 0.3s ease-in-out;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: color 0.3s, transform 0.3s;
            display: block;
        }

        .nav-links a:hover {
            color: #ffcc00;
            transform: scale(1.1);
        }

        /* Dropdown Menu */
        .dropdown:hover .dropdown-menu {
            display: flex;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-menu {
            display: none;
            flex-direction: column;
            background: #1a1e2d;
            position: absolute;
            top: 100%;
            left: 0;
            padding: 0.5rem 0;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            min-width: 200px;
        }

        .dropdown-menu li {
            margin: 0;
        }

        .dropdown-menu a {
            color: white;
            padding: 0.8rem 1.5rem;
            transition: background 0.3s ease;
        }

        .dropdown-menu a:hover {
            background: #2c3e50;
            color: #ffcc00;
        }

        /* Mobile Menu */
        .menu-toggle {
            display: none;
            font-size: 2rem;
            color: white;
            cursor: pointer;
            background: none;
            border: none;
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                position: absolute;
                top: 100%;
                right: 0;
                background: rgba(0, 0, 0, 0.95);
                width: 100%;
                display: none;
                padding: 2rem;
                gap: 0;
            }

            .nav-links.open {
                display: flex;
            }

            .nav-links a {
                text-align: center;
                padding: 1rem;
            }

            .menu-toggle {
                display: block;
            }

            .dropdown-menu {
                position: static;
                display: none;
                background: #0a0e1a;
                margin-top: 0.5rem;
            }

            .dropdown:hover .dropdown-menu {
                display: none;
            }

            .dropdown.active .dropdown-menu {
                display: flex;
            }
        }

        /* Hero Section */
    .hero {
    min-height: calc(100vh - 70px); /* ganti height: 100vh; */
    padding-top: 70px;              /* kasih ruang di bawah navbar */
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
    color: white;
    background:
        linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)),
        url("IMG/istockphoto-470348014-2048x2048.jpg");
    background-size: cover;
    background-position: center top; /* penting: fokus ke bagian atas gambar */
    background-repeat: no-repeat;
    background-attachment: fixed;
    }


        .hero-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
            animation: fadeInDown 1s ease;
        }

        .hero-content p {
            font-size: 1.4rem;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease 0.3s both;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeInUp 1s ease 0.6s both;
            max-width: 500px;
            margin: 0 auto;
        }

        .search-bar input {
            padding: 15px 20px;
            border: none;
            border-radius: 50px 0 0 50px;
            width: 100%;
            font-size: 16px;
            outline: none;
        }

        .search-bar button {
            padding: 15px 30px;
            border: none;
            background-color: #e74c3c;
            color: white;
            font-weight: bold;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #c0392b;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Opening Hours Bar */
        .opening-bar {
            background: #141922;
            color: #f1f1f1;
            padding: 14px 20px;
            border-top: 1px solid rgba(255,255,255,0.08);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            text-align: center;
            font-size: 0.98rem;
        }

        .opening-bar span.label {
            color: #f1c40f;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-right: 8px;
        }

        .opening-bar span.value {
            color: #ffffff;
        }

        /* Menu Section */
        .menu {
            background-color: #0b0e1a;
            padding: 80px 20px;
            text-align: center;
            color: white;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: bold;
            margin-bottom: 50px;
            color: #f1c40f;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .menu-item {
            background: #1a1e2d;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(241, 196, 15, 0.3);
        }

        .menu-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .menu-item:hover img {
            transform: scale(1.1);
        }

        .menu-item h3 {
            font-size: 1.6rem;
            margin: 20px 0 10px;
            color: #f1c40f;
        }

        .menu-item p {
            font-size: 1rem;
            padding: 0 20px;
            color: #ccc;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .order-btn {
            background-color: #e74c3c;
            border: none;
            color: white;
            padding: 12px 30px;
            margin-bottom: 25px;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .order-btn:hover {
            background-color: #c0392b;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        /* About Section */
        .about {
            background: linear-gradient(135deg, #1a1e2d 0%, #0f1419 100%);
            padding: 80px 20px;
            color: white;
        }

        .about-container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            gap: 50px;
            align-items: center;
        }

        .about-image {
            flex: 1;
        }

        .about-image img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .about-content {
            flex: 1;
        }

        .about-content h2 {
            font-size: 2.5rem;
            color: #f1c40f;
            margin-bottom: 25px;
        }

        .about-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 20px;
            color: #ddd;
        }

        .about-stats {
            display: flex;
            gap: 40px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .stat {
            text-align: center;
        }

        .stat h3 {
            font-size: 3rem;
            color: #f1c40f;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .stat p {
            font-size: 1rem;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Order Steps Section */
        .order-steps {
            background: #0b0e1a;
            padding: 80px 20px 40px;
            color: #fff;
            text-align: center;
        }

        .order-steps .steps-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .order-steps .steps-subtitle {
            color: #f1c40f;
            font-size: 0.95rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .order-steps .steps-title {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
        }

        .step-card {
            background: #1a1e2d;
            border-radius: 14px;
            padding: 30px 25px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.35);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(0,0,0,0.5);
        }

        .step-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(241, 196, 15, 0.12);
            color: #f1c40f;
            font-size: 1.6rem;
        }

        .step-number {
            display: inline-block;
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #999;
            margin-bottom: 6px;
        }

        .step-card h3 {
            font-size: 1.25rem;
            margin-bottom: 10px;
            color: #f1c40f;
        }

        .step-card p {
            font-size: 0.98rem;
            color: #d0d0d0;
            line-height: 1.7;
        }

        /* Featured Menu Section */
        .featured-menu {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 20px;
            text-align: center;
        }

        .features-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-box {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 40px 30px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            background: rgba(255,255,255,0.15);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }

        .feature-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .feature-box h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #fff;
            font-weight: bold;
        }

        .feature-box p {
            font-size: 1rem;
            color: #f0f0f0;
            line-height: 1.6;
        }

        /* Testimonials Section */
        .testimonials {
            background: #1a1e2d;
            padding: 80px 20px;
            color: white;
        }

        .testimonial-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: #0f1419;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
        }

        .stars {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #f1c40f;
        }

        .testimonial-card p {
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 25px;
            color: #ccc;
            font-style: italic;
        }

        .customer {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .customer img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .customer-info h4 {
            color: #f1c40f;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .customer-info span {
            font-size: 0.9rem;
            color: #888;
        }

        /* Footer */
        .footer {
            background: #0a0e1a;
            color: #ccc;
            padding: 60px 20px 20px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto 40px;
        }

        .footer-col h3 {
            font-size: 1.8rem;
            color: #f1c40f;
            margin-bottom: 20px;
        }

        .footer-col h4 {
            font-size: 1.3rem;
            color: #f1c40f;
            margin-bottom: 20px;
        }

        .footer-col p {
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul li a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-col ul li a:hover {
            color: #f1c40f;
            padding-left: 5px;
        }

        .contact-info li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 15px;
        }

        .contact-info svg {
            flex-shrink: 0;
            margin-top: 2px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #f1c40f;
            transform: translateY(-5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-bottom p {
            margin: 0;
            color: #888;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .footer-links a {
            color: #888;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #f1c40f;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .about-container {
                flex-direction: column;
            }

            .about-stats {
                justify-content: space-around;
            }

            .order-steps {
                padding: 60px 16px 30px;
            }

            .order-steps .steps-title {
                font-size: 1.8rem;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .search-bar {
                flex-direction: column;
                gap: 10px;
                width: 90%;
            }

            .search-bar input,
            .search-bar button {
                border-radius: 50px;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 1.2rem;
            }

            .hero-content h1 {
                font-size: 1.5rem;
            }

            .menu-item h3 {
                font-size: 1.3rem;
            }

            .about-content h2 {
                font-size: 2rem;
            }

            .stat h3 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo">Yakizen</div>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Beranda</a></li>
                <li class="dropdown">
                    <a href="#menu" class="dropdown-toggle">Menu</a>
                    <ul class="dropdown-menu">
                        <li><a href="#menu">Menu Best Seller</a></li>
                        <li><a href="#menu">Semua Menu</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Layanan</a>
                    <ul class="dropdown-menu">
                        <li><a href="feedback.html">Kritik &amp; Saran</a></li>
                        <li><a href="contact.html">Kontak</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Login</a>
                    <ul class="dropdown-menu">
                        <li><a href="/login">Customers</a></li>
                        <li><a href="/admin">Admin</a></li>
                    </ul>
                </li>
            </ul>
            <button class="menu-toggle" id="menuToggle">☰</button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Tempat Menikmati Masakan Jepang Paling Autentik</h1>
            <p>Pesan dari mana saja, datang dan nikmati di restoran</p>
            <div class="search-bar">
                <input type="text" placeholder="Cari menu..." aria-label="Cari menu">
                <button type="button">Cari</button>
            </div>
        </div>
    </section>

    <!-- Opening Hours Bar -->
    <div class="opening-bar">
        <span class="label">Jam Operasional</span>
        <span class="value">Buka setiap hari, pukul 10.00 – 22.00 WIB (Dine-in)</span>
    </div>

    <!-- Menu Section -->
    <section class="menu" id="menu">
        <h2 class="section-title">Menu Best Seller Kami</h2>
        <div class="menu-container">
            <div class="menu-item">
                <img src="IMG/istockphoto-999324198-2048x2048.jpg" alt="Sushi Deluxe">
                <h3>Sushi Deluxe</h3>
                <p>Sushi pilihan dengan kombinasi tuna, salmon, dan udang segar berkualitas premium.</p>
                <button class="order-btn">Pesan Sekarang</button>
            </div>

            <div class="menu-item">
                <img src="IMG/istockphoto-1144176036-2048x2048.jpg" alt="Tonkotsu Ramen">
                <h3>Tonkotsu Ramen</h3>
                <p>Ramen kuah kaldu tulang babi yang gurih dan creamy, disajikan dengan chashu dan telur setengah matang.</p>
                <button class="order-btn">Pesan Sekarang</button>
            </div>

            <div class="menu-item">
                <img src="IMG/istockphoto-622919252-2048x2048.jpg" alt="Tempura Mix">
                <h3>Tempura Mix</h3>
                <p>Aneka udang dan sayuran yang digoreng renyah dengan adonan tempura khas Jepang.</p>
                <button class="order-btn">Pesan Sekarang</button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="about-container">
            <div class="about-image">
                <img src="IMG/istockphoto-470348014-2048x2048.jpg" alt="Koki Jepang menyiapkan hidangan autentik">
            </div>
            <div class="about-content">
                <h2>Tentang Yakizen</h2>
                <p>Selamat datang di <strong>Yakizen Japanese Authentic Cuisine</strong>, restoran yang menghadirkan cita rasa Jepang yang autentik di suasana yang hangat dan nyaman.</p>
                <p>Kami menggunakan bahan-bahan segar yang dipilih dengan ketat, serta diolah langsung oleh koki berpengalaman yang memahami teknik dan tradisi kuliner Jepang.</p>
                <p>Yakizen berkomitmen untuk memberikan pengalaman bersantap terbaik, mulai dari kualitas hidangan, pelayanan ramah, hingga suasana restoran yang menenangkan.</p>
                <div class="about-stats">
                    <div class="stat">
                        <h3>10+</h3>
                        <p>TAHUN PENGALAMAN</p>
                    </div>
                    <div class="stat">
                        <h3>50+</h3>
                        <p>PILIHAN MENU</p>
                    </div>
                    <div class="stat">
                        <h3>5000+</h3>
                        <p>PELANGGAN PUAS</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Steps Section -->
    <section class="order-steps" id="cara-pemesanan">
        <div class="steps-container">
            <p class="steps-subtitle">Alur Pemesanan</p>
            <h2 class="steps-title">Cara Pemesanan di Yakizen</h2>

            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-icon">🍣</div>
                    <span class="step-number">Langkah 1</span>
                    <h3>Pilih Menu</h3>
                    <p>
                        Jelajahi menu best seller dan seluruh pilihan hidangan yang tersedia,
                        lalu tambahkan makanan favorit Anda ke keranjang.
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-icon">👤</div>
                    <span class="step-number">Langkah 2</span>
                    <h3>Login / Daftar</h3>
                    <p>
                        Masuk ke akun pelanggan atau buat akun baru sebelum melakukan checkout,
                        agar data nama dan nomor HP tersimpan dengan aman.
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-icon">💵</div>
                    <span class="step-number">Langkah 3</span>
                    <h3>Bayar di Kasir</h3>
                    <p>
                        Setelah melakukan checkout, tunjukkan detail pesanan kepada kasir
                        dan lakukan pembayaran secara tunai di restoran.
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-icon">🪑</div>
                    <span class="step-number">Langkah 4</span>
                    <h3>Dapatkan Nomor Meja</h3>
                    <p>
                        Setelah pembayaran dikonfirmasi oleh admin, sistem akan memberikan nomor meja
                        dan pesanan Anda akan segera diproses di dapur.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Yakizen -->
    <section class="featured-menu">
        <h2 class="section-title">Mengapa Memilih Yakizen?</h2>
        <div class="features-container">
            <div class="feature-box">
                <div class="feature-icon">🍱</div>
                <h3>Bahan Autentik</h3>
                <p>Kami menggunakan bahan pilihan yang diimpor dan diseleksi dengan ketat untuk menjaga rasa asli masakan Jepang.</p>
            </div>
            <div class="feature-box">
                <div class="feature-icon">👨‍🍳</div>
                <h3>Koki Berpengalaman</h3>
                <p>Hidangan diolah oleh koki yang berpengalaman dan memahami teknik memasak tradisional Jepang.</p>
            </div>
            <div class="feature-box">
                <div class="feature-icon">🚀</div>
                <h3>Penyajian Cepat</h3>
                <p>Pesanan Anda disiapkan dan disajikan dengan cepat tanpa mengorbankan kualitas rasa.</p>
            </div>
            <div class="feature-box">
                <div class="feature-icon">⭐</div>
                <h3>Kualitas Terjamin</h3>
                <p>Kami selalu menjaga standar kebersihan, rasa, dan konsistensi di setiap hidangan yang disajikan.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2 class="section-title">Apa Kata Pelanggan Kami</h2>
        <div class="testimonial-container">
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>"Sushi dan ramen di Yakizen rasanya benar-benar autentik. Porsinya pas, suasananya juga nyaman banget."</p>
                <div class="customer">
                    <img src="IMG/istockphoto-999324198-2048x2048.jpg" alt="Sarah Johnson">
                    <div class="customer-info">
                        <h4>Sarah Johnson</h4>
                        <span>Food Blogger</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>"Tempura-nya renyah, tidak berminyak, dan selalu disajikan hangat. Pelayanannya juga ramah dan cepat."</p>
                <div class="customer">
                    <img src="IMG/istockphoto-1144176036-2048x2048.jpg" alt="Michael Chen">
                    <div class="customer-info">
                        <h4>Michael Chen</h4>
                        <span>Pelanggan Setia</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>"Sebagai orang Jepang, saya merasa masakan di Yakizen sangat mendekati rasa di kampung halaman saya."</p>
                <div class="customer">
                    <img src="IMG/istockphoto-622919252-2048x2048.jpg" alt="Yuki Tanaka">
                    <div class="customer-info">
                        <h4>Yuki Tanaka</h4>
                        <span>Asal Tokyo</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <h3>Yakizen</h3>
                <p>Sejak 2015, Yakizen menghadirkan pengalaman bersantap masakan Jepang autentik dengan suasana yang hangat dan bersahabat.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.61-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Twitter">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="#menu">Menu Kami</a></li>
                    <li><a href="#about">Tentang Yakizen</a></li>
                    <li><a href="contact.html">Kontak</a></li>
                    <li><a href="#">Reservasi</a></li>
                    <li><a href="#">Karier</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Layanan Pelanggan</h4>
                <ul>
                    <li><a href="#">Lacak Pesanan</a></li>
                    <li><a href="#">Kebijakan Pengiriman</a></li>
                    <li><a href="#">Pengembalian &amp; Refund</a></li>
                    <li><a href="feedback.html">FAQ &amp; Bantuan</a></li>
                    <li><a href="#">Syarat &amp; Ketentuan</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Hubungi Kami</h4>
                <ul class="contact-info">
                    <li>
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        Jl. Sushi No. 123, Jakarta, Indonesia
                    </li>
                    <li>
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                        </svg>
                        +62 812-3456-7890
                    </li>
                    <li>
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <a href="mailto:info@yakizen.com">info@yakizen.com</a>
                    </li>
                    <li>
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                        </svg>
                        Buka setiap hari: 10.00 - 22.00 WIB
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Yakizen Japanese Authentic Cuisine. Seluruh hak cipta dilindungi.</p>
            <div class="footer-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat Layanan</a>
                <a href="#">Kebijakan Cookie</a>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    navLinks.classList.remove('open');
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Mobile dropdown toggle
        if (window.innerWidth <= 768) {
            document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('active');
                });
            });
        }
    </script>
</body>
</html>
