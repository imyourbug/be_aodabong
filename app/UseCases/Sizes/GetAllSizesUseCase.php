<?php

declare(strict_types=1);

namespace App\UseCases\Sizes;

use App\Const\GlobalConst;
use App\Models\Size;

class GetAllSizesUseCase
{
    public function __invoke(): array
    {
        $sizes = Size::all();

        return [
            'status' => GlobalConst::STATUS_OK,
            'sizes' => $sizes
        ];
    }
}
