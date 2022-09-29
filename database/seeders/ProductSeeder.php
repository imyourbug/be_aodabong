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
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-29/14-56-05ao1.jpg'
            ],
            [
                'name' => 'Áo MC',
                'category_id' => 1,
                'supplier_id' => 1,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-29/14-43-24ao2.jpg'
            ],
            [
                'name' => 'Áo Liverpool',
                'category_id' => 1,
                'supplier_id' => 2,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-29/14-56-39ao3.jpg'
            ],
            [
                'name' => 'Áo Arsenal',
                'category_id' => 1,
                'supplier_id' => 3,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-29/14-56-51ao4.jpg'
            ],
            [
                'name' => 'Áo Tottenham',
                'category_id' => 1,
                'supplier_id' => 4,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-29/14-57-00ao5.jpg'
            ],
            [
                'name' => 'Quần Gucci',
                'category_id' => 2,
                'supplier_id' => 4,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-29/14-57-11ao6.jpg'
            ],
            [
                'name' => 'Quần Louis Vuitton',
                'category_id' => 2,
                'supplier_id' => 4,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-29/14-57-11ao6.jpg'
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
