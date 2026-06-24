<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - Destigo</title>

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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .page-section {
            padding: 46px 0 80px;
            flex: 1;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 44px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .page-description {
            color: rgba(255, 255, 255, 0.75);
            font-size: 15px;
            line-height: 1.7;
        }

        .booking-list {
            display: grid;
            gap: 20px;
        }

        .booking-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            padding: 24px 26px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr auto;
            gap: 24px;
            align-items: center;
        }

        .booking-country {
            color: #f5b841;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .booking-title {
            font-size: 23px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .booking-location {
            color: rgba(255, 255, 255, 0.65);
            font-size: 14px;
            line-height: 1.6;
        }

        .booking-info {
            display: grid;
            gap: 10px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            font-size: 14px;
        }

        .info-label {
            color: rgba(255, 255, 255, 0.58);
        }

        .info-value {
            color: #ffffff;
            font-weight: 700;
            text-align: right;
        }

        .price-value {
            color: #f5b841;
            font-weight: 800;
        }

        .status-badge {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            padding: 9px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            margin-bottom: 14px;
        }

        .status-pending {
            background-color: rgba(245, 184, 65, 0.14);
            border: 1px solid rgba(245, 184, 65, 0.45);
            color: #f5b841;
        }

        .status-active {
            background-color: rgba(34, 197, 94, 0.14);
            border: 1px solid rgba(34, 197, 94, 0.45);
            color: #86efac;
        }

        .status-cancelled {
            background-color: rgba(248, 113, 113, 0.14);
            border: 1px solid rgba(248, 113, 113, 0.45);
            color: #fca5a5;
        }

        .status-done {
            background-color: rgba(148, 163, 184, 0.14);
            border: 1px solid rgba(148, 163, 184, 0.45);
            color: #cbd5e1;
        }

        .booking-actions {
            display: grid;
            gap: 10px;
            justify-items: end;
        }

        .action-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 150px;
            padding: 13px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
        }

        .primary-button {
            background-color: #f5b841;
            color: #111f27;
        }

        .secondary-button {
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: #ffffff;
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
            margin-bottom: 24px;
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 980px) {
            .booking-card {
                grid-template-columns: 1fr;
            }

            .booking-actions {
                justify-items: start;
            }

            .action-button {
                min-width: 170px;
            }
        }

        @media (max-width: 620px) {
            .container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 36px;
            }

            .booking-card {
                padding: 22px 20px;
            }

            .info-row {
                flex-direction: column;
                gap: 4px;
            }

            .info-value {
                text-align: left;
            }
        }
    </style>
</head>

<body>
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

    <main class="page-section">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    Pesanan Saya
                </h1>

                <p class="page-description">
                    Lihat riwayat pemesanan tiket destinasi wisata dan lanjutkan pembayaran atau buka e-ticket yang sudah aktif.
                </p>
            </div>

            @if ($bookings->count() > 0)
                <div class="booking-list">
                    @foreach ($bookings as $booking)
                        @php
                            $statusText = match ($booking->booking_status) {
                                'menunggu_pembayaran' => 'Menunggu Pembayaran',
                                'aktif' => 'Tiket Aktif',
                                'dibatalkan' => 'Dibatalkan',
                                'selesai' => 'Selesai',
                                default => ucfirst(str_replace('_', ' ', $booking->booking_status)),
                            };

                            $statusClass = match ($booking->booking_status) {
                                'aktif' => 'status-active',
                                'dibatalkan' => 'status-cancelled',
                                'selesai' => 'status-done',
                                default => 'status-pending',
                            };
                        @endphp

                        <div class="booking-card">
                            <div>
                                <div class="booking-country">
                                    {{ $booking->destination->country->name }}
                                </div>

                                <h2 class="booking-title">
                                    {{ $booking->destination->name }}
                                </h2>

                                <p class="booking-location">
                                    📍 {{ $booking->destination->location }}
                                </p>
                            </div>

                            <div class="booking-info">
                                <div class="info-row">
                                    <span class="info-label">
                                        Kode Booking
                                    </span>

                                    <span class="info-value">
                                        {{ $booking->booking_code }}
                                    </span>
                                </div>

                                <div class="info-row">
                                    <span class="info-label">
                                        Tanggal Kunjungan
                                    </span>

                                    <span class="info-value">
                                        {{ \Carbon\Carbon::parse($booking->visit_date)->format('d-m-Y') }}
                                    </span>
                                </div>

                                <div class="info-row">
                                    <span class="info-label">
                                        Total Tiket
                                    </span>

                                    <span class="info-value">
                                        {{ $booking->ticket_quantity }} tiket
                                    </span>
                                </div>

                                <div class="info-row">
                                    <span class="info-label">
                                        Total Pembayaran
                                    </span>

                                    <span class="info-value price-value">
                                        Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <div class="booking-actions">
                                <span class="status-badge {{ $statusClass }}">
                                    {{ $statusText }}
                                </span>

                                <a href="{{ route('bookings.show', ['booking' => $booking->id]) }}" class="action-button secondary-button">
                                    Detail Pesanan
                                </a>

                                @if ($booking->booking_status === 'menunggu_pembayaran')
                                    <a href="{{ route('payments.create', ['booking' => $booking->id]) }}" class="action-button primary-button">
                                        Bayar Sekarang
                                    </a>
                                @elseif ($booking->booking_status === 'aktif')
                                    <a href="{{ route('payments.success', ['booking' => $booking->id]) }}" class="action-button primary-button">
                                        Lihat E-Ticket
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-card">
                    <h2 class="empty-title">
                        Belum Ada Pesanan
                    </h2>

                    <p class="empty-text">
                        Kamu belum memiliki riwayat pemesanan tiket. Pilih destinasi wisata terlebih dahulu untuk mulai memesan tiket.
                    </p>

                    <a href="{{ route('user.dashboard') }}" class="action-button primary-button">
                        Cari Destinasi
                    </a>
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