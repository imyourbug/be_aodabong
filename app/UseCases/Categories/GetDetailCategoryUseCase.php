<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Category;

class GetDetailCategoryUseCase
{
    public function __invoke(string $category_id): array
    {
        $category = Category::with('products')->firstWhere('id', $category_id) ?? '';
        if (!$category) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh mục không tồn tại!'
                ]
            ];
        }
        $categories = Category::all();
        $result = [
            'detail' => $category,
            'children' => $this->getAllCategoryChild([], $categories, $category->id),
        ];

        return [
            'status' => GlobalConst::STATUS_OK,
            'category' => $result
        ];
    }

    public function getAllCategoryChild($ids = [], $categories, $id_parent)
    {
        foreach ($categories as $category) {
            if ($category->parent_id === $id_parent) {
                array_push(
                    $ids,
                    $category
                );
                $id = $category->id;
                unset($category);
                $this->getAllCategoryChild($ids, $categories, $id);
            }
        }
        return $ids;
    }
}
