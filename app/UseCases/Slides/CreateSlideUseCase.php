<?php

declare(strict_types=1);

namespace App\UseCases\Slides;

use App\Const\GlobalConst;
use App\Models\Slide;

class CreateSlideUseCase
{
    public function __invoke($params): array
    {
        $slide = Slide::create($params);
        if (!$slide) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => 'Thêm slide không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'slide' => $slide
        ];
    }
}
