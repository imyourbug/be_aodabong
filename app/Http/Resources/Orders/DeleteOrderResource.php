<?php

namespace App\Http\Resources\Orders;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class DeleteOrderResource extends JsonResource
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
            ])
        ];
    }
}
