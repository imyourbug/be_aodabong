<?php

declare(strict_types=1);

namespace App\UseCases\Customers;

use App\Const\GlobalConst;
use App\Models\Customer;
use Exception;

class CreateCustomerUseCase
{
    public function __invoke($params): array
    {
        try {
            $customer = Customer::create($params);

            return [
                'status' => GlobalConst::STATUS_OK,
                'customer' => $customer
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
