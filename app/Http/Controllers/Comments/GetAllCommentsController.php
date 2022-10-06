<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Comments\GetAllCommentsResource;
use App\UseCases\Comments\GetAllCommentsUseCase;
use Illuminate\Http\JsonResponse;

class GetAllCommentsController extends BaseController
{
    public function __invoke(GetAllCommentsUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllCommentsResource($response));
    }
}
