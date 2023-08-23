<?php

declare(strict_types=1);

namespace App\UseCases\Accounts;

use App\Const\GlobalConst;
use App\Models\User;

class GetAllAccountsUseCase
{
    public function __invoke(): array
    {
        $accounts = User::all();
        if ($accounts->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách tài khoản trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'accounts' => $accounts
        ];
    }
}
