<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tugas4;

class Tugas4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Memanggil dan menyimpan data palsu ke dalam database menggunakan factory Tugas4
        Tugas4::factory()->count(10)->create();
    }
}
