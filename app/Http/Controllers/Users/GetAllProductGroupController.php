<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Users\GetAllProductGroupResource;
use App\UseCases\Users\GetAllProductGroupUseCase;
use Illuminate\Http\JsonResponse;

class GetAllProductGroupController extends BaseController
{
    public function __invoke(GetAllProductGroupUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllProductGroupResource($response));
    }
}
