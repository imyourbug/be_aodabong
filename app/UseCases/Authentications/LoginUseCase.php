<?php

declare(strict_types=1);

namespace App\UseCases\Authentications;

use App\Const\GlobalConst;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class LoginUseCase
{
    public function __invoke($params): array
    {
        if (!$token = JWTAuth::attempt($params)) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::LOGIN_FAILED,
                    'message' => 'Thông tin tài khoản hoặc mật khẩu không chính xác'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'user' => Auth::user(),
            'access_token' => $token
        ];
    }
}
