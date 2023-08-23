<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Const\GlobalConst;
use App\Models\Order;
use Exception;

class DeleteOrderUseCase
{
    public function __invoke($id): array
    {
        try {
            $order = Order::firstWhere('id', $id) ?? '';
            if (!$order) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Đơn hàng không tồn tại!'
                    ]
                ];
            }
            $order->delete();

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
