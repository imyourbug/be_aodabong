<?php

declare(strict_types=1);

namespace App\Http\Controllers\Uploads;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Uploads\UploadImageRequest;
use App\Http\Resources\Uploads\UploadImageResource;
use App\UseCases\Uploads\UploadImageUseCase;
use Illuminate\Http\JsonResponse;

class UploadImageController extends BaseController
{
    public function __invoke(UploadImageRequest $request, UploadImageUseCase $use_case): JsonResponse
    {
        $response = $use_case->__invoke($request->file('image_file'));

        return response()->json(new UploadImageResource($response));
    }
}
