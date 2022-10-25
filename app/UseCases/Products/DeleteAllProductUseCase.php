<?php

declare(strict_types=1);

namespace App\UseCases\Products;

use App\Const\GlobalConst;
use App\Models\Product;
use Exception;

class DeleteAllProductUseCase
{
    public function __invoke(array $ids): array
    {
        try {
            if (count($ids) === 0) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Không có sản phẩm nào để xóa!'
                    ]
                ];
            }
            Product::destroy($ids);

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
