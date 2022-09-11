<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Resources\Customers\CreateCustomerResource;
use App\UseCases\Customers\CreateCustomerUseCase;
use Illuminate\Http\JsonResponse;

class CreateCustomerController extends BaseController
{
    public function __invoke(CreateCustomerRequest $request, CreateCustomerUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateCustomerResource($response));
    }
}
