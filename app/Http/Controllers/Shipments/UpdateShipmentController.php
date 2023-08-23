<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shipments;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Shipments\UpdateShipmentRequest;
use App\Http\Resources\Shipments\UpdateShipmentResource;
use App\UseCases\Shipments\UpdateShipmentUseCase;
use Illuminate\Http\JsonResponse;

class UpdateShipmentController extends BaseController
{
    public function __invoke(UpdateShipmentRequest $request, UpdateShipmentUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'fee' => $request->input('fee'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateShipmentResource($response));
    }
}
