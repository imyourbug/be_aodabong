<?php

declare(strict_types=1);

namespace App\UseCases\Suppliers;

use App\Const\GlobalConst;
use App\Models\Supplier;

class CreateSupplierUseCase
{
    public function __invoke($params): array
    {
        $supplier = Supplier::create($params);
        if (!$supplier) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => 'Thêm nhà sản xuất không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'supplier' => $supplier
        ];
    }
}
