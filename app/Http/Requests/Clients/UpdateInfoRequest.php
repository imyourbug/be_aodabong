<?php

declare(strict_types=1);

namespace App\Http\Requests\Clients;

use App\Http\Requests\BaseRequest;

class UpdateInfoRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'user.id' => 'required|integer',
            'user.phone' => 'required|string|regex:/^0\d{9}$/',
            'user.province' => 'nullable|string',
            'user.district' => 'nullable|string',
            'user.ward' => 'nullable|string',
            'user.street' => 'nullable|string',
            'user.zip_code' => 'nullable|integer',
            'user.avatar' => 'nullable|string'
        ];
    }
}
