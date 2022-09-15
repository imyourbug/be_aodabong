<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = [
            [
                'product_id' => 1,
                'code_color' => '#F39402',
                'code_size' => 'S',
                'unit_in_stock' => 9
            ],
            [
                'product_id' => 1,
                'code_color' => '#F39402',
                'code_size' => 'M',
                'unit_in_stock' => 8
            ],
            [
                'product_id' => 1,
                'code_color' => '#FFFFFF',
                'code_size' => 'S',
                'unit_in_stock' => 3
            ],
            [
                'product_id' => 1,
                'code_color' => '#2C3E50',
                'code_size' => 'XXL',
                'unit_in_stock' => 24
            ],
            [
                'product_id' => 1,
                'code_color' => '#F8228A',
                'code_size' => 'M',
                'unit_in_stock' => 102
            ],
            [
                'product_id' => 2,
                'code_color' => '#F62612',
                'code_size' => 'XL',
                'unit_in_stock' => 9
            ],
            [
                'product_id' => 2,
                'code_color' => '#F39402',
                'code_size' => 'L',
                'unit_in_stock' => 9
            ],
            [
                'product_id' => 3,
                'code_color' => '#1145F6',
                'code_size' => 'S',
                'unit_in_stock' => 9
            ],
            [
                'product_id' => 4,
                'code_color' => '#1145F6',
                'code_size' => 'S',
                'unit_in_stock' => 34
            ],
            [
                'product_id' => 5,
                'code_color' => '#F62612',
                'code_size' => 'XL',
                'unit_in_stock' => 11
            ],
        ];

        try {
            foreach ($details as $detail) {
                ProductDetail::create($detail);
            }
        } catch (\Throwable $th) {
        }
    }
}
