<?php

declare(strict_types=1);

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Suppliers\UpdateSupplierRequest;
use App\Http\Resources\Suppliers\UpdateSupplierResource;
use App\UseCases\Suppliers\UpdateSupplierUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateSupplierController extends BaseController
{
    public function __invoke(UpdateSupplierRequest $request, UpdateSupplierUseCase $use_case): JsonResponse
    {
        try {
            $params = [
                'id' => $request->input('id'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone')
            ];
            $response = $use_case->__invoke($params);

            return response()->json(new UpdateSupplierResource($response));
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}
