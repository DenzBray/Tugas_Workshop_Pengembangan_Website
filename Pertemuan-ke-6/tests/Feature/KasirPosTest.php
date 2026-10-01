<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KasirPosTest extends TestCase
{
    use RefreshDatabase;

    public function test_kasir_pos_page_shows_products_from_database(): void
    {
        $user = User::factory()->create([
            'role' => 'kasir',
        ]);

        Product::create([
            'name' => 'Indomie',
            'category' => 'Makanan',
            'description' => 'Mi instan rasa ayam bawang',
            'price' => 3500,
            'stock' => 50,
            'is_active' => true,
        ]);

        $this->actingAs($user)
            ->get('/kasir/pos')
            ->assertOk()
            ->assertSee('Indomie');
    }

    public function test_kasir_can_store_transaction(): void
    {
        $user = User::factory()->create([
            'role' => 'kasir',
        ]);

        $product = Product::create([
            'name' => 'Aqua',
            'category' => 'Minuman',
            'description' => 'Air minum 600ml',
            'price' => 4000,
            'stock' => 20,
            'is_active' => true,
        ]);

        $response = $this->actingAs($user)
            ->postJson('/transactions', [
                'customer_name' => 'Budi',
                'customer_phone' => '081234567890',
                'payment_method' => 'Tunai',
                'paid_amount' => 20000,
                'items' => [
                    [
                        'product_id' => $product->id,
                        'qty' => 2,
                        'price' => 4000,
                    ],
                ],
            ]);

        $response->assertStatus(201)
            ->assertJsonPath('status', 'success');

        $this->assertDatabaseHas('transactions', [
            'customer_name' => 'Budi',
            'payment_method' => 'Tunai',
        ]);
    }
}
