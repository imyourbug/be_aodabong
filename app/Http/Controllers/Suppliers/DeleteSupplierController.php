<?php

declare(strict_types=1);

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Suppliers\DeleteSupplierRequest;
use App\Http\Resources\Suppliers\DeleteSupplierResource;
use App\UseCases\Suppliers\DeleteSupplierUseCase;
use Illuminate\Http\JsonResponse;

class DeleteSupplierController extends BaseController
{
    public function __invoke(DeleteSupplierRequest $request, DeleteSupplierUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteSupplierResource($response));
    }
}
