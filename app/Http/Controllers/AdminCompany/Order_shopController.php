<?php

namespace App\Http\Controllers\AdminCompany;

use App\Models\Client;
use App\Models\Delivery;
use App\Models\Order_items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Order_shopController extends Controller
{
    public function index(){
        $order_items = Order_items::where('status','buying')
        ->where('type','pending')->get();

        return view ('companyAdmin.shop',compact('order_items'));
        //return view ('companyAdmin.shop');
    }

    public function choose(  $id){
        $order_item =  Order_items::findOrFail( $id );
        $deliveres = Delivery::where('area_id' , $order_item->client->area_id)->where('busy' , 0)->get();

        if( $deliveres->isNotEmpty()){
            return view('companyAdmin.chooseDelivery' , compact('deliveres' ,'order_item'));
        }else{
            $msg = 'there isnot any delivery for this area until now';
            return view('companyAdmin.error',compact('msg'));
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
        $order_item = Order_items::findOrFail($id);
        $order_item->delivery_id = $request->delivery_id;
        $order_item->type = 'delivered';
        $order_item->save();
        
        return $this->index();

        }catch (\Exception $ex) {
        return view('admin.EditCity');
        }
    }
}
