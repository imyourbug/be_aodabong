<?php

declare(strict_types=1);

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Comments\DeleteCommentRequest;
use App\Http\Resources\Comments\DeleteCommentResource;
use App\UseCases\Comments\DeleteCommentUseCase;
use Illuminate\Http\JsonResponse;

class DeleteCommentController extends BaseController
{
    public function __invoke(DeleteCommentRequest $request, DeleteCommentUseCase $use_case): JsonResponse
    {

        $id = $request->input('id');
        $response = $use_case->__invoke((int) $id);

        return response()->json(new DeleteCommentResource($response));
    }
}
