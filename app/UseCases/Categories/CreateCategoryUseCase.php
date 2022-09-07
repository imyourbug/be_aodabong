<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;

class CreateCategoryUseCase
{
    public function __invoke($params): array
    {
        $category = Category::create($params);
        if (!$category) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_FAILED,
                    'message' => 'Thêm danh mục sản phẩm không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'category' => $category
        ];
    }
}
