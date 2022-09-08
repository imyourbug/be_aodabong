<?php

declare(strict_types=1);

namespace App\Http\Requests\Accounts;

use App\Http\Requests\BaseRequest;

class CreateAccountRequest extends BaseRequest
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
            'email' => 'required|email:dns,rfc|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:0,1',
            'avatar' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:10'
        ];
    }
}
