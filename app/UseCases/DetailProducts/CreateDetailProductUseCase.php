<?php

declare(strict_types=1);

namespace App\UseCases\DetailProducts;

use App\Const\GlobalConst;
use App\Models\ProductDetail;
use Exception;

class CreateDetailProductUseCase
{
    public function __invoke($params): array
    {
        try {
            $detail_product = ProductDetail::where('product_id', $params['product_id'])
                ->where('code_color', $params['code_color'])
                ->where('code_size', $params['code_size'])
                ->first();
            if (!$detail_product) {
                ProductDetail::created($params);
            } else {
                $detail_product->update([
                    'unit_in_stock' => $detail_product->unit_in_stock + $params['unit_in_stock']
                ]);
            }
            return [
                'status' => GlobalConst::STATUS_OK,
                'detail_product' => $detail_product
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
