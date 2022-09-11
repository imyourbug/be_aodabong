<?php

declare(strict_types=1);

namespace App\Http\Requests\Slides;

use App\Http\Requests\BaseRequest;

class UpdateSlideRequest extends BaseRequest
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
            'image' => 'required|string',
            'active' => 'required|integer|in:0,1',
            'sort_by' => 'required|integer'
        ];
    }
}
