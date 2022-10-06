<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [
            [
                'user_id' => 1,
                'comment_id' => 2,
                'is_like' => 0,
            ],
            [
                'user_id' => 1,
                'comment_id' => 1,
                'is_like' => 0,
            ],
            [
                'user_id' => 1,
                'comment_id' => 3,
                'is_like' => 0,
            ],
            [
                'user_id' => 2,
                'comment_id' => 1,
                'is_like' => 0,
            ],
            [
                'user_id' => 2,
                'comment_id' => 2,
                'is_like' => 0,
            ],
            [
                'user_id' => 3,
                'comment_id' => 1,
                'is_like' => 0,
            ],
        ];

        try {
            foreach ($likes as $like) {
                Like::create($like);
            }
        } catch (\Throwable $th) {
        }
    }
}
