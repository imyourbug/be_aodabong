<?php

declare(strict_types=1);

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Vouchers\UpdateVoucherRequest;
use App\Http\Resources\Vouchers\UpdateVoucherResource;
use App\UseCases\Vouchers\UpdateVoucherUseCase;
use Illuminate\Http\JsonResponse;

class UpdateVoucherController extends BaseController
{
    public function __invoke(UpdateVoucherRequest $request, UpdateVoucherUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'discount' => $request->input('discount'),
            'active' => $request->input('active')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateVoucherResource($response));
    }
}
