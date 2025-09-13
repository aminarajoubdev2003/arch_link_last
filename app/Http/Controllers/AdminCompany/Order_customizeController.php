<?php

namespace App\Http\Controllers\AdminCompany;

use App\Http\Controllers\Controller;
use App\Models\Order_customize;
use App\Models\Order_items;
use Illuminate\Http\Request;

class Order_customizeController extends Controller
{
    public function index(){
        $orders = Order_customize::where('status', 'accept')->get();
        return view('companyAdmin.customize', compact('orders'));
       // return view('companyAdmin.customize');
       //dd( $orders );
    }
    public function append( $id ){
        echo $id;
    }

}
