<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Http\Resources\Orders\UpdateOrderResource;
use App\UseCases\Orders\UpdateOrderUseCase;
use Illuminate\Http\JsonResponse;

class UpdateOrderController extends BaseController
{
    public function __invoke(UpdateOrderRequest $request, UpdateOrderUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->all());

        return response()->json(new UpdateOrderResource($response));
    }
}
