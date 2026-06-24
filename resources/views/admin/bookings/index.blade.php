<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan - Destigo</title>

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

        .success-alert {
            margin-bottom: 22px;
            padding: 15px 18px;
            background-color: rgba(34, 197, 94, 0.14);
            border: 1px solid rgba(34, 197, 94, 0.42);
            color: #86efac;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 600;
        }

        .table-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            overflow: hidden;
        }

        .table-top {
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

        .table-count {
            color: #f5b841;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1120px;
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

        th:last-child {
            text-align: center;
        }

        td {
            padding: 17px 22px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.78);
            font-size: 14px;
            vertical-align: top;
        }

        .number {
            color: rgba(255, 255, 255, 0.62);
            font-weight: 700;
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

        .user-name,
        .destination-name {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .user-email,
        .country-name {
            color: rgba(255, 255, 255, 0.48);
            font-size: 12px;
            line-height: 1.5;
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

        .payment-type {
            color: rgba(255, 255, 255, 0.55);
            font-size: 12px;
        }

        .action-group {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
        }

        .detail-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 15px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            background-color: rgba(245, 184, 65, 0.14);
            border: 1px solid rgba(245, 184, 65, 0.40);
            color: #f5b841;
        }

        .detail-button:hover {
            background-color: rgba(245, 184, 65, 0.22);
        }

        .empty-row {
            padding: 42px;
            text-align: center;
            color: rgba(255, 255, 255, 0.58);
            font-size: 14px;
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 760px) {
            .container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner,
            .page-header,
            .table-top {
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

    <main class="page-section">
        <div class="container">
            <div class="page-header">
                <div>
                    <p class="eyebrow">
                        Data Pemesanan
                    </p>

                    <h1 class="page-title">
                        Pemesanan User
                    </h1>

                    <p class="page-description">
                        Lihat daftar pemesanan tiket wisata, detail user, destinasi, jumlah tiket, total pembayaran, dan status transaksi.
                    </p>
                </div>

                <a href="{{ route('admin.dashboard') }}" class="back-button">
                    Dashboard Admin
                </a>
            </div>

            @if (session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <section class="table-card">
                <div class="table-top">
                    <h2 class="table-title">
                        Daftar Pemesanan
                    </h2>

                    <p class="table-count">
                        {{ $bookings->count() }} pemesanan
                    </p>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>User</th>
                                <th>Destinasi</th>
                                <th>Tiket</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($bookings as $booking)
                                @php
                                    $adultQuantity = $booking->adult_ticket_quantity ?? 0;
                                    $childQuantity = $booking->child_ticket_quantity ?? 0;
                                    $totalQuantity = $booking->ticket_quantity ?? ($adultQuantity + $childQuantity);

                                    $statusText = match ($booking->booking_status) {
                                        'aktif' => 'Lunas',
                                        'menunggu_pembayaran' => 'Menunggu',
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

                                <tr>
                                    <td class="number">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <p class="booking-code">
                                            {{ $booking->booking_code }}
                                        </p>

                                        <p class="booking-date">
                                            {{ $booking->created_at->format('d-m-Y H:i') }}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="user-name">
                                            {{ $booking->user->name }}
                                        </p>

                                        <p class="user-email">
                                            {{ $booking->user->email }}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="destination-name">
                                            {{ $booking->destination->name }}
                                        </p>

                                        <p class="country-name">
                                            {{ $booking->destination->country->name }}
                                        </p>
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
                                        <span class="badge {{ $statusClass }}">
                                            {{ $statusText }}
                                        </span>

                                        <p class="payment-type">
                                            {{ strtoupper($booking->payment?->payment_type ?? '-') }}
                                        </p>
                                    </td>

                                    <td>
                                        <div class="action-group">
                                            <a href="{{ route('admin.bookings.show', $booking) }}" class="detail-button">
                                                Detail
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="empty-row">
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