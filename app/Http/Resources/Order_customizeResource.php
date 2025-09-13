<?php

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class Order_customizeResource extends JsonResource
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
            'uuid' => $this->uuid,
            'client' => ClientResource::make(Client::findOrFail($this->client_id)),
            'address' => $this->address,
            Storage::url($this->image),
            'color' => $this->color,
            'amount' => $this->amount,
            'high' => $this->high,
            'width' => $this->width,
            'length' => $this->length,
            'status' => $this->status
        ];
    }
}
