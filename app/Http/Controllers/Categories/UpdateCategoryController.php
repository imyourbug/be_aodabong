<?php

declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Http\Resources\Categories\UpdateCategoryResource;
use App\UseCases\Categories\UpdateCategoryUseCase;
use Illuminate\Http\JsonResponse;

class UpdateCategoryController extends BaseController
{
    public function __invoke(UpdateCategoryRequest $request, UpdateCategoryUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateCategoryResource($response));
    }
}
