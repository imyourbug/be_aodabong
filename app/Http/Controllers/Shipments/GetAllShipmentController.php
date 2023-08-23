<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shipments;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Shipments\GetAllShipmentResource;
use App\UseCases\Shipments\GetAllShipmentUseCase;
use Illuminate\Http\JsonResponse;

class GetAllShipmentController extends BaseController
{
    public function __invoke(GetAllShipmentUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllShipmentResource($response));
    }
}
