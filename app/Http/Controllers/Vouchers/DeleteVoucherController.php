<?php

declare(strict_types=1);

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Vouchers\DeleteVoucherRequest;
use App\Http\Resources\Vouchers\DeleteVoucherResource;
use App\UseCases\Vouchers\DeleteVoucherUseCase;
use Illuminate\Http\JsonResponse;

class DeleteVoucherController extends BaseController
{
    public function __invoke(DeleteVoucherRequest $request, DeleteVoucherUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->input('id'));

        return response()->json(new DeleteVoucherResource($response));
    }
}
