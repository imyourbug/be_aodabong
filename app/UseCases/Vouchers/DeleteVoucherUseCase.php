<?php

declare(strict_types=1);

namespace App\UseCases\Vouchers;

use App\Const\GlobalConst;
use App\Models\Voucher;
use Exception;

class DeleteVoucherUseCase
{
    public function __invoke($id): array
    {
        try {
            $voucher = Voucher::firstWhere('id', $id) ?? '';
            if (!$voucher) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Khuyến mãi không tồn tại!'
                    ]
                ];
            }
            $voucher->delete();

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::DELETE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
