<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Const\GlobalConst;
use App\Models\Order;

class SearchOrderUseCase
{
    public function __invoke(array $params): array
    {
        $order = Order::with(['order_details.product_detail.product', 'customer'])
            ->where('id', $params['id'])
            ->first();
        if ($order?->customer->email === $params['email']) {
            return [
                'status' => GlobalConst::STATUS_OK,
                'order' => $order,
            ];
        }

        return [
            'status' => GlobalConst::STATUS_ERROR,
            'error' => [
                'code' => GlobalConst::IS_EMPTY,
                'message' => 'Không tồn tại đơn hàng'
            ]
        ];
    }
}
