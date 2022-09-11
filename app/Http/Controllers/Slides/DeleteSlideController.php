<?php

declare(strict_types=1);

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Slides\DeleteSlideRequest;
use App\Http\Resources\Slides\DeleteSlideResource;
use App\UseCases\Slides\DeleteSlideUseCase;
use Illuminate\Http\JsonResponse;

class DeleteSlideController extends BaseController
{
    public function __invoke(DeleteSlideRequest $request, DeleteSlideUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteSlideResource($response));
    }
}
