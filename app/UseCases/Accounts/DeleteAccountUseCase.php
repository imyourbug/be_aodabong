<?php

declare(strict_types=1);

namespace App\UseCases\Accounts;

use App\Const\GlobalConst;
use App\Models\User;
use Exception;

class DeleteAccountUseCase
{
    public function __invoke($id): array
    {
        try {
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
            $account->delete();

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
