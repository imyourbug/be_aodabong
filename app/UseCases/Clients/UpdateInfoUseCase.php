<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\User;
use Exception;

class UpdateInfoUseCase
{
    public function __invoke(array $params): array
    {
        try {
            $user = User::find($params['user']['id']) ?? '';
            if (!$user) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Không tồn tại tài khoản'
                    ]
                ];
            }
            $update_info = $user->update($params['user']);
            if (!$update_info) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::UPDATE_FAILED,
                        'message' => 'Cập nhật tài khoản không thành công'
                    ]
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'user' => $user->refresh()
        ];
    }
}
