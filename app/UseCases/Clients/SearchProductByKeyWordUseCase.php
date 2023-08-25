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

        $like = Product::with(['category', 'supplier', 'product_details.order_details.order'])
            ->where('name', 'like', '%' . $key_word . '%')->get();
        $not_like = Product::with(['category', 'supplier', 'product_details.order_details.order'])
            ->where('name', 'not like', '%' . $key_word . '%')->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => [
                'like' => $like,
                'not_like' => $not_like
            ]
        ];
    }
}
