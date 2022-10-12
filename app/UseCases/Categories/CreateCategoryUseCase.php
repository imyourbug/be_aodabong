<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;
use Exception;
use Illuminate\Support\Str;

class CreateCategoryUseCase
{
    public function __invoke($params): array
    {
        try {
            $params['slug'] = Str::slug($params['name'], '-');
            $category = Category::create($params);

            return [
                'status' => GlobalConst::STATUS_OK,
                'category' => $category
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
