<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Destigo</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            color: #ffffff;
            background:
                linear-gradient(90deg, rgba(7, 17, 24, 0.95), rgba(7, 17, 24, 0.72)),
                linear-gradient(0deg, rgba(7, 17, 24, 0.96), rgba(7, 17, 24, 0.45)),
                url('/images/landing-bg.jpeg') center/cover no-repeat;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            padding: 28px 0;
        }

        .container {
            width: min(1180px, calc(100% - 48px));
            margin: 0 auto;
        }

        .navbar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 22px;
        }

        .brand {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .brand span {
            color: #f5b841;
        }

        .nav-link {
            border: 1px solid rgba(255, 255, 255, 0.45);
            padding: 11px 20px;
            border-radius: 28px;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.88);
        }

        .nav-link:hover {
            border-color: #f5b841;
            color: #f5b841;
        }

        .auth-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px 24px 70px;
        }

        .auth-card {
            width: 100%;
            max-width: 480px;
            background-color: #11232d;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 34px 32px 30px;
            box-shadow: 0 22px 45px rgba(0, 0, 0, 0.28);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 26px;
        }

        .eyebrow {
            color: #f5b841;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .auth-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 42px;
            font-weight: 500;
            line-height: 1.15;
            margin-bottom: 10px;
        }

        .auth-description {
            color: rgba(255, 255, 255, 0.74);
            font-size: 15px;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            height: 52px;
            border-radius: 13px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background-color: #071821;
            color: #ffffff;
            padding: 0 16px;
            font-size: 15px;
            outline: none;
            font-family: Arial, Helvetica, sans-serif;
        }

        .form-input:focus {
            border-color: #f5b841;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.38);
        }

        .error-text {
            margin-top: 8px;
            color: #fca5a5;
            font-size: 13px;
            line-height: 1.5;
        }

        .auth-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .auth-link {
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
            text-decoration: underline;
        }

        .auth-link:hover {
            color: #f5b841;
        }

        .submit-button {
            border: none;
            background-color: #f5b841;
            color: #111f27;
            padding: 14px 24px;
            border-radius: 13px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            min-width: 120px;
        }

        .submit-button:hover {
            background-color: #ffc85a;
        }

        .footer-text {
            text-align: center;
            padding: 0 20px 28px;
            color: rgba(255, 255, 255, 0.55);
            font-size: 13px;
        }

        @media (max-width: 640px) {
            .container {
                width: min(100% - 30px, 1180px);
            }

            .navbar-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .auth-section {
                padding-top: 18px;
            }

            .auth-card {
                padding: 28px 22px 24px;
                border-radius: 20px;
            }

            .auth-title {
                font-size: 34px;
            }

            .auth-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .submit-button {
                width: 100%;
            }

            .auth-link {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar">
            <div class="container navbar-inner">
                <a href="{{ route('home') }}" class="brand">
                    Desti<span>go</span>
                </a>

                <a href="{{ route('login') }}" class="nav-link">
                    Masuk
                </a>
            </div>
        </nav>

        <main class="auth-section">
            <div class="auth-card">
                <div class="auth-header">
                    <p class="eyebrow">
                        Buat Akun
                    </p>

                    <h1 class="auth-title">
                        Daftar Destigo
                    </h1>

                    <p class="auth-description">
                        Buat akun baru untuk mulai menjelajahi destinasi wisata dan melakukan pemesanan tiket.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">
                            Nama
                        </label>

                        <input
                            id="name"
                            class="form-input"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                        >

                        @error('name')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input
                            id="email"
                            class="form-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Masukkan email"
                        >

                        @error('email')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            Password
                        </label>

                        <input
                            id="password"
                            class="form-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Masukkan password"
                        >

                        @error('password')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            class="form-input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Ulangi password"
                        >

                        @error('password_confirmation')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="auth-actions">
                        <a class="auth-link" href="{{ route('login') }}">
                            Sudah punya akun?
                        </a>

                        <button type="submit" class="submit-button">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </main>

        <p class="footer-text">
            © 2026 Destigo. Sistem Pemesanan Tiket Destinasi Wisata.
        </p>
    </div>
</body>
</html>