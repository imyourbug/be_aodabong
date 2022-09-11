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
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo MC',
                'category_id' => 1,
                'supplier_id' => 1,
                'price' => 350000,
                'price_sale' => 250000,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo Liverpool',
                'category_id' => 1,
                'supplier_id' => 2,
                'price' => 360000,
                'price_sale' => null,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo Arsenal',
                'category_id' => 1,
                'supplier_id' => 3,
                'price' => 370000,
                'price_sale' => 189000,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo Tottenham',
                'category_id' => 1,
                'supplier_id' => 4,
                'price' => 330000,
                'price_sale' => 320000,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
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
