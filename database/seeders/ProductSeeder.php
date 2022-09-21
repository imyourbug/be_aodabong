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
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo MC',
                'category_id' => 1,
                'supplier_id' => 1,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo Liverpool',
                'category_id' => 1,
                'supplier_id' => 2,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo Arsenal',
                'category_id' => 1,
                'supplier_id' => 3,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Áo Tottenham',
                'category_id' => 1,
                'supplier_id' => 4,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Quần Gucci',
                'category_id' => 2,
                'supplier_id' => 4,
                'active' => 1,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'name' => 'Quần Louis Vuitton',
                'category_id' => 2,
                'supplier_id' => 4,
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
