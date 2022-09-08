<?php

declare(strict_types=1);

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Accounts\DeleteAccountRequest;
use App\Http\Resources\Accounts\DeleteAccountResource;
use App\UseCases\Accounts\DeleteAccountUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class DeleteAccountController extends BaseController
{
    public function __invoke(DeleteAccountRequest $request, DeleteAccountUseCase $use_case): JsonResponse
    {
        try {
            $response = $use_case->__invoke($request->input('id'));

            return response()->json(new DeleteAccountResource($response));
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}
