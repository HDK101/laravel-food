<?php

namespace Database\Seeders;

use App\Models\Cupom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CupomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cupom10 = Cupom::create([
            'code' => 'CUPOM10',
            'discount_percent' => 10,
        ]);

        $cupom20 = Cupom::create([
            'code' => 'CUPOM20',
            'discount_percent' => 20,
        ]);
    }
}
