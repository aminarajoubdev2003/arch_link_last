<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
       return[
        'image' => $this->image,
        'auther' => $this->auther,
        'title'=> $this->title,
        'Published on'=> $this->created_at ? $this->created_at->format('d M Y') : null,
        'content' => $this->content
       ];
    }
}
