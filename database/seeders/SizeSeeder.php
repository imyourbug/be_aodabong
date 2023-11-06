<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            // [
            //     'size' => 'S',
            // ],
            // [
            //     'size' => 'M',
            // ],
            // [
            //     'size' => 'XL',
            // ],
            // [
            //     'size' => 'XXL',
            // ],
            [
                'size' => '39',
            ],
            [
                'size' => '40',
            ],
            [
                'size' => '41',
            ],
            [
                'size' => '42',
            ], 
            [
                'size' => '43',
            ],
        ];

        try {
            foreach ($sizes as $size) {
                Size::create($size);
            }
        } catch (\Throwable $th) {
        }
    }
}
