<?php

declare(strict_types=1);

namespace App\UseCases\DetailProducts;

use App\Const\GlobalConst;
use App\Models\ProductDetail;
use Exception;

class DeleteDetailProductUseCase
{
    public function __invoke($id): array
    {
        try {
            $product_detail = ProductDetail::firstWhere('id', $id) ?? '';
            if (!$product_detail) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Chi tiết sản phẩm không tồn tại!'
                    ]
                ];
            }
            $product_detail->delete();

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
}
