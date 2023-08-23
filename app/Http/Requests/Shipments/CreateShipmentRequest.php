<?php

declare(strict_types=1);

namespace App\Http\Requests\Shipments;

use App\Http\Requests\BaseRequest;

class CreateShipmentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'fee' => 'required|integer|min:0',
        ];
    }
}
