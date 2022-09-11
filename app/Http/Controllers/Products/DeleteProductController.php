<?php

declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Products\DeleteProductRequest;
use App\Http\Resources\Products\DeleteProductResource;
use App\UseCases\Products\DeleteProductUseCase;
use Illuminate\Http\JsonResponse;

class DeleteProductController extends BaseController
{
    public function __invoke(DeleteProductRequest $request, DeleteProductUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteProductResource($response));
    }
}
