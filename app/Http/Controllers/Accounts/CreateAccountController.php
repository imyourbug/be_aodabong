<?php

declare(strict_types=1);

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Accounts\CreateAccountRequest;
use App\Http\Resources\Accounts\CreateAccountResource;
use App\UseCases\Accounts\CreateAccountUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class CreateAccountController extends BaseController
{
    public function __invoke(CreateAccountRequest $request, CreateAccountUseCase $use_case): JsonResponse
    {
        try {
            $params = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => (integer) $request->input('role'),
                'avatar' => $request->input('avatar'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone')
            ];
            $response = $use_case->__invoke($params);

            return response()->json(new CreateAccountResource($response));
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}