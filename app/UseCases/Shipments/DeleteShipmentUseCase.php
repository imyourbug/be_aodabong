<?php

declare(strict_types=1);

namespace App\UseCases\Shipments;

use App\Const\GlobalConst;
use App\Models\Shipment;
use Exception;

class DeleteShipmentUseCase
{
    public function __invoke($id): array
    {
        try {
            $shipment = Shipment::firstWhere('id', $id) ?? '';
            if (!$shipment) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Danh mục không tồn tại!'
                    ]
                ];
            }
            $shipment->delete();

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::DELETE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
