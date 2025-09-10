<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Order_customize;
use App\Http\Traits\UploadTrait;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomixeResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class Order_customizeController extends Controller
{
    use GeneralTrait , UploadTrait;

    public function store(Request $request){
    $validate = Validator::make($request->all(), [
        "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        'color' => 'required|string',
        'amount' => 'required|integer|min:1|max:10',
        'high' => 'required|string',
        'width' => 'nullable|string',
        'length' => 'required|string',
        'location' => 'required|string'
    ]);

    if ($validate->fails()) {
        return $this->requiredField($validate->errors()->first());
    }

    try {
        $image = $this->upload_file( $request->image , 'orders/customize/');

        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();
        //$type = Client::where('id', $client)->value('user_type');
        //$account = Client::where('id', $client)->value('account');
//echo $account;
            if( $client->user_type == 'designer' ){
            $order_customize = Order_customize::create([
                'uuid' => Str::uuid(),
                'client_id' => $client->id,
                'image' => $image,
                'color' => $request->color,
                'amount' => $request->amount,
                'high' => $request->high,
                'width' => $request->width,
                'length' => $request->length,
                'status' => 'reject',
                'location' => $request->location
            ]);
            }else{
                $msg = 'you are not designer';
                return $this->apiResponse(null, false, $msg, 500);
            }
        $order_customize = CustomixeResource::make($order_customize);
        return $this->apiResponse($order_customize);
    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

}
