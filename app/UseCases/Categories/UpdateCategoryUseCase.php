<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;
use Exception;
use Illuminate\Support\Str;

class UpdateCategoryUseCase
{
    public function __invoke($params): array
    {
        try {
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
            $params['slug'] = Str::slug($params['name'], '-');
            $category->update($params);

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
