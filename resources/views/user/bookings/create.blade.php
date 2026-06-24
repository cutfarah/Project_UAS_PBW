<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan {{ $destination->name }} - Destigo</title>

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

        .page-grid {
            display: grid;
            grid-template-columns: 0.95fr 1.25fr;
            gap: 38px;
            align-items: start;
        }

        .destination-card {
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

        .destination-body {
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

        .price-list {
            display: grid;
            gap: 18px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
        }

        .price-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.78);
        }

        .price-value {
            font-size: 23px;
            font-weight: 700;
            color: #f5b841;
            white-space: nowrap;
        }

        .quota-value {
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            white-space: nowrap;
        }

        .booking-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            padding: 34px 34px 36px;
        }

        .form-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 40px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .form-description {
            color: rgba(255, 255, 255, 0.83);
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 26px;
            max-width: 760px;
        }

        .age-box {
            background-color: rgba(245, 184, 65, 0.08);
            border: 1px solid rgba(245, 184, 65, 0.35);
            border-radius: 14px;
            padding: 18px 18px;
            margin-bottom: 28px;
        }

        .age-box strong {
            display: block;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .age-box p {
            color: rgba(255, 255, 255, 0.82);
            font-size: 14px;
            line-height: 1.7;
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

        .top-fields {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 18px;
            margin-bottom: 32px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .field-group label {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
        }

        .input {
            width: 100%;
            height: 54px;
            padding: 0 16px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background-color: #071821;
            color: #ffffff;
            font-size: 16px;
            outline: none;
        }

        .input:focus {
            border-color: #f5b841;
        }

        .input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            opacity: 0.85;
            cursor: pointer;
        }

        .input[type="date"]::-webkit-calendar-picker-indicator:hover {
            opacity: 1;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .visitor-group {
            margin-bottom: 26px;
        }

        .visitor-title {
            color: #f5b841;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .visitor-inputs {
            display: grid;
            gap: 14px;
        }

        .visitor-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.80);
            margin-bottom: 8px;
            display: block;
        }

        .empty-note {
            color: rgba(255, 255, 255, 0.58);
            font-size: 14px;
        }

        .summary-box {
            margin-top: 10px;
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

        .summary-label {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.90);
        }

        .summary-value {
            font-size: 25px;
            color: #f5b841;
            font-weight: 700;
            white-space: nowrap;
        }

        .submit-button {
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

        .submit-button:hover {
            background-color: #ffc85a;
        }

        @media (max-width: 1024px) {
            .page-grid {
                grid-template-columns: 1fr;
            }

            .destination-image,
            .destination-empty {
                height: 260px;
            }
        }

        @media (max-width: 760px) {
            .container,
            .page-container {
                width: min(100% - 30px, 1220px);
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .top-fields {
                grid-template-columns: 1fr;
            }

            .summary-box {
                flex-direction: column;
                align-items: flex-start;
            }

            .booking-card {
                padding: 24px 20px 26px;
            }

            .form-title {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
    @php
        $adultPrice = $destination->adult_price ?? $destination->price ?? 0;
        $childPrice = $destination->child_price ?? round(($destination->price ?? 0) * 0.75);

        $oldAdultQuantity = old('adult_ticket_quantity', 1);
        $oldChildQuantity = old('child_ticket_quantity', 0);

        $oldAdultVisitorNames = old('adult_visitor_names', []);
        $oldChildVisitorNames = old('child_visitor_names', []);
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('user.dashboard') }}" class="brand">
                Desti<span>go</span>
            </a>

            <div class="nav-right">
                <a href="{{ route('destinations.show', ['destination' => $destination->slug]) }}" class="nav-link">
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
            <div class="page-grid">
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

                        <div class="price-list">
                            <div class="price-row">
                                <span class="price-label">
                                    Harga dewasa
                                </span>

                                <span class="price-value">
                                    Rp{{ number_format($adultPrice, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="price-row">
                                <span class="price-label">
                                    Harga anak-anak
                                </span>

                                <span class="price-value">
                                    Rp{{ number_format($childPrice, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="price-row">
                                <span class="price-label">
                                    Kuota tersedia
                                </span>

                                <span class="quota-value">
                                    {{ $destination->quota }} tiket
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="booking-card">
                    <h1 class="form-title">
                        Pesan Tiket
                    </h1>

                    <p class="form-description">
                        Tentukan tanggal kunjungan, jumlah tiket dewasa dan anak-anak, lalu isi nama pengunjung sesuai kategori tiket.
                    </p>

                    <div class="age-box">
                        <strong>Kategori usia:</strong>
                        <p>Dewasa untuk usia 13 tahun ke atas.</p>
                        <p>Anak-anak untuk usia 3 sampai 12 tahun.</p>
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

                    <form action="{{ route('bookings.store', ['destination' => $destination->slug]) }}"
                          method="POST"
                          id="booking-form">
                        @csrf

                        <div class="top-fields">
                            <div class="field-group">
                                <label for="visit_date">
                                    Tanggal Kunjungan
                                </label>

                                <input
                                    type="date"
                                    id="visit_date"
                                    name="visit_date"
                                    class="input"
                                    value="{{ old('visit_date') }}"
                                    required
                                >
                            </div>

                            <div class="field-group">
                                <label for="adult_ticket_quantity">
                                    Tiket Dewasa
                                </label>

                                <input
                                    type="number"
                                    id="adult_ticket_quantity"
                                    name="adult_ticket_quantity"
                                    class="input"
                                    min="0"
                                    max="{{ $destination->quota }}"
                                    value="{{ $oldAdultQuantity }}"
                                    required
                                >
                            </div>

                            <div class="field-group">
                                <label for="child_ticket_quantity">
                                    Tiket Anak-anak
                                </label>

                                <input
                                    type="number"
                                    id="child_ticket_quantity"
                                    name="child_ticket_quantity"
                                    class="input"
                                    min="0"
                                    max="{{ $destination->quota }}"
                                    value="{{ $oldChildQuantity }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="section-title">
                            Data Pengunjung
                        </div>

                        <div class="visitor-group">
                            <div class="visitor-title">
                                Pengunjung Dewasa
                            </div>

                            <div id="adult-inputs" class="visitor-inputs"></div>
                        </div>

                        <div class="visitor-group">
                            <div class="visitor-title">
                                Pengunjung Anak-anak
                            </div>

                            <div id="child-inputs" class="visitor-inputs"></div>
                        </div>

                        <div class="summary-box">
                            <span class="summary-label">
                                Total Pembayaran
                            </span>

                            <span class="summary-value" id="total-payment">
                                Rp{{ number_format(($oldAdultQuantity * $adultPrice) + ($oldChildQuantity * $childPrice), 0, ',', '.') }}
                            </span>
                        </div>

                        <button type="submit" class="submit-button">
                            Lanjut ke Pembayaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        const adultPrice = {{ (int) $adultPrice }};
        const childPrice = {{ (int) $childPrice }};

        const bookingForm = document.getElementById('booking-form');
        const adultQuantityInput = document.getElementById('adult_ticket_quantity');
        const childQuantityInput = document.getElementById('child_ticket_quantity');
        const adultInputsContainer = document.getElementById('adult-inputs');
        const childInputsContainer = document.getElementById('child-inputs');
        const totalPayment = document.getElementById('total-payment');

        const oldAdultVisitorNames = @json(array_values($oldAdultVisitorNames));
        const oldChildVisitorNames = @json(array_values($oldChildVisitorNames));

        function formatRupiah(number) {
            return 'Rp' + number.toLocaleString('id-ID');
        }

        function getAdultQuantity() {
            return parseInt(adultQuantityInput.value) || 0;
        }

        function getChildQuantity() {
            return parseInt(childQuantityInput.value) || 0;
        }

        function renderAdultInputs() {
            const count = getAdultQuantity();
            adultInputsContainer.innerHTML = '';

            if (count <= 0) {
                adultInputsContainer.innerHTML = '<p class="empty-note">Tidak ada tiket dewasa dipilih.</p>';
                return;
            }

            for (let i = 0; i < count; i++) {
                const wrapper = document.createElement('div');

                wrapper.innerHTML = `
                    <label for="adult_visitor_names_${i}" class="visitor-label">
                        Nama Pengunjung Dewasa ${i + 1}
                    </label>

                    <input
                        type="text"
                        id="adult_visitor_names_${i}"
                        name="adult_visitor_names[]"
                        class="input"
                        placeholder="Masukkan nama pengunjung dewasa ${i + 1}"
                        value="${oldAdultVisitorNames[i] ?? ''}"
                        required
                    >
                `;

                adultInputsContainer.appendChild(wrapper);
            }
        }

        function renderChildInputs() {
            const count = getChildQuantity();
            childInputsContainer.innerHTML = '';

            if (count <= 0) {
                childInputsContainer.innerHTML = '<p class="empty-note">Tidak ada tiket anak-anak dipilih.</p>';
                return;
            }

            for (let i = 0; i < count; i++) {
                const wrapper = document.createElement('div');

                wrapper.innerHTML = `
                    <label for="child_visitor_names_${i}" class="visitor-label">
                        Nama Pengunjung Anak-anak ${i + 1}
                    </label>

                    <input
                        type="text"
                        id="child_visitor_names_${i}"
                        name="child_visitor_names[]"
                        class="input"
                        placeholder="Masukkan nama pengunjung anak-anak ${i + 1}"
                        value="${oldChildVisitorNames[i] ?? ''}"
                        required
                    >
                `;

                childInputsContainer.appendChild(wrapper);
            }
        }

        function updateTotal() {
            const adultQuantity = getAdultQuantity();
            const childQuantity = getChildQuantity();
            const total = (adultQuantity * adultPrice) + (childQuantity * childPrice);

            totalPayment.textContent = formatRupiah(total);
        }

        function refreshForm() {
            renderAdultInputs();
            renderChildInputs();
            updateTotal();
        }

        adultQuantityInput.addEventListener('input', refreshForm);
        childQuantityInput.addEventListener('input', refreshForm);

        bookingForm.addEventListener('submit', function () {
            if (adultQuantityInput.value === '') {
                adultQuantityInput.value = 0;
            }

            if (childQuantityInput.value === '') {
                childQuantityInput.value = 0;
            }
        });

        refreshForm();
    </script>
</body>
</html>