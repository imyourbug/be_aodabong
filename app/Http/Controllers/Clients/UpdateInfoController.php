<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Clients\UpdateInfoRequest;
use App\Http\Resources\Clients\UpdateInfoResource;
use App\UseCases\Clients\UpdateInfoUseCase;
use Illuminate\Http\JsonResponse;

class UpdateInfoController extends BaseController
{
    public function __invoke(UpdateInfoRequest $request, UpdateInfoUseCase $use_case): JsonResponse
    {
        $params = [
            'user' => $request->input('user'),
        ];
        $response = $use_case->__invoke($params);

        return response()->json(new UpdateInfoResource($response));
    }
}
