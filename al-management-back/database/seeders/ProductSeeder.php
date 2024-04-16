<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Producto 1',
            'description' => 'Descripción de producto',
            'price' => 10.55,
            'stock' => 10,
            'created_at' => Carbon::now(),
        ]);
    }
}

