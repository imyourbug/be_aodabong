<?php

declare(strict_types=1);

namespace App\UseCases\Customers;

use App\Const\GlobalConst;
use App\Models\Customer;
use Exception;

class UpdateCustomerUseCase
{
    public function __invoke($params): array
    {
        try {
            $customer = Customer::firstWhere('id', $params['id']) ?? '';
            if (!$customer) {
                return [
                    'status' => GlobalConst::STATUS_ERROR,
                    'error' => [
                        'code' => GlobalConst::IS_EMPTY,
                        'message' => 'Khách hàng không tồn tại!'
                    ]
                ];
            }
            $customer->update($params);

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
