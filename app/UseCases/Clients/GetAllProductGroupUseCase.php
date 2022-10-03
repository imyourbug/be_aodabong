<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\Category;

class GetAllProductGroupUseCase
{
    public function __invoke(): array
    {
        $categories = Category::where('active', 1)->get();
        if ($categories->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách danh mục trống!'
                ]
            ];
        }
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'category_id' => $category->id,
                'category_name' => $category->name,
                'products' => $this->getDetailProduct($category->products) ?? [],
                // 'products' => $category->products ?? [],

            ];
        };

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => $data
        ];
    }

    public function getDetailProduct($list_product)
    {
        $products = [];
        foreach ($list_product as $product) {
            $products[] =  [
                'product' => $product,
                'max_price' => $this->getMaxPrice($product->product_details),
                'min_price' => $this->getMinPrice($product->product_details)
            ];
        };

        return $products;
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
