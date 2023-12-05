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
                'code_size' => 39,
                'unit_in_stock' => 9,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay2.jpg'
            ],
            [
                'product_id' => 1,
                'code_color' => '#F39402',
                'code_size' => 40,
                'unit_in_stock' => 8,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 1,
                'code_color' => '#FFFFFF',
                'code_size' => 39,
                'unit_in_stock' => 3,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 1,
                'code_color' => '#2C3E50',
                'code_size' => 43,
                'unit_in_stock' => 24,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 1,
                'code_color' => '#F8228A',
                'code_size' => 40,
                'unit_in_stock' => 102,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 2,
                'code_color' => '#F62612',
                'code_size' => 42,
                'unit_in_stock' => 9,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay2.jpg'
            ],
            [
                'product_id' => 2,
                'code_color' => '#F39402',
                'code_size' => 41,
                'unit_in_stock' => 9,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 3,
                'code_color' => '#1145F6',
                'code_size' => 39,
                'unit_in_stock' => 9,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 4,
                'code_color' => '#1145F6',
                'code_size' => 39,
                'unit_in_stock' => 34,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 5,
                'code_color' => '#F62612',
                'code_size' => 42,
                'unit_in_stock' => 11,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'product_id' => 6,
                'code_color' => '#F62612',
                'code_size' => 39,
                'unit_in_stock' => 11,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay2.jpg'
            ],
            [
                'product_id' => 7,
                'code_color' => '#1145F6',
                'code_size' => 40,
                'unit_in_stock' => 11,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay3.jpg'
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
