<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Clients\GetAllDetailProductResource;
use App\UseCases\Clients\GetAllDetailProductUseCase;
use Illuminate\Http\JsonResponse;

class GetAllDetailProductController extends BaseController
{
    public function __invoke(GetAllDetailProductUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllDetailProductResource($response));
    }
}
