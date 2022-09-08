<?php

declare(strict_types=1);

namespace App\UseCases\Accounts;

use App\Const\GlobalConst;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAccountUseCase
{
    public function __invoke($params): array
    {
        $params['password'] = Hash::make($params['password']);
        $account = User::create($params);
        if (!$account) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => 'Thêm tài khoản không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'account' => $account
        ];
    }
}
