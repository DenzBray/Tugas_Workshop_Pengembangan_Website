<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return "Halaman transaksi";
    }

    public function create()
    {
        return "Form tambah transaksi";
    }

    public function store(Request $request)
    {
        return "Simpan transaksi";
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
