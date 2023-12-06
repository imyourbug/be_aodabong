<?php

declare(strict_types=1);

namespace App\Http\Requests\Accounts;

use App\Http\Requests\BaseRequest;

class UpdateAccountRequest extends BaseRequest
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
            'name' => 'nullable|string',
            'email' => 'required|email:dns,rfc',
            'password' => 'required|string|min:8',
            'role' => 'required|in:0,1',
            'phone' => 'nullable|string|max:10',
            'avatar' => 'nullable|string',
            'province' => 'nullable|string',
            'district' => 'nullable|string',
            'ward' => 'nullable|string',
            'street' => 'nullable|string'
        ];
    }
}
