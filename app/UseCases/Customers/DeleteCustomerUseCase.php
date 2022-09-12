<?php

declare(strict_types=1);

namespace App\UseCases\Customers;

use App\Const\GlobalConst;
use App\Models\Customer;
use Exception;

class DeleteCustomerUseCase
{
    public function __invoke($id): array
    {
        try {
            $customer = Customer::firstWhere('id', $id) ?? '';
            if (!$customer) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Khách hàng không tồn tại!'
                    ]
                ];
            }
            $customer->delete();

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
