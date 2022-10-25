<?php

declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Products\DeleteAllProductRequest;
use App\Http\Resources\Products\DeleteAllProductResource;
use App\UseCases\Products\DeleteAllProductUseCase;
use Illuminate\Http\JsonResponse;

class DeleteAllProductController extends BaseController
{
    public function __invoke(DeleteAllProductRequest $request, DeleteAllProductUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('ids'));

        return response()->json(new DeleteAllProductResource($response));
    }
}
