<?php

declare(strict_types=1);

namespace App\Http\Requests\Products;

use App\Http\Requests\BaseRequest;

class UpdateProductRequest extends BaseRequest
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
            'name' => 'required|string',
            'price' => 'required|integer',
            'price_sale' => 'nullable|integer',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'active' => 'required|integer',
            'thumb' => 'required|string'
        ];
    }
}
