<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisCuciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\JenisCuci::insert([
            [
                'nama' => 'Cuci Kering',
                'harga' => '6000',
                'satuan' => 'kg',
                'hari' => '3',
            ],
            [
                'nama' => 'Cuci Setrika',
                'harga' => '7000',
                'satuan' => 'kg',
                'hari' => '3',
            ],
        ]);
    }
}
