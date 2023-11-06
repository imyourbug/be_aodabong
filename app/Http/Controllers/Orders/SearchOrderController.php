<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\SearchOrderRequest;
use App\Http\Resources\Orders\GetOrderByIdResource;
use App\UseCases\Orders\SearchOrderUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchOrderController extends Controller
{
    public function __invoke(SearchOrderRequest $request, SearchOrderUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input());

        return response()->json(new GetOrderByIdResource($response));
    }
}
