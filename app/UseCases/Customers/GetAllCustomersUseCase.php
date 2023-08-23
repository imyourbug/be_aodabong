<?php

declare(strict_types=1);

namespace App\UseCases\Customers;

use App\Const\GlobalConst;
use App\Models\Customer;

class GetAllCustomersUseCase
{
    public function __invoke(): array
    {
        $customers = Customer::all();

        return [
            'status' => GlobalConst::STATUS_OK,
            'customers' => $customers
        ];
    }
}
