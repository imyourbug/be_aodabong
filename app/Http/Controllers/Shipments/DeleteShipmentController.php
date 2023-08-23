<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shipments;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Shipments\DeleteShipmentRequest;
use App\Http\Resources\Shipments\DeleteShipmentResource;
use App\UseCases\Shipments\DeleteShipmentUseCase;
use Illuminate\Http\JsonResponse;

class DeleteShipmentController extends BaseController
{
    public function __invoke(DeleteShipmentRequest $request, DeleteShipmentUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteShipmentResource($response));
    }
}
