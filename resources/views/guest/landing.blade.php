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
            min-height: 100vh;
            color: #ffffff;
            background:
                linear-gradient(90deg, rgba(7, 17, 24, 0.94), rgba(7, 17, 24, 0.55)),
                linear-gradient(0deg, rgba(7, 17, 24, 0.95), rgba(7, 17, 24, 0.20)),
                url("{{ asset('images/hero-mount.jpg') }}") center/cover no-repeat;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1180px, calc(100% - 48px));
            margin: 0 auto;
        }

        .navbar {
            padding: 28px 0;
        }

        .navbar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .brand span {
            color: #f5b841;
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .btn-login {
            border: 1px solid rgba(255, 255, 255, 0.55);
            padding: 12px 23px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 14px;
        }

        .btn-register {
            background-color: #f5b841;
            color: #16232c;
            padding: 13px 24px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 14px;
        }

        .hero {
            min-height: calc(100vh - 94px);
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 650px;
            padding-bottom: 55px;
        }

        .eyebrow {
            color: #f5b841;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-weight: 500;
            font-size: 78px;
            line-height: 1.08;
            margin-bottom: 24px;
        }

        .description {
            max-width: 530px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 16px;
            line-height: 1.85;
            margin-bottom: 38px;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            align-items: center;
        }

        .primary-action {
            background-color: #f5b841;
            color: #16232c;
            padding: 15px 29px;
            border-radius: 10px;
            font-weight: 700;
        }

        .secondary-action {
            border: 1px solid rgba(255, 255, 255, 0.45);
            padding: 14px 29px;
            border-radius: 10px;
            font-weight: 600;
        }

        .features {
            margin-top: 53px;
            display: flex;
            gap: 34px;
        }

        .feature {
            border-left: 2px solid #f5b841;
            padding-left: 15px;
        }

        .feature strong {
            display: block;
            font-size: 17px;
            margin-bottom: 6px;
        }

        .feature span {
            color: rgba(255, 255, 255, 0.68);
            font-size: 13px;
        }

        @media (max-width: 720px) {
            .container {
                width: min(100% - 30px, 1180px);
            }

            h1 {
                font-size: 49px;
            }

            .features {
                display: block;
            }

            .feature {
                margin-bottom: 18px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container navbar-inner">
            <div class="brand">
                Desti<span>go</span>
            </div>

            <div class="nav-buttons">
                <a href="{{ route('login') }}" class="btn-login">
                    Masuk
                </a>

                <a href="{{ route('register') }}" class="btn-register">
                    Daftar
                </a>
            </div>
        </div>
    </nav>

    <main class="hero">
        <div class="container">
            <div class="hero-content">
                <p class="eyebrow">
                    Sistem Pemesanan Tiket Wisata
                </p>

                <h1>
                    Jelajahi Dunia Bersama Destigo
                </h1>

                <p class="description">
                    Temukan destinasi wisata menarik dari berbagai negara,
                    pesan tiket dengan mudah, lakukan pembayaran,
                    dan dapatkan e-ticket perjalananmu.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('login') }}" class="primary-action">
                        Mulai Jelajahi
                    </a>

                    <a href="{{ route('register') }}" class="secondary-action">
                        Buat Akun
                    </a>
                </div>

                <div class="features">
                    <div class="feature">
                        <strong>6 Negara</strong>
                        <span>Pilihan wisata internasional</span>
                    </div>

                    <div class="feature">
                        <strong>Pemesanan Mudah</strong>
                        <span>Booking tiket secara online</span>
                    </div>

                    <div class="feature">
                        <strong>E-Ticket</strong>
                        <span>Tiket aktif setelah pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>