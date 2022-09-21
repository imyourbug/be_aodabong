<?php

declare(strict_types=1);

namespace App\Http\Requests\DetailProducts;

use App\Http\Requests\BaseRequest;

class UpdateDetailProductRequest extends BaseRequest
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
            'price' => 'required|integer',
            'price_sale' => 'nullable|integer',
            'unit_in_stock' => 'required|integer',
            'thumb' => 'required|string'
        ];
    }
}
