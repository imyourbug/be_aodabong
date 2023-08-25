<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\Product;

class GetProductByIdUseCase
{
    public function __invoke(int $id): array
    {
        $product = Product::with(['product_details', 'comments.user', 'category'])->firstWhere('id', $id) ?? '';
        if (!$product) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Sản phẩm không tồn tại!'
                ]
            ];
        }
        $sum = 0;
        foreach ($product->comments as $com) {
            $sum += $com->level_star;
        }
        $level_star = $sum === 0 ? 0 : round($sum / count($product->comments), 1);

        $other_products = Product::where('id', '<>', $id)->get() ?? [];
        return [
            'status' => GlobalConst::STATUS_OK,
            'product' => $product,
            'other_products' => $other_products,
            'level_star' => $level_star
        ];
    }
}
