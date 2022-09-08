<?php

declare(strict_types=1);

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Accounts\UpdateAccountRequest;
use App\Http\Resources\Accounts\UpdateAccountResource;
use App\UseCases\Accounts\UpdateAccountUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateAccountController extends BaseController
{
    public function __invoke(UpdateAccountRequest $request, UpdateAccountUseCase $use_case): JsonResponse
    {
        try {
            $params = [
                'id' => $request->input('id'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => (integer) $request->input('role'),
                'avatar' => $request->input('avatar'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone')
            ];
            $response = $use_case->__invoke($params);

            return response()->json(new UpdateAccountResource($response));
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}
