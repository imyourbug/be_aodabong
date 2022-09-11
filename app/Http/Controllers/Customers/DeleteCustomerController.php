<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Customers\DeleteCustomerRequest;
use App\Http\Resources\Customers\DeleteCustomerResource;
use App\UseCases\Customers\DeleteCustomerUseCase;
use Illuminate\Http\JsonResponse;

class DeleteCustomerController extends BaseController
{
    public function __invoke(DeleteCustomerRequest $request, DeleteCustomerUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteCustomerResource($response));
    }
}
