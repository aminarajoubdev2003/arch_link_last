<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'site' => $this->site,
            'category' => $this->category,
            'type' => $this->type,
            'style' => $this->style,
            'material' => $this->material,
            'price' => $this->price .'$',
            'height' => $this->height,
            'width' => $this->width ?? 0,
            'length' => $this->length,
            'color' => $this->color,
            'sale' => $this->sale,
            'desc' => $this->desc,
            'images' => $this->images,
            //'block_file' => $this->block_file,
            'time_to_make' => $this->time_to_make,
            //'review' => ReviewResource::make(Review::findOrFail($this->id)),
        ];
    }
}
