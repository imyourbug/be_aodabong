<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;

class GetAllCategoriesUseCase
{
    public function __invoke(): array
    {
        $categories = Category::get();
        if ($categories->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh mục sản phẩm trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'categories' => $categories
        ];
    }
}
