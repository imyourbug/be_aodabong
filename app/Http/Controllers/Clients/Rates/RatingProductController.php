<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients\Rates;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Rates\RatingProductRequest;
use App\Http\Resources\Rates\RatingProductResource;
use App\UseCases\Rates\RatingProductUseCase;
use Illuminate\Http\JsonResponse;

class RatingProductController extends BaseController
{
    public function __invoke(RatingProductRequest $request, RatingProductUseCase $use_case): JsonResponse
    {
        $params = [
            'user_id' => $request->input('user_id'),
            'product_id' => $request->input('product_id'),
            'level_star' => $request->input('level_star'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new RatingProductResource($response));
    }
}
