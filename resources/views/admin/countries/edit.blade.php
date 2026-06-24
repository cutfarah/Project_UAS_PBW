<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Negara - Destigo</title>

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
            width: min(780px, calc(100% - 48px));
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
        }

        .form-card {
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 22px;
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

        .input {
            height: 54px;
            padding: 0 16px;
        }

        .textarea {
            min-height: 130px;
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
        .file-input:focus {
            border-color: #f5b841;
        }

        .input::placeholder,
        .textarea::placeholder {
            color: rgba(255, 255, 255, 0.38);
        }

        .current-image-box {
            margin-bottom: 14px;
            background-color: #071821;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 14px;
            width: fit-content;
        }

        .current-image {
            width: 220px;
            height: 135px;
            object-fit: cover;
            border-radius: 12px;
            display: block;
        }

        .current-image-label {
            margin-top: 10px;
            color: rgba(255, 255, 255, 0.58);
            font-size: 13px;
        }

        .image-empty {
            width: 220px;
            height: 135px;
            border-radius: 12px;
            background-color: #10222d;
            color: rgba(255, 255, 255, 0.50);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 13px;
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

        @media (max-width: 620px) {
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

            .submit-button,
            .back-button {
                width: 100%;
            }

            .current-image,
            .image-empty {
                width: 100%;
                max-width: 260px;
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
                    Data Negara
                </p>

                <h1 class="page-title">
                    Edit Negara
                </h1>

                <p class="page-description">
                    Perbarui nama, deskripsi, atau gambar negara tujuan wisata pada sistem Destigo.
                </p>
            </div>

            <section class="form-card">
                <form action="{{ route('admin.countries.update', $country) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="form-label">
                            Nama Negara
                        </label>

                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name', $country->name) }}"
                               placeholder="Contoh: Indonesia"
                               class="input">

                        @error('name')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">
                            Deskripsi
                        </label>

                        <textarea id="description"
                                  name="description"
                                  rows="4"
                                  placeholder="Tulis deskripsi singkat negara"
                                  class="textarea">{{ old('description', $country->description) }}</textarea>

                        @error('description')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">
                            Gambar Negara
                        </label>

                        <div class="current-image-box">
                            @if ($country->image)
                                <img src="{{ asset('storage/' . $country->image) }}"
                                     alt="{{ $country->name }}"
                                     class="current-image">

                                <p class="current-image-label">
                                    Gambar saat ini
                                </p>
                            @else
                                <div class="image-empty">
                                    Gambar belum tersedia
                                </div>
                            @endif
                        </div>

                        <input type="file"
                               id="image"
                               name="image"
                               accept=".jpg,.jpeg,.png,.webp"
                               class="file-input">

                        <p class="file-help">
                            Kosongkan jika tidak ingin mengganti gambar. Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </p>

                        @error('image')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-button">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.countries.index') }}" class="back-button">
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