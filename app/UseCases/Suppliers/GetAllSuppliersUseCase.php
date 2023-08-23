<?php

declare(strict_types=1);

namespace App\UseCases\Suppliers;

use App\Const\GlobalConst;
use App\Models\Supplier;

class GetAllSuppliersUseCase
{
    public function __invoke(): array
    {
        $suppliers = Supplier::all();

        return [
            'status' => GlobalConst::STATUS_OK,
            'suppliers' => $suppliers
        ];
    }
}
