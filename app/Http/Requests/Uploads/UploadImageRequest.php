<?php

declare(strict_types=1);

namespace App\Http\Requests\Uploads;

use App\Http\Requests\BaseRequest;

class UploadImageRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'image_file' => 'required|dimensions:max_height:1024|dimensions:max_width:1024|mimes:jpg,png'
        ];
    }
}
