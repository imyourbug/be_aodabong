<?php

declare(strict_types=1);

namespace App\UseCases\Slides;

use App\Const\GlobalConst;
use App\Models\Slide;

class GetAllSlidesUseCase
{
    public function __invoke(): array
    {
        $slides = Slide::orderBy('sort_by')->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'slides' => $slides
        ];
    }
}
