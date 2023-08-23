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
                'name' => 'Giày vải',
                'parent_id' => 0,
                'description' => '',
                'active' => 1,
                'slug' => 'ao'
            ],
            [
                'name' => 'Giày da',
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
            [
                'name' => 'Quần nữ',
                'parent_id' => 2,
                'description' => '',
                'active' => 1,
                'slug' => 'quan-nu'
            ],
            [
                'name' => 'Quần nam',
                'parent_id' => 2,
                'description' => '',
                'active' => 1,
                'slug' => 'quan-nam'
            ],
            [
                'name' => 'Quần đùi nam',
                'parent_id' => 11,
                'description' => '',
                'active' => 1,
                'slug' => 'quan-dui-nam'
            ],
            [
                'name' => 'Quần âu nam',
                'parent_id' => 11,
                'description' => '',
                'active' => 1,
                'slug' => 'quan-au-nam'
            ],
            [
                'name' => 'Quần bò nam',
                'parent_id' => 11,
                'description' => '',
                'active' => 1,
                'slug' => 'quan-bo-nam'
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
