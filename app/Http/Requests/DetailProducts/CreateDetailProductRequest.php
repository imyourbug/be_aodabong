<?php

declare(strict_types=1);

namespace App\Http\Requests\DetailProducts;

use App\Http\Requests\BaseRequest;

class CreateDetailProductRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer',
            'code_color' => 'required|string',
            'code_size' => 'required|string',
            'unit_in_stock' => 'required|integer',
            'thumb' => 'required|string'
        ];
    }
}
