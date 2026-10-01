<?php

namespace App\Http\Controllers;

use App\Models\Product;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.dashboard');
    }

    public function dashboard()
    {
        return view('kasir.dashboard');
    }

    public function pos()
    {
        $products = Product::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get()
            ->map(function (Product $product) {
                return [
                    'id' => $product->id,
                    'code' => 'P'.str_pad((string) $product->id, 4, '0', STR_PAD_LEFT),
                    'barcode' => 'BAR-'.str_pad((string) $product->id, 6, '0', STR_PAD_LEFT),
                    'name' => $product->name,
                    'price' => (float) $product->price,
                    'stock' => (int) $product->stock,
                    'category' => $product->category,
                ];
            });

        return view('kasir.pos', compact('products'));
    }
}
