<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Const\GlobalConst;
use App\Models\Order;

class GetOrderByIdUseCase
{
    public function __invoke(int $order_id): array
    {
        $order = Order::with('order_details.product_detail.product')->where('id', $order_id)->first();

        return [
            'status' => GlobalConst::STATUS_OK,
            'order' => $order,
        ];
    }
}
