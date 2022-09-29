<?php

declare(strict_types=1);

namespace App\Http\Resources\Authentications;

use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class ChangePasswordResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'status' => $this['status'],
            $this->mergeWhen(isset($this['error']), [
                'error' => $this['error'] ?? null
            ])
        ];
    }
}
