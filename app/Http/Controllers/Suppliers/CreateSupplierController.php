<?php

declare(strict_types=1);

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\Http\Resources\Suppliers\CreateSupplierResource;
use App\UseCases\Suppliers\CreateSupplierUseCase;
use Illuminate\Http\JsonResponse;

class CreateSupplierController extends BaseController
{
    public function __invoke(CreateSupplierRequest $request, CreateSupplierUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateSupplierResource($response));
    }
}
