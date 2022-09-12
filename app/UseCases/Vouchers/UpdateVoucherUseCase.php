<?php

declare(strict_types=1);

namespace App\UseCases\Vouchers;

use App\Const\GlobalConst;
use App\Models\Voucher;
use Exception;

class UpdateVoucherUseCase
{
    public function __invoke($params): array
    {
        try {
            $voucher = Voucher::firstWhere('id', $params['id']) ?? '';
            if (!$voucher) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Khuyến mãi không tồn tại!'
                    ]
                ];
            }
            $voucher->update($params);

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
