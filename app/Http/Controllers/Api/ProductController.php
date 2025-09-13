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
use App\Models\Review;

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

        $product = new ProductResource( $product );
        return $this->apiResponse($product);


        } catch (Exception $e) {
            return $this->apiResponse(null, false, $e->getMessage(), 500);
        }
    }
    public function show_reviews( $uuid ){
    try {

        $product = Product::Where('uuid' , $uuid)->first();

        $review = Review::where('product_id' , $product->id)->get();

        if( $review->isNotEmpty() ){

            $review = ReviewResource::collection( $review);
           return $this->apiResponse($review);

        }else{
            $msg = 'this product donot have any rate until now';
            return $this->apiResponse($msg);
        }

    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

    public function all(){
        try{
        $products = Product::all();
        $products = ProductResource::collection($products);

        return $this->apiResponse($products);
        }catch(Exception $e){
            return $this->apiResponse(null, false, $e->getMessage(), 500);
        }
    }
}
