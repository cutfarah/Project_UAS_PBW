<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Saya - Destigo</title>

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
            border-bottom: 1px solid rgba(255, 255, 255, 0.09);
            background-color: #08131b;
            position: sticky;
            top: 0;
            z-index: 20;
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
        }

        .brand span {
            color: #f5b841;
        }

        .navigation {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navigation a {
            color: rgba(255, 255, 255, 0.78);
            font-size: 14px;
        }

        .navigation a:hover {
            color: #f5b841;
        }

        .logout-form button {
            border: 1px solid rgba(255, 255, 255, 0.35);
            background-color: transparent;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
        }

        .logout-form button:hover {
            border-color: #f5b841;
            color: #f5b841;
        }

        .hero {
            padding: 58px 0 44px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 38px;
            align-items: center;
        }

        .welcome-label {
            color: #f5b841;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 13px;
        }

        .welcome-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-weight: 500;
            font-size: 54px;
            line-height: 1.15;
            margin-bottom: 17px;
        }

        .welcome-text {
            color: rgba(255, 255, 255, 0.70);
            font-size: 16px;
            line-height: 1.8;
            max-width: 760px;
        }

        .hero-feature {
            display: block;
            position: relative;
            min-height: 330px;
            border-radius: 24px;
            overflow: hidden;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .hero-feature:hover {
            transform: translateY(-4px);
            border-color: rgba(245, 184, 65, 0.35);
        }

        .hero-feature img {
            width: 100%;
            height: 330px;
            object-fit: cover;
            display: block;
        }

        .hero-feature-empty {
            height: 330px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgba(255, 255, 255, 0.55);
        }

        .hero-feature-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(0deg, rgba(5, 14, 21, 0.95), rgba(5, 14, 21, 0.20) 62%),
                linear-gradient(90deg, rgba(5, 14, 21, 0.30), transparent);
            display: flex;
            flex-direction: column;
            justify-content: end;
            padding: 25px;
        }

        .hero-badge {
            width: max-content;
            margin-bottom: 13px;
            padding: 8px 13px;
            border-radius: 999px;
            background-color: rgba(245, 184, 65, 0.18);
            color: #f5b841;
            font-size: 12px;
            font-weight: 700;
        }

        .hero-feature-title {
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .hero-feature-location {
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
            margin-bottom: 14px;
        }

        .hero-feature-price {
            color: #f5b841;
            font-size: 20px;
            font-weight: 700;
        }

        .section {
            padding: 22px 0 45px;
        }

        .section:last-of-type {
            padding-bottom: 75px;
        }

        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 25px;
        }

        .section-label {
            color: #f5b841;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 12px;
            margin-bottom: 9px;
        }

        .section-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 36px;
            font-weight: 500;
        }

        .country-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 19px;
        }

        .country-card {
            position: relative;
            display: block;
            height: 210px;
            overflow: hidden;
            border-radius: 17px;
            background-color: #142731;
            transition: transform 0.2s ease;
        }

        .country-card:hover {
            transform: translateY(-4px);
        }

        .country-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .country-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(5, 14, 21, 0.92), transparent 65%);
            display: flex;
            flex-direction: column;
            justify-content: end;
            padding: 19px;
        }

        .country-name {
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .country-count {
            color: rgba(255, 255, 255, 0.70);
            font-size: 13px;
        }

        .destination-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 19px;
        }

        .destination-card {
            background-color: #11232d;
            border-radius: 16px;
            overflow: hidden;
            display: block;
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .destination-card:hover {
            transform: translateY(-4px);
            background-color: #142b36;
        }

        .destination-card img {
            height: 180px;
            width: 100%;
            object-fit: cover;
            display: block;
        }

        .destination-body {
            padding: 18px;
        }

        .destination-country {
            color: #f5b841;
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .destination-name {
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .destination-price {
            color: #f5b841;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .destination-child-price {
            color: rgba(255, 255, 255, 0.62);
            font-size: 13px;
        }

        .empty {
            background-color: #11232d;
            padding: 28px;
            border-radius: 14px;
            color: rgba(255, 255, 255, 0.65);
            text-align: center;
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 950px) {
            .hero-grid {
                grid-template-columns: 1fr;
            }

            .country-grid,
            .destination-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .navigation {
                flex-wrap: wrap;
            }

            .welcome-title {
                font-size: 38px;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .country-grid,
            .destination-grid {
                grid-template-columns: 1fr;
            }

            .hero-feature,
            .hero-feature img,
            .hero-feature-empty {
                min-height: 270px;
                height: 270px;
            }

            .hero-feature-title {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>
    @php
        $heroDestination = $featuredDestinations->first();
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('user.dashboard') }}" class="brand">
                Desti<span>go</span>
            </a>

            <div class="navigation">
                <a href="{{ route('user.dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('bookings.index') }}">
                    Pesanan
                </a>

                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf

                    <button type="submit">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <div class="hero-grid">
                <div>
                    <p class="welcome-label">
                        Dashboard User
                    </p>

                    <h1 class="welcome-title">
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h1>

                    <p class="welcome-text">
                        Temukan destinasi wisata pilihan, lihat informasi tiket, dan pesan perjalananmu dengan mudah melalui Destigo.
                        Riwayat pemesanan dan e-ticket dapat dilihat melalui menu Pesanan.
                    </p>
                </div>

                @if ($heroDestination)
                    @php
                        $heroAdultPrice = $heroDestination->adult_price ?? $heroDestination->price;
                    @endphp

                    <a href="{{ route('destinations.show', ['destination' => $heroDestination->slug]) }}"
                       class="hero-feature">
                        @if ($heroDestination->image)
                            <img src="{{ asset('storage/' . $heroDestination->image) }}"
                                 alt="{{ $heroDestination->name }}">
                        @else
                            <div class="hero-feature-empty">
                                Gambar destinasi belum tersedia
                            </div>
                        @endif

                        <div class="hero-feature-overlay">
                            <p class="hero-badge">
                                Rekomendasi Hari Ini
                            </p>

                            <h2 class="hero-feature-title">
                                {{ $heroDestination->name }}
                            </h2>

                            <p class="hero-feature-location">
                                {{ $heroDestination->country->name }} • {{ $heroDestination->location }}
                            </p>

                            <p class="hero-feature-price">
                                Mulai Rp{{ number_format($heroAdultPrice, 0, ',', '.') }}
                            </p>
                        </div>
                    </a>
                @else
                    <div class="hero-feature">
                        <div class="hero-feature-empty">
                            Belum ada destinasi tersedia
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </header>

    <section class="section" id="countries">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="section-label">
                        Pilih Negara
                    </p>

                    <h2 class="section-title">
                        Jelajahi Destinasi
                    </h2>
                </div>
            </div>

            <div class="country-grid">
                @foreach ($countries as $country)
                    <a href="{{ route('countries.show', ['country' => $country->slug]) }}"
                       class="country-card">
                        @if ($country->image)
                            <img src="{{ asset('storage/' . $country->image) }}"
                                 alt="{{ $country->name }}">
                        @endif

                        <div class="country-overlay">
                            <p class="country-name">
                                {{ $country->name }}
                            </p>

                            <p class="country-count">
                                {{ $country->destinations_count }} destinasi
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="section-label">
                        Rekomendasi
                    </p>

                    <h2 class="section-title">
                        Destinasi Pilihan
                    </h2>
                </div>
            </div>

            @if ($featuredDestinations->count() > 0)
                <div class="destination-grid">
                    @foreach ($featuredDestinations as $destination)
                        @php
                            $adultPrice = $destination->adult_price ?? $destination->price;
                            $childPrice = $destination->child_price ?? round(($destination->price ?? 0) * 0.75);
                        @endphp

                        <a href="{{ route('destinations.show', ['destination' => $destination->slug]) }}"
                           class="destination-card">
                            @if ($destination->image)
                                <img src="{{ asset('storage/' . $destination->image) }}"
                                     alt="{{ $destination->name }}">
                            @endif

                            <div class="destination-body">
                                <p class="destination-country">
                                    {{ $destination->country->name }}
                                </p>

                                <h3 class="destination-name">
                                    {{ $destination->name }}
                                </h3>

                                <p class="destination-price">
                                    Dewasa Rp{{ number_format($adultPrice, 0, ',', '.') }}
                                </p>

                                <p class="destination-child-price">
                                    Anak-anak Rp{{ number_format($childPrice, 0, ',', '.') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty">
                    Belum ada destinasi yang tersedia.
                </div>
            @endif
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            © 2026 Destigo. Sistem Pemesanan Tiket Destinasi Wisata.
        </div>
    </footer>
</body>
</html>