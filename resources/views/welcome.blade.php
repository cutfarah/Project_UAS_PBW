<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destigo - Temukan Perjalananmu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #08131b;
            color: #ffffff;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .page {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(245, 184, 65, 0.16), transparent 32%),
                linear-gradient(135deg, #08131b 0%, #0d202a 55%, #08131b 100%);
        }

        .container {
            width: min(1180px, calc(100% - 56px));
            margin: 0 auto;
        }

        .navbar {
            padding: 34px 0;
        }

        .navbar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
        }

        .brand {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .brand span {
            color: #f5b841;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .nav-button-outline {
            display: inline-block;
            padding: 13px 30px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.42);
            color: #ffffff;
            font-weight: 700;
            font-size: 15px;
            transition: 0.2s ease;
        }

        .nav-button-outline:hover {
            border-color: #f5b841;
            color: #f5b841;
            background-color: rgba(245, 184, 65, 0.08);
        }

        .nav-button-solid {
            display: inline-block;
            padding: 13px 30px;
            border-radius: 999px;
            background-color: #f5b841;
            color: #14212a;
            font-weight: 800;
            font-size: 15px;
            transition: 0.2s ease;
        }

        .nav-button-solid:hover {
            background-color: #ffc95c;
        }

        .hero {
            min-height: calc(100vh - 110px);
            display: grid;
            grid-template-columns: 1fr 0.95fr;
            gap: 54px;
            align-items: center;
            padding: 35px 0 70px;
        }

        .hero-label {
            color: #f5b841;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 27px;
        }

        .hero-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: clamp(58px, 6vw, 92px);
            font-weight: 500;
            line-height: 1.05;
            margin-bottom: 30px;
        }

        .hero-description {
            max-width: 560px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 18px;
            line-height: 1.9;
            margin-bottom: 38px;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 58px;
        }

        .primary-button {
            display: inline-block;
            padding: 16px 34px;
            border-radius: 12px;
            background-color: #f5b841;
            color: #14212a;
            font-size: 16px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .primary-button:hover {
            background-color: #ffc95c;
            transform: translateY(-2px);
        }

        .secondary-button {
            display: inline-block;
            padding: 16px 34px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.34);
            color: #ffffff;
            font-size: 16px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .secondary-button:hover {
            border-color: #f5b841;
            color: #f5b841;
            background-color: rgba(245, 184, 65, 0.08);
            transform: translateY(-2px);
        }

        .hero-stats {
            display: flex;
            gap: 34px;
            flex-wrap: wrap;
        }

        .stat-item {
            min-width: 160px;
            padding-left: 17px;
            border-left: 3px solid #f5b841;
        }

        .stat-title {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .stat-text {
            color: rgba(255, 255, 255, 0.70);
            font-size: 14px;
        }

        .hero-image-card {
            position: relative;
            height: 520px;
            border-radius: 34px;
            overflow: hidden;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.10);
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.35);
        }

        .hero-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            display: block;
        }

        .image-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, transparent 35%, rgba(8, 19, 27, 0.78) 100%);
        }

        .image-caption {
            position: absolute;
            left: 26px;
            right: 26px;
            bottom: 26px;
            padding: 20px;
            border-radius: 18px;
            background-color: rgba(8, 19, 27, 0.72);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .image-caption-label {
            color: #f5b841;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .image-caption-title {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .image-caption-text {
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
            line-height: 1.6;
        }

        .footer {
            padding: 24px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.48);
            font-size: 13px;
        }

        @media (max-width: 920px) {
            .hero {
                grid-template-columns: 1fr;
                gap: 38px;
            }

            .hero-image-card {
                height: 420px;
            }
        }

        @media (max-width: 620px) {
            .container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .brand {
                font-size: 30px;
            }

            .hero-title {
                font-size: clamp(46px, 13vw, 66px);
            }

            .hero-description {
                font-size: 16px;
            }

            .hero-buttons {
                align-items: stretch;
                flex-direction: column;
            }

            .primary-button,
            .secondary-button {
                text-align: center;
            }

            .hero-stats {
                flex-direction: column;
            }

            .hero-image-card {
                height: 320px;
                border-radius: 24px;
            }

            .image-caption {
                left: 16px;
                right: 16px;
                bottom: 16px;
                padding: 16px;
            }
        }
    </style>
</head>

<body>
    <main class="page">
        <nav class="navbar">
            <div class="container navbar-inner">
                <a href="{{ url('/') }}" class="brand">
                    Desti<span>go</span>
                </a>

                @if (Route::has('login'))
                    <div class="nav-actions">
                        @auth
                            <a href="{{ url('/user/dashboard') }}" class="nav-button-solid">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-button-outline">
                                Masuk
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-button-solid">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <section class="container hero">
            <div>
                <p class="hero-label">
                    Sistem Pemesanan Tiket Wisata
                </p>

                <h1 class="hero-title">
                    Jelajahi Dunia Bersama Destigo
                </h1>

                <p class="hero-description">
                    Temukan destinasi wisata menarik dari berbagai negara, pesan tiket dengan mudah,
                    lakukan pembayaran simulasi, dan dapatkan e-ticket perjalananmu.
                </p>

                <div class="hero-buttons">
                    @auth
                        <a href="{{ url('/user/dashboard') }}" class="primary-button">
                            Mulai Jelajahi
                        </a>

                        <a href="{{ route('bookings.index') }}" class="secondary-button">
                            Lihat Pesanan
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="primary-button">
                            Mulai Jelajahi
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="secondary-button">
                                Buat Akun
                            </a>
                        @endif
                    @endauth
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <p class="stat-title">
                            6 Negara
                        </p>

                        <p class="stat-text">
                            Pilihan wisata internasional
                        </p>
                    </div>

                    <div class="stat-item">
                        <p class="stat-title">
                            Pemesanan Mudah
                        </p>

                        <p class="stat-text">
                            Booking tiket secara online
                        </p>
                    </div>

                    <div class="stat-item">
                        <p class="stat-title">
                            E-Ticket
                        </p>

                        <p class="stat-text">
                            Tiket aktif setelah pembayaran
                        </p>
                    </div>
                </div>
            </div>

            <div class="hero-image-card">
                <img src="{{ asset('images/hero-plane.jpeg') }}" alt="Pesawat terbang di langit">

                <div class="image-overlay"></div>

                <div class="image-caption">
                    <p class="image-caption-label">
                        Destigo Travel
                    </p>

                    <h2 class="image-caption-title">
                        Mulai perjalananmu dari satu tempat.
                    </h2>

                    <p class="image-caption-text">
                        Pilih destinasi, pesan tiket, dan simpan e-ticket secara digital.
                    </p>
                </div>
            </div>
        </section>

        <footer class="footer">
            © 2026 Destigo. Sistem Pemesanan Tiket Destinasi Wisata.
        </footer>
    </main>
</body>
</html>