<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'name_en'        => $this->name_en,
            'name_ar'        => $this->name_ar,
            'slug'           => $this->slug,
            'description_en' => $this->description_en,
            'description_ar' => $this->description_ar,
            'price'          => $this->price,
            'old_price'      => $this->old_price,
            'quantity'       => $this->quantity,
            'rating'         => round($this->reviews()->where('approved', true)->avg('rating'), 1),
            'reviews_count'  => $this->reviews()->where('approved', true)->count(),
            'status'         => $this->status,
            'category'       => [
                'id'   => $this->category?->id,
                'name' => $this->category?->name_en,
            ],
            'tags'           => $this->tags->pluck('name'),
            'images'         => $this->images->map(function ($img) {
                return asset($img->image_path);
            }),
            'created_at'     => $this->created_at->toDateTimeString(),
        ];
    }
}

