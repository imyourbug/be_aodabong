<?php

declare(strict_types=1);

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\UseCases\Suppliers\CreateSupplierUseCase;
use Illuminate\Http\JsonResponse;

class CreateSupplierController extends BaseController
{
    public function __invoke(CreateSupplierRequest $request, CreateSupplierUseCase $use_case): JsonResponse
    {
        try {
            $params = [
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'description' => $request->input('description'),
                'active' => $request->input('active'),
            ];
            $response = $use_case->__invoke($params);

            return response()->json(new ($response));
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}
