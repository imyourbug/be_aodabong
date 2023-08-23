<?php

namespace App\Http\Resources\Statistics;

use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

class GetRevenueByMonthResource extends BaseResource
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
            $this->mergeWhen(isset($this['data']), [
                'data' => $this['data'] ?? null
            ])
        ];
    }
}
