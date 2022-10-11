<?php

declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Categories\GetDetailCategoryResource;
use App\UseCases\Categories\GetDetailCategoryUseCase;
use Illuminate\Http\JsonResponse;

class GetDetailCategoryController extends BaseController
{
    public function __invoke($category_id, GetDetailCategoryUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($category_id);

        return response()->json(new GetDetailCategoryResource($response));
    }
}
