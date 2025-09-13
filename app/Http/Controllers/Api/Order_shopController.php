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
        $order_items = Order_items::where('client_id' , $client->id)->where('status','notbuying')
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
    /*public function shop(  ){
        try{
        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();

        $today = Carbon::now()->translatedFormat('l');
        $time = Setting::where('day' , $today)->first();

        /*if( $client->acount != 0 ){
        $order_items = Order_items::where('client_id' , $client->id)->where('status','notbuying')
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


    public function shop( ){
    try {
        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();

        $today = Carbon::now()->translatedFormat('l');
        $time = Setting::where('day' , $today)->first();

        if( $time ){
            $nowHour = Carbon::now('Africa/Cairo')->hour;
            $fromHour = Carbon::createFromFormat('H:i:s', $time->from)->hour;
            $toHour = Carbon::createFromFormat('H:i:s', $time->to)->hour;

            if ( $nowHour >= $fromHour && $nowHour <= $toHour ) {

                if( $client->acount != 3000 ){
                $order_items = Order_items::where('client_id' , $client->id)->where('status','notbuying')
                ->where('type','no')->get();

                if( $order_items->isNotEmpty() ){
                foreach( $order_items as $order_item ){
                $order_item->status = 'buying';
                $order_item->type   = 'pending';
                $order_item->total += $order_item->amount * $order_item->product->price;
                $order_item->save();

                $product = Product::find($order_item->product_id);
                if ($product) {
                $product->buy += $order_item->amount;
                $product->save();
            }
            }
            return $this->apiResponse('your order is in processing');
                }else{
                    return $this->apiResponse('your card is empty');
                }
                }else{
                    return $this->apiResponse('your account is empty');
                }
            } else {
                $msg = 'you cannot order now review working hours';
                return $this->apiResponse(null, false, $msg, 500);
            }
        }else{
            $msg = 'you cannot order today review working days';
            return $this->apiResponse(null, false, $msg, 500);
        }


    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

    public function all_shop( $uuid ){
        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();

         $order_shop = Order_items::where('client_id' , $client->id)->where('status','buying')->get();
        //return $order_customize;
        if( $order_shop->isNotEmpty()){

        $order_shop = Order_shopResource::collection($order_shop);

        return $this->apiResponse( $order_shop );

        }else{
        $msg = 'this designer donot have any order';
        return $this->apiResponse( $msg );
        }
    }
}


