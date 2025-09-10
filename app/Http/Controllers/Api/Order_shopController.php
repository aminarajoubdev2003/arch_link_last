<?php

namespace App\Http\Controllers\Api;
use Exception;
use App\Models\Client;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Order_shop;
use App\Models\Order_items;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Order_itemResource;
use App\Http\Resources\Order_shopResource;

class Order_shopController extends Controller
{
    use GeneralTrait;

    public function index(){
        try{
        $user_id = Auth::id();
        $client_id = Client::where('user_id', $user_id)->value('id');
        $order_items = Order_items::where('client_id' , $client_id)->where('status','notbuying')
        ->where('type','no')->get();

        if( $order_items){
        $order_items = Order_itemResource::collection($order_items);
        return $this->apiResponse($order_items);
        }else{
            $msg = 'your card is empty';
            return $this->apiResponse($msg);
        }
        }catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

    public function store( Request $request ){
        $validatedData = Validator::make($request->all(), [
        'product_uuid' => 'required|string|exists:products,uuid',
        'amount' => 'required|integer|min:1',
        'color' => 'required|string',
        'location' => 'required|string|min:3|max:50|regex:/^[A-Za-z0-9\s\-,]+$/',
    ]);

    if ($validatedData->fails()) {
        return $this->apiResponse(null, false, $validatedData->messages(), 401);
    }

    try {
        $user_id = Auth::id();
        $client_id = Client::where('user_id', $user_id)->value('id');
        $product_id = Product::where('uuid' , $request->product_uuid)->value('id');

        $order_item = Order_items::create([
            'uuid' => Str::uuid(),
            'client_id' => $client_id,
            'product_id' => $product_id,
            'amount' => $request->amount,
            'color' => $request->color,
            'status' => 'notbuying',
            'location' => $request->location,
            'type' => 'no'
        ]);

        $order_items = Order_items::where('client_id' , $client_id)->where('status','notbuying')
        ->where('type','no')->get();

        $order_items = Order_itemResource::collection($order_items);
        return $this->apiResponse($order_items);

    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

    /*public function shop(  ){
        try{
        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();
        if( $client->acount != 0 ){
        $order_items = Order_items::where('client_id' , $client_id)->where('status','notbuying')
        ->where('type','no')->get();

        if( $order_items ){
        foreach( $order_items as $order_item ){
            $order_item->status = 'buying';
            $order_item->type = 'pending';

            if($order_item->save()){
                $product = Product::where('id',$order_item->product_id)->first();
                $order_item->total  += $order_item->amount * $product->price;
                $order_item->save();
                $product->buy += $order_item->amount;
                $product->save();
                echo $order_item->total;
            }
        }
        return $this->apiResponse('your order is inproccessing');

        }else{
            return $this->apiResponse('your card is empty');
        }
    }else{
            return $this->apiResponse('your account is empty');
        }

        }catch(Exception $e){
            return $this->apiResponse(null, false, $e->getMessage(), 500);
        }
        }*/

    public function edit_amount( Request $request ,$uuid ){

        //$product_id = Product::Where('uuid' , $uuid)->value('id');
        $order_item = Order_items::Where('uuid' , $uuid)->first();

        $user_id = Auth::id();
        $client_id = Client::where('user_id', $user_id)->value('id');

        if( $order_item && $order_item->status == 'notbuying' && $order_item->type == 'no'){
            $order_item->amount = $request->amount;
            $order_item->save();

            $order_items = Order_items::where('client_id' , $client_id)->where('status','notbuying')
            ->where('type','no')->get();
            $order_items = Order_itemResource::collection($order_items);
            return $this->apiResponse($order_items);
        }else{
            return $this->apiResponse('this order is not found in your card');
        }
    }

    public function destroy( $uuid ){
        try{

        $order_item = Order_items::Where('uuid' , $uuid)->first();

        if( $order_item && $order_item->status == 'notbuying' && $order_item->type == 'no'){
            $order_item->delete();
            return $this->apiResponse('the product is deleted from your card');
        }else{
            return $this->apiResponse('this order is not found in your card');
        }
        }catch(Exception $e){
            return $this->apiResponse(null, false, $e->getMessage(), 500);
        }
    }
   public function shop( ){
    try{ $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();
        if( $client->acount =! 0 )
            {
                $order_items = Order_items::where('client_id' , $client->id)->where('status','notbuying') ->where('type','no')->get();
                if( $order_items ){

                foreach( $order_items as $order_item ){
                    $order_item->status = 'buying';
                     $order_item->type = 'pending';

                    if($order_item->save()){
                        $product = Product::where('id',$order_item->product_id)->first();
                        $order_item->total += $order_item->amount * $product->price; $order_item->save();
                        $product->buy += $order_item->amount; $product->save(); echo $order_item->total; } }
                        return $this->apiResponse('your order is inproccessing');
                    }else{
                        return $this->apiResponse('your card is empty'); } }
                        else{ return $this->apiResponse('your account is empty');
                            //echo $client->account;
                        } }
                        catch(Exception $e){
                             return $this->apiResponse(null, false, $e->getMessage(), 500); }}
}


