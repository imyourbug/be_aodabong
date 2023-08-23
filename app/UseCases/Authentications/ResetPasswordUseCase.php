<?php

declare(strict_types=1);

namespace App\UseCases\Authentications;

use App\Const\GlobalConst;
use App\Jobs\RecoverPasswordJob;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class ResetPasswordUseCase
{
    public function __invoke(string $email): array
    {
        try {
            $user = User::firstWhere('email', $email) ?? '';
            if (!$user) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Tài khoản không tồn tại'
                    ]
                ];
            }
            $source = ['a', 'b', 'c', 'd', 'e', 'g', 1, 2, 3, 4, 5, 6];
            $new_password = '';
            foreach ($source as $s) {
                $new_password .= $source[rand(0, count($source) - 1)];
            }
            $reset_password = $user->update([
                'password' => Hash::make($new_password)
            ]);
            if ($reset_password) {
                RecoverPasswordJob::dispatch($email, $new_password);
            }

            return [
                'status' => GlobalConst::STATUS_OK,
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
