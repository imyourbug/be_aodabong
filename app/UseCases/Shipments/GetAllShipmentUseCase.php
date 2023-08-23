<?php

declare(strict_types=1);

namespace App\UseCases\Shipments;

use App\Const\GlobalConst;
use App\Models\Shipment;

class GetAllShipmentUseCase
{
    public function __invoke(): array
    {
        $shipments = Shipment::with('orders')->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'shipments' => $shipments
        ];
    }
}
