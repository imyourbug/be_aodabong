<?php

declare(strict_types=1);

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Slides\UpdateSlideRequest;
use App\Http\Resources\Slides\UpdateSlideResource;
use App\UseCases\Slides\UpdateSlideUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateSlideController extends BaseController
{
    public function __invoke(UpdateSlideRequest $request, UpdateSlideUseCase $use_case): JsonResponse
    {
        try {
            $params = [
                'id' => $request->input('id'),
                'image' => $request->input('image'),
                'active' => (int) $request->input('active'),
                'sort_by' => (int) $request->input('sort_by')
            ];
            $response = $use_case->__invoke($params);

            return response()->json(new UpdateSlideResource($response));
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}
