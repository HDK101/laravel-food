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
        $cupom = Cupom::create([
            'code' => '123',
            'discount_percent' => 10,
        ]);
    }
}
