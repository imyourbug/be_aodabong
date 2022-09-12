<?php

declare(strict_types=1);

namespace App\UseCases\Users;

use App\Const\GlobalConst;
use App\Models\Product;

class GetProductByIdUseCase
{
    public function __invoke($id): array
    {
        $product = Product::find($id) ?? '';
        if (!$product) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Sản phẩm không tồn tại!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => [
                'product' => $product,
                'detail' => $product->product_details
            ]
        ];
    }
}
