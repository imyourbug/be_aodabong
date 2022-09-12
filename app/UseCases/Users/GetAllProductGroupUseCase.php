<?php

declare(strict_types=1);

namespace App\UseCases\Users;

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
                'products' => $category->products ?? []
            ];
        };
        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => $data
        ];
    }
}
