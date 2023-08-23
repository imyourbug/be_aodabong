<?php

declare(strict_types=1);

namespace App\Http\Requests\Orders;

use App\Http\Requests\BaseRequest;

class DeleteOrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer'
        ];
    }
}
