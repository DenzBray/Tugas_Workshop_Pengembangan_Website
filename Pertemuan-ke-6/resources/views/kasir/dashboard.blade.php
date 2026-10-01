<x-app-layout>
    <x-slot name="header">
        <h1 style="margin:0;font-size:2.8rem;font-weight:800;color:#0f172a;">Dashboard</h1>
    </x-slot>

    <div style="display:grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap:20px; margin-top: 12px;">
        <div style="background: linear-gradient(135deg, #113d35, #194b41); color:white; border-radius:18px; padding:22px; min-height:220px;">
            <div style="font-size:14px; font-weight:700; opacity:.85; margin-bottom:12px;">Hari Ini</div>
            <div style="font-size:1.1rem; line-height:1.3; font-weight:700; margin-bottom:18px;">Transaksi kasir sedang berjalan<br>dengan performa stabil</div>
            <a href="{{ route('kasir.pos') }}" style="display:inline-block; background: rgba(255,255,255,0.12); border-radius: 10px; padding: 10px 16px; font-weight:700; color:white; text-decoration:none;">Buka POS →</a>
        </div>

        <div style="background:white; border:1px solid #e5e7eb; border-radius:18px; padding:22px; min-height:220px;">
            <div style="font-size:14px; font-weight:700; color:#6b7280; margin-bottom:12px;">Penjualan</div>
            <div style="font-size:3rem; font-weight:800; letter-spacing:-0.05em;">Rp 18.500K</div>
            <div style="margin-top:12px; color:#16a34a; font-weight:700;">+12% dari hari kemarin</div>
        </div>

        <div style="background:white; border:1px solid #e5e7eb; border-radius:18px; padding:22px; min-height:220px;">
            <div style="font-size:14px; font-weight:700; color:#6b7280; margin-bottom:12px;">Transaksi</div>
            <div style="font-size:3rem; font-weight:800; letter-spacing:-0.05em; color:#111827;">148</div>
            <div style="margin-top:12px; color:#ef4444; font-weight:700;">-3% dari minggu lalu</div>
        </div>
    </div>
</x-app-layout>
