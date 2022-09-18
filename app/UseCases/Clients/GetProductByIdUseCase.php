<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

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
                'details' => $product->product_details,
                'other_products' => Product::where('id', '<>', $id)->get() ?? []
            ]
        ];
    }
}
