<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Clients\CheckOutRequest;
use App\Http\Resources\Clients\CheckOutResource;
use App\UseCases\Clients\CheckOutUseCase;
use Illuminate\Http\JsonResponse;

class CheckOutController extends BaseController
{
    public function __invoke(CheckOutRequest $request, CheckOutUseCase $use_case): JsonResponse
    {
        $params = [];
        $response = $use_case->__invoke($params);

        return response()->json(new CheckOutResource($response));
    }
}
