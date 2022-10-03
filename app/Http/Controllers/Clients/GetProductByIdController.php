<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Clients\GetProductByIdResource;
use App\UseCases\Clients\GetProductByIdUseCase;
use Illuminate\Http\JsonResponse;

class GetProductByIdController extends BaseController
{
    public function __invoke($id, GetProductByIdUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke((int)$id);

        return response()->json(new GetProductByIdResource($response));
    }
}
