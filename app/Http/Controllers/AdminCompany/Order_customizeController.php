<?php

namespace App\Http\Controllers\AdminCompany;

use App\Models\Delivery;
use App\Models\Order_items;
use Illuminate\Http\Request;
use App\Models\Order_customize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Order_customizeController extends Controller
{
    public function index(){
        $orders = Order_customize::where('status', 'accept')->get();
        return view('companyAdmin.customize', compact('orders'));

    }

     public function choose(  $id){
        $order_item =  Order_customize::findOrFail( $id );
        $deliveres = Delivery::where('area_id' , $order_item->client->area_id)->where('busy' , 0)->get();

        if( $deliveres->isNotEmpty()){
            return view('companyAdmin.chooseDelivery' , compact('deliveres' ,'order_item'));
        }else{
            $errors = 'there isnot any delivery for this area until now';
            return view('companyAdmin.str_erroe',compact('errors'));
        }
    }

    public function set( Request $request , $id){
        $validate = Validator::make($request->all(), [
        "delivery_id" => "required|string|exists:deliveries,id"
        ]);

        if ($validate->fails()) {
            $errors = $validate->errors();
            return view('companyAdmin.error',compact('errors'));
        }
        try{
        $order_item = Order_customize::findOrFail($id);
        $delivery = Delivery::findOrFail( $request->delivery_id);

        $order_item->delivery_id = $request->delivery_id;
        $order_item->status = 'delivered';
        $order_item->save();

        $delivery->busy = 1;
        $delivery->save();

        return $this->index();

        }catch (\Exception $ex) {
        return view('companyAdmin.customize');
        }
    }

}
