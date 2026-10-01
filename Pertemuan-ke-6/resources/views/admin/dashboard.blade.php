<x-app-layout>
    <x-slot name="header">
        <h1 style="margin:0;font-size:2.8rem;font-weight:800;color:#0f172a;">Dashboard</h1>
    </x-slot>

    <div style="display:grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; margin-top: 12px;">
        <div style="background: linear-gradient(135deg, #113d35, #194b41); color:white; border-radius:18px; padding:22px; min-height:220px;">
            <div style="font-size:14px; font-weight:700; opacity:.85; margin-bottom:12px;">Pemasukan Hari Ini</div>
            <div style="font-size:14px; opacity:.9; margin-bottom:10px;">{{ now()->format('d/m/Y') }}</div>
            <div style="font-size:2.2rem; line-height:1.2; font-weight:800; margin-bottom:18px;">Rp {{ number_format((float) $todayRevenue, 0, ',', '.') }}</div>
            <div style="font-size:14px; opacity:.9;">{{ number_format($todayTransactionCount) }} transaksi selesai</div>
        </div>

        <div style="background:white; border:1px solid #e5e7eb; border-radius:18px; padding:22px; min-height:220px;">
            <div style="font-size:14px; font-weight:700; color:#6b7280; margin-bottom:12px;">Pemasukan Bulan Ini</div>
            <div style="font-size:2.2rem; font-weight:800; color:#111827;">Rp {{ number_format((float) $monthRevenue, 0, ',', '.') }}</div>
            <div style="margin-top:12px; color:#6b7280; font-weight:600;">Akumulasi transaksi selesai</div>
        </div>

        <div style="background:white; border:1px solid #e5e7eb; border-radius:18px; padding:22px; min-height:220px;">
            <div style="font-size:14px; font-weight:700; color:#6b7280; margin-bottom:12px;">Transaksi Hari Ini</div>
            <div style="font-size:2.2rem; font-weight:800; color:#111827;">{{ number_format($todayTransactionCount) }}</div>
            <div style="margin-top:12px; color:#6b7280; font-weight:600;">Pembayaran kasir berhasil</div>
        </div>
    </div>
</x-app-layout>
