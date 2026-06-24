<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $country->name }} - Destigo</title>

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

        .container {
            width: min(1180px, calc(100% - 48px));
            margin: 0 auto;
        }

        .navbar {
            padding: 21px 0;
            background-color: #08131b;
            border-bottom: 1px solid rgba(255, 255, 255, 0.10);
        }

        .navbar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 22px;
        }

        .brand {
            font-size: 29px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .brand span {
            color: #f5b841;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-link {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.78);
            font-weight: 400;
            line-height: 1;
        }

        .nav-link:hover {
            color: #f5b841;
        }

        .logout-button {
            border: 1px solid rgba(255, 255, 255, 0.40);
            background-color: transparent;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1;
        }

        .logout-button:hover {
            border-color: #f5b841;
            color: #f5b841;
        }

        .hero {
            padding: 58px 0 42px;
        }

        .hero-card {
            min-height: 330px;
            border-radius: 28px;
            overflow: hidden;
            position: relative;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(7, 17, 24, 0.93), rgba(7, 17, 24, 0.45)),
                linear-gradient(0deg, rgba(7, 17, 24, 0.72), rgba(7, 17, 24, 0.12));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 48px;
            max-width: 660px;
        }

        .eyebrow {
            color: #f5b841;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .hero-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 56px;
            line-height: 1.12;
            font-weight: 500;
            margin-bottom: 18px;
        }

        .hero-description {
            color: rgba(255, 255, 255, 0.78);
            font-size: 15px;
            line-height: 1.8;
            max-width: 590px;
        }

        .destination-section {
            padding: 22px 0 80px;
        }

        .section-header {
            margin-bottom: 28px;
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
        }

        .section-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 38px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .section-description {
            color: rgba(255, 255, 255, 0.68);
            font-size: 14px;
            line-height: 1.7;
        }

        .destination-count {
            color: #f5b841;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .destination-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .destination-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            overflow: hidden;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .destination-card:hover {
            transform: translateY(-4px);
            border-color: rgba(245, 184, 65, 0.35);
        }

        .destination-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .destination-empty {
            height: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #10222d;
            color: rgba(255, 255, 255, 0.55);
            font-size: 14px;
        }

        .destination-body {
            padding: 22px;
        }

        .destination-name {
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .destination-location {
            color: rgba(255, 255, 255, 0.62);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        .destination-info {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
            margin-bottom: 20px;
        }

        .price-label {
            color: rgba(255, 255, 255, 0.55);
            font-size: 12px;
            margin-bottom: 5px;
        }

        .price-value {
            color: #f5b841;
            font-size: 20px;
            font-weight: 800;
        }

        .quota-value {
            color: rgba(255, 255, 255, 0.70);
            font-size: 13px;
            text-align: right;
        }

        .detail-button {
            display: block;
            width: 100%;
            padding: 13px 18px;
            border-radius: 12px;
            background-color: #f5b841;
            color: #111f27;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
        }

        .detail-button:hover {
            background-color: #ffc85a;
        }

        .empty-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            padding: 48px 30px;
            text-align: center;
        }

        .empty-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 34px;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .empty-text {
            color: rgba(255, 255, 255, 0.70);
            font-size: 15px;
            line-height: 1.7;
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 980px) {
            .destination-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-title {
                font-size: 46px;
            }
        }

        @media (max-width: 650px) {
            .container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .hero-content {
                padding: 32px 24px;
            }

            .hero-title {
                font-size: 36px;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .destination-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    @php
        $countryImage = $country->image ?? null;
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('user.dashboard') }}" class="brand">
                Desti<span>go</span>
            </a>

            <div class="nav-right">
                <a href="{{ route('user.dashboard') }}" class="nav-link">
                    Dashboard
                </a>

                <a href="{{ route('bookings.index') }}" class="nav-link">
                    Pesanan
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-button">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <div class="hero-card">
                @if ($countryImage)
                    <img src="{{ asset('storage/' . $countryImage) }}" alt="{{ $country->name }}" class="hero-image">
                @else
                    <div class="hero-image" style="background: linear-gradient(135deg, #10222d, #1c3b4b);"></div>
                @endif

                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <p class="eyebrow">
                        Destinasi Wisata
                    </p>

                    <h1 class="hero-title">
                        Jelajahi {{ $country->name }}
                    </h1>

                    <p class="hero-description">
                        Temukan pilihan destinasi wisata menarik di {{ $country->name }} dan pesan tiket perjalananmu dengan mudah melalui Destigo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <main class="destination-section">
        <div class="container">
            <div class="section-header">
                <div>
                    <h2 class="section-title">
                        Pilihan Destinasi
                    </h2>

                    <p class="section-description">
                        Pilih destinasi wisata yang tersedia, lihat detail harga, lalu lanjutkan pemesanan tiket.
                    </p>
                </div>

                <p class="destination-count">
                    {{ $country->destinations->count() }} destinasi tersedia
                </p>
            </div>

            @if ($country->destinations->count() > 0)
                <div class="destination-grid">
                    @foreach ($country->destinations as $destination)
                        @php
                            $adultPrice = $destination->adult_price ?? $destination->price ?? 0;
                        @endphp

                        <div class="destination-card">
                            @if ($destination->image)
                                <img src="{{ asset('storage/' . $destination->image) }}"
                                     alt="{{ $destination->name }}"
                                     class="destination-image">
                            @else
                                <div class="destination-empty">
                                    Gambar belum tersedia
                                </div>
                            @endif

                            <div class="destination-body">
                                <h3 class="destination-name">
                                    {{ $destination->name }}
                                </h3>

                                <p class="destination-location">
                                    📍 {{ $destination->location }}
                                </p>

                                <div class="destination-info">
                                    <div>
                                        <p class="price-label">
                                            Mulai dari
                                        </p>

                                        <p class="price-value">
                                            Rp{{ number_format($adultPrice, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <p class="quota-value">
                                        {{ $destination->quota }} tiket
                                    </p>
                                </div>

                                <a href="{{ route('destinations.show', ['destination' => $destination->slug]) }}" class="detail-button">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-card">
                    <h2 class="empty-title">
                        Belum Ada Destinasi
                    </h2>

                    <p class="empty-text">
                        Destinasi untuk negara ini belum tersedia.
                    </p>
                </div>
            @endif
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            © 2026 Destigo. Sistem Pemesanan Tiket Destinasi Wisata.
        </div>
    </footer>
</body>
</html>