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
                'name' => 'Áo MU',
                'category_id' => 1,
                'supplier_id' => 1,
                'price' => 340000,
                'price_sale' => null,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/2022-09-30/01-42-31ao1.jpg'
            ],
            [
                'name' => 'Áo MC',
                'category_id' => 1,
                'supplier_id' => 1,
                'price' => 380000,
                'price_sale' => 350000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/2022-09-30/01-42-59ao2.jpg'
            ],
            [
                'name' => 'Áo Liverpool',
                'category_id' => 1,
                'supplier_id' => 2,
                'price' => 370000,
                'price_sale' => 340000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/2022-09-30/01-43-38ao3.jpg'
            ],
            [
                'name' => 'Áo Arsenal',
                'category_id' => 1,
                'supplier_id' => 3,
                'price' => 350000,
                'price_sale' => 250000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/2022-09-30/01-43-58ao4.jpg'
            ],
            [
                'name' => 'Áo Tottenham',
                'category_id' => 1,
                'supplier_id' => 4,
                'price' => 350000,
                'price_sale' => 240000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/2022-09-30/01-44-15ao7.jpg'
            ],
            [
                'name' => 'Quần Gucci',
                'category_id' => 2,
                'supplier_id' => 4,
                'price' => 360000,
                'price_sale' => null,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/2022-09-30/01-42-59ao2.jpg'
            ],
            [
                'name' => 'Quần Louis Vuitton',
                'category_id' => 2,
                'supplier_id' => 4,
                'price' => 150000,
                'price_sale' => 100000,
                'active' => 1,
                'thumb' => env('DOMAIN') . '/storage/uploads/2022-09-30/01-42-59ao2.jpg'
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
