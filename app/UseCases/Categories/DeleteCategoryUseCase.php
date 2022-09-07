<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;

class DeleteCategoryUseCase
{
    public function __invoke($id): array
    {
        $category = Category::firstWhere('id', $id) ?? '';
        if (!$category) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh mục không tồn tại!'
                ]
            ];
        }
        $delete_category = $category->delete();
        if (!$delete_category) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_FAILED,
                    'message' => 'Xóa danh mục không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK
        ];
    }
}
