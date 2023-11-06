<?php

declare(strict_types=1);

namespace App\UseCases\Authentications\Socials;

use App\Const\GlobalConst;
use App\Models\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class SocialLoginUseCase
{
    public function __invoke($params): array
    {
        try {
            $social_account = Social::with('user')->firstWhere('provider_user_id', $params['provider_user_id']);
            $user = null;
            if (!$social_account) {
                $user = User::firstOrCreate(
                    ['email' => $params['email']],
                    [
                        'name' => $params['name'],
                        'password' => Hash::make(12345678),
                        'avatar' => $params['avatar'],
                    ]
                );
                $social_account = Social::create([
                    'user_id' => $user->id,
                    'provider_user_id' => $params['provider_user_id'],
                    'provider' => $params['type']
                ]);
            } else {
                User::where('id', $social_account->user_id)->update([
                    'name' => $params['name'],
                    'avatar' => $params['avatar'],
                ]);
            }
            $token = JWTAuth::fromUser($social_account->user);

            return [
                'status' => GlobalConst::STATUS_OK,
                'user' => $social_account->refresh(),
                'access_token' => $token,
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
