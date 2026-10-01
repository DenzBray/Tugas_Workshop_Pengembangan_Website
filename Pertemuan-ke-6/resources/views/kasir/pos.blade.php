<x-app-layout>
    @push('css')
    <style>
        .pos-shell {
            --bg: #e8edf2;
            --panel: #f5f5f5;
            --panel-strong: #ffffff;
            --line: #d4d9e0;
            --dark: #1f2937;
            --muted: #666f7d;
            --primary: #1d4ed8;
            --primary-soft: #dbeafe;
            --danger: #dc2626;
            --danger-soft: #fee2e2;
            --warning: #f59e0b;
            --warning-soft: #fef3c7;
            --success: #16a34a;
            --success-soft: #dcfce7;
            --info: #0ea5e9;
            --light: #f9fafb;
        }

        .pos-shell,
        .pos-shell * { box-sizing: border-box; }

        .pos-shell {
            width: 100%;
            max-width: none;
            min-width: 0;
            margin: 0;
            border: 1px solid #d7dbe2;
            background: #f2f2f2;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
            color: var(--dark);
            font-family: Arial, Helvetica, sans-serif;
        }

        .pos-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 14px 18px;
            background: #f0f0f0;
            border-bottom: 1px solid var(--line);
        }

        .header-left {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 12px;
            color: var(--muted);
        }

        .header-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 6px;
            padding: 6px 10px;
            font-weight: 700;
            color: var(--dark);
        }

        .pos-main {
            padding: 18px;
        }

        .page-title {
            margin: 0 0 18px;
            text-align: center;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.25fr 0.9fr;
            gap: 18px;
        }

        .card {
            background: rgba(255,255,255,0.65);
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 16px;
        }

        .card + .card {
            margin-top: 16px;
        }

        .label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 700;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .field-grid .full {
            grid-column: 1 / -1;
        }

        .pos-shell input,
        .pos-shell select,
        .pos-shell button {
            font: inherit;
        }

        .input, .select {
            width: 100%;
            border: 1px solid #bbbbc6;
            border-radius: 6px;
            background: #f9fafb;
            padding: 10px 12px;
            font-size: 14px;
            outline: none;
        }

        .input:focus, .select:focus {
            border-color: #7aa0ff;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.12);
        }

        .search-wrap {
            position: relative;
        }

        .suggestions {
            position: absolute;
            left: 0;
            right: 0;
            top: calc(100% + 4px);
            background: white;
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
            display: none;
            z-index: 20;
            max-height: 220px;
            overflow-y: auto;
        }

        .suggestions.show {
            display: block;
        }

        .suggestion-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            background: transparent;
            border: none;
            padding: 10px 12px;
            text-align: left;
            cursor: pointer;
            gap: 12px;
        }

        .suggestion-item:hover {
            background: #f3f6ff;
        }

        .suggestion-item small {
            color: var(--muted);
        }

        .cart-box {
            overflow-x: auto;
        }

        .pos-shell table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .pos-shell thead th {
            background: #e8ecf2;
            color: var(--dark);
            font-size: 12px;
            text-transform: uppercase;
            padding: 10px 8px;
            border-bottom: 1px solid var(--line);
        }

        .pos-shell tbody td {
            padding: 10px 8px;
            border-bottom: 1px solid #edf1f5;
            text-align: center;
        }

        .pos-shell tbody td.left-align {
            text-align: left;
        }

        .code-tag {
            display: inline-block;
            margin-top: 4px;
            background: #eef2ff;
            color: var(--muted);
            border-radius: 4px;
            padding: 2px 7px;
            font-size: 11px;
        }

        .qty-box {
            display: inline-flex;
            align-items: center;
            border: 1px solid var(--line);
            background: white;
            border-radius: 6px;
            overflow: hidden;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: none;
            background: #f2f4f8;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            color: var(--dark);
        }

        .qty-value {
            min-width: 28px;
            text-align: center;
            font-weight: 700;
        }

        .remove-btn {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            border: 1px solid #f3b4b4;
            background: var(--danger-soft);
            color: var(--danger);
            font-weight: 700;
            cursor: pointer;
        }

        .empty-state {
            text-align: center;
            color: var(--muted);
            padding: 20px 12px;
            font-size: 13px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 8px 0;
            font-size: 14px;
        }

        .summary-row.total {
            margin-top: 12px;
            border-top: 1px solid var(--line);
            padding-top: 12px;
            font-size: 18px;
            font-weight: 700;
        }

        .summary-row .value {
            font-weight: 700;
        }

        .discount-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 8px;
        }

        .method-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
            margin-top: 10px;
        }

        .method-btn {
            border: 1px solid var(--line);
            background: #fff;
            color: var(--dark);
            border-radius: 6px;
            padding: 8px 10px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
        }

        .method-btn.active {
            background: var(--primary-soft);
            color: var(--primary);
            border-color: #9cc1ff;
        }

        .change-box {
            margin-top: 14px;
            padding: 12px 14px;
            background: var(--success-soft);
            border: 1px solid #9ae6b4;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            color: #166534;
        }

        .change-box.short {
            background: var(--danger-soft);
            border-color: #fca5a5;
            color: #991b1b;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
            margin-top: 18px;
        }

        .action-btn {
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 13px;
            font-weight: 700;
            padding: 12px 10px;
            cursor: pointer;
        }

        .btn-hold { background: var(--warning); }
        .btn-cancel { background: var(--danger); }
        .btn-pay { background: var(--success); }

        .receipt-box {
            display: none;
        }

        @media print {
            .spark-shell {
                display: block !important;
                min-height: 0 !important;
                background: white !important;
            }

            .spark-sidebar,
            .spark-topbar,
            .spark-page-header,
            .pos-header,
            .pos-main {
                display: none !important;
            }

            .spark-main,
            .spark-page {
                display: block !important;
                padding: 0 !important;
            }

            .pos-shell {
                width: 100%;
                margin: 0;
                border: 0;
                background: white;
                box-shadow: none;
            }

            .receipt-box {
                display: block !important;
                max-width: 380px;
                margin: 0 auto;
                padding: 18px;
                font-family: Arial, Helvetica, sans-serif;
                color: #111827;
            }

            .receipt-box * {
                box-sizing: border-box;
            }

            .receipt-head {
                text-align: center;
                border-bottom: 1px dashed #444;
                padding-bottom: 12px;
                margin-bottom: 12px;
            }

            .receipt-head h2 {
                margin: 0 0 6px;
                font-size: 24px;
            }

            .receipt-meta {
                font-size: 12px;
                line-height: 1.6;
            }

            .receipt-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 12px;
            }

            .receipt-table th,
            .receipt-table td {
                padding: 5px 0;
                border-bottom: 1px dashed #ddd;
            }

            .receipt-summary {
                margin-top: 12px;
                border-top: 1px dashed #444;
                padding-top: 10px;
                font-size: 12px;
            }

            .receipt-summary .row {
                display: flex;
                justify-content: space-between;
                margin: 6px 0;
            }

            .receipt-footer {
                margin-top: 14px;
                text-align: center;
                font-size: 12px;
                border-top: 1px dashed #444;
                padding-top: 10px;
            }
        }

        @media (max-width: 1000px) {
            .content-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 640px) {
            .pos-shell { margin: 0; }
            .pos-header { flex-direction: column; align-items: flex-start; }
            .field-grid, .discount-grid, .method-grid, .action-grid { grid-template-columns: 1fr; }
        }
    </style>
    @endpush

    <div class="pos-shell">
        <header class="pos-header">
            <div class="header-right">
                <div class="header-badge">
                    <span>Nomor Transaksi</span>
                    <strong id="transactionNumber">TRX-20260911-001</strong>
                </div>
                <div id="currentDateTime">--</div>
            </div>
        </header>

        <div id="receiptBox" class="receipt-box"></div>

        <main class="pos-main">
            <h1 class="page-title">Transaksi Pembayaran Kasir</h1>

            <div class="content-grid">
                <section>
                    <div class="card">
                        <div class="field-grid">
                            <div class="full">
                                <label class="label" for="searchInput">Pencarian Barang</label>
                                <div class="search-wrap">
                                    <input id="searchInput" class="input" type="text" placeholder="Cari nama, kode, atau barcode barang..." autocomplete="off">
                                    <div id="searchSuggestions" class="suggestions"></div>
                                </div>
                            </div>

                            <div>
                                <label class="label" for="customerType">Jenis Pelanggan</label>
                                <select id="customerType" class="select">
                                    <option value="Umum">Umum</option>
                                    <option value="Member">Member</option>
                                </select>
                            </div>

                            <div>
                                <label class="label" for="customerPhone">Nomor HP</label>
                                <input id="customerPhone" class="input" type="tel" placeholder="08XXXXXXXXXX">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h3 style="margin: 0 0 12px; font-size: 17px;">Keranjang Belanja</h3>
                        <div class="cart-box">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 45px;">No</th>
                                        <th style="text-align:left;">Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th style="width: 40px;">x</th>
                                    </tr>
                                </thead>
                                <tbody id="cartTableBody"></tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <aside>
                    <div class="card">
                        <h3 style="margin: 0 0 12px; font-size: 17px;">Ringkasan</h3>

                        <div class="summary-row">
                            <span>Total Item</span>
                            <span id="totalItems" class="value">0</span>
                        </div>

                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span id="subtotalDisplay" class="value">Rp 0</span>
                        </div>

                        <div class="discount-grid">
                            <div>
                                <label class="label" for="discountPercent">Diskon (%)</label>
                                <input id="discountPercent" class="input" type="number" min="0" value="0">
                            </div>
                            <div>
                                <label class="label" for="discountAmount">Diskon (Rp)</label>
                                <input id="discountAmount" class="input" type="number" min="0" value="0">
                            </div>
                        </div>

                        <div class="discount-grid" style="margin-top: 12px;">
                            <div>
                                <label class="label" for="taxAmount">Pajak / PPN</label>
                                <input id="taxAmount" class="input" type="number" min="0" value="0">
                            </div>
                            <div>
                                <label class="label" for="otherFee">Biaya Lain</label>
                                <input id="otherFee" class="input" type="number" min="0" value="0">
                            </div>
                        </div>

                        <div class="summary-row total">
                            <span>TOTAL AKHIR</span>
                            <span id="finalTotal" class="value">Rp 0</span>
                        </div>
                    </div>

                    <div class="card">
                        <h3 style="margin: 0 0 12px; font-size: 17px;">Pembayaran</h3>

                        <label class="label" for="cashPaid">Uang Dibayar</label>
                        <input id="cashPaid" class="input" type="number" min="0" value="0" placeholder="0">

                        <div class="method-grid" id="methodGrid">
                            <button class="method-btn active" type="button" data-method="Tunai">Tunai</button>
                            <button class="method-btn" type="button" data-method="QRIS">QRIS</button>
                            <button class="method-btn" type="button" data-method="Debit">Debit</button>
                            <button class="method-btn" type="button" data-method="Kredit">Kredit</button>
                            <button class="method-btn" type="button" data-method="E-Wallet">E-Wallet</button>
                            <button class="method-btn" type="button" data-method="Transfer">Transfer</button>
                        </div>

                        <div id="changeBox" class="change-box">KEMBALIAN: Rp 0</div>
                    </div>

                    <div class="action-grid">
                        <button id="holdBtn" class="action-btn btn-hold" type="button">Tahan</button>
                        <button id="cancelBtn" class="action-btn btn-cancel" type="button">Batal</button>
                        <button id="payBtn" class="action-btn btn-pay" type="button">BAYAR</button>
                    </div>
                </aside>
            </div>
        </main>
    </div>

    @push('scripts')
    <script>
        const products = @json($products ?? []);

        const cart = [];
        let selectedMethod = 'Tunai';
        let transactionCounter = 1;

        const searchInput = document.getElementById('searchInput');
        const suggestionsBox = document.getElementById('searchSuggestions');
        const cartTableBody = document.getElementById('cartTableBody');
        const transactionNumber = document.getElementById('transactionNumber');
        const currentDateTime = document.getElementById('currentDateTime');
        const discountPercentInput = document.getElementById('discountPercent');
        const discountAmountInput = document.getElementById('discountAmount');
        const taxAmountInput = document.getElementById('taxAmount');
        const otherFeeInput = document.getElementById('otherFee');
        const cashPaidInput = document.getElementById('cashPaid');
        const totalItemsDisplay = document.getElementById('totalItems');
        const subtotalDisplay = document.getElementById('subtotalDisplay');
        const finalTotalDisplay = document.getElementById('finalTotal');
        const changeBox = document.getElementById('changeBox');

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0,
            }).format(Number(value || 0));
        }

        function updateDateTime() {
            const now = new Date();
            const pad = (n) => String(n).padStart(2, '0');
            currentDateTime.textContent = `${now.getFullYear()}-${pad(now.getMonth()+1)}-${pad(now.getDate())} ${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
        }

        function updateTransactionCode() {
            const now = new Date();
            const yyyy = now.getFullYear();
            const mm = String(now.getMonth()+1).padStart(2, '0');
            const dd = String(now.getDate()).padStart(2, '0');
            transactionNumber.textContent = `TRX-${yyyy}${mm}${dd}-${String(transactionCounter).padStart(3, '0')}`;
        }

        function renderSuggestions(term) {
            const keyword = term.trim().toLowerCase();
            if (!keyword) {
                suggestionsBox.innerHTML = '';
                suggestionsBox.classList.remove('show');
                return;
            }

            const filtered = products.filter((product) => {
                return (
                    product.name.toLowerCase().includes(keyword) ||
                    product.code.toLowerCase().includes(keyword) ||
                    product.barcode.toLowerCase().includes(keyword)
                );
            });

            if (!filtered.length) {
                suggestionsBox.innerHTML = '<div style="padding:12px;color:#666;">Barang tidak ditemukan.</div>';
                suggestionsBox.classList.add('show');
                return;
            }

            suggestionsBox.innerHTML = filtered.map((product) => `
                <button type="button" class="suggestion-item" data-id="${product.id}">
                    <span>
                        <strong>${product.name}</strong><br>
                        <small>${product.code} • ${product.barcode}</small>
                    </span>
                    <strong>${formatRupiah(product.price)}</strong>
                </button>
            `).join('');

            suggestionsBox.classList.add('show');

            suggestionsBox.querySelectorAll('.suggestion-item').forEach((button) => {
                button.addEventListener('click', () => {
                    addProductToCart(Number(button.dataset.id));
                    suggestionsBox.classList.remove('show');
                    searchInput.value = '';
                });
            });
        }

        function addProductToCart(productId) {
            const foundProduct = products.find((item) => item.id === productId);
            if (!foundProduct) return;

            const existing = cart.find((item) => item.id === productId);
            if (existing) {
                existing.qty += 1;
            } else {
                cart.push({ ...foundProduct, qty: 1 });
            }

            renderCart();
        }

        function changeQty(productId, delta) {
            const item = cart.find((entry) => entry.id === productId);
            if (!item) return;

            item.qty += delta;
            if (item.qty <= 0) {
                const index = cart.findIndex((entry) => entry.id === productId);
                cart.splice(index, 1);
            }

            renderCart();
        }

        function removeFromCart(productId) {
            const index = cart.findIndex((entry) => entry.id === productId);
            if (index !== -1) {
                cart.splice(index, 1);
            }
            renderCart();
        }

        function renderCart() {
            if (!cart.length) {
                cartTableBody.innerHTML = '<tr><td colspan="6" class="empty-state">Keranjang masih kosong</td></tr>';
                updateTotals();
                return;
            }

            cartTableBody.innerHTML = cart.map((item, idx) => {
                const subtotal = item.price * item.qty;
                return `
                    <tr>
                        <td>${idx + 1}</td>
                        <td class="left-align">
                            <div>${item.name}</div>
                            <span class="code-tag">${item.code}</span>
                        </td>
                        <td>${formatRupiah(item.price)}</td>
                        <td>
                            <div class="qty-box">
                                <button type="button" class="qty-btn" data-id="${item.id}" data-action="minus">−</button>
                                <span class="qty-value">${item.qty}</span>
                                <button type="button" class="qty-btn" data-id="${item.id}" data-action="plus">+</button>
                            </div>
                        </td>
                        <td>${formatRupiah(subtotal)}</td>
                        <td><button type="button" class="remove-btn" data-id="${item.id}">x</button></td>
                    </tr>
                `;
            }).join('');

            cartTableBody.querySelectorAll('.qty-btn').forEach((button) => {
                button.addEventListener('click', () => {
                    const id = Number(button.dataset.id);
                    const action = button.dataset.action;
                    changeQty(id, action === 'plus' ? 1 : -1);
                });
            });

            cartTableBody.querySelectorAll('.remove-btn').forEach((button) => {
                button.addEventListener('click', () => {
                    removeFromCart(Number(button.dataset.id));
                });
            });

            updateTotals();
        }

        function calculateSubtotal() {
            return cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        }

        function updateTotals() {
            const subtotal = calculateSubtotal();
            const discountPercent = Number(discountPercentInput.value || 0);
            const discountAmount = Number(discountAmountInput.value || 0);
            const tax = Number(taxAmountInput.value || 0);
            const feeLain = Number(otherFeeInput.value || 0);
            const itemCount = cart.reduce((sum, item) => sum + item.qty, 0);
            const percentDiscount = subtotal * (discountPercent / 100);
            const finalTotal = subtotal - percentDiscount - discountAmount + tax + feeLain;
            const paid = Number(cashPaidInput.value || 0);
            const returnMoney = paid - finalTotal;

            totalItemsDisplay.textContent = itemCount;
            subtotalDisplay.textContent = formatRupiah(subtotal);
            finalTotalDisplay.textContent = formatRupiah(finalTotal > 0 ? finalTotal : 0);

            if (returnMoney >= 0) {
                changeBox.classList.remove('short');
                changeBox.textContent = `KEMBALIAN: ${formatRupiah(returnMoney)}`;
            } else {
                changeBox.classList.add('short');
                changeBox.textContent = `UANG KURANG: ${formatRupiah(Math.abs(returnMoney))}`;
            }
        }

        function setMethod(method) {
            selectedMethod = method;
            document.querySelectorAll('.method-btn').forEach((button) => {
                button.classList.toggle('active', button.dataset.method === method);
            });
        }

        function cancelTransaction() {
            cart.length = 0;
            searchInput.value = '';
            discountPercentInput.value = 0;
            discountAmountInput.value = 0;
            taxAmountInput.value = 0;
            otherFeeInput.value = 0;
            cashPaidInput.value = 0;
            document.getElementById('customerType').value = 'Umum';
            document.getElementById('customerPhone').value = '';
            suggestionsBox.classList.remove('show');
            transactionCounter += 1;
            updateTransactionCode();
            renderCart();
        }

        function holdTransaction() {
            alert('Transaksi ditahan.');
        }

        function buildReceiptMarkup() {
            const subtotal = calculateSubtotal();
            const discountPercent = Number(discountPercentInput.value || 0);
            const discountAmount = Number(discountAmountInput.value || 0);
            const tax = Number(taxAmountInput.value || 0);
            const fee = Number(otherFeeInput.value || 0);
            const percentDiscount = subtotal * (discountPercent / 100);
            const final = subtotal - percentDiscount - discountAmount + tax + fee;
            const paid = Number(cashPaidInput.value || 0);
            const change = paid - final;

            const rows = cart.map((item) => {
                const subtotalItem = item.price * item.qty;
                return `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.qty}</td>
                        <td>${formatRupiah(item.price)}</td>
                        <td>${formatRupiah(subtotalItem)}</td>
                    </tr>
                `;
            }).join('');

            return `
                <div class="receipt-head">
                    <h2>TOKO RETAIL MAKMUR</h2>
                    <div class="receipt-meta">
                        Jl. Kartini No. 123, Jember<br>
                        Telp. (0331) 123456<br>
                        No. Trx: ${transactionNumber.textContent}<br>
                        ${currentDateTime.textContent}
                    </div>
                </div>

                <table class="receipt-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${rows}
                    </tbody>
                </table>

                <div class="receipt-summary">
                    <div class="row"><span>Subtotal</span><span>${formatRupiah(subtotal)}</span></div>
                    <div class="row"><span>Diskon %</span><span>${formatRupiah(percentDiscount)}</span></div>
                    <div class="row"><span>Diskon Rp</span><span>${formatRupiah(discountAmount)}</span></div>
                    <div class="row"><span>Pajak</span><span>${formatRupiah(tax)}</span></div>
                    <div class="row"><span>Biaya Lain</span><span>${formatRupiah(fee)}</span></div>
                    <div class="row"><strong>Total</strong><strong>${formatRupiah(final)}</strong></div>
                    <div class="row"><span>Bayar</span><span>${formatRupiah(paid)}</span></div>
                    <div class="row"><span>Kembali</span><span>${formatRupiah(change)}</span></div>
                </div>

                <div class="receipt-footer">
                    Terima kasih atas kunjungan Anda.<br>
                    Metode: ${selectedMethod}
                </div>
            `;
        }

        function buildPayload() {
            const subtotal = calculateSubtotal();
            const discountPercent = Number(discountPercentInput.value || 0);
            const discountAmount = Number(discountAmountInput.value || 0);
            const tax = Number(taxAmountInput.value || 0);
            const otherFee = Number(otherFeeInput.value || 0);
            const percentDiscount = subtotal * (discountPercent / 100);
            const total = subtotal - percentDiscount - discountAmount + tax + otherFee;
            const paid = Number(cashPaidInput.value || 0);

            return {
                customer_name: document.getElementById('customerType').value || 'Umum',
                customer_phone: document.getElementById('customerPhone').value || null,
                payment_method: selectedMethod,
                paid_amount: paid,
                discount_percent: discountPercent,
                discount_amount: discountAmount,
                tax_amount: tax,
                other_fee: otherFee,
                items: cart.map((item) => ({
                    product_id: item.id,
                    qty: item.qty,
                    price: item.price
                }))
            };
        }

        async function finishTransaction(printReceipt = false) {
            if (!cart.length) {
                alert('Keranjang masih kosong.');
                return;
            }

            const total = Number(finalTotalDisplay.textContent.replace(/[^\d-]/g, '')) || 0;
            const paid = Number(cashPaidInput.value || 0);

            if (paid < total) {
                alert('Uang dibayar belum mencukupi.');
                return;
            }

            try {
                const response = await fetch('{{ route('transactions.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(buildPayload())
                });

                const result = await response.json();

                if (!response.ok) {
                    const message = result?.message || 'Transaksi gagal disimpan.';
                    const errors = result?.errors ? Object.values(result.errors).flat().join('\n') : '';
                    alert(errors || message);
                    return;
                }

                if (printReceipt) {
                    const receiptBox = document.getElementById('receiptBox');
                    receiptBox.innerHTML = buildReceiptMarkup();
                    window.print();
                }

                alert(`Pembayaran berhasil via ${selectedMethod}. Kembalian ${formatRupiah(paid - total)}`);

                cart.length = 0;
                cashPaidInput.value = 0;
                transactionCounter += 1;
                updateTransactionCode();
                renderCart();
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat menyimpan transaksi.');
            }
        }

        function payAndPrint() {
            const wantPrint = window.confirm('Cetak struk transaksi ini?');
            finishTransaction(wantPrint);
        }

        searchInput.addEventListener('input', (event) => {
            renderSuggestions(event.target.value);
        });

        discountPercentInput.addEventListener('input', updateTotals);
        discountAmountInput.addEventListener('input', updateTotals);
        taxAmountInput.addEventListener('input', updateTotals);
        otherFeeInput.addEventListener('input', updateTotals);
        cashPaidInput.addEventListener('input', updateTotals);

        document.querySelectorAll('.method-btn').forEach((button) => {
            button.addEventListener('click', () => setMethod(button.dataset.method));
        });

        document.getElementById('cancelBtn').addEventListener('click', cancelTransaction);
        document.getElementById('holdBtn').addEventListener('click', holdTransaction);
        document.getElementById('payBtn').addEventListener('click', payAndPrint);

        document.addEventListener('click', (event) => {
            if (!event.target.closest('.suggestion-item') && !event.target.closest('.search-input')) {
                suggestionsBox.classList.remove('show');
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'F2') {
                event.preventDefault();
                searchInput.focus();
            }

            if (event.key === 'F4') {
                event.preventDefault();
                cashPaidInput.focus();
            }

            if (event.key === 'Escape') {
                event.preventDefault();
                cancelTransaction();
            }
        });

        updateTransactionCode();
        updateDateTime();
        setInterval(updateDateTime, 1000);
        renderCart();
        updateTotals();
    </script>
    @endpush
</x-app-layout>
