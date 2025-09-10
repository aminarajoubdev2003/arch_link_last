<?php

namespace App\Http\Controllers\AdminCompany;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_items;

class Order_shopController extends Controller
{
    public function index(){
        $order_items = Order_items::where('status','buying')
        ->where('type','pending')->get();

        return view ('companyAdmin.shop',compact('order_items'));
       // return view ('companyAdmin.shop');
    }
    public function choose( $id ){
        $order_item = Order_items::findOrFail($id);
        //return view('companyAdmin.chooseDelivery',compact('order_item'));
        dd($order_item);
    }
}
