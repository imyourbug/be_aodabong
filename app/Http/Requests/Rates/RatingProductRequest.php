<?php

declare(strict_types=1);

namespace App\Http\Requests\Rates;

use App\Http\Requests\BaseRequest;

class RatingProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'level_star' => 'required|integer',
        ];
    }
}
