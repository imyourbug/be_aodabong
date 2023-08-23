<?php

declare(strict_types=1);

namespace App\UseCases\Categories;

use App\Const\GlobalConst;
use App\Models\Shipment;

class GetDetailShipmentUseCase
{
    public function __invoke(string $shipment_id): array
    {
        $shipment = Shipment::with('orders')->firstWhere('id', $shipment_id) ?? '';
        if (!$shipment) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Vận chuyển không tồn tại!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'shipment' => $shipment
        ];
    }
}
