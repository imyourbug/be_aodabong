<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Clients\SearchProductByKeyWordResource;
use App\UseCases\Clients\SearchProductByKeyWordUseCase;
use Illuminate\Http\JsonResponse;

class SearchProductByKeyWordController extends BaseController
{
    public function __invoke($key_word, SearchProductByKeyWordUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($key_word);

        return response()->json(new SearchProductByKeyWordResource($response));
    }
}
