<?php

declare(strict_types=1);

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Orders\DeleteOrderRequest;
use App\Http\Resources\Orders\DeleteOrderResource;
use App\UseCases\Orders\DeleteOrderUseCase;
use Illuminate\Http\JsonResponse;

class DeleteOrderController extends BaseController
{
    public function __invoke(DeleteOrderRequest $request, DeleteOrderUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteOrderResource($response));
    }
}
