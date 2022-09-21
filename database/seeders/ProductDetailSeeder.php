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
                'unit_in_stock' => 9,
                'price' => 340000,
                'price_sale' => null,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 1,
                'code_color' => '#F39402',
                'code_size' => 'M',
                'unit_in_stock' => 8,
                'price' => 340000,
                'price_sale' => null,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 1,
                'code_color' => '#FFFFFF',
                'code_size' => 'S',
                'unit_in_stock' => 3,
                'price' => 380000,
                'price_sale' => 350000,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 1,
                'code_color' => '#2C3E50',
                'code_size' => 'XXL',
                'unit_in_stock' => 24,
                'price' => 370000,
                'price_sale' => 340000,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 1,
                'code_color' => '#F8228A',
                'code_size' => 'M',
                'unit_in_stock' => 102,
                'price' => 340000,
                'price_sale' => null,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 2,
                'code_color' => '#F62612',
                'code_size' => 'XL',
                'unit_in_stock' => 9,
                'price' => 350000,
                'price_sale' => 250000,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 2,
                'code_color' => '#F39402',
                'code_size' => 'L',
                'unit_in_stock' => 9,
                'price' => 350000,
                'price_sale' => 240000,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 3,
                'code_color' => '#1145F6',
                'code_size' => 'S',
                'unit_in_stock' => 9,
                'price' => 360000,
                'price_sale' => null,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 4,
                'code_color' => '#1145F6',
                'code_size' => 'S',
                'unit_in_stock' => 34,
                'price' => 340000,
                'price_sale' => null,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 5,
                'code_color' => '#F62612',
                'code_size' => 'XL',
                'unit_in_stock' => 11,
                'price' => 340000,
                'price_sale' => null,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 6,
                'code_color' => '#F62612',
                'code_size' => 'S',
                'unit_in_stock' => 11,
                'price' => 150000,
                'price_sale' => 100000,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
            ],
            [
                'product_id' => 7,
                'code_color' => '#1145F6',
                'code_size' => 'M',
                'unit_in_stock' => 11,
                'price' => 150000,
                'price_sale' => 90000,
                'thumb' => '/storage/uploads/2022-09-09/06-31-04aoMU.PNG'
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
