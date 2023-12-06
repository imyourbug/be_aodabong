<?php

declare(strict_types=1);

namespace App\UseCases\Orders;

use App\Const\GlobalConst;
use App\Models\Order;
use App\Models\ProductDetail;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateOrderUseCase
{
    public function __invoke(array $params): array
    {
        DB::beginTransaction();
        try {
            $order = Order::with(['order_details'])->firstWhere('id', $params['id']) ?? '';
            if (!$order) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Đơn hàng không tồn tại!'
                    ]
                ];
            }
            if ((int)$params['status'] === 4 || (int)$params['status'] === 7) {
                $details = $order->order_details;
                if ($details->count() > 0) {
                    foreach ($details as $detail) {
                        ProductDetail::firstWhere('id', $detail->product_detail_id)
                            ->increment('unit_in_stock', $detail->quantity);
                    }
                }
            }

            $order->update([
                'status' => $params['status']
            ]);
            DB::commit();

            return [
                'status' => GlobalConst::STATUS_OK
            ];
        } catch (Exception $e) {
            DB::rollBack();

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
