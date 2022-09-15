<?php

declare(strict_types=1);

namespace App\Http\Controllers\Sizes;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Sizes\GetAllSizesResource;
use App\UseCases\Sizes\GetAllSizesUseCase;
use Illuminate\Http\JsonResponse;

class GetAllSizesController extends BaseController
{
    public function __invoke(GetAllSizesUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllSizesResource($response));
    }
}
