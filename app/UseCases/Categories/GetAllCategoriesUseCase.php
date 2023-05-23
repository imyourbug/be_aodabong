<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;

class GetAllCategoriesUseCase
{
    public function __invoke(): array
    {
        $categories = Category::with('products')->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'categories' => $categories
        ];
    }
}
