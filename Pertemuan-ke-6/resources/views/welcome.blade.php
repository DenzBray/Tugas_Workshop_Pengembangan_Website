<x-guest-layout>
    @push('css')
        <style>
            .welcome-page {
                width: min(100%, 1320px);
                margin: 0 auto;
            }

            .welcome-hero {
                display: grid;
                grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
                min-height: 500px;
                background: #ffffff;
                border: 1px solid #dfe7e4;
                border-radius: 12px;
                overflow: hidden;
            }

            .welcome-copy {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: center;
                padding: 56px clamp(28px, 5vw, 76px);
            }

            .welcome-kicker {
                display: flex;
                align-items: center;
                gap: 9px;
                margin: 0 0 22px;
                color: #38675d;
                font-size: 12px;
                font-weight: 800;
                text-transform: uppercase;
            }

            .welcome-kicker-mark {
                display: inline-block;
                width: 9px;
                height: 9px;
                border-radius: 50%;
                background: #e6a847;
            }

            .welcome-copy h1 {
                margin: 0;
                color: #103d34;
                font-size: 60px;
                line-height: 1;
                font-weight: 800;
            }

            .welcome-copy p:not(.welcome-kicker) {
                max-width: 440px;
                margin: 22px 0 30px;
                color: #5e6c68;
                font-size: 17px;
                line-height: 1.7;
            }

            .welcome-cta {
                display: inline-flex;
                align-items: center;
                gap: 18px;
                min-height: 50px;
                padding: 0 20px;
                border-radius: 7px;
                background: #174b40;
                color: #ffffff;
                font-size: 15px;
                font-weight: 700;
                text-decoration: none;
                transition: background 160ms ease, transform 160ms ease;
            }

            .welcome-cta:hover {
                background: #0d382f;
                transform: translateY(-1px);
            }

            .welcome-cta span {
                font-size: 20px;
                line-height: 1;
            }

            .welcome-visual {
                position: relative;
                min-height: 360px;
                background: #d9e3d8;
            }

            .welcome-visual img {
                position: absolute;
                width: 100%;
                height: 100%;
                inset: 0;
                object-fit: cover;
            }

            .welcome-visual::after {
                position: absolute;
                content: '';
                inset: 45% 0 0;
                background: linear-gradient(transparent, rgba(12, 39, 32, 0.62));
            }

            .welcome-visual-caption {
                position: absolute;
                z-index: 1;
                right: 26px;
                bottom: 26px;
                left: 26px;
                display: flex;
                align-items: center;
                gap: 14px;
                color: #ffffff;
            }

            .welcome-visual-caption strong {
                display: block;
                font-size: 18px;
            }

            .welcome-visual-caption span {
                display: block;
                margin-top: 4px;
                color: rgba(255, 255, 255, 0.8);
                font-size: 13px;
            }

            .welcome-visual-caption .welcome-visual-index {
                display: grid;
                place-items: center;
                flex: 0 0 42px;
                width: 42px;
                height: 42px;
                margin: 0;
                border: 1px solid rgba(255, 255, 255, 0.55);
                border-radius: 50%;
                color: #ffffff;
                font-size: 12px;
            }

            .welcome-services {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                margin-top: 24px;
                border-top: 1px solid #d5dfdb;
                border-bottom: 1px solid #d5dfdb;
            }

            .welcome-service {
                display: flex;
                align-items: center;
                gap: 14px;
                min-height: 84px;
                padding: 14px 22px;
                color: #21483f;
            }

            .welcome-service + .welcome-service {
                border-left: 1px solid #d5dfdb;
            }

            .welcome-service span {
                color: #a27635;
                font-size: 12px;
                font-weight: 800;
            }

            .welcome-service strong {
                font-size: 14px;
            }

            @media (max-width: 760px) {
                .welcome-hero {
                    grid-template-columns: 1fr;
                }

                .welcome-copy {
                    padding: 44px 28px;
                }

                .welcome-copy h1 {
                    font-size: 44px;
                }

                .welcome-visual {
                    min-height: 280px;
                }

                .welcome-services {
                    grid-template-columns: 1fr;
                }

                .welcome-service {
                    min-height: 64px;
                }

                .welcome-service + .welcome-service {
                    border-top: 1px solid #d5dfdb;
                    border-left: 0;
                }
            }
        </style>
    @endpush

    <div class="welcome-page">
        <section class="welcome-hero">
            <div class="welcome-copy">
                <p class="welcome-kicker"><span class="welcome-kicker-mark"></span> SISTEM TOKO RETAIL</p>
                <h1>KosMarket</h1>
                <p>Operasional toko dalam satu tempat, dari transaksi kasir hingga pengelolaan produk.</p>
                @auth
                    <a class="welcome-cta" href="{{ url('/dashboard') }}">Buka dashboard <span aria-hidden="true">&rarr;</span></a>
                @else
                    <a class="welcome-cta" href="{{ route('login') }}">Masuk ke sistem <span aria-hidden="true">&rarr;</span></a>
                @endauth
            </div>

            <div class="welcome-visual">
                <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1600&q=85" alt="Aneka bahan segar di toko retail">
                <div class="welcome-visual-caption">
                    <span class="welcome-visual-index">01</span>
                    <div>
                        <strong>Aktivitas toko lebih tertata</strong>
                        <span>Penjualan dan produk, terhubung dalam satu alur.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="welcome-services" aria-label="Layanan KosMarket">
            <div class="welcome-service"><span>01</span><strong>Transaksi kasir</strong></div>
            <div class="welcome-service"><span>02</span><strong>Pengelolaan produk</strong></div>
            <div class="welcome-service"><span>03</span><strong>Pencatatan penjualan</strong></div>
        </section>
    </div>
</x-guest-layout>
