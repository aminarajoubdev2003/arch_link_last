<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'design_type' => $this->design_type,
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
            'images' => collect($this->images)
                ->map(fn($img) => Storage::url($img))
                ->toArray(),
            'time_to_make' => $this->time_to_make,
            //'file' => Storage::url($this->block_file),
            'file' => [
            ['3d'  => Storage::url($this->block_file)],
            ['2d'  => Storage::url($this->block_file)],
            ['skp' => Storage::url($this->block_file)],
            ],

        ];
    }
}
