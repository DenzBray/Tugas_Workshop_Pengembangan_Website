<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KosMarket') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('css')
    </head>
    <body>
        <div class="guest-shell">
            <header class="guest-topbar">
                <a class="guest-brand" href="{{ url('/') }}">
                    <span class="guest-brand-mark">K</span>
                    <span>KosMarket</span>
                </a>

                <nav class="guest-nav" aria-label="Navigasi utama">
                    @auth
                        <a class="guest-nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        @if (Route::has('login'))
                            <a class="guest-nav-link" href="{{ route('login') }}">Masuk</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="guest-nav-link guest-nav-primary" href="{{ route('register') }}">Daftar</a>
                        @endif
                    @endauth
                </nav>
            </header>

            <main class="guest-main">
                {{ $slot }}
            </main>

            <footer class="guest-footer">KosMarket <span>Retail management</span></footer>
        </div>

        <style>
            * { box-sizing: border-box; }

            body {
                margin: 0;
                min-width: 320px;
                min-height: 100vh;
                background: #edf2f0;
                color: #172a25;
                font-family: Arial, Helvetica, sans-serif;
            }

            .guest-shell {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            .guest-topbar {
                display: flex;
                min-height: 82px;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                padding: 14px clamp(20px, 5vw, 72px);
                border-bottom: 1px solid #dfe7e4;
                background: rgba(255, 255, 255, 0.92);
            }

            .guest-brand {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                color: #123f35;
                font-size: 22px;
                font-weight: 800;
                text-decoration: none;
            }

            .guest-brand-mark {
                display: grid;
                width: 36px;
                height: 36px;
                place-items: center;
                border-radius: 9px;
                background: #174b40;
                color: #ffffff;
                font-size: 18px;
            }

            .guest-nav {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .guest-nav-link {
                display: inline-flex;
                min-height: 42px;
                align-items: center;
                justify-content: center;
                padding: 0 16px;
                border-radius: 6px;
                color: #274a42;
                font-size: 14px;
                font-weight: 700;
                text-decoration: none;
            }

            .guest-nav-link:hover { background: #edf2f0; }

            .guest-nav-primary {
                border: 1px solid #174b40;
                background: #174b40;
                color: #ffffff;
            }

            .guest-nav-primary:hover {
                background: #0d382f;
                color: #ffffff;
            }

            .guest-main {
                display: flex;
                width: 100%;
                flex: 1;
                align-items: center;
                justify-content: center;
                padding: 42px clamp(20px, 5vw, 72px);
            }

            .guest-footer {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 18px clamp(20px, 5vw, 72px);
                color: #31584e;
                font-size: 12px;
                font-weight: 700;
            }

            .guest-footer span {
                color: #71817c;
                font-weight: 400;
            }

            .auth-panel {
                width: min(100%, 480px);
                padding: 34px;
                border: 1px solid #dfe7e4;
                border-radius: 10px;
                background: #ffffff;
                box-shadow: 0 16px 38px rgba(18, 63, 53, 0.08);
            }

            .auth-heading { margin-bottom: 26px; }

            .auth-eyebrow {
                margin: 0 0 9px;
                color: #52746b;
                font-size: 11px;
                font-weight: 800;
                text-transform: uppercase;
            }

            .auth-heading h1 {
                margin: 0;
                color: #123f35;
                font-size: 28px;
                font-weight: 800;
            }

            .auth-heading p:last-child {
                margin: 9px 0 0;
                color: #687873;
                font-size: 14px;
                line-height: 1.5;
            }

            .auth-field + .auth-field { margin-top: 18px; }

            .auth-label {
                display: block;
                margin-bottom: 7px;
                color: #263b35;
                font-size: 13px;
                font-weight: 700;
            }

            .auth-input {
                display: block;
                width: 100%;
                min-height: 46px;
                padding: 10px 12px;
                border: 1px solid #cbd7d2;
                border-radius: 6px;
                background: #fbfcfb;
                color: #172a25;
                font: inherit;
                font-size: 14px;
            }

            .auth-input:focus {
                border-color: #568477;
                outline: 3px solid rgba(86, 132, 119, 0.16);
            }

            .auth-options,
            .auth-actions {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 14px;
                margin-top: 20px;
            }

            .auth-remember {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: #53635e;
                font-size: 13px;
            }

            .auth-remember input { accent-color: #174b40; }

            .auth-link {
                color: #174b40;
                font-size: 13px;
                font-weight: 700;
                text-decoration: none;
            }

            .auth-link:hover { text-decoration: underline; }

            .auth-submit {
                min-height: 44px;
                padding: 0 20px;
                border: 0;
                border-radius: 6px;
                background: #174b40;
                color: #ffffff;
                font: inherit;
                font-size: 14px;
                font-weight: 700;
                cursor: pointer;
            }

            .auth-submit:hover { background: #0d382f; }

            .auth-status { margin-bottom: 18px; }

            @media (max-width: 560px) {
                .guest-topbar { min-height: 72px; }
                .guest-brand { font-size: 19px; }
                .guest-main { padding: 28px 16px; }
                .auth-panel { padding: 26px 20px; }
                .auth-options { align-items: flex-start; flex-direction: column; }
                .auth-actions { align-items: stretch; flex-direction: column-reverse; }
                .auth-submit { width: 100%; }
            }
        </style>
    </body>
</html>
