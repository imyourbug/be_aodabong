<?php

declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Resources\Products\CreateProductResource;
use App\UseCases\Products\CreateProductUseCase;
use Illuminate\Http\JsonResponse;

class CreateProductController extends BaseController
{
    public function __invoke(CreateProductRequest $request, CreateProductUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'category_id' => (int) $request->input('category_id'),
            'supplier_id' => (int) $request->input('supplier_id'),
            'price' => (int) $request->input('price'),
            'price_sale' => $request->input('price_sale'),
            'active' => (int) $request->input('active'),
            'thumb' => $request->input('thumb')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateProductResource($response));
    }
}
