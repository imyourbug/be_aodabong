<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Comments\UpdateCommentRequest;
use App\Http\Resources\Comments\UpdateCommentResource;
use App\UseCases\Comments\UpdateCommentUseCase;
use Illuminate\Http\JsonResponse;

class UpdateCommentController extends BaseController
{
    public function __invoke(UpdateCommentRequest $request, UpdateCommentUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'content' => $request->input('content')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateCommentResource($response));
    }
}
