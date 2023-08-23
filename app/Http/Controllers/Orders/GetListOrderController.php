<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\GetListOrderResource;
use App\UseCases\Orders\GetListOrderUseCase;
use Illuminate\Http\JsonResponse;

class GetListOrderController extends Controller
{
    public function __invoke(GetListOrderUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetListOrderResource($response));
    }
}
