<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Order_customize;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;


class DesignerController extends Controller
{
    use GeneralTrait;
    /*public function index() {
    // جلب كل client_id من الطلبات المقبولة كمصفوفة
    $clientIds = Order_customize::where('status', 'accept')->pluck('client_id')->toArray();

    // تحويل كل client_id إلى كائن Client
    $designers = array_map(function($id) {
        return Client::findOrFail($id);
    }, $clientIds);

    // إرجاع النتيجة كـ JSON
    /*return response()->json([
        'data' => $designers
    ]);
}*/    /*public function index() {

    $clientIds = Order_customize::where('status', 'accept')->pluck('client_id')->toArray();


    $designers = array_map(function($id) {
        $client = Client::findOrFail($id);
        //return new ClientResource($client);
        //$uuid = Order_customize::where('client_id', $client->id)->pluck('uuid')->toArray();
    }, $clientIds);


    return $this->apiResponse($designers);
}*/
public function index() {
    // جلب كل client_id من الطلبات المقبولة كمصفوفة فريدة
    $clientIds = Order_customize::where('status', 'accept')
                    ->pluck('client_id')
                    ->unique()
                    ->toArray();

    $designers = array_map(function($id) {
        $client = Client::findOrFail($id);

        // جلب كل uuid للطلبات المقبولة لهذا العميل
        $uuids = Order_customize::where('status', 'accept')
                    ->where('client_id', $client->id)
                    ->pluck('uuid')
                    ->toArray();

        // إنشاء ClientResource وإضافة uuid كمفتاح إضافي
        $resource = new ClientResource($client);
        $resource->uuids = $uuids;

        return $resource;
    }, $clientIds);

    return $this->apiResponse($designers);
}




}
