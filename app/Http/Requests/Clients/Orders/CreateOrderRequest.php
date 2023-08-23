<?php

declare(strict_types=1);

namespace App\Http\Requests\Clients\Orders;

use App\Http\Requests\BaseRequest;

class CreateOrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'customer.name' => 'required|string',
            'customer.email' => 'required|email:dns,rfc',
            'customer.address' => 'required|string',
            'customer.phone' => 'required|string|regex:/^0\d{9}$/',
            'customer.note' => 'nullable|string',
            'status' => 'required|integer',
            'discount' => 'nullable|integer',
            'total_money' => 'required|integer',
            'carts.*.detail_id' => 'required|integer',
            'carts.*.quantity' => 'required|integer',
            'carts.*.unit_price' => 'required|integer',
        ];
    }
}
