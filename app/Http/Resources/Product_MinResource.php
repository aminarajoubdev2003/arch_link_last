<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'image' => !empty($this->images) && is_array($this->images) && isset($this->images[0])
            ? Storage::url($this->images[0])
            : null,

        ];
    }
}
