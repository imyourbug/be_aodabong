<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients\Orders;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Clients\Orders\CreateOrderRequest;
use App\Http\Resources\Clients\Orders\CreateOrderResource;
use App\UseCases\Clients\Orders\CreateOrderUseCase;
use Illuminate\Http\JsonResponse;

class CreateOrderController extends BaseController
{
    public function __invoke(CreateOrderRequest $request, CreateOrderUseCase $use_case): JsonResponse
    {
        // dd($request);
        $params = [
            'customer' => $request->input('customer'),
            'status' => $request->input('status'),
            'discount' => $request->input('discount'),
            'carts' => $request->input('carts'),
            'total_money' => $request->input('total_money'),
            'payment_method' => $request->input('payment_method'),
            'payment_status' => $request->input('payment_status'),
            'shipment_id' => $request->input('shipment_id'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateOrderResource($response));
    }
}
