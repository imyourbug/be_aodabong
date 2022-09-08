<?php

declare(strict_types=1);

namespace App\Http\Resources\Accounts;

use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

class GetAllAccountsResource extends BaseResource
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
            $this->mergeWhen(isset($this['accounts']), [
                'accounts' => $this['accounts'] ?? null
            ])
        ];
    }
}
