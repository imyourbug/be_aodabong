<?php

declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Products\GetAllProductsResource;
use App\UseCases\Products\GetAllProductsUseCase;
use Illuminate\Http\JsonResponse;

class GetAllProductsController extends BaseController
{
    public function __invoke(GetAllProductsUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllProductsResource($response));
    }
}
