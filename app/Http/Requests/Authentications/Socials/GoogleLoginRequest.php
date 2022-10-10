<?php

declare(strict_types=1);

namespace App\Http\Requests\Authentications\Socials;

use App\Http\Requests\BaseRequest;

class GoogleLoginRequest extends BaseRequest
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
            'email' => 'required|email:dns,rfc',
            'avatar' => 'required|string',
            'provider_user_id' => 'required|string'
        ];
    }
}
