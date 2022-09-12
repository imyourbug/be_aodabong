<?php

declare(strict_types=1);

namespace App\Http\Requests\Slides;

use App\Http\Requests\BaseRequest;

class CreateSlideRequest extends BaseRequest
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
            'email' => 'required|email:dns,rfc|unique:Slides,email',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:10'
        ];
    }
}
