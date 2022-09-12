<?php

declare(strict_types=1);

namespace App\UseCases\Vouchers;

use App\Const\GlobalConst;
use App\Models\Voucher;

class GetAllVouchersUseCase
{
    public function __invoke(): array
    {
        $vouchers = Voucher::get();
        if ($vouchers->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách khuyến mãi trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'vouchers' => $vouchers
        ];
    }
}
