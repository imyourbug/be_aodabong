<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use App\Models\ProductDetail;

class GetAllDetailProductUseCase
{
    public function __invoke(): array
    {
        $details = ProductDetail::with('product')->orderByDesc('id')->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => $details
        ];
    }
}
