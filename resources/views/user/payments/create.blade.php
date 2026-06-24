<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Destigo</title>

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

        .payment-container {
            width: min(1220px, calc(100% - 48px));
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
            padding: 42px 0 80px;
        }

        .payment-grid {
            display: grid;
            grid-template-columns: 0.95fr 1.25fr;
            gap: 38px;
            align-items: start;
        }

        .summary-card,
        .payment-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            overflow: hidden;
        }

        .destination-image {
            width: 100%;
            height: 285px;
            object-fit: cover;
            display: block;
        }

        .destination-empty {
            height: 285px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #10222d;
            color: rgba(255, 255, 255, 0.55);
        }

        .summary-body {
            padding: 24px 26px 28px;
        }

        .country-label {
            color: #f5b841;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .destination-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .location {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.75);
            font-size: 14px;
            margin-bottom: 26px;
        }

        .summary-list {
            display: grid;
            gap: 17px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
        }

        .summary-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.78);
        }

        .summary-value {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            white-space: nowrap;
            text-align: right;
        }

        .summary-price {
            color: #f5b841;
            font-size: 24px;
            font-weight: 700;
            white-space: nowrap;
            text-align: right;
        }

        .payment-card {
            padding: 34px 34px 36px;
        }

        .payment-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 40px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .payment-description {
            color: rgba(255, 255, 255, 0.83);
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 28px;
            max-width: 760px;
        }

        .booking-code-box {
            background-color: rgba(245, 184, 65, 0.08);
            border: 1px solid rgba(245, 184, 65, 0.35);
            border-radius: 14px;
            padding: 18px 18px;
            margin-bottom: 28px;
        }

        .booking-code-label {
            color: rgba(255, 255, 255, 0.78);
            font-size: 14px;
            margin-bottom: 7px;
        }

        .booking-code-value {
            color: #f5b841;
            font-size: 18px;
            font-weight: 700;
        }

        .errors {
            margin-bottom: 22px;
            background-color: rgba(255, 99, 99, 0.12);
            border: 1px solid rgba(255, 99, 99, 0.35);
            border-radius: 14px;
            padding: 14px 16px;
        }

        .errors ul {
            margin-left: 18px;
        }

        .errors li {
            margin-bottom: 6px;
            color: #ffd4d4;
            font-size: 14px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 24px;
        }

        .field-group label {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 28px;
        }

        .method-card {
            position: relative;
        }

        .method-card input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .method-content {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 74px;
            padding: 16px;
            border-radius: 14px;
            background-color: #071821;
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.86);
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .method-card input:checked + .method-content {
            border-color: #f5b841;
            background-color: rgba(245, 184, 65, 0.10);
            color: #f5b841;
        }

        .total-box {
            background-color: rgba(245, 184, 65, 0.08);
            border: 1px solid rgba(245, 184, 65, 0.35);
            border-radius: 14px;
            padding: 22px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
        }

        .total-label {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.90);
        }

        .total-value {
            font-size: 28px;
            color: #f5b841;
            font-weight: 700;
            white-space: nowrap;
        }

        .pay-button {
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 13px;
            background-color: #f5b841;
            color: #111f27;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
        }

        .pay-button:hover {
            background-color: #ffc85a;
        }

        @media (max-width: 1024px) {
            .payment-grid {
                grid-template-columns: 1fr;
            }

            .destination-image,
            .destination-empty {
                height: 260px;
            }
        }

        @media (max-width: 760px) {
            .container,
            .payment-container {
                width: min(100% - 30px, 1220px);
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .payment-card {
                padding: 24px 20px 26px;
            }

            .payment-title {
                font-size: 32px;
            }

            .payment-methods {
                grid-template-columns: 1fr;
            }

            .total-box {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    @php
        $destination = $booking->destination;
        $paymentTotal = $booking->total_price ?? 0;
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('user.dashboard') }}" class="brand">
                Desti<span>go</span>
            </a>

            <div class="nav-right">
                <a href="{{ route('bookings.show', ['booking' => $booking->id]) }}" class="nav-link">
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
        <div class="payment-container">
            <div class="payment-grid">
                <div class="summary-card">
                    @if ($destination->image)
                        <img src="{{ asset('storage/' . $destination->image) }}"
                             alt="{{ $destination->name }}"
                             class="destination-image">
                    @else
                        <div class="destination-empty">
                            Gambar belum tersedia
                        </div>
                    @endif

                    <div class="summary-body">
                        <div class="country-label">
                            {{ $destination->country->name }}
                        </div>

                        <h2 class="destination-title">
                            {{ $destination->name }}
                        </h2>

                        <div class="location">
                            <span>📍</span>
                            <span>{{ $destination->location }}</span>
                        </div>

                        <div class="summary-list">
                            <div class="summary-row">
                                <span class="summary-label">
                                    Kode Booking
                                </span>

                                <span class="summary-value">
                                    {{ $booking->booking_code }}
                                </span>
                            </div>

                            <div class="summary-row">
                                <span class="summary-label">
                                    Tanggal Kunjungan
                                </span>

                                <span class="summary-value">
                                    {{ \Carbon\Carbon::parse($booking->visit_date)->format('d-m-Y') }}
                                </span>
                            </div>

                            @if (($booking->adult_ticket_quantity ?? 0) > 0)
                                <div class="summary-row">
                                    <span class="summary-label">
                                        Tiket Dewasa
                                    </span>

                                    <span class="summary-value">
                                        {{ $booking->adult_ticket_quantity }} tiket
                                    </span>
                                </div>
                            @endif

                            @if (($booking->child_ticket_quantity ?? 0) > 0)
                                <div class="summary-row">
                                    <span class="summary-label">
                                        Tiket Anak-anak
                                    </span>

                                    <span class="summary-value">
                                        {{ $booking->child_ticket_quantity }} tiket
                                    </span>
                                </div>
                            @endif

                            <div class="summary-row">
                                <span class="summary-label">
                                    Total Tiket
                                </span>

                                <span class="summary-value">
                                    {{ $booking->ticket_quantity ?? 0 }} tiket
                                </span>
                            </div>

                            <div class="summary-row">
                                <span class="summary-label">
                                    Total Pembayaran
                                </span>

                                <span class="summary-price">
                                    Rp{{ number_format($paymentTotal, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="payment-card">
                    <h1 class="payment-title">
                        Pembayaran
                    </h1>

                    <p class="payment-description">
                        Pilih metode pembayaran untuk menyelesaikan pemesanan tiket destinasi wisata.
                    </p>

                    <div class="booking-code-box">
                        <p class="booking-code-label">
                            Kode Booking
                        </p>

                        <p class="booking-code-value">
                            {{ $booking->booking_code }}
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="errors">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('payments.store', ['booking' => $booking->id]) }}" method="POST">
                        @csrf

                        <div class="field-group">
                            <label>
                                Metode Pembayaran
                            </label>

                            <div class="payment-methods">
                                <label class="method-card">
                                    <input type="radio"
                                           name="payment_method"
                                           value="DANA"
                                           {{ old('payment_method', 'DANA') === 'DANA' ? 'checked' : '' }}>
                                    <span class="method-content">
                                        DANA
                                    </span>
                                </label>

                                <label class="method-card">
                                    <input type="radio"
                                           name="payment_method"
                                           value="GoPay"
                                           {{ old('payment_method') === 'GoPay' ? 'checked' : '' }}>
                                    <span class="method-content">
                                        GoPay
                                    </span>
                                </label>

                                <label class="method-card">
                                    <input type="radio"
                                           name="payment_method"
                                           value="QRIS"
                                           {{ old('payment_method') === 'QRIS' ? 'checked' : '' }}>
                                    <span class="method-content">
                                        QRIS
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="total-box">
                            <span class="total-label">
                                Total Pembayaran
                            </span>

                            <span class="total-value">
                                Rp{{ number_format($paymentTotal, 0, ',', '.') }}
                            </span>
                        </div>

                        <button type="submit" class="pay-button">
                            Bayar Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>