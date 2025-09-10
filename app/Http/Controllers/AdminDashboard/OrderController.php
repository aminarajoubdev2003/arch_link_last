<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order_customize;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders_customiz = Order_customize::where('status', 'reject')->get();
        return view ('admin.order' , compact('orders_customiz'));
       //return view('admin.order');
    }

   public function accept( Request $request ){
    $order_customiz = Order_customize::findOrFail($request->order_id)->first();
    $client = Client::where('id',$order_customiz->client_id)->first();

    $order_customiz->status = 'accept';

    if($order_customiz->save()){
        $client->account += 250;
        $client->save();
    }
    return $this->index();
   }

}
