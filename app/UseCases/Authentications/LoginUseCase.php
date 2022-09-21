<?php

declare(strict_types=1);

namespace App\UseCases\Authentications;

use App\Const\GlobalConst;
use Illuminate\Support\Facades\Auth;

class LoginUseCase
{
    public function __invoke($params): array
    {
        if (!Auth::attempt($params)) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::LOGIN_FAILED,
                    'message' => 'Thông tin tài khoản hoặc mật khẩu không chính xác'
                ]
            ];
        }
        $token = Auth::user()->createToken('auth_token')->accessToken;
        if (!$token) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Token trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => [
                'user' => Auth::user(),
                'token' => $token
            ]
        ];
    }
}
