<?php

declare(strict_types=1);

namespace App\UseCases\Accounts;

use App\Const\GlobalConst;
use App\Models\User;

class DeleteAccountUseCase
{
    public function __invoke($id): array
    {
        $account = User::firstWhere('id', $id) ?? '';
        if (!$account) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Tài khoản không tồn tại!'
                ]
            ];
        }
        $delete_account = $account->delete();
        if (!$delete_account) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::DELETE_FAILED,
                    'message' => 'Xóa tài khoản không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK
        ];
    }
}
