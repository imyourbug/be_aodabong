<?php

declare(strict_types=1);

namespace App\UseCases\Accounts;

use App\Const\GlobalConst;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateAccountUseCase
{
    public function __invoke($params): array
    {
        $account = User::firstWhere('id', $params['id']) ?? '';
        if (!$account) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Tài khoản không tồn tại!'
                ]
            ];
        }
        $params['password'] = Hash::make($params['password']);
        $update_account = $account->update($params);
        if (!$update_account) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => 'Cập nhật không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK
        ];
    }
}
