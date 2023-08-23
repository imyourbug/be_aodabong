<?php

declare(strict_types=1);

namespace App\UseCases\Comments;

use App\Const\GlobalConst;
use App\Models\Comment;
use Exception;

class DeleteCommentUseCase
{
    public function __invoke(int $id): array
    {
        try {
            $comment = Comment::firstWhere('id', $id) ?? '';
            if (!$comment) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Bình luận không tồn tại!'
                    ]
                ];
            }
            // $comments = Comment::all();
            // $ids = [];
            // array_push($ids, $comment->id);
            // $this->deleteAllCommentChild($ids, $comments, $comment->id);
            $comment->delete();

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::DELETE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }

    public function deleteAllCommentChild($ids = [], $comments, $id_parent)
    {
        foreach ($comments as $cmt) {
            if ($cmt->reply_id === $id_parent) {
                array_push($ids, $cmt->id);
                $id = $cmt->id;
                unset($cmt);
                $this->deleteAllCommentChild($ids, $comments, $id);
            }
        }
        if (count($ids) > 0) {
            Comment::destroy($ids);
        }
    }
}
