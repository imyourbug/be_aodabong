<?php

declare(strict_types=1);

namespace App\UseCases\Shipments;

use App\Const\GlobalConst;
use App\Models\Shipment;
use Exception;
use Illuminate\Support\Str;

class UpdateShipmentUseCase
{
    public function __invoke($params): array
    {
        try {
            $shipment = Shipment::firstWhere('id', $params['id']) ?? '';
            if (!$shipment) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Danh mục không tồn tại!'
                    ]
                ];
            }
            $params['slug'] = Str::slug($params['name'], '-');
            $shipment->update($params);

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
