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
            [
                'size' => 'S',
            ],
            [
                'size' => 'M',
            ],
            [
                'size' => 'XL',
            ],
            [
                'size' => 'XXL',
            ],
            // [
            //     'size' => '29',
            // ],
            // [
            //     'size' => '30',
            // ],
            // [
            //     'size' => '31',
            // ],
        ];

        try {
            foreach ($sizes as $size) {
                Size::create($size);
            }
        } catch (\Throwable $th) {
        }
    }
}
