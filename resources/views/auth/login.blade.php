<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Destigo</title>

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
            max-width: 470px;
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

        .status-message {
            margin-bottom: 18px;
            padding: 14px 16px;
            background-color: rgba(34, 197, 94, 0.14);
            border: 1px solid rgba(34, 197, 94, 0.42);
            color: #86efac;
            border-radius: 14px;
            font-size: 14px;
            line-height: 1.6;
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

        .remember-row {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 2px;
            margin-bottom: 22px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
        }

        .remember-row input {
            width: 15px;
            height: 15px;
            accent-color: #f5b841;
        }

        .auth-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
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

        .left-links {
            display: grid;
            gap: 8px;
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

            .left-links {
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

                <a href="{{ route('register') }}" class="nav-link">
                    Daftar
                </a>
            </div>
        </nav>

        <main class="auth-section">
            <div class="auth-card">
                <div class="auth-header">
                    <p class="eyebrow">
                        Masuk Akun
                    </p>

                    <h1 class="auth-title">
                        Masuk Destigo
                    </h1>

                    <p class="auth-description">
                        Masuk untuk melihat destinasi wisata, melakukan pemesanan tiket, dan mengakses e-ticket.
                    </p>
                </div>

                @if (session('status'))
                    <div class="status-message">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

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
                            autofocus
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
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                        >

                        @error('password')
                            <p class="error-text">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <label for="remember_me" class="remember-row">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>Ingat saya</span>
                    </label>

                    <div class="auth-actions">
                        <div class="left-links">
                            @if (Route::has('password.request'))
                                <a class="auth-link" href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif

                            <a class="auth-link" href="{{ route('register') }}">
                                Belum punya akun?
                            </a>
                        </div>

                        <button type="submit" class="submit-button">
                            Masuk
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