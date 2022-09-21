<?php

declare(strict_types=1);

namespace App\Http\Controllers\DetailProducts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\DetailProducts\UpdateDetailProductRequest;
use App\Http\Resources\DetailProducts\UpdateDetailProductResource;
use App\UseCases\DetailProducts\UpdateDetailProductUseCase;
use Illuminate\Http\JsonResponse;

class UpdateDetailProductController extends BaseController
{
    public function __invoke(UpdateDetailProductRequest $request, UpdateDetailProductUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'price' => (int) $request->input('price'),
            'price_sale' => (int) $request->input('price_sale') ?? null,
            'unit_in_stock' => $request->input('unit_in_stock'),
            'thumb' => $request->input('thumb')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateDetailProductResource($response));
    }
}
