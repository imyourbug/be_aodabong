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
                'active' => 1,
                'slug' => 'ao'
            ],
            [
                'name' => 'Quần',
                'parent_id' => 0,
                'description' => '',
                'active' => 1,
                'slug' => 'quan'
            ],
            [
                'name' => 'Giày',
                'parent_id' => 0,
                'description' => '',
                'active' => 1,
                'slug' => 'giay'
            ],
            [
                'name' => 'Phụ kiện',
                'parent_id' => 0,
                'description' => '',
                'active' => 1,
                'slug' => 'phu-kien'
            ],
            [
                'name' => 'Găng',
                'parent_id' => 4,
                'description' => '',
                'active' => 1,
                'slug' => 'gang'
            ],
            [
                'name' => 'Cup',
                'parent_id' => 4,
                'description' => '',
                'active' => 1,
                'slug' => 'cup'
            ],
            [
                'name' => 'Cup vàng',
                'parent_id' => 6,
                'description' => '',
                'active' => 1,
                'slug' => 'cup-vang'
            ],
            [
                'name' => 'Cup bạc',
                'parent_id' => 6,
                'description' => '',
                'active' => 1,
                'slug' => 'cup-bac'
            ],
            [
                'name' => 'Cup đồng',
                'parent_id' => 6,
                'description' => '',
                'active' => 1,
                'slug' => 'cup-dong'
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
