<?php

declare(strict_types=1);

namespace App\UseCases\Comments;

use App\Const\GlobalConst;
use App\Models\Comment;
use Exception;

class UpdateCommentUseCase
{
    public function __invoke($params): array
    {
        try {
            $comment = Comment::firstWhere('id', $params['id']) ?? '';
            if (!$comment) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Bình luận không tồn tại!'
                    ]
                ];
            }
            $comment->update($params);

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
