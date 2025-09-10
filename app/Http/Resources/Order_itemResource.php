<?php

namespace App\Http\Resources;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Order_itemResource extends JsonResource
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
            //'client' => ClientResource::make(Client::findOrFail($this->client_id)),
            'product' => Product_MinResource::make(Product::findOrFail($this->product_id)),
            'amount' => $this->amount,
            //'color' => $this->color,
            //'status' => $this->status,
        ];
    }
}
