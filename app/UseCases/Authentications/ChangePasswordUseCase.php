<?php

declare(strict_types=1);

namespace App\UseCases\Authentications;

use App\Const\GlobalConst;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordUseCase
{
    public function __invoke($params): array
    {
        if (!Auth::attempt([
            'email' => $params['email'],
            'password' => $params['password']
        ])) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::LOGIN_FAILED,
                    'message' => 'Mật khẩu cũ không chính xác'
                ]
            ];
        }
        if ($params['password'] === $params['new_password']) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::INVALID_ERROR,
                    'message' => 'Mật khẩu mới không được trùng với mật khẩu cũ'
                ]
            ];
        }
        if ($params['re_new_password'] !== $params['new_password']) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::INVALID_ERROR,
                    'message' => 'Mật khẩu nhập lại không trùng khớp'
                ]
            ];
        }
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update([
            'password' => Hash::make($params['new_password'])
        ]);

        return [
            'status' => GlobalConst::STATUS_OK,
        ];
    }
}
