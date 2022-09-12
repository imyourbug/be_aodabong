<?php

declare(strict_types=1);

namespace App\UseCases\Users;

use App\Const\GlobalConst;
use App\Models\Product;

class GetProductByCategoryIdUseCase
{
    public function __invoke($id): array
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

    public function getAllProductsByCategoryId($category_id)
    {
        return Product::where('category_id', $category_id)->get();
    }
}
