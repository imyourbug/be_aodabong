<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Http\Resources\Customers\UpdateCustomerResource;
use App\UseCases\Customers\UpdateCustomerUseCase;
use Illuminate\Http\JsonResponse;

class UpdateCustomerController extends BaseController
{
    public function __invoke(UpdateCustomerRequest $request, UpdateCustomerUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateCustomerResource($response));
    }
}
