<?php

declare(strict_types=1);

namespace App\UseCases\Shipments;

use App\Const\GlobalConst;
use App\Models\Shipment;
use Exception;

class CreateShipmentUseCase
{
    public function __invoke($params): array
    {
        try {
            $shipment = Shipment::create($params);

            return [
                'status' => GlobalConst::STATUS_OK,
                'shipment' => $shipment
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
