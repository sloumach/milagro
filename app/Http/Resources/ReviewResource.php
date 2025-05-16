<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'rating'     => $this->rating,
            'comment'    => $this->comment,
            'user'       => [
                'id'   => $this->user->id,
                'name' => $this->user->name,
            ],
            'approved'   => $this->approved,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}

