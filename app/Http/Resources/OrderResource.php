<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'total_amount' => $this->total_amount,
            'discount_amount' => $this->discount_amount,
            'final_amount' => $this->final_amount,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'status' => $this->status,
            'delivery_address' => $this->delivery_address,
            'created_at' => $this->created_at->toDateTimeString(),
            'items' => OrderItemResource::collection($this->whenLoaded('orderItems')),
        ];
    }
}
