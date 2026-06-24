<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan - Destigo</title>

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
            width: min(1080px, calc(100% - 48px));
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

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 24px;
            margin-bottom: 28px;
        }

        .eyebrow {
            color: #f5b841;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .page-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 44px;
            font-weight: 500;
            line-height: 1.15;
            margin-bottom: 10px;
        }

        .page-description {
            max-width: 720px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 15px;
            line-height: 1.8;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 22px;
            border-radius: 12px;
            background-color: #f5b841;
            color: #111f27;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .back-button:hover {
            background-color: #ffc85a;
        }

        .detail-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            overflow: hidden;
        }

        .detail-header {
            padding: 26px 30px;
            background-color: rgba(245, 184, 65, 0.10);
            border-bottom: 1px solid rgba(245, 184, 65, 0.30);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .code-label {
            color: #f5b841;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .booking-code {
            font-size: 24px;
            font-weight: 800;
        }

        .badge {
            display: inline-flex;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-paid {
            background-color: rgba(34, 197, 94, 0.14);
            border: 1px solid rgba(34, 197, 94, 0.45);
            color: #86efac;
        }

        .badge-pending {
            background-color: rgba(245, 184, 65, 0.14);
            border: 1px solid rgba(245, 184, 65, 0.45);
            color: #f5b841;
        }

        .badge-cancelled {
            background-color: rgba(248, 113, 113, 0.13);
            border: 1px solid rgba(248, 113, 113, 0.40);
            color: #fca5a5;
        }

        .badge-done {
            background-color: rgba(148, 163, 184, 0.14);
            border: 1px solid rgba(148, 163, 184, 0.45);
            color: #cbd5e1;
        }

        .detail-body {
            padding: 30px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .info-card {
            min-height: 108px;
            background-color: #071821;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 20px;
        }

        .info-label {
            color: rgba(255, 255, 255, 0.58);
            font-size: 13px;
            margin-bottom: 9px;
        }

        .info-value {
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.5;
        }

        .info-sub {
            color: rgba(255, 255, 255, 0.52);
            font-size: 13px;
            margin-top: 6px;
            line-height: 1.6;
        }

        .price-value {
            color: #f5b841;
            font-size: 22px;
            font-weight: 800;
        }

        .section-title {
            color: #ffffff;
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .visitor-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .visitor-box {
            background-color: #071821;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 20px;
        }

        .visitor-title {
            color: #f5b841;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .visitor-title.child {
            color: #86efac;
        }

        .visitor-list {
            display: grid;
            gap: 10px;
        }

        .visitor-item {
            padding: 13px 15px;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.82);
            font-size: 14px;
        }

        .empty-text {
            color: rgba(255, 255, 255, 0.55);
            font-size: 14px;
            line-height: 1.7;
        }

        .payment-alert {
            padding: 18px;
            border-radius: 14px;
            font-size: 14px;
            line-height: 1.7;
        }

        .payment-alert.success {
            background-color: rgba(34, 197, 94, 0.14);
            border: 1px solid rgba(34, 197, 94, 0.42);
            color: #86efac;
        }

        .payment-alert.pending {
            background-color: rgba(245, 184, 65, 0.12);
            border: 1px solid rgba(245, 184, 65, 0.35);
            color: #f5b841;
        }

        .payment-alert strong {
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
            .info-grid,
            .visitor-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 36px;
            }

            .back-button {
                width: 100%;
            }
        }

        @media (max-width: 620px) {
            .container,
            .page-container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .detail-header,
            .detail-body {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
</head>

<body>
    @php
        $adultVisitors = $booking->visitors->where('age_category', 'dewasa');
        $childVisitors = $booking->visitors->where('age_category', 'anak');

        $adultQuantity = $booking->adult_ticket_quantity ?? $adultVisitors->count();
        $childQuantity = $booking->child_ticket_quantity ?? $childVisitors->count();
        $totalQuantity = $booking->ticket_quantity ?? ($adultQuantity + $childQuantity);

        $statusText = match ($booking->booking_status) {
            'aktif' => 'Tiket Aktif / Lunas',
            'menunggu_pembayaran' => 'Menunggu Pembayaran',
            'dibatalkan' => 'Dibatalkan',
            'selesai' => 'Selesai',
            default => ucfirst(str_replace('_', ' ', $booking->booking_status)),
        };

        $statusClass = match ($booking->booking_status) {
            'aktif' => 'badge-paid',
            'dibatalkan' => 'badge-cancelled',
            'selesai' => 'badge-done',
            default => 'badge-pending',
        };
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('admin.dashboard') }}" class="brand">
                Desti<span>go</span>
            </a>

            <div class="nav-right">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    Dashboard
                </a>

                <a href="{{ route('admin.countries.index') }}" class="nav-link">
                    Negara
                </a>

                <a href="{{ route('admin.destinations.index') }}" class="nav-link">
                    Destinasi
                </a>

                <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                    Pemesanan
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
            <div class="page-header">
                <div>
                    <p class="eyebrow">
                        Detail Pemesanan
                    </p>

                    <h1 class="page-title">
                        Detail Pemesanan User
                    </h1>

                    <p class="page-description">
                        Lihat informasi lengkap pesanan, data pengunjung, destinasi, dan status pembayaran pengguna.
                    </p>
                </div>

                <a href="{{ route('admin.bookings.index') }}" class="back-button">
                    Kembali ke Pemesanan
                </a>
            </div>

            <section class="detail-card">
                <div class="detail-header">
                    <div>
                        <p class="code-label">
                            Kode Booking
                        </p>

                        <p class="booking-code">
                            {{ $booking->booking_code }}
                        </p>
                    </div>

                    <span class="badge {{ $statusClass }}">
                        {{ $statusText }}
                    </span>
                </div>

                <div class="detail-body">
                    <div class="info-grid">
                        <div class="info-card">
                            <p class="info-label">
                                Nama User
                            </p>

                            <p class="info-value">
                                {{ $booking->user->name }}
                            </p>

                            <p class="info-sub">
                                {{ $booking->user->email }}
                            </p>
                        </div>

                        <div class="info-card">
                            <p class="info-label">
                                Destinasi
                            </p>

                            <p class="info-value">
                                {{ $booking->destination->name }}
                            </p>

                            <p class="info-sub">
                                {{ $booking->destination->location }},
                                {{ $booking->destination->country->name }}
                            </p>
                        </div>

                        <div class="info-card">
                            <p class="info-label">
                                Tanggal Kunjungan
                            </p>

                            <p class="info-value">
                                {{ $booking->visit_date->format('d-m-Y') }}
                            </p>
                        </div>

                        <div class="info-card">
                            <p class="info-label">
                                Total Tiket
                            </p>

                            <p class="info-value">
                                {{ $totalQuantity }} tiket
                            </p>
                        </div>

                        <div class="info-card">
                            <p class="info-label">
                                Tiket Dewasa
                            </p>

                            <p class="info-value">
                                {{ $adultQuantity }} tiket
                            </p>
                        </div>

                        <div class="info-card">
                            <p class="info-label">
                                Tiket Anak-anak
                            </p>

                            <p class="info-value">
                                {{ $childQuantity }} tiket
                            </p>
                        </div>

                        <div class="info-card">
                            <p class="info-label">
                                Total Pembayaran
                            </p>

                            <p class="price-value">
                                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="info-card">
                            <p class="info-label">
                                Metode Pembayaran
                            </p>

                            @if ($booking->payment)
                                <p class="info-value">
                                    {{ strtoupper($booking->payment->payment_type ?? '-') }}
                                </p>

                                <p class="info-sub">
                                    Status: {{ strtoupper($booking->payment->payment_status) }}
                                </p>
                            @else
                                <p class="info-value">
                                    Belum Dibayar
                                </p>
                            @endif
                        </div>
                    </div>

                    <h2 class="section-title">
                        Data Pengunjung
                    </h2>

                    <div class="visitor-grid">
                        <div class="visitor-box">
                            <h3 class="visitor-title">
                                Pengunjung Dewasa
                            </h3>

                            @if ($adultVisitors->count() > 0)
                                <div class="visitor-list">
                                    @foreach ($adultVisitors as $visitor)
                                        <div class="visitor-item">
                                            {{ $loop->iteration }}. {{ $visitor->visitor_name }}
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="empty-text">
                                    Tidak ada pengunjung dewasa.
                                </p>
                            @endif
                        </div>

                        <div class="visitor-box">
                            <h3 class="visitor-title child">
                                Pengunjung Anak-anak
                            </h3>

                            @if ($childVisitors->count() > 0)
                                <div class="visitor-list">
                                    @foreach ($childVisitors as $visitor)
                                        <div class="visitor-item">
                                            {{ $loop->iteration }}. {{ $visitor->visitor_name }}
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="empty-text">
                                    Tidak ada pengunjung anak-anak.
                                </p>
                            @endif
                        </div>
                    </div>

                    @if ($booking->payment && $booking->payment->payment_status === 'paid')
                        <div class="payment-alert success">
                            Pembayaran telah berhasil pada
                            <strong>{{ $booking->payment->paid_at?->format('d-m-Y H:i') }}</strong>.
                            ID transaksi:
                            <strong>{{ $booking->payment->transaction_id }}</strong>.
                        </div>
                    @else
                        <div class="payment-alert pending">
                            Pesanan ini belum dibayar oleh user. Status tiket masih menunggu pembayaran.
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            © 2026 Destigo. Sistem Pemesanan Tiket Destinasi Wisata.
        </div>
    </footer>
</body>
</html>