<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\ProductDetail;

class GetAllDetailProductUseCase
{
    public function __invoke(): array
    {
        $details = ProductDetail::orderByDesc('id')->get();
        if ($details->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách chi tiết sản phẩm trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => $details
        ];
    }
}
