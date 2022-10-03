<?php

declare(strict_types=1);

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Accounts\UpdateAccountRequest;
use App\Http\Resources\Accounts\UpdateAccountResource;
use App\UseCases\Accounts\UpdateAccountUseCase;
use Illuminate\Http\JsonResponse;

class UpdateAccountController extends BaseController
{
    public function __invoke(UpdateAccountRequest $request, UpdateAccountUseCase $use_case): JsonResponse
    {
        $params = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => (int) $request->input('role'),
            'avatar' => $request->input('avatar'),
            'phone' => $request->input('phone'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'street' => $request->input('street'),
            'zip_code' => $request->input('zip_code')
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateAccountResource($response));
    }
}
