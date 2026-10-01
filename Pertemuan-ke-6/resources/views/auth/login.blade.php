<x-guest-layout>
    <section class="auth-panel">
        <div class="auth-heading">
            <p class="auth-eyebrow">Area karyawan</p>
            <h1>Masuk ke KosMarket</h1>
            <p>Masuk untuk mengelola transaksi dan operasional toko.</p>
        </div>

        <x-auth-session-status class="auth-status" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="auth-field">
                <label class="auth-label" for="email">{{ __('Email') }}</label>
                <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="auth-field">
                <label class="auth-label" for="password">Kata sandi</label>
                <input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="auth-options">
                <label class="auth-remember" for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="auth-link" href="{{ route('password.request') }}">Lupa kata sandi?</a>
                @endif
            </div>

            <div class="auth-actions">
                <a class="auth-link" href="{{ url('/') }}">Kembali ke beranda</a>
                <button class="auth-submit" type="submit">Masuk</button>
            </div>
        </form>
    </section>
</x-guest-layout>
