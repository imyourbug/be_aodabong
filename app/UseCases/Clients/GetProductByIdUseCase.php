<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\Product;
use App\Models\Rate;

class GetProductByIdUseCase
{
    public function __invoke(int $id): array
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
        $comments = collect($product->comments)->sortByDesc('id');
        $data_comments = [];
        foreach ($comments as $cmt) {
            $data_comments[] = [
                $cmt,
                $cmt->user
            ];
        }
        $rates = Rate::where('product_id', $id)->get();
        $sum = 0;
        foreach ($rates as $rate) {
            $sum += $rate->level_star;
        }
        $level_star = $sum === 0 ? 0 : round($sum / $rates->count(), 1);

        $other_products = Product::where('id', '<>', $id)->get() ?? [];
        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => [
                'product' => $product,
                'details' => $product->product_details,
                'data_comments' => $data_comments,
                'other_products' => $other_products,
                'level_star' => $level_star
            ]
        ];
    }
}
