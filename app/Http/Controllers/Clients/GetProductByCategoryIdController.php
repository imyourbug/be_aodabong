<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Clients\GetProductByCategoryIdResource;
use App\UseCases\Clients\GetProductByCategoryIdUseCase;
use Illuminate\Http\JsonResponse;

class GetProductByCategoryIdController extends BaseController
{
    public function __invoke($id, GetProductByCategoryIdUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke((int) $id);

        return response()->json(new GetProductByCategoryIdResource($response));
    }
}
