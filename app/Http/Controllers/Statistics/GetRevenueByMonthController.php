<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Statistics\GetRevenueByMonthResource;
use App\UseCases\Statistics\GetRevenueByMonthUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetRevenueByMonthController extends BaseController
{
    public function __invoke(Request $request, GetRevenueByMonthUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('from'), $request->input('to'));

        return response()->json(new GetRevenueByMonthResource($response));
    }
}
