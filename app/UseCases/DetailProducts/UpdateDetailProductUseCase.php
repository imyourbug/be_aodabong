<?php

declare(strict_types=1);

namespace App\UseCases\DetailProducts;

use App\Const\GlobalConst;
use App\Models\Product;
use App\Models\ProductDetail;
use Exception;

class UpdateDetailProductUseCase
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
                        'message' => 'Sản phẩm không tồn tại'
                    ]
                ];
            }
            ProductDetail::updateOrCreate([
                'product_id' => $params['product_id'],
                'code_size' => $params['code_size'],
                'code_color' => $params['code_color'],
            ], [
                'unit_in_stock' => $params['unit_in_stock'],
                'thumb' => $params['thumb'],
            ]);

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
