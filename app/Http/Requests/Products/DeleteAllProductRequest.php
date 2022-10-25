<?php

declare(strict_types=1);

namespace App\Http\Requests\Products;

use App\Http\Requests\BaseRequest;

class DeleteAllProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'ids' => 'required'
        ];
    }
}
