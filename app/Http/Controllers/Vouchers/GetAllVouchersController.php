<?php

declare(strict_types=1);

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Vouchers\GetAllVouchersResource;
use App\UseCases\Vouchers\GetAllVouchersUseCase;
use Illuminate\Http\JsonResponse;

class GetAllVouchersController extends BaseController
{
    public function __invoke(GetAllVouchersUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllVouchersResource($response));
    }
}
