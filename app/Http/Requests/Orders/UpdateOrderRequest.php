<?php

namespace App\Http\Requests\Orders;

use App\Http\Requests\BaseRequest;

class UpdateOrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'status' => 'required|integer|digits_between:0,5',
        ];
    }
}
