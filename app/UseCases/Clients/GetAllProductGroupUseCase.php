<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\Category;

class GetAllProductGroupUseCase
{
    public function __invoke(): array
    {
        $categories = Category::where('active', 1)->with('products')->get();
        if ($categories->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách danh mục trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => $categories
        ];
    }
}
