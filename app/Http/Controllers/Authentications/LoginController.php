<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authentications;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Authentications\LoginRequest;
use App\Http\Resources\Authentications\LoginResource;
use App\UseCases\Authentications\LoginUseCase;
use Illuminate\Http\JsonResponse;

class LoginController extends BaseController
{
    public function __invoke(LoginRequest $request, LoginUseCase $use_case): JsonResponse
    {
        $params = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new LoginResource($response));
    }
}
