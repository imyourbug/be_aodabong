<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Suppliers\GetAllSuppliersResource;
use App\UseCases\Suppliers\GetAllSuppliersUseCase;
use Illuminate\Http\JsonResponse;

class GetAllSuppliersController extends BaseController
{
    public function __invoke(GetAllSuppliersUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllSuppliersResource($response));
    }
}
