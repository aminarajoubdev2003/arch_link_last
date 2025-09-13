<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Order_customize;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CustomixeResource;


class DesignerController extends Controller
{
    use GeneralTrait;
    public function index() {

    $clientIds = Order_customize::where('status', 'accept')->pluck('client_id')->unique()->toArray();

    $designers = array_map(function($id) {
        $client = Client::findOrFail($id);
        return new ClientResource($client);
    }, $clientIds);

    return $this->apiResponse( $designers );
}

public function show( $uuid ){
    $client = Client::where('uuid', $uuid)->firstOrFail();
    $order_customize = Order_customize::where('client_id' , $client->id)->where('status','accept')->get();
    //return $order_customize;
    if( $order_customize->isNotEmpty()){
        $order_customize = CustomixeResource::collection($order_customize);
        return $this->apiResponse( $order_customize );
    }else{
        $msg = 'this designer donot have any work';
        return $this->apiResponse( $msg );
    }
}


}
