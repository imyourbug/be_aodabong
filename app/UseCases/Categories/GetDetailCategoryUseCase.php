<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;

class GetDetailCategoryUseCase
{
    public function __invoke(string $category_id): array
    {
        $category = Category::firstWhere('id', $category_id) ?? '';
        if (!$category) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh mục không tồn tại!'
                ]
            ];
        }
        $categories = Category::get();
        $result = [
            'detail' => $category,
            'children' => $this->getAllCategoryChild([], $categories, $category->id),
            'products' => $this->getDetailProduct($category->products)
        ];

        return [
            'status' => GlobalConst::STATUS_OK,
            'category' => $result
        ];
    }

    public function getAllCategoryChild($ids = [], $categories, $id_parent)
    {
        foreach ($categories as $category) {
            if ($category->parent_id === $id_parent) {
                array_push(
                    $ids,
                    $category
                );
                $id = $category->id;
                unset($category);
                $this->getAllCategoryChild($ids, $categories, $id);
            }
        }
        return $ids;
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
