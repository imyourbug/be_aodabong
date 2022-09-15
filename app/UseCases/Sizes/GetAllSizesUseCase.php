<?php

declare(strict_types=1);

namespace App\UseCases\Sizes;

use App\Const\GlobalConst;
use App\Models\Size;

class GetAllSizesUseCase
{
    public function __invoke(): array
    {
        $sizes = Size::get();
        if ($sizes->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách kích cỡ trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'sizes' => $sizes
        ];
    }
}
