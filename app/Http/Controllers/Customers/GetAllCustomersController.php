<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Customers\GetAllCustomersResource;
use App\UseCases\Customers\GetAllCustomersUseCase;
use Illuminate\Http\JsonResponse;

class GetAllCustomersController extends BaseController
{
    public function __invoke(GetAllCustomersUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllCustomersResource($response));
    }
}
