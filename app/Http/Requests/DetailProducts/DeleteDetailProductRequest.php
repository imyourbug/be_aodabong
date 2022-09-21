<?php

declare(strict_types=1);

namespace App\Http\Requests\DetailProducts;

use App\Http\Requests\BaseRequest;

class DeleteDetailProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|integer'
        ];
    }
}
