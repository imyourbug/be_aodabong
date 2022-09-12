<?php

declare(strict_types=1);

namespace App\UseCases\Slides;

use App\Const\GlobalConst;
use App\Models\Slide;

class GetAllSlidesUseCase
{
    public function __invoke(): array
    {
        $slides = Slide::get();
        if ($slides->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách slide trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'slides' => $slides
        ];
    }
}
