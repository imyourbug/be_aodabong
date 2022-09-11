<?php

declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Resources\Categories\CreateCategoryResource;
use App\UseCases\Categories\CreateCategoryUseCase;
use Illuminate\Http\JsonResponse;

class CreateCategoryController extends BaseController
{
    public function __invoke(CreateCategoryRequest $request, CreateCategoryUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateCategoryResource($response));
    }
}
