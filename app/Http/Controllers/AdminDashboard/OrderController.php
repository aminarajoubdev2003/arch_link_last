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
       //dd($orders_customiz);
    }

   public function accept( Request $request ){
    $order_customiz = Order_customize::findOrFail($request->order_id);
   $client = Client::where('id',$order_customiz->client_id)->first();

    $order_customiz->status = 'accept';
    $order_customiz->save();

    $client->account += 1000;
    $client->save();

    return $this->index();

   }

   public function delete( Request $request ){
    $id = $request->order_id;
        if ($order_customiz = Order_customize::findOrFail($id)->delete()){
           return $this->index();
        }else{
            $errors = 'there is problem in deletion';
            return view('admin.str_erroe',compact('errors'));
        }
    }

}
