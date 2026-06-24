<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pesanan - Destigo</title>

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
            width: min(1100px, calc(100% - 48px));
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
            margin-bottom: 30px;
        }

        .summary-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            overflow: hidden;
        }

        .summary-header {
            padding: 26px 30px;
            background-color: rgba(245, 184, 65, 0.10);
            border-bottom: 1px solid rgba(245, 184, 65, 0.30);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .summary-label {
            color: #f5b841;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .summary-code {
            font-size: 24px;
            font-weight: 800;
        }

        .status-badge {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
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

        .summary-body {
            padding: 30px;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 34px;
        }

        .destination-name {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 38px;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .destination-meta {
            color: rgba(255, 255, 255, 0.70);
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .info-grid {
            display: grid;
            gap: 16px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            color: rgba(255, 255, 255, 0.60);
            font-size: 14px;
        }

        .info-value {
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            text-align: right;
        }

        .visitor-box {
            background-color: #071821;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            padding: 22px;
        }

        .visitor-title {
            color: #f5b841;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .visitor-list {
            display: grid;
            gap: 12px;
        }

        .visitor-item {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            color: rgba(255, 255, 255, 0.86);
            font-size: 14px;
        }

        .visitor-category {
            color: rgba(255, 255, 255, 0.55);
            text-transform: capitalize;
        }

        .summary-footer {
            padding: 24px 30px 30px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .action-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 14px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
        }

        .primary-button {
            background-color: #f5b841;
            color: #111f27;
        }

        .secondary-button {
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: #ffffff;
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 820px) {
            .summary-body {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 36px;
            }
        }

        @media (max-width: 620px) {
            .container,
            .page-container {
                width: min(100% - 30px, 1100px);
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .summary-header,
            .summary-body,
            .summary-footer {
                padding-left: 20px;
                padding-right: 20px;
            }

            .info-row {
                flex-direction: column;
            }

            .info-value {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    @php
        $destination = $booking->destination;
        $statusText = match ($booking->booking_status) {
            'menunggu_pembayaran' => 'Menunggu Pembayaran',
            'aktif' => 'Tiket Aktif',
            'dibatalkan' => 'Dibatalkan',
            'selesai' => 'Selesai',
            default => ucfirst(str_replace('_', ' ', $booking->booking_status)),
        };

        $statusClass = $booking->booking_status === 'aktif' ? 'status-active' : 'status-pending';
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('user.dashboard') }}" class="brand">
                Desti<span>go</span>
            </a>

            <div class="nav-right">
                <a href="{{ route('bookings.index') }}" class="nav-link">
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

    <main class="page-section">
        <div class="page-container">
            <h1 class="page-title">
                Ringkasan Pesanan
            </h1>

            <p class="page-description">
                Periksa kembali detail pesanan tiket destinasi wisata sebelum melanjutkan pembayaran atau melihat e-ticket.
            </p>

            <div class="summary-card">
                <div class="summary-header">
                    <div>
                        <p class="summary-label">
                            Kode Booking
                        </p>

                        <p class="summary-code">
                            {{ $booking->booking_code }}
                        </p>
                    </div>

                    <span class="status-badge {{ $statusClass }}">
                        {{ $statusText }}
                    </span>
                </div>

                <div class="summary-body">
                    <div>
                        <h2 class="destination-name">
                            {{ $destination->name }}
                        </h2>

                        <p class="destination-meta">
                            {{ $destination->country->name }} <br>
                            📍 {{ $destination->location }}
                        </p>

                        <div class="info-grid">
                            <div class="info-row">
                                <span class="info-label">Tanggal Kunjungan</span>
                                <span class="info-value">
                                    {{ \Carbon\Carbon::parse($booking->visit_date)->format('d-m-Y') }}
                                </span>
                            </div>

                            @if (($booking->adult_ticket_quantity ?? 0) > 0)
                                <div class="info-row">
                                    <span class="info-label">Tiket Dewasa</span>
                                    <span class="info-value">
                                        {{ $booking->adult_ticket_quantity }} tiket
                                    </span>
                                </div>
                            @endif

                            @if (($booking->child_ticket_quantity ?? 0) > 0)
                                <div class="info-row">
                                    <span class="info-label">Tiket Anak-anak</span>
                                    <span class="info-value">
                                        {{ $booking->child_ticket_quantity }} tiket
                                    </span>
                                </div>
                            @endif

                            <div class="info-row">
                                <span class="info-label">Total Tiket</span>
                                <span class="info-value">
                                    {{ $booking->ticket_quantity }} tiket
                                </span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Total Pembayaran</span>
                                <span class="info-value">
                                    Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="visitor-box">
                        <h3 class="visitor-title">
                            Data Pengunjung
                        </h3>

                        <div class="visitor-list">
                            @forelse ($booking->visitors as $visitor)
                                <div class="visitor-item">
                                    <span>{{ $visitor->visitor_name }}</span>
                                    <span class="visitor-category">{{ $visitor->age_category }}</span>
                                </div>
                            @empty
                                <p style="color: rgba(255,255,255,0.60); font-size: 14px;">
                                    Data pengunjung belum tersedia.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="summary-footer">
                    <a href="{{ route('bookings.index') }}" class="action-button secondary-button">
                        Lihat Pesanan
                    </a>

                    @if ($booking->booking_status === 'menunggu_pembayaran')
                        <a href="{{ route('payments.create', ['booking' => $booking->id]) }}" class="action-button primary-button">
                            Lanjut ke Pembayaran
                        </a>
                    @else
                        <a href="{{ route('payments.success', ['booking' => $booking->id]) }}" class="action-button primary-button">
                            Lihat E-Ticket
                        </a>
                    @endif
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