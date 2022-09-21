<?php

declare(strict_types=1);

namespace App\Http\Resources\DetailProducts;

use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

class CreateDetailProductResource extends BaseResource
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
            $this->mergeWhen(isset($this['detail_product']), [
                'detail_product' => $this['detail_product'] ?? null
            ])
        ];
    }
}
