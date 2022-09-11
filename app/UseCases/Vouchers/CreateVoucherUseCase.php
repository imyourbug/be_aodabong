<?php

declare(strict_types=1);

namespace App\UseCases\Vouchers;

use App\Const\GlobalConst;
use App\Models\Voucher;
use Exception;

class CreateVoucherUseCase
{
    public function __invoke($params): array
    {
        try {
            $voucher = Voucher::create($params);

            return [
                'status' => GlobalConst::STATUS_OK,
                'voucher' => $voucher
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
