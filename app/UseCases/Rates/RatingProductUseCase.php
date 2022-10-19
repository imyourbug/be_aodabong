<?php

declare(strict_types=1);

namespace App\UseCases\Rates;

use App\Const\GlobalConst;
use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use Exception;

class RatingProductUseCase
{
    public function __invoke($params): array
    {
        try {
            $product = Product::firstWhere('id', $params['product_id']) ?? "";
            if (!$product) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => "Sản phẩm không tồn tại"
                    ]
                ];
            }
            $user = User::firstWhere('id', $params['user_id']) ?? "";
            if (!$user) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => "Tài khoản không tồn tại"
                    ]
                ];
            }
            Rate::updateOrCreate(
                [
                    'user_id' => $params['user_id'],
                    'product_id' => $params['product_id'],
                ],
                ['level_star' => $params['level_star']]
            );

            return [
                'status' => GlobalConst::STATUS_OK,
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
