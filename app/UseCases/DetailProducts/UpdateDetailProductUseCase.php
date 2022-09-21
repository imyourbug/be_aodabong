<?php

declare(strict_types=1);

namespace App\UseCases\DetailProducts;

use App\Const\GlobalConst;
use App\Models\ProductDetail;
use Exception;

class UpdateDetailProductUseCase
{
    public function __invoke($params): array
    {
        try {
            $product = ProductDetail::firstWhere('id', $params['id']) ?? '';
            if (!$product) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Chi tiết sản phẩm không tồn tại!'
                    ]
                ];
            }
            $product->update($params);

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
