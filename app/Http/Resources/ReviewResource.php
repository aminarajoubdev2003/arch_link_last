<?php

namespace App\Http\Resources;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
        //'client' => ClientResource::make(Client::findOrFail($this->client)),
        'product' => ProductResource::make(Product::findOrFail($this->product_id)),
        'rate'    => $this->rate ,
        'opinion' => $this->opinion ,
       ];
    }
}
