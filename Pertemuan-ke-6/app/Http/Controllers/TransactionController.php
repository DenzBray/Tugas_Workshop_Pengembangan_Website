<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    public function index()
    {
        return response()->json(Transaction::with('items')->latest()->get());
    }

    public function create()
    {
        return 'Form tambah transaksi';
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:25',
            'payment_method' => 'required|string|max:50',
            'paid_amount' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'other_fee' => 'nullable|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $subtotal = 0;
        $productList = [];

        foreach ($validated['items'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            $qty = (int) $item['qty'];
            $price = (float) $item['price'];
            $lineSubtotal = $qty * $price;

            if ($product->stock < $qty) {
                throw ValidationException::withMessages([
                    'items' => 'Stok produk '.$product->name.' tidak mencukupi.',
                ]);
            }

            $productList[] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'qty' => $qty,
                'price' => $price,
                'subtotal' => $lineSubtotal,
            ];

            $subtotal += $lineSubtotal;
        }

        $discountPercent = (float) ($validated['discount_percent'] ?? 0);
        $discountAmount = (float) ($validated['discount_amount'] ?? 0);
        $taxAmount = (float) ($validated['tax_amount'] ?? 0);
        $otherFee = (float) ($validated['other_fee'] ?? 0);
        $percentDiscount = $subtotal * ($discountPercent / 100);
        $totalAmount = $subtotal - $percentDiscount - $discountAmount + $taxAmount + $otherFee;
        $paidAmount = (float) $validated['paid_amount'];

        if ($paidAmount < $totalAmount) {
            throw ValidationException::withMessages([
                'paid_amount' => 'Uang dibayar belum mencukupi total transaksi.',
            ]);
        }

        $changeAmount = $paidAmount - $totalAmount;

        $transaction = DB::transaction(function () use ($validated, $subtotal, $discountPercent, $discountAmount, $taxAmount, $otherFee, $totalAmount, $paidAmount, $changeAmount, $productList) {
            $transaction = Transaction::create([
                'transaction_number' => Transaction::generateNumber(),
                'cashier_id' => auth()->id(),
                'customer_name' => $validated['customer_name'] ?? 'Umum',
                'customer_phone' => $validated['customer_phone'] ?? null,
                'payment_method' => $validated['payment_method'],
                'subtotal' => $subtotal,
                'discount_percent' => $discountPercent,
                'discount_amount' => $discountAmount,
                'tax_amount' => $taxAmount,
                'other_fee' => $otherFee,
                'total_amount' => $totalAmount,
                'paid_amount' => $paidAmount,
                'change_amount' => $changeAmount,
                'status' => 'completed',
            ]);

            foreach ($productList as $item) {
                $transaction->items()->create([
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product_name'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal'],
                ]);

                Product::whereKey($item['product_id'])
                    ->decrement('stock', $item['qty']);
            }

            return $transaction;
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil disimpan.',
            'data' => [
                'transaction' => $transaction->load('items'),
            ],
        ], 201);
    }

    public function edit($id)
    {
        return "Form edit transaksi $id";
    }

    public function update(Request $request, $id)
    {
        return "Update transaksi $id";
    }

    public function destroy($id)
    {
        return "Hapus transaksi $id";
    }
}
