<?php

declare(strict_types=1);

namespace App\UseCases\Uploads;

use App\Const\GlobalConst;
use Exception;

class UploadImageUseCase
{
    public function __invoke($image_file): array
    {
        try {
            // dd($image_file);
            $file_name = date('H-i-s') . $image_file->getClientOriginalName();
            $pathFull = 'uploads/' . date('Y-m-d');
            // $image_file->resize(640, 640);
            $image_file->storeAs(
                'public/' . $pathFull,
                $file_name
            );
            return [
                'status' => GlobalConst::STATUS_OK,
                'url' => env('DOMAIN') . '/storage/' . $pathFull . '/' . $file_name
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPLOAD_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
