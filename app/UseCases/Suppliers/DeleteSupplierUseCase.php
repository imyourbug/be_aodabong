<?php

declare(strict_types=1);

namespace App\UseCases\Suppliers;

use App\Const\GlobalConst;
use App\Models\Supplier;

class DeleteSupplierUseCase
{
    public function __invoke($id): array
    {
        $supplier = Supplier::firstWhere('id', $id) ?? '';
        if (!$supplier) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Nhà sản xuất không tồn tại!'
                ]
            ];
        }
        $delete_supplier = $supplier->delete();
        if (!$delete_supplier) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::DELETE_FAILED,
                    'message' => 'Xóa nhà sản xuất không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK
        ];
    }
}
