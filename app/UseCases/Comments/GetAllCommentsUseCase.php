<?php

declare(strict_types=1);

namespace App\UseCases\Comments;

use App\Const\GlobalConst;
use App\Models\Comment;

class GetAllCommentsUseCase
{
    public function __invoke(): array
    {
        $comments = Comment::all();

        return [
            'status' => GlobalConst::STATUS_OK,
            'comments' => $comments
        ];
    }
}
