<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\Product;

class SearchProductByKeyWordUseCase
{
    public function __invoke(string $key_word): array
    {
        if (!$key_word) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Thiếu từ khóa tìm kiếm'
                ]
            ];
        }

        $products = Product::where('name', 'like', '%' . $key_word . '%')->get();
        $other_products = Product::where('name', 'not like', '%' . $key_word . '%')->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => [
                'like' => $products,
                'not_like' => $other_products
            ]
        ];
    }
}
