<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $colors = [
            [
                'name' => 'Xanh lá',
                'code_color' => '#63AA31',
            ],
            [
                'name' => 'Đỏ',
                'code_color' => '#F62612',
            ],
            [
                'name' => 'Xanh lam',
                'code_color' => '#1145F6',
            ],
            [
                'name' => 'Da cam',
                'code_color' => '#F39402',
            ],
        ];

        try {
            foreach ($colors as $color) {
                Color::create($color);
            }
        } catch (\Throwable $th) {
        }
    }
}
