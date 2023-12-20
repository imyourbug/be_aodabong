<?php

declare(strict_types=1);

namespace App\UseCases\Clients\Orders;

use App\Const\GlobalConst;
use App\Interfaces\MailServiceInterface;
use App\Jobs\InfoOrderJob;
use App\Mail\InforOrderMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateOrderUseCase
{
    public function __construct(protected MailServiceInterface $mailServiceInterface)
    {
    }

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
                'discount' => $params['discount'],
                'total_money' => $params['total_money'],
                'payment_method' => $params['payment_method'],
                'payment_status' => $params['payment_status'],
                'shipment_id' => $params['shipment_id'],
            ]);
            // create order detail
            $order_id = $order->id ?? '';
            $data = [];
            $ids = [];
            foreach ($params['carts'] as $product) {
                $data[] = [
                    'order_id' => $order_id,
                    'product_detail_id' => $product['detail_id'],
                    'quantity' => $product['quantity'],
                    'unit_price' => $product['unit_price']
                ];
                $ids[$product['detail_id']] = $product['quantity'];
            }
            OrderDetail::insert($data);
            // decrease product quantity in stock
            $details = ProductDetail::with('product')->whereIn('id', array_keys($ids))->get();
            $carts = [];
            foreach ($details as $product_detail) {
                $new_quantity = $product_detail->unit_in_stock - $ids[$product_detail->id];
                if ($new_quantity < 0) {
                    throw new Exception('Số lượng sản phẩm trong kho không đủ', GlobalConst::CHECKOUT_FAILED);
                }
                $product_detail->decrement('unit_in_stock', $ids[$product_detail->id]);
                // increase sold quantity
                $product_detail->product()->increment('sold', $ids[$product_detail->id]);
                // 
                foreach ($params['carts'] as $pro) {
                    if ($pro['detail_id'] === $product_detail->id) {
                        $carts[] = [
                            ...$pro,
                            'detail' => $product_detail->toArray()
                        ];
                    }
                }
            }
            // job
            InfoOrderJob::dispatch($customer, [
                'carts' => $carts,
                'customer' => $customer->toArray(),
                'order' => $order->toArray()
            ]);
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
