<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Giày MU',
                'category_id' => 1,
                'supplier_id' => 1,
                'price' => 340000,
                'price_sale' => null,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay1.jpg'
            ],
            [
                'name' => 'Giày MC',
                'category_id' => 1,
                'supplier_id' => 1,
                'price' => 380000,
                'price_sale' => 350000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay2.jpg'
            ],
            [
                'name' => 'Giày Liverpool',
                'category_id' => 1,
                'supplier_id' => 2,
                'price' => 370000,
                'price_sale' => 340000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay3.jpg'
            ],
            [
                'name' => 'Giày Arsenal',
                'category_id' => 1,
                'supplier_id' => 3,
                'price' => 350000,
                'price_sale' => 250000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay4.jpg'
            ],
            [
                'name' => 'Giày Tottenham',
                'category_id' => 1,
                'supplier_id' => 4,
                'price' => 350000,
                'price_sale' => 240000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay3.jpg'
            ],
            [
                'name' => 'Giày Gucci',
                'category_id' => 2,
                'supplier_id' => 4,
                'price' => 360000,
                'price_sale' => null,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay2.jpg'
            ],
            [
                'name' => 'Giày Louis Vuitton',
                'category_id' => 2,
                'supplier_id' => 4,
                'price' => 150000,
                'price_sale' => 100000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/images/giay2.jpg'
            ]
        ];

        try {
            foreach ($products as $product) {
                Product::create($product);
            }
        } catch (\Throwable $th) {
        }
    }
}
