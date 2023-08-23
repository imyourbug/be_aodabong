<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Const\GlobalConst;
use App\Models\Order;

class GetListOrderUseCase
{
    public function __invoke(): array
    {
        $orders = Order::with(['order_details.product_detail.product', 'customer'])->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'orders' => $orders
        ];
    }
}
