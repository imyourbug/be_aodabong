<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authentications;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Authentications\ResetPasswordRequest;
use App\Http\Resources\Authentications\ResetPasswordResource;
use App\UseCases\Authentications\ResetPasswordUseCase;
use Illuminate\Http\JsonResponse;

class ResetPasswordController extends BaseController
{
    public function __invoke(ResetPasswordRequest $request, ResetPasswordUseCase $use_case): JsonResponse
    {
        $email = $request->input('email');
        $response = $use_case->__invoke($email);

        return response()->json(new ResetPasswordResource($response));
    }
}
