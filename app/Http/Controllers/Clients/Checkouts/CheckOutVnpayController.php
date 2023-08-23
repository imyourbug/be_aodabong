<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients\Checkouts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Clients\Checkouts\CheckOutVnpayRequest;
use App\Http\Resources\Clients\Checkouts\CheckOutVnpayResource;
use App\UseCases\Clients\Checkouts\CheckOutVnpayUseCase;
use Illuminate\Http\JsonResponse;

class CheckOutVnpayController extends BaseController
{
    public function __invoke(CheckOutVnpayRequest $request, CheckOutVnpayUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->all());

        return response()->json(new CheckOutVnpayResource($response));
    }
}
