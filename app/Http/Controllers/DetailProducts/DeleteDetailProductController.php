<?php

declare(strict_types=1);

namespace App\Http\Controllers\DetailProducts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\DetailProducts\DeleteDetailProductRequest;
use App\Http\Resources\DetailProducts\DeleteDetailProductResource;
use App\UseCases\DetailProducts\DeleteDetailProductUseCase;
use Illuminate\Http\JsonResponse;

class DeleteDetailProductController extends BaseController
{
    public function __invoke(DeleteDetailProductRequest $request, DeleteDetailProductUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteDetailProductResource($response));
    }
}
