<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shipments;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Shipments\CreateShipmentRequest;
use App\Http\Resources\Shipments\CreateShipmentResource;
use App\UseCases\Shipments\CreateShipmentUseCase;
use Illuminate\Http\JsonResponse;

class CreateShipmentController extends BaseController
{
    public function __invoke(CreateShipmentRequest $request, CreateShipmentUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'fee' => $request->input('fee'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateShipmentResource($response));
    }
}
