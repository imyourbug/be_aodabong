<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authentications\Socials;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Authentications\Socials\SocialLoginRequest;
use App\Http\Resources\Authentications\Socials\SocialLoginResource;
use App\UseCases\Authentications\Socials\SocialLoginUseCase;
use Illuminate\Http\JsonResponse;

class SocialLoginController extends BaseController
{
    public function __invoke(SocialLoginRequest $request, SocialLoginUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'avatar' => $request->input('avatar'),
            'provider_user_id' => $request->input('provider_user_id'),
            'type' => $request->input('type'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new SocialLoginResource($response));
    }
}
