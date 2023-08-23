<?php

declare(strict_types=1);

namespace App\UseCases\Vouchers;

use App\Const\GlobalConst;
use App\Models\Voucher;

class GetAllVouchersUseCase
{
    public function __invoke(): array
    {
        $vouchers = Voucher::all();

        return [
            'status' => GlobalConst::STATUS_OK,
            'vouchers' => $vouchers
        ];
    }
}
