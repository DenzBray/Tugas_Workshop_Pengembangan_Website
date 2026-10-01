<style>
    .spark-shell {
        display: flex;
        min-height: 100vh;
        background: #edf2f0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .spark-sidebar {
        width: 280px;
        background: linear-gradient(180deg, #0d362e 0%, #123f35 100%);
        color: #edf7f3;
        padding: 24px 18px 18px;
        display: flex;
        flex-direction: column;
    }

    .spark-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 2rem;
        font-weight: 800;
        margin: 8px 8px 24px;
    }

    .spark-brand-mark {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        background: rgba(255,255,255,0.16);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .spark-nav-group {
        margin-top: 18px;
        font-size: 12px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(237, 247, 243, 0.72);
        padding: 0 10px;
    }

    .spark-nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: 10px;
        color: rgba(255,255,255,0.82);
        text-decoration: none;
        font-weight: 600;
        margin-top: 10px;
        transition: all 0.2s ease;
    }

    .spark-nav-link:hover,
    .spark-nav-link.active {
        background: rgba(255,255,255,0.08);
        color: #ffffff;
        box-shadow: inset 0 0 0 1px rgba(255,255,255,0.08);
    }

    .spark-profile-box {
        margin-top: auto;
        border-top: 1px solid rgba(255,255,255,0.12);
        padding-top: 16px;
    }

    .spark-profile {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 10px;
        border-radius: 12px;
        background: rgba(255,255,255,0.04);
    }

    .spark-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, #d6d9d2, #4c2e2b);
        color: white;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .spark-profile-name {
        font-weight: 700;
        display: block;
    }

    .spark-profile-email {
        display: block;
        color: rgba(255,255,255,0.72);
        font-size: 12px;
    }

    .spark-logout-wrap {
        margin-top: 14px;
    }

    .spark-logout {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        border: 1px solid rgba(255,255,255,0.12);
        background: rgba(255,255,255,0.04);
        color: #fff;
        border-radius: 10px;
        padding: 10px 12px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
    }

    .spark-main {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    .spark-topbar {
        background: rgba(255,255,255,0.8);
        border-bottom: 1px solid #dfe7e4;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 16px;
    }

    .spark-topbar-right {
        display: flex;
        align-items: center;
    }

    .spark-user-pill {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f3f6f5;
        border: 1px solid #dfe7e4;
        border-radius: 999px;
        padding: 6px 10px 6px 6px;
        font-weight: 700;
    }

    .spark-page {
        padding: 26px 28px 32px;
    }

    .spark-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .spark-page-header h1 {
        margin: 0;
        font-size: 2.4rem;
        font-weight: 800;
        color: #0f172a;
    }

    .spark-date-chip {
        background: white;
        border: 1px solid #dfe7e4;
        border-radius: 12px;
        padding: 10px 16px;
        color: #374151;
        font-weight: 600;
    }

    .spark-card-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
        margin-top: 18px;
    }

    .spark-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 20px;
        box-shadow: 0 8px 18px rgba(15, 23, 42, 0.04);
    }

    .spark-card.highlight {
        background: linear-gradient(135deg, #0d3d2f, #123f35 70%);
        color: white;
    }

    .spark-card-label {
        font-size: 14px;
        opacity: 0.85;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .spark-stat {
        font-size: 3rem;
        font-weight: 800;
        letter-spacing: -0.04em;
    }

    .spark-stat small {
        font-size: 1.1rem;
        font-weight: 700;
    }

    .spark-positive {
        color: #16a34a;
    }

    .spark-negative {
        color: #ef4444;
    }

    @media (max-width: 1024px) {
        .spark-shell { flex-direction: column; }
        .spark-sidebar { width: 100%; }
        .spark-card-grid { grid-template-columns: 1fr; }
        .spark-page-header { flex-direction: column; align-items: flex-start; }
    }
</style>

<nav class="spark-shell" x-data="{ open: false }">
    <aside class="spark-sidebar">
        <div class="spark-brand">
            <span class="spark-brand-mark">✦</span>
            <span>KosMarket</span>
        </div>

        <div class="spark-nav-group">Menu</div>

        <a href="{{ route('dashboard') }}" class="spark-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        @if (Auth::check() && Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="spark-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Admin Dashboard
            </a>
            <a href="{{ route('products.index') }}" class="spark-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                Products
            </a>
        @elseif (Auth::check() && Auth::user()->role === 'kasir')
            <a href="{{ route('kasir.dashboard') }}" class="spark-nav-link {{ request()->routeIs('kasir.dashboard') ? 'active' : '' }}">
                Kasir Dashboard
            </a>
            <a href="{{ route('kasir.pos') }}" class="spark-nav-link {{ request()->routeIs('kasir.pos') ? 'active' : '' }}">
                Transaksi
            </a>
        @endif

        <div class="spark-profile-box">
            <div class="spark-profile">
                <div class="spark-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div>
                    <span class="spark-profile-name">{{ Auth::user()->name }}</span>
                    <span class="spark-profile-email">{{ Auth::user()->email }}</span>
                </div>
            </div>

            <div class="spark-logout-wrap">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="spark-logout">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <div class="spark-main">
        <header class="spark-topbar">
            <div class="spark-topbar-right">
                <div class="spark-user-pill">
                    <div class="spark-avatar" style="width:32px;height:32px;font-size:12px;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </div>
        </header>

        <main class="spark-page">
            @isset($header)
                <div class="spark-page-header">
                    <div>
                        {{ $header }}
                    </div>
                    <div class="spark-date-chip">January 12, 2026 — January 23, 2026</div>
                </div>
            @endisset

            {{ $slot }}
        </main>
    </div>
</nav>
