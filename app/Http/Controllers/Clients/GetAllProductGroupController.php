<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Clients\GetAllProductGroupResource;
use App\UseCases\Clients\GetAllProductGroupUseCase;
use Illuminate\Http\JsonResponse;

class GetAllProductGroupController extends BaseController
{
    public function __invoke(GetAllProductGroupUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllProductGroupResource($response));
    }
}
