<x-app-layout>
    <main class="page">
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Japanese Street Food, Siap dalam 15 Menit</h1>
                    <p class="hero-subtitle">
                        Nikmati Yakitori autentik, Donburi lezat, Takoyaki renyah, dan minuman Jepang favoritmu.
                        Pesan sekarang dan rasakan Jepang di lidahmu!
                    </p>

                    <div class="hero-actions">
                        <a href="{{ route('menu.index') }}" class="btn btn-primary"
                            style="padding: 16px 32px; font-size: 16px;">
                            Pesan Sekarang
                        </a>
                        <!-- <span class="hero-badge">🍽️ Dine-in • Bayar tunai</span> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works - Dine-in Only -->
        <section class="how-works" id="cara-pesan">
            <div class="container">
                <h2 class="section-title">Cara Pesan Dine-in Mudah dalam 4 Langkah</h2>
                <div class="how-steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-title">Pilih Menu</div>
                        <p>Pilih menu favorit dan tambahkan ke keranjang</p>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-title">Konfirmasi Dine-in</div>
                        <p>Pilih meja dan konfirmasi pesanan dine-in</p>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-title">Bayar Tunai</div>
                        <p>Bayar langsung ke kasir dengan uang tunai</p>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-title">Nikmati!</div>
                        <p>Ambil pesanan di konter dan nikmati di tempat</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kritik & Saran -->
        <section class="feedback-section" id="kritik-saran">
            <div class="container">
                <div class="feedback-header">
                    <div class="feedback-icon">💬</div>
                    <div class="feedback-title">Kritik & Saran</div>
                </div>
                <form class="feedback-form" onsubmit="submitFeedback(event)">
                    <input type="text" class="feedback-input"
                        placeholder="Bagikan pengalamanmu atau saran untuk Yakizen..." maxlength="200">
                    <button type="submit" class="feedback-btn">Kirim</button>
                </form>
        </section>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>🗾 Yakizen Japanese Food</h3>
                <p>Restoran Japanese comfort food autentik. Hanya dine-in dengan pembayaran tunai. Siap saji dalam 15
                    menit!</p>
                <div class="social-links">
                    <a href="#" class="social-btn social-instagram" title="Instagram">📷</a>
                    <a href="#" class="social-btn social-tiktok" title="TikTok">🎵</a>
                    <a href="#" class="social-btn social-wa" title="WhatsApp">💬</a>
                </div>
            </div>
            <div class="footer-section">
                <h3>🍖 Menu Populer</h3>
                <a href="#menu">Yakitori Chicken</a>
                <a href="#menu">Teriyaki Donburi</a>
                <a href="#menu">Takoyaki</a>
                <a href="#menu">Hoji Tea Latte</a>
            </div>
            <div class="footer-section">
                <h3>🕒 Jam Operasional</h3>
                <div class="business-hours">
                    <div class="hours-title">Setiap Hari</div>
                    <div>10:00 - 22:00 WIB</div>
                </div>
            </div>
            <div class="footer-section">
                <h3>📍 Hubungi Kami</h3>
                <p>📍 Jl. Sudirman No. 123<br><strong>Jakarta Pusat 10220</strong></p>
                <p>📱 <a href="tel:+6281234567890">0812-3456-7890</a><br>✉️ <a
                        href="mailto:hello@yakizen.co.id">hello@yakizen.co.id</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            © 2025 Yakizen. Semua hak dilindungi. Dibuat dengan ❤️ untuk pecinta makanan Jepang di Jakarta.
            <a href="#kritik-saran">Kritik & Saran</a>
        </div>
    </footer>

</x-app-layout>


<style>
    :root {
        --yakizen-yellow: #fbbf24;
        --yakizen-orange: #f97316;
        --yakizen-dark: #111827;
        --yakizen-light: #f9fafb;
        --yakizen-green: #059669;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        background: #f8fafc;
        color: var(--yakizen-dark);
        line-height: 1.5;
    }

    .container {
        max-width: 1280px;
        /* max-w-7xl */
        margin: 0 auto;
        padding: 0 20px;
    }


    a {
        text-decoration: none;
        color: inherit;
    }

    .btn {
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--yakizen-yellow), var(--yakizen-orange));
        color: var(--yakizen-dark);
        box-shadow: 0 4px 12px rgba(251, 191, 36, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(251, 191, 36, 0.4);
    }

    .btn-danger {
        padding: 8px 16px;
        background: #ef4444;
        color: white;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-danger:hover {
        background: #dc2626;
    }

    /* Main Layout */
    .page {
        width: 100%;
        padding: 0;
        margin: 20px 0;
    }


    @media (max-width: 1024px) {
        .page {
            grid-template-columns: 1fr;
            gap: 24px;
        }
    }

    /* Hero */
    .hero {
        max-width: 1200px;
        margin: 0 auto;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        border-radius: 24px;
        padding: 48px 40px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 80%, rgba(251, 191, 36, 0.1) 0%, transparent 50%);
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 36px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 12px;
        background: linear-gradient(135deg, white, #f8fafc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: 18px;
        opacity: 0.95;
        margin-bottom: 32px;
        max-width: 500px;
    }

    .hero-actions {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .hero-badge {
        display: inline-flex;
        padding: 8px 16px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        font-size: 14px;
        font-weight: 500;
        align-self: flex-start;
    }

    /* How It Works */
    .how-works {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
    }

    .how-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
        margin-top: 24px;
    }

    .step {
        text-align: center;
        padding: 24px;
    }

    .step-number {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--yakizen-yellow), var(--yakizen-orange));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 800;
        color: var(--yakizen-dark);
        margin: 0 auto 16px;
    }

    .step-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 8px;
    }


    @media (max-width: 1024px) {
        .footer-content {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .hero {
            padding: 32px 24px;
        }

        .hero-title {
            font-size: 28px;
        }

        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }

        .filters {
            flex-direction: column;
        }

        .nav-links {
            gap: 16px;
        }

        .user-profile span {
            display: none;
        }
    }

    /* Kritik & Saran Section */
    .feedback-section {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        padding: 32px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
        margin-bottom: 32px;
    }

    .feedback-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
    }

    .feedback-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--yakizen-yellow), var(--yakizen-orange));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: var(--yakizen-dark);
    }

    .feedback-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--yakizen-dark);
    }

    .feedback-form {
        display: flex;
        gap: 12px;
    }

    .feedback-input {
        flex: 1;
        padding: 14px 20px;
        border: 2px solid #f1f5f9;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.2s;
    }

    .feedback-input:focus {
        outline: none;
        border-color: var(--yakizen-yellow);
        box-shadow: 0 0 0 4px rgba(251, 191, 36, 0.1);
    }

    .feedback-btn {
        padding: 14px 24px;
        background: linear-gradient(135deg, var(--yakizen-yellow), var(--yakizen-orange));
        color: var(--yakizen-dark);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        white-space: nowrap;
    }

    .feedback-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3);
    }

    /* Footer */
    .footer {
        background: linear-gradient(135deg, var(--yakizen-dark), #1f2937);
        color: white;
        padding: 80px 20px 20px;
        position: relative;
        overflow: hidden;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(251, 191, 36, 0.1) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 40px;
        position: relative;
        z-index: 1;
    }

    .footer-section h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--yakizen-yellow);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .footer-section p,
    .footer-section a {
        color: #d1d5db;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 12px;
        transition: color 0.2s;
    }

    .footer-section a:hover {
        color: var(--yakizen-yellow);
    }

    .social-links {
        display: flex;
        gap: 12px;
        margin-top: 20px;
    }

    .social-btn {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .social-instagram {
        background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
    }

    .social-tiktok {
        background: linear-gradient(45deg, #000, #333);
    }

    .social-wa {
        background: linear-gradient(135deg, var(--yakizen-green), #047857);
    }

    .social-btn:hover {
        transform: translateY(-4px) scale(1.1);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .business-hours {
        background: rgba(251, 191, 36, 0.1);
        padding: 20px;
        border-radius: 16px;
        border: 1px solid rgba(251, 191, 36, 0.2);
    }

    .hours-title {
        font-weight: 600;
        margin-bottom: 12px;
        color: var(--yakizen-yellow);
    }

    .footer-bottom {
        grid-column: 1 / -1;
        border-top: 1px solid #374151;
        margin-top: 40px;
        padding-top: 32px;
        text-align: center;
        color: #9ca3af;
        font-size: 14px;
    }

    .footer-bottom a {
        color: var(--yakizen-yellow);
        font-weight: 500;
    }

    @media (max-width: 1024px) {
        .footer-content {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .hero {
            padding: 32px 24px;
        }

        .hero-title {
            font-size: 28px;
        }

        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }

        .filters {
            flex-direction: column;
        }

        .nav-links {
            gap: 16px;
        }

        .user-profile span {
            display: none;
        }
    }
</style>