<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Users\GetProductByIdResource;
use App\UseCases\Users\GetProductByIdUseCase;
use Illuminate\Http\JsonResponse;

class GetProductByIdController extends BaseController
{
    public function __invoke($id, GetProductByIdUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($id);

        return response()->json(new GetProductByIdResource($response));
    }
}
