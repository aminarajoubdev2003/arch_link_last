<?php

namespace App\Http\Resources;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
        'user' => UserResource::make(User::findOrFail($this->user_id)),
        'phone_number' => $this->phone_number,
        'area' => AreaResource::make(Area::findOrFail($this->area_id)),
        'user_type' => $this->user_type,
        'acount' => $this->acount,
        'image' => $this->image
        ];
    }
}
