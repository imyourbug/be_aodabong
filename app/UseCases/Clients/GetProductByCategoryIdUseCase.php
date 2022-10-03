<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\Product;

class GetProductByCategoryIdUseCase
{
    public function __invoke(int $id): array
    {
        $products = Product::where('category_id', $id)->get();
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
            'data' => $products
        ];
    }

    public function getAllProductsByCategoryId(int $category_id)
    {
        return Product::where('category_id', $category_id)->get();
    }
}
