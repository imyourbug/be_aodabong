<?php

declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Http\Controllers\BaseController;
use App\Http\Resources\DetailProducts\GetAllDetailProductsResource;
use Illuminate\Http\JsonResponse;

class GetAllDetailProductsController extends BaseController
{
    public function __invoke($use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllDetailProductsResource($response));
    }
}
