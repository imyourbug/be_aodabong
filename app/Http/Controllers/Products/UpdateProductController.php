<?php

declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Resources\Products\UpdateProductResource;
use App\UseCases\Products\UpdateProductUseCase;
use Illuminate\Http\JsonResponse;

class UpdateProductController extends BaseController
{
    public function __invoke(UpdateProductRequest $request, UpdateProductUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'category_id' => (int) $request->input('category_id'),
            'supplier_id' => (int) $request->input('supplier_id'),
            'price' => (int) $request->input('price'),
            'price_sale' => $request->input('price_sale'),
            'active' => (int) $request->input('active'),
            'thumb' => $request->input('thumb')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateProductResource($response));
    }
}
