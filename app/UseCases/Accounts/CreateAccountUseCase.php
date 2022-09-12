<?php

declare(strict_types=1);

namespace App\UseCases\Accounts;

use App\Const\GlobalConst;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class CreateAccountUseCase
{
    public function __invoke($params): array
    {
        try {
            $params['password'] = Hash::make($params['password']);
            $account = User::create($params);

            return [
                'status' => GlobalConst::STATUS_OK,
                'account' => $account
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
