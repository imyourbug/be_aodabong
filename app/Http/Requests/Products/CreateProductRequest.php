<?php

declare(strict_types=1);

namespace App\Http\Requests\Products;

use App\Http\Requests\BaseRequest;

class CreateProductRequest extends BaseRequest
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
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'price' => 'required|integer',
            'price_sale' => 'nullable|integer',
            'active' => 'required|integer',
            'thumb' => 'required|string'
        ];
    }
}
