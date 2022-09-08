<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Áo',
                'parent_id' => 0,
                'description' => '',
                'active' => 1
            ],
            [
                'name' => 'Quần',
                'parent_id' => 0,
                'description' => '',
                'active' => 1
            ],
            [
                'name' => 'Giày',
                'parent_id' => 0,
                'description' => '',
                'active' => 1
            ],
            [
                'name' => 'Găng',
                'parent_id' => 0,
                'description' => '',
                'active' => 1
            ],
            [
                'name' => 'Cup',
                'parent_id' => 0,
                'description' => '',
                'active' => 1
            ],
        ];

        try {
            foreach ($categories as $category) {
                Category::create($category);
            }
        } catch (\Throwable $th) {
        }
    }
}
