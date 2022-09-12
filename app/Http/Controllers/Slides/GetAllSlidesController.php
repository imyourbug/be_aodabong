<?php

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Slides\GetAllSlidesResource;
use App\UseCases\Slides\GetAllSlidesUseCase;
use Illuminate\Http\JsonResponse;

class GetAllSlidesController extends BaseController
{
    public function __invoke(GetAllSlidesUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllSlidesResource($response));
    }
}
