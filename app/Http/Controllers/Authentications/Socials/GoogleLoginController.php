<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authentications\Socials;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Authentications\Socials\GoogleLoginRequest;
use App\Http\Resources\Authentications\Socials\GoogleLoginResource;
use App\UseCases\Authentications\Socials\GoogleLoginUseCase;
use Illuminate\Http\JsonResponse;

class GoogleLoginController extends BaseController
{
    public function __invoke(GoogleLoginRequest $request, GoogleLoginUseCase $use_case): JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'avatar' => $request->input('avatar'),
            'provider_user_id' => $request->input('provider_user_id'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new GoogleLoginResource($response));
    }
}
