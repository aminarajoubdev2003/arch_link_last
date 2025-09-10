<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Client;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ReviewResource;
use App\Models\Order_items;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    use GeneralTrait;

    public function index(){
        $reviews = Review::all();
        $reviews = ReviewResource::collection($reviews);
        return $this->apiResponse($reviews);
    }
    public function store( Request $request ){
        $validatedData = Validator::make($request->all(), [
        'product_uuid' => 'required|string|exists:products,uuid',
        'rate' => 'required|integer|min:1|max:5',
        'opinion' => 'required|string',
    ]);

    if ($validatedData->fails()) {
        return $this->apiResponse(null, false, $validatedData->messages(), 401);
    }

    try {
        $user_id = Auth::id();
        $client_id = Client::where('user_id', $user_id)->value('id');
        $product_id = Product::where('uuid' , $request->product_uuid)->value('id');

        $order_product = Order_items::where('client_id' , $client_id)->where('product_id' , $product_id)
        ->where('status', 'buying')->get();
        if( $order_product ){
        $review = Review::create([
            'uuid' => Str::uuid(),
            'client_id' => $client_id,
            'product_id' => $product_id,
            'rate' => $request->rate,
            'opinion' => $request->opinion,
        ]);

        $review = new ReviewResource($review);
        return $this->apiResponse($review);
        }
        else{
            $msg = 'you cannot comment on this product because you donot buy it befor';
            return $this->apiResponse($msg);
        }
    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }
}
