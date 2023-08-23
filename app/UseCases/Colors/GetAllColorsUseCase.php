<?php

declare(strict_types=1);

namespace App\UseCases\Colors;

use App\Const\GlobalConst;
use App\Models\Color;

class GetAllColorsUseCase
{
    public function __invoke(): array
    {
        $colors = Color::all();
        if ($colors->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách màu sắc trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'colors' => $colors
        ];
    }
}
