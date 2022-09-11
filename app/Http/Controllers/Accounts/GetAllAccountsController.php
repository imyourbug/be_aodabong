<?php

declare(strict_types=1);

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Accounts\GetAllAccountsResource;
use App\UseCases\Accounts\GetAllAccountsUseCase;
use Illuminate\Http\JsonResponse;

class GetAllAccountsController extends BaseController
{
    public function __invoke(GetAllAccountsUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke();

        return response()->json(new GetAllAccountsResource($response));
    }
}
