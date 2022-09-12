<?php

declare(strict_types=1);

namespace App\UseCases\Customers;

use App\Const\GlobalConst;
use App\Models\Customer;

class GetAllCustomersUseCase
{
    public function __invoke(): array
    {
        $customers = Customer::get();
        if ($customers->isEmpty()) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Danh sách khách hàng trống!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK,
            'customers' => $customers
        ];
    }
}
