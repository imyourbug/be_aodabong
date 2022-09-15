<?php

declare(strict_types=1);

namespace App\Http\Controllers\Colors;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Colors\GetAllColorsResource;
use App\UseCases\Colors\GetAllColorsUseCase;
use Illuminate\Http\JsonResponse;

class GetAllColorsController extends BaseController
{
    public function __invoke(GetAllColorsUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllColorsResource($response));
    }
}
