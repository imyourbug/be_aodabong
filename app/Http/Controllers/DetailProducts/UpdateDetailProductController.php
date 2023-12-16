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
            'product_id' => $request->input('product_id'),
            'code_size' => $request->input('code_size'),
            'code_color' => $request->input('code_color'),
            'unit_in_stock' => (int) $request->input('unit_in_stock'),
            'thumb' => $request->input('thumb')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateDetailProductResource($response));
    }
}
