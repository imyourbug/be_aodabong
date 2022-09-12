<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Users\GetProductByCategoryIdResource;
use App\UseCases\Users\GetProductByCategoryIdUseCase;
use Illuminate\Http\JsonResponse;

class GetProductByCategoryIdController extends BaseController
{
    public function __invoke($id, GetProductByCategoryIdUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($id);

        return response()->json(new GetProductByCategoryIdResource($response));
    }
}
