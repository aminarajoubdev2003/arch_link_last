<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomixeResource extends JsonResource
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
            'image' => $this->image,
            'height' => $this->high,
            'width' => $this->width,
            'length' => $this->length,
            'amount' => $this->amount,
            'location' => $this->location,
        ];
    }
}
