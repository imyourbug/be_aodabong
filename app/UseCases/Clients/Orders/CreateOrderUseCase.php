<?php

declare(strict_types=1);

namespace App\UseCases\Clients\Orders;

use App\Const\GlobalConst;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateOrderUseCase
{
    public function __invoke(array $params): array
    {
        try {
            DB::beginTransaction();
            // create customer
            $customer = Customer::create($params['customer']);
            // create order
            $customer_id = $customer->id ?? '';
            $order = Order::create([
                'customer_id' => $customer_id,
                'status' => 0,
                'discount' => $params['discount']
            ]);
            // create order detail
            $order_id = $order->id ?? '';
            $data = [];
            foreach ($params['carts'] as $product) {
                $data[] = [
                    'order_id' => $order_id,
                    'product_detail_id' => $product['detail_id'],
                    'quantity' => $product['quantity'],
                    'unit_price' => $product['unit_price']
                ];
            }
            OrderDetail::insert($data);
        } catch (Exception $e) {
            DB::rollBack();

            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CHECKOUT_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
        DB::commit();

        return [
            'status' => GlobalConst::STATUS_OK,
        ];
    }
}
