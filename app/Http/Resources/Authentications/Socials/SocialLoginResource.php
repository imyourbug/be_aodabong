<?php

declare(strict_types=1);

namespace App\Http\Resources\Authentications\Socials;

use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class SocialLoginResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'status' => $this['status'],
            $this->mergeWhen(isset($this['error']), [
                'error' => $this['error'] ?? null
            ]),
            $this->mergeWhen(isset($this['user']), [
                'user' => $this['user'] ?? null
            ]),
            $this->mergeWhen(isset($this['access_token']), [
                'access_token' => $this['access_token'] ?? null
            ])
        ];
    }
}
