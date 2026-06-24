<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - Destigo</title>

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

        .page-container {
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

        .detail-section {
            padding: 55px 0 82px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 0.92fr;
            gap: 44px;
            align-items: start;
        }

        .image-card {
            background-color: #13252f;
            border-radius: 24px;
            overflow: hidden;
            height: 520px;
            border: 1px solid rgba(255, 255, 255, 0.07);
        }

        .image-card img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-empty {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgba(255, 255, 255, 0.55);
        }

        .information {
            padding-top: 8px;
        }

        .country {
            display: inline-block;
            margin-bottom: 15px;
            color: #f5b841;
            font-size: 13px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 54px;
            font-weight: 500;
            line-height: 1.12;
            margin-bottom: 17px;
        }

        .location {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.68);
            margin-bottom: 27px;
        }

        .description {
            font-size: 15px;
            line-height: 1.9;
            color: rgba(255, 255, 255, 0.78);
            margin-bottom: 30px;
        }

        .ticket-box {
            padding: 26px;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
        }

        .ticket-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .ticket-list {
            display: grid;
            gap: 12px;
        }

        .ticket-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .ticket-row:first-child {
            padding-top: 0;
        }

        .ticket-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .ticket-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.80);
            font-weight: 600;
        }

        .ticket-note {
            display: block;
            margin-top: 5px;
            color: rgba(255, 255, 255, 0.47);
            font-size: 12px;
            font-weight: 400;
        }

        .ticket-price {
            color: #f5b841;
            font-size: 25px;
            font-weight: 700;
            white-space: nowrap;
        }

        .ticket-quota {
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            white-space: nowrap;
        }

        .booking-button {
            display: block;
            width: 100%;
            margin-top: 22px;
            padding: 15px 20px;
            border-radius: 12px;
            background-color: #f5b841;
            color: #17232b;
            text-align: center;
            font-size: 15px;
            font-weight: 700;
            transition: background-color 0.2s ease;
        }

        .booking-button:hover {
            background-color: #ffc85a;
        }

        .booking-info {
            margin-top: 13px;
            color: rgba(255, 255, 255, 0.55);
            line-height: 1.65;
            font-size: 12px;
            text-align: center;
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 980px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .image-card {
                height: 430px;
            }
        }

        @media (max-width: 650px) {
            .container,
            .page-container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .title {
                font-size: 39px;
            }

            .image-card {
                height: 300px;
            }

            .ticket-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .ticket-price {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    @php
        $adultPrice = $destination->adult_price ?? $destination->price ?? 0;
        $childPrice = $destination->child_price ?? round(($destination->price ?? 0) * 0.75);
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('user.dashboard') }}" class="brand">
                Desti<span>go</span>
            </a>

            <div class="nav-right">
                <a href="{{ route('countries.show', ['country' => $destination->country->slug]) }}" class="nav-link">
                    Kembali
                </a>

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

    <main class="detail-section">
        <div class="page-container">
            <div class="detail-grid">
                <div class="image-card">
                    @if ($destination->image)
                        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}">
                    @else
                        <div class="image-empty">
                            Gambar destinasi belum tersedia
                        </div>
                    @endif
                </div>

                <div class="information">
                    <p class="country">
                        {{ $destination->country->name }}
                    </p>

                    <h1 class="title">
                        {{ $destination->name }}
                    </h1>

                    <p class="location">
                        <span>📍</span>
                        <span>{{ $destination->location }}</span>
                    </p>

                    <p class="description">
                        {{ $destination->description ?? 'Temukan pengalaman wisata menarik dan pesan tiketmu dengan mudah melalui Destigo.' }}
                    </p>

                    <div class="ticket-box">
                        <h2 class="ticket-title">
                            Informasi Tiket
                        </h2>

                        <div class="ticket-list">
                            <div class="ticket-row">
                                <div>
                                    <span class="ticket-label">
                                        Harga Dewasa
                                    </span>

                                    <span class="ticket-note">
                                        Untuk usia 13 tahun ke atas
                                    </span>
                                </div>

                                <span class="ticket-price">
                                    Rp{{ number_format($adultPrice, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="ticket-row">
                                <div>
                                    <span class="ticket-label">
                                        Harga Anak-anak
                                    </span>

                                    <span class="ticket-note">
                                        Untuk usia 3 sampai 12 tahun
                                    </span>
                                </div>

                                <span class="ticket-price">
                                    Rp{{ number_format($childPrice, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="ticket-row">
                                <div>
                                    <span class="ticket-label">
                                        Kuota Tersedia
                                    </span>

                                    <span class="ticket-note">
                                        Total tiket yang masih bisa dipesan
                                    </span>
                                </div>

                                <span class="ticket-quota">
                                    {{ $destination->quota }} tiket
                                </span>
                            </div>
                        </div>

                        <a href="{{ route('bookings.create', ['destination' => $destination->slug]) }}" class="booking-button">
                            Pesan Tiket
                        </a>

                        <p class="booking-info">
                            Pilih tanggal kunjungan dan jumlah tiket pada halaman pemesanan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            © 2026 Destigo. Sistem Pemesanan Tiket Destinasi Wisata.
        </div>
    </footer>
</body>
</html>