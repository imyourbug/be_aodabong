<?php

declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Categories\GetAllCategoriesResource;
use App\UseCases\Categories\GetAllCategoriesUseCase;
use Illuminate\Http\JsonResponse;

class GetAllCategoriesController extends BaseController
{
    public function __invoke(GetAllCategoriesUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllCategoriesResource($response));
    }
}
