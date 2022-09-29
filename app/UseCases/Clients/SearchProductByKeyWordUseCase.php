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

        $data_product = [];
        $products = Product::where('name', 'like', '%' . $key_word . '%')->get();
        foreach ($products as $product) {
            $data_product[] =  [
                'product' => $product,
                'max_price' => $this->getMaxPrice($product->product_details),
                'min_price' => $this->getMinPrice($product->product_details)
            ];
        };
        $data_other = [];
        $other_products = Product::where('name', 'not like', '%' . $key_word . '%')->get();
        foreach ($other_products as $product) {
            $data_other[] =  [
                'product' => $product,
                'max_price' => $this->getMaxPrice($product->product_details),
                'min_price' => $this->getMinPrice($product->product_details)
            ];
        };

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => [
                'like' => $data_product,
                'not_like' => $data_other
            ]
        ];
    }

    public function getMaxPrice($details)
    {
        $detail = collect($details)->sortBy('price')->last();
        return $detail->price_sale ?? $detail->price;
    }

    public function getMinPrice($details)
    {
        $detail = collect($details)->sortByDesc('price')->last();
        return $detail->price_sale ?? $detail->price;
    }
}
