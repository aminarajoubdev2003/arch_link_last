<?php

namespace App\Http\Resources;

use App\Models\Client;
use App\Models\Product;
use App\Models\Order_items;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Order_shopResource extends JsonResource
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
            'date_of_order' => $this->updated_at->format('d M  Y'),
            'client' => ClientResource::make(Client::findOrFail($this->client_id)),
            'product' => ProductResource::make(Product::findOrFail($this->product_id)),
            'amount' => $this->amount,
            'color' => $this->color,
            'status' => $this->status,
            'location' => $this->location,
            'total' => $this->total,
            'type' => $this->type,
        ];
    }
}
