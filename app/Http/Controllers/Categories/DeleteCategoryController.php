<?php

declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Categories\DeleteCategoryRequest;
use App\Http\Resources\Categories\DeleteCategoryResource;
use App\UseCases\Categories\DeleteCategoryUseCase;
use Illuminate\Http\JsonResponse;

class DeleteCategoryController extends BaseController
{
    public function __invoke(DeleteCategoryRequest $request, DeleteCategoryUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteCategoryResource($response));
    }
}
