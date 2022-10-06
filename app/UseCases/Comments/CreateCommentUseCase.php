<?php

declare(strict_types=1);

namespace App\UseCases\Comments;

use App\Const\GlobalConst;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Exception;

class CreateCommentUseCase
{
    public function __invoke($params): array
    {
        try {
            $product = Product::find($params['product_id']);
            if (!$product) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Sản phẩm không tồn tại'
                    ]
                ];
            }
            $user = User::find($params['user_id']);
            if (!$user) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Tài khoản không tồn tại'
                    ]
                ];
            }
            $comment = Comment::create($params);

            return [
                'status' => GlobalConst::STATUS_OK,
                'comment' => $comment
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
