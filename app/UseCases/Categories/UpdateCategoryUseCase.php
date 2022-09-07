<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;
use Exception;

class UpdateCategoryUseCase
{
    public function __invoke($params): array
    {
        $category = Category::firstWhere('id', $params['id']) ?? '';
        if (!$category) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh mục không tồn tại!'
                ]
            ];
        }
        $update_category = $category->update($params);
        if (!$update_category) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_FAILED,
                    'message' => 'Cập nhật không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'category' => $category
        ];
    }
}
