<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Product_MinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return[
            'uuid' => $this->uuid,
            'title' => $this->title,
            'price' => $this->price . '$',
            'image' => is_array($this->images) && count($this->images) > 0
            ? $this->images[0]
            : null,
        ];
    }
}
