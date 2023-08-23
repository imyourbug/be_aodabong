<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shipments;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Shipments\GetDetailShipmentResource;
use App\UseCases\Shipments\GetDetailShipmentUseCase;
use Illuminate\Http\JsonResponse;

class GetDetailShipmentController extends BaseController
{
    public function __invoke($Shipment_id, GetDetailShipmentUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($Shipment_id);

        return response()->json(new GetDetailShipmentResource($response));
    }
}
