<?php

declare(strict_types=1);

namespace App\UseCases\Products;

use App\Const\GlobalConst;
use App\Models\Product;

class GetAllProductsUseCase
{
    public function __invoke(): array
    {
        $products = Product::get();
        if ($products->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách sản phẩm trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'products' => $products
        ];
    }
}
