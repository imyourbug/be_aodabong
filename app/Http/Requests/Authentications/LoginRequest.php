<?php

declare(strict_types=1);

namespace App\Http\Requests\Authentications;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:dns,rfc',
            'password' => 'required|string'
        ];
    }
}
