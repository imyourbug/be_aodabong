<?php

declare(strict_types=1);

namespace App\Http\Requests\Vouchers;

use App\Http\Requests\BaseRequest;

class CreateVoucherRequest extends BaseRequest
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
            'discount' => 'required|integer|max:100|min:0',
            'active' => 'required|in:0,1'
        ];
    }
}
