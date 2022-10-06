<?php

declare(strict_types=1);

namespace App\UseCases\Comments;

use App\Const\GlobalConst;
use App\Models\Comment;

class GetAllCommentsUseCase
{
    public function __invoke(): array
    {
        $comments = Comment::get();
        if ($comments->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách bình luận trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'comments' => $comments
        ];
    }
}
