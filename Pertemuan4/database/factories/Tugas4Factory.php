<?php

namespace Database\Factories;

use App\Models\Tugas4;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tugas4>
 */
class Tugas4Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //data palsu untuk Tugas4 model
            'nama' => fake()->words(2, true),

            //Deskripsi diisi dengan paragraf acak
            'deskripsi' => fake()->paragraph(),

            //mengisi kolom 'harga' dengan angka acak
            'harga' => fake()->numberBetween(10000, 500000),

            //mengisi kolom 'stok' dengan angka acak
            'stok' => fake()->numberBetween(1, 100),
        ];
    }
}
