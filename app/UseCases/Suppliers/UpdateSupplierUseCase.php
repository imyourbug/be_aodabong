<?php

declare(strict_types=1);

namespace App\UseCases\Suppliers;

use App\Const\GlobalConst;
use App\Models\Supplier;

class UpdateSupplierUseCase
{
    public function __invoke($params): array
    {
        $supplier = Supplier::firstWhere('id', $params['id']) ?? '';
        if (!$supplier) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Nhà sản xuất không tồn tại!'
                ]
            ];
        }
        $update_supplier = $supplier->update($params);
        if (!$update_supplier) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => 'Cập nhật không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK
        ];
    }
}
