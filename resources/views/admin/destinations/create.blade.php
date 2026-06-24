<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi - Destigo</title>

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

        .form-container {
            width: min(900px, calc(100% - 48px));
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
            color: rgba(255, 255, 255, 0.72);
            font-size: 15px;
            line-height: 1.8;
            max-width: 760px;
        }

        .form-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            padding: 30px;
        }

        .errors {
            margin-bottom: 22px;
            background-color: rgba(248, 113, 113, 0.13);
            border: 1px solid rgba(248, 113, 113, 0.40);
            color: #fca5a5;
            border-radius: 14px;
            padding: 15px 18px;
            font-size: 14px;
            line-height: 1.7;
        }

        .errors ul {
            padding-left: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
        }

        .input,
        .textarea,
        .select,
        .file-input {
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            background-color: #071821;
            color: #ffffff;
            font-size: 15px;
            outline: none;
            font-family: Arial, Helvetica, sans-serif;
        }

        .input,
        .select {
            height: 54px;
            padding: 0 16px;
        }

        .textarea {
            min-height: 140px;
            padding: 15px 16px;
            resize: vertical;
            line-height: 1.7;
        }

        .file-input {
            padding: 14px 16px;
            cursor: pointer;
        }

        .input:focus,
        .textarea:focus,
        .select:focus,
        .file-input:focus {
            border-color: #f5b841;
        }

        .input::placeholder,
        .textarea::placeholder {
            color: rgba(255, 255, 255, 0.38);
        }

        .select option {
            background-color: #071821;
            color: #ffffff;
        }

        .file-help {
            margin-top: 8px;
            color: rgba(255, 255, 255, 0.54);
            font-size: 13px;
            line-height: 1.6;
        }

        .error-text {
            margin-top: 8px;
            color: #fca5a5;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 26px;
        }

        .submit-button,
        .back-button {
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 13px 22px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
        }

        .submit-button {
            background-color: #f5b841;
            color: #111f27;
        }

        .submit-button:hover {
            background-color: #ffc85a;
        }

        .back-button {
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: #ffffff;
        }

        .back-button:hover {
            border-color: #f5b841;
            color: #f5b841;
        }

        .footer {
            padding: 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 760px) {
            .container,
            .form-container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 36px;
            }

            .form-card {
                padding: 24px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .submit-button,
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
        <div class="form-container">
            <div class="page-header">
                <p class="eyebrow">
                    Data Destinasi
                </p>

                <h1 class="page-title">
                    Tambah Destinasi
                </h1>

                <p class="page-description">
                    Tambahkan destinasi wisata baru, lengkap dengan negara, lokasi, harga tiket, kuota, deskripsi, dan gambar.
                </p>
            </div>

            <section class="form-card">
                @if ($errors->any())
                    <div class="errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.destinations.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="country_id" class="form-label">
                                Negara
                            </label>

                            <select name="country_id"
                                    id="country_id"
                                    class="select"
                                    required>
                                <option value="">
                                    Pilih Negara
                                </option>

                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('country_id')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Destinasi
                            </label>

                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Contoh: Tokyo Disneyland"
                                   class="input"
                                   required>

                            @error('name')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="location" class="form-label">
                                Lokasi
                            </label>

                            <input type="text"
                                   id="location"
                                   name="location"
                                   value="{{ old('location') }}"
                                   placeholder="Contoh: Urayasu, Chiba, Jepang"
                                   class="input"
                                   required>

                            @error('location')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="adult_price" class="form-label">
                                Harga Dewasa
                            </label>

                            <input type="number"
                                   id="adult_price"
                                   name="adult_price"
                                   value="{{ old('adult_price') }}"
                                   min="0"
                                   step="1"
                                   placeholder="Contoh: 79000"
                                   class="input"
                                   required>

                            @error('adult_price')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="child_price" class="form-label">
                                Harga Anak-anak
                            </label>

                            <input type="number"
                                   id="child_price"
                                   name="child_price"
                                   value="{{ old('child_price') }}"
                                   min="0"
                                   step="1"
                                   placeholder="Contoh: 55000"
                                   class="input"
                                   required>

                            @error('child_price')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quota" class="form-label">
                                Kuota Tiket
                            </label>

                            <input type="number"
                                   id="quota"
                                   name="quota"
                                   value="{{ old('quota') }}"
                                   min="0"
                                   step="1"
                                   placeholder="Contoh: 50"
                                   class="input"
                                   required>

                            @error('quota')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">
                                Gambar Destinasi
                            </label>

                            <input type="file"
                                   id="image"
                                   name="image"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   class="file-input">

                            <p class="file-help">
                                Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            </p>

                            @error('image')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="description" class="form-label">
                                Deskripsi
                            </label>

                            <textarea id="description"
                                      name="description"
                                      rows="5"
                                      placeholder="Tulis deskripsi destinasi wisata"
                                      class="textarea"
                                      required>{{ old('description') }}</textarea>

                            @error('description')
                                <p class="error-text">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-button">
                            Simpan Destinasi
                        </button>

                        <a href="{{ route('admin.destinations.index') }}" class="back-button">
                            Kembali
                        </a>
                    </div>
                </form>
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