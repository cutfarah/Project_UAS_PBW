<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Destigo</title>

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

        .dashboard-section {
            padding: 46px 0 80px;
        }

        .hero-card {
            background:
                linear-gradient(90deg, rgba(17, 35, 45, 0.98), rgba(17, 35, 45, 0.78)),
                radial-gradient(circle at top right, rgba(245, 184, 65, 0.18), transparent 38%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 34px;
            margin-bottom: 30px;
        }

        .eyebrow {
            color: #f5b841;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .hero-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 46px;
            font-weight: 500;
            line-height: 1.15;
            margin-bottom: 12px;
        }

        .hero-description {
            max-width: 760px;
            color: rgba(255, 255, 255, 0.76);
            font-size: 15px;
            line-height: 1.8;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 18px;
        }

        .stats-grid-secondary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            height: 118px;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.62);
            font-size: 14px;
            margin-bottom: 12px;
        }

        .stat-value {
            color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 32px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: 0;
        }

        .stat-value.green {
            color: #86efac;
        }

        .stat-value.orange {
            color: #f5b841;
        }

        .stat-value.revenue {
            color: #f5b841;
            font-size: 32px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .menu-card {
            min-height: 165px;
            display: block;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 25px;
            transition: 0.2s ease;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            border-color: rgba(245, 184, 65, 0.40);
            background-color: #132936;
        }

        .menu-label {
            color: #f5b841;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .menu-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .menu-text {
            color: rgba(255, 255, 255, 0.68);
            font-size: 14px;
            line-height: 1.7;
        }

        .table-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            overflow: hidden;
        }

        .table-header {
            padding: 24px 26px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
        }

        .table-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 30px;
            font-weight: 500;
        }

        .table-link {
            color: #f5b841;
            font-size: 14px;
            font-weight: 700;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 920px;
        }

        thead {
            background-color: #071821;
        }

        th {
            padding: 15px 22px;
            text-align: left;
            color: rgba(255, 255, 255, 0.58);
            font-size: 13px;
            font-weight: 700;
        }

        td {
            padding: 16px 22px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.78);
            font-size: 14px;
            vertical-align: top;
        }

        .booking-code {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .booking-date {
            color: rgba(255, 255, 255, 0.48);
            font-size: 12px;
        }

        .ticket-main {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .ticket-sub {
            color: rgba(255, 255, 255, 0.50);
            font-size: 12px;
            line-height: 1.6;
        }

        .price {
            color: #f5b841;
            font-weight: 800;
            white-space: nowrap;
        }

        .badge {
            display: inline-flex;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 7px;
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

        .payment-type {
            color: rgba(255, 255, 255, 0.55);
            font-size: 12px;
        }

        .empty-row {
            padding: 38px;
            text-align: center;
            color: rgba(255, 255, 255, 0.58);
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 980px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-grid-secondary {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 38px;
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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .hero-card {
                padding: 26px 22px;
            }

            .hero-title {
                font-size: 32px;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
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

    <main class="dashboard-section">
        <div class="container">
            <section class="hero-card">
                <p class="eyebrow">
                    Dashboard Admin
                </p>

                <h1 class="hero-title">
                    Kelola Sistem Destigo
                </h1>

                <p class="hero-description">
                    Kelola data wisata, pantau pemesanan tiket, dan lihat ringkasan aktivitas sistem Destigo.
                </p>
            </section>

            <section class="stats-grid">
                <div class="stat-card">
                    <p class="stat-label">Negara</p>
                    <p class="stat-value">{{ $countryCount }}</p>
                </div>

                <div class="stat-card">
                    <p class="stat-label">Destinasi</p>
                    <p class="stat-value">{{ $destinationCount }}</p>
                </div>

                <div class="stat-card">
                    <p class="stat-label">Pemesanan</p>
                    <p class="stat-value">{{ $bookingCount }}</p>
                </div>

                <div class="stat-card">
                    <p class="stat-label">User</p>
                    <p class="stat-value">{{ $userCount }}</p>
                </div>
            </section>

            <section class="stats-grid-secondary">
                <div class="stat-card">
                    <p class="stat-label">Pembayaran Lunas</p>
                    <p class="stat-value green">{{ $paidBookingCount }}</p>
                </div>

                <div class="stat-card">
                    <p class="stat-label">Menunggu Pembayaran</p>
                    <p class="stat-value orange">{{ $pendingBookingCount }}</p>
                </div>

                <div class="stat-card">
                    <p class="stat-label">Total Pendapatan</p>
                    <p class="stat-value revenue">
                        Rp{{ number_format($totalRevenue, 0, ',', '.') }}
                    </p>
                </div>
            </section>

            <section class="menu-grid">
                <a href="{{ route('admin.countries.index') }}" class="menu-card">
                    <p class="menu-label">Data Negara</p>

                    <h2 class="menu-title">
                        Kelola Negara
                    </h2>

                    <p class="menu-text">
                        Tambah, ubah, dan hapus data negara tujuan wisata yang tersedia di Destigo.
                    </p>
                </a>

                <a href="{{ route('admin.destinations.index') }}" class="menu-card">
                    <p class="menu-label">Destinasi Wisata</p>

                    <h2 class="menu-title">
                        Kelola Destinasi
                    </h2>

                    <p class="menu-text">
                        Atur informasi destinasi, harga tiket, kuota, deskripsi, dan gambar wisata.
                    </p>
                </a>

                <a href="{{ route('admin.bookings.index') }}" class="menu-card">
                    <p class="menu-label">Pemesanan</p>

                    <h2 class="menu-title">
                        Data Pemesanan
                    </h2>

                    <p class="menu-text">
                        Lihat daftar pesanan, data pengunjung, status tiket, dan pembayaran pengguna.
                    </p>
                </a>
            </section>

            <section class="table-card">
                <div class="table-header">
                    <h2 class="table-title">
                        Pemesanan Terbaru
                    </h2>

                    <a href="{{ route('admin.bookings.index') }}" class="table-link">
                        Lihat Semua
                    </a>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>User</th>
                                <th>Destinasi</th>
                                <th>Tiket</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($latestBookings as $booking)
                                @php
                                    $adultQuantity = $booking->adult_ticket_quantity ?? 0;
                                    $childQuantity = $booking->child_ticket_quantity ?? 0;
                                    $totalQuantity = $booking->ticket_quantity ?? ($adultQuantity + $childQuantity);
                                @endphp

                                <tr>
                                    <td>
                                        <p class="booking-code">
                                            {{ $booking->booking_code }}
                                        </p>

                                        <p class="booking-date">
                                            {{ $booking->created_at->format('d-m-Y H:i') }}
                                        </p>
                                    </td>

                                    <td>
                                        {{ $booking->user->name }}
                                    </td>

                                    <td>
                                        {{ $booking->destination->name }}
                                    </td>

                                    <td>
                                        <p class="ticket-main">
                                            {{ $totalQuantity }} tiket
                                        </p>

                                        <p class="ticket-sub">
                                            Dewasa: {{ $adultQuantity }} <br>
                                            Anak-anak: {{ $childQuantity }}
                                        </p>
                                    </td>

                                    <td class="price">
                                        Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        @if ($booking->booking_status === 'aktif')
                                            <span class="badge badge-paid">
                                                Lunas
                                            </span>

                                            <p class="payment-type">
                                                {{ strtoupper($booking->payment?->payment_type ?? '-') }}
                                            </p>
                                        @else
                                            <span class="badge badge-pending">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-row">
                                        Belum ada data pemesanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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