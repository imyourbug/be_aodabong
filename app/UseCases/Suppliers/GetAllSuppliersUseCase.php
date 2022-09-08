<?php

declare(strict_types=1);

namespace App\UseCases\Suppliers;

use App\Const\GlobalConst;
use App\Models\Supplier;

class GetAllSuppliersUseCase
{
    public function __invoke(): array
    {
        $suppliers = Supplier::get();
        if ($suppliers->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách nhà cung cấp trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'suppliers' => $suppliers
        ];
    }
}
