<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\GetOrderByIdResource;
use App\UseCases\Orders\GetOrderByIdUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetOrderByIdController extends Controller
{
    public function __invoke($id, GetOrderByIdUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($id);

        return response()->json(new GetOrderByIdResource($response));
    }
}
