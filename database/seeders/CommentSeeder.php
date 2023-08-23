<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'content' => 'Comment 1',
                'reply_id' => 0,
                'level_star' => 1,
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'level_star' => 3,
                'content' => 'Comment 2 rep cmt 1',
                'reply_id' => 1,
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'level_star' => 2,
                'content' => 'Comment 3 rep cmt 2',
                'reply_id' => 2,
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'level_star' => 3,
                'content' => 'Comment 4 rep cmt 3',
                'reply_id' => 3,
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'level_star' => 2,
                'content' => 'Comment 5 rep cmt 4',
                'reply_id' => 4,
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'level_star' => 5,
                'content' => 'Comment 6',
                'reply_id' => 5,
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'level_star' => 1,
                'content' => 'Comment 7 rep cmt 6',
                'reply_id' => 6,
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'level_star' => 1,
                'content' => 'Comment 8 rep cmt 7',
                'reply_id' => 7,
            ],
        ];

        try {
            foreach ($comments as $comment) {
                Comment::create($comment);
            }
        } catch (\Throwable $th) {
        }
    }
}
