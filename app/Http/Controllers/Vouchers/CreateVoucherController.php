<?php

declare(strict_types=1);

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Vouchers\CreateVoucherRequest;
use App\Http\Resources\Vouchers\CreateVoucherResource;
use App\UseCases\Vouchers\CreateVoucherUseCase;
use Illuminate\Http\JsonResponse;

class CreateVoucherController extends BaseController
{
    public function __invoke(CreateVoucherRequest $request, CreateVoucherUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'discount' => $request->input('discount'),
            'active' => $request->input('active')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new CreateVoucherResource($response));
    }
}
