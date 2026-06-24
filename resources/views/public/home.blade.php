<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destigo - Jelajahi Destinasi Wisata</title>

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
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1180px, calc(100% - 48px));
            margin: 0 auto;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            padding: 25px 0;
        }

        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .brand {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .brand span {
            color: #f5b841;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.86);
        }

        .nav-links a:hover {
            color: #f5b841;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-outline {
            padding: 11px 20px;
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 30px;
            color: #ffffff;
            font-weight: 600;
            font-size: 14px;
        }

        .btn-primary {
            padding: 12px 22px;
            background-color: #f5b841;
            border-radius: 30px;
            color: #16202a;
            font-weight: 700;
            font-size: 14px;
        }

        .hero {
            position: relative;
            min-height: 700px;
            display: flex;
            align-items: center;
            background-position: center;
            background-size: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(5, 14, 22, 0.9) 0%, rgba(5, 14, 22, 0.58) 45%, rgba(5, 14, 22, 0.74) 100%),
                linear-gradient(0deg, #08131b 0%, transparent 32%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding-top: 75px;
            max-width: 640px;
        }

        .hero-small-title {
            color: #f5b841;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .hero-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 92px;
            font-weight: 500;
            line-height: 1;
            margin-bottom: 24px;
        }

        .hero-description {
            max-width: 540px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.82);
            font-size: 16px;
            margin-bottom: 36px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
        }

        .section {
            padding: 68px 0;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .label {
            color: #f5b841;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .section-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-weight: 500;
            font-size: 42px;
        }

        .country-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .country-card {
            position: relative;
            height: 270px;
            border-radius: 18px;
            overflow: hidden;
            background-color: #132632;
            transition: transform 0.25s ease;
        }

        .country-card:hover {
            transform: translateY(-5px);
        }

        .country-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .country-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: end;
            padding: 24px;
            background: linear-gradient(0deg, rgba(4, 12, 18, 0.92), transparent 65%);
        }

        .country-name {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .country-count {
            color: rgba(255, 255, 255, 0.75);
            font-size: 14px;
        }

        .featured-section {
            padding: 20px 0 75px;
        }

        .destination-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .destination-card {
            background-color: #12232d;
            border-radius: 18px;
            overflow: hidden;
        }

        .destination-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
        }

        .destination-content {
            padding: 18px;
        }

        .destination-content h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .destination-location {
            color: rgba(255, 255, 255, 0.65);
            font-size: 13px;
            margin-bottom: 14px;
        }

        .destination-price {
            color: #f5b841;
            font-size: 17px;
            font-weight: 700;
        }

        .empty-text {
            color: rgba(255, 255, 255, 0.65);
            padding: 30px 0;
        }

        .footer {
            border-top: 1px solid rgba(255, 255, 255, 0.09);
            padding: 30px 0;
            color: rgba(255, 255, 255, 0.6);
            text-align: center;
            font-size: 14px;
        }

        @media (max-width: 980px) {
            .nav-links {
                display: none;
            }

            .country-grid,
            .destination-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-title {
                font-size: 66px;
            }
        }

        @media (max-width: 640px) {
            .container {
                width: min(100% - 30px, 1180px);
            }

            .nav-actions .btn-primary {
                display: none;
            }

            .hero {
                min-height: 620px;
            }

            .hero-title {
                font-size: 50px;
            }

            .country-grid,
            .destination-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
    @php
        $heroImage = $featuredCountry && $featuredCountry->image
            ? asset('storage/' . $featuredCountry->image)
            : '';
    @endphp

    <header class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('home') }}" class="brand">
                Desti<span>go</span>
            </a>

            <nav class="nav-links">
                @foreach ($countries as $country)
                    <a href="{{ route('countries.show', ['country' => $country->slug]) }}">
                        {{ $country->name }}
                    </a>
                @endforeach
            </nav>

            <div class="nav-actions">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn-outline">
                            Admin
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn-outline">
                            Akun Saya
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn-outline">
                        Masuk
                    </a>
                @endauth

                <a href="#negara" class="btn-primary">
                    Jelajahi
                </a>
            </div>
        </div>
    </header>

    <section class="hero"
             style="{{ $heroImage ? "background-image: url('$heroImage');" : 'background-color: #152937;' }}">
        <div class="hero-overlay"></div>

        <div class="container">
            <div class="hero-content">
                <p class="hero-small-title">Pesona Alam</p>

                <h1 class="hero-title">
                    Indonesia
                </h1>

                <p class="hero-description">
                    Temukan destinasi wisata terbaik dari berbagai negara dan
                    pesan tiket perjalananmu dengan mudah melalui Destigo.
                    Nikmati pengalaman menjelajah dunia dalam satu website.
                </p>

                <div class="hero-buttons">
                    <a href="#negara" class="btn-primary">
                        Lihat Destinasi
                    </a>

                    @guest
                        <a href="{{ route('register') }}" class="btn-outline">
                            Daftar Sekarang
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="negara">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="label">Pilih Negara</p>
                    <h2 class="section-title">
                        Jelajahi Berbagai Negara
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
                                {{ $country->destinations_count }} destinasi tersedia
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="featured-section">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="label">Destinasi Populer</p>
                    <h2 class="section-title">
                        Wisata Pilihan Indonesia
                    </h2>
                </div>
            </div>

            @if ($featuredCountry && $featuredCountry->destinations->count() > 0)
                <div class="destination-grid">
                    @foreach ($featuredCountry->destinations as $destination)
                        <div class="destination-card">
                            @if ($destination->image)
                                <img src="{{ asset('storage/' . $destination->image) }}"
                                     alt="{{ $destination->name }}">
                            @endif

                            <div class="destination-content">
                                <h3>{{ $destination->name }}</h3>

                                <p class="destination-location">
                                    {{ $destination->location }}
                                </p>

                                <p class="destination-price">
                                    Rp{{ number_format($destination->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="empty-text">
                    Belum ada destinasi Indonesia yang tersedia.
                </p>
            @endif
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            &copy; {{ date('Y') }} Destigo. Sistem Pemesanan Tiket Destinasi Wisata.
        </div>
    </footer>
</body>
</html>