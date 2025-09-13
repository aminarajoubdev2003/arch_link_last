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
        //return view('companyAdmin.chooseDelivery');
        //echo $id;
        //$deliveres = Delivery::where('area_id' , $area_id)->where('busy' , 0)->get();
       // return view('companyAdmin.chooseDelivery' , compact('deliveres'));
        //dd($deliveres);
        echo $id;
    }

    public function set( Request $request , $id){
        /*$validate = Validator::make($request->all(), [
        //"city_name" => "string|min:3|max:20|regex:/^[A-Za-z]+(?:\s[A-Za-z]+)*$/|unique:cities,city_name,"
        ]);

        if ($validate->fails()) {
            $errors = $validate->errors();
            return view('companyAdmin.error',compact('errors'));
        }
        try{
        $city = City::findOrFail($id);
        $city->city_name = $request->city_name;
        $city->save();
        return $this->index();

        }catch (\Exception $ex) {
        return view('admin.EditCity');
        }*/echo $id;
    }
}
