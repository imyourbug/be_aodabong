<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Comments\CreateCommentRequest;
use App\Http\Resources\Comments\CreateCommentResource;
use App\UseCases\Comments\CreateCommentUseCase;
use Illuminate\Http\JsonResponse;

class CreateCommentController extends BaseController
{
    public function __invoke(CreateCommentRequest $request, CreateCommentUseCase $use_case): JsonResponse
    {
        $params = [
            'user_id' => $request->input('user_id'),
            'product_id' => $request->input('product_id'),
            'reply_id' => $request->input('reply_id'),
            'content' => $request->input('content'),
            'level_star' => $request->input('level_star'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateCommentResource($response));
    }
}
