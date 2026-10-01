<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Indomie Mi Goreng', 'category' => 'Makanan', 'description' => 'Mi instan rasa ayam bawang', 'price' => 3500, 'stock' => 50, 'is_active' => true],
            ['name' => 'Aqua Botol 600ml', 'category' => 'Minuman', 'description' => 'Air mineral kemasan botol', 'price' => 4000, 'stock' => 45, 'is_active' => true],
            ['name' => 'Teh Botol', 'category' => 'Minuman', 'description' => 'Teh botol rasa original', 'price' => 5000, 'stock' => 35, 'is_active' => true],
            ['name' => 'Beras 5kg', 'category' => 'Sembako', 'description' => 'Beras kualitas premium', 'price' => 125000, 'stock' => 12, 'is_active' => true],
            ['name' => 'Minyak Goreng 2L', 'category' => 'Sembako', 'description' => 'Minyak goreng kemasan 2 liter', 'price' => 18000, 'stock' => 20, 'is_active' => true],
            ['name' => 'Sabun Cuci', 'category' => 'Perawatan', 'description' => 'Sabun cair pembersih', 'price' => 8500, 'stock' => 25, 'is_active' => true],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}
