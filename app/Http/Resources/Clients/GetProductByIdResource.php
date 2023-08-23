<?php

declare(strict_types=1);

namespace App\Http\Resources\Clients;

use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

class GetProductByIdResource extends BaseResource
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
            $this->mergeWhen(isset($this['other_products']), [
                'other_products' => $this['other_products'] ?? null
            ]),
            $this->mergeWhen(isset($this['product']), [
                'product' => $this['product'] ?? null
            ]),
            $this->mergeWhen(isset($this['level_star']), [
                'level_star' => $this['level_star'] ?? null
            ]),
        ];
    }
}
