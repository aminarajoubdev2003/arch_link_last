<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            'blog' => BlogResource::make(Blog::findOrFail($this->blog_id)),
        ];
    }
}
