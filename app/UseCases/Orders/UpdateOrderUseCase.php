<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Const\GlobalConst;
use App\Models\Order;
use Exception;

class UpdateOrderUseCase
{
    public function __invoke(array $params): array
    {
        try {
            $order = Order::firstWhere('id', $params['id']) ?? '';
            if (!$order) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Đơn hàng không tồn tại!'
                    ]
                ];
            }
            $order->update([
                'status' => $params['status']
            ]);

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
