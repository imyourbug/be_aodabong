<?php

declare(strict_types=1);

namespace App\Http\Requests\Clients\Checkouts;

use App\Http\Requests\BaseRequest;

class CheckOutVnpayRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'total' => 'required|int',
        ];
    }
}
