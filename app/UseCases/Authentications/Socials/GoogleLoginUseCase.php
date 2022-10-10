<?php

declare(strict_types=1);

namespace App\UseCases\Authentications\Socials;

use App\Const\GlobalConst;
use App\Models\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class GoogleLoginUseCase
{
    public const PROVIDER = 'GOOGLE';

    public function __invoke($params): array
    {
        try {
            $google_account = Social::firstWhere('provider_user_id', $params['provider_user_id']) ?? '';
            if (!$google_account) {
                $user = User::firstOrCreate(
                    ['email' => $params['email']],
                    [
                        'name' => $params['name'],
                        'password' => '',
                        'avatar' => $params['avatar'],
                    ]
                );
                $google_account = Social::create([
                    'user_id' => $user->id,
                    'provider_user_id' => $params['provider_user_id'],
                    'provider' => self::PROVIDER
                ]);
            } else User::where('id', $google_account->user_id)->update([
                'name' => $params['name'],
                'avatar' => $params['avatar'],
            ]);

            return [
                'status' => GlobalConst::STATUS_OK,
                'data' => [
                    $google_account->user,
                    $google_account
                ]
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
