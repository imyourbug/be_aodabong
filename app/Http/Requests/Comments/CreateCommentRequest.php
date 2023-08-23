<?php

declare(strict_types=1);

namespace App\Http\Requests\Comments;

use App\Http\Requests\BaseRequest;

class CreateCommentRequest extends BaseRequest
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
            'reply_id' => 'required|integer',
            'content' => 'required|string',
            'level_star' => 'required|integer',
        ];
    }
}
