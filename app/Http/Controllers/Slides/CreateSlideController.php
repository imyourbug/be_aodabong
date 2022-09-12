<?php

declare(strict_types=1);

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Slides\CreateSlideRequest;
use App\Http\Resources\Slides\CreateSlideResource;
use App\UseCases\Slides\CreateSlideUseCase;
use Illuminate\Http\JsonResponse;

class CreateSlideController extends BaseController
{
    public function __invoke(CreateSlideRequest $request, CreateSlideUseCase $use_case): JsonResponse
    {
        $params = [
            'image' => $request->input('image'),
            'active' => (int) $request->input('active'),
            'sort_by' => (int) $request->input('sort_by')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateSlideResource($response));
    }
}
