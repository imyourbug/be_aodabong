<?php

declare(strict_types=1);

namespace App\Http\Controllers\DetailProducts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\DetailProducts\CreateDetailProductRequest;
use App\Http\Resources\DetailProducts\CreateDetailProductResource;
use App\UseCases\DetailProducts\CreateDetailProductUseCase;
use Illuminate\Http\JsonResponse;

class CreateDetailProductController extends BaseController
{
    public function __invoke(CreateDetailProductRequest $request, CreateDetailProductUseCase $use_case): JsonResponse
    {
        $params = [
            'product_id' => $request->input('product_id'),
            'code_color' => $request->input('code_color'),
            'code_size' => $request->input('code_size'),
            'unit_in_stock' => (int) $request->input('unit_in_stock'),
            'thumb' => $request->input('thumb')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateDetailProductResource($response));
    }
}
