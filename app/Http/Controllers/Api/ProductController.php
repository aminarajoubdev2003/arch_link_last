<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product_MinResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReviewResource;

class ProductController extends Controller
{
    use GeneralTrait;

    public function index(){
        $products = Product::all();
        $products = Product_MinResource::collection($products);

        return $this->apiResponse($products);
    }

    public function most_buy(){
        $products = Product::where('buy', '>', 10)->get();
        $products = Product_MinResource::collection($products);
         return $this->apiResponse($products);
    }

    public function show( $uuid ){
    try {

        $product = Product::Where('uuid' , $uuid)->first();
        $product = new ReviewResource( $product );

        return $this->apiResponse($product);

    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }
}
