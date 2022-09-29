<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authentications;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Authentications\ChangePasswordRequest;
use App\Http\Resources\Authentications\ChangePasswordResource;
use App\UseCases\Authentications\ChangePasswordUseCase;
use Illuminate\Http\JsonResponse;

class ChangePasswordController extends BaseController
{
    public function __invoke(ChangePasswordRequest $request, ChangePasswordUseCase $use_case): JsonResponse
    {
        $params = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'new_password' => $request->input('new_password'),
            're_new_password' => $request->input('re_new_password'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new ChangePasswordResource($response));
    }
}
