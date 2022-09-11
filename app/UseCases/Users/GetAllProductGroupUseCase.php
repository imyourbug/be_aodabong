<?php

declare(strict_types=1);

namespace App\UseCases\Users;

use App\Const\GlobalConst;
use App\Models\Category;
use App\Models\Product;

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
            $data[$category->id] = [
                $category->name => $this->getAllProductsByCategoryId($category->id)
            ];
        };
        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => $data
        ];
    }

    public function getAllProductsByCategoryId($category_id)
    {
        return Product::where('category_id', $category_id)->get();
    }
}
