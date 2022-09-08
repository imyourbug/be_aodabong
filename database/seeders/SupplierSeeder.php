<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            [
                'name' => 'Louis Vuitton',
                'address' => 'Michigan, America',
                'email' => 'louis@gmail.com',
                'phone' => 'XXXXXXXXXX',
            ],
            [
                'name' => 'Gucci',
                'address' => 'Michigan, America',
                'email' => 'gucci@gmail.com',
                'phone' => 'XXXXXXXXXX',
            ],
            [
                'name' => 'Dolce & Gabbana',
                'address' => 'Texas, America',
                'email' => 'dolce@gmail.com',
                'phone' => 'XXXXXXXXXX',
            ],
            [
                'name' => 'Adidas',
                'address' => 'Ohio, America',
                'email' => 'adidas@gmail.com',
                'phone' => 'XXXXXXXXXX',
            ],
        ];

        try {
            foreach ($suppliers as $supplier) {
                Supplier::create($supplier);
            }
        } catch (\Throwable $th) {
        }
    }
}
