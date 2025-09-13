<?php

namespace App\Http\Controllers\Api;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Order_customize;
use App\Http\Traits\UploadTrait;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CustomixeResource;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

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
        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();
            if( $client->user_type == 'designer' ){
                $today = Carbon::now()->translatedFormat('l');
                $time = Setting::where('day' , $today)->first();

                if( $today == $time->day){
                $nowHour = Carbon::now()->hour;
                $fromHour = Carbon::createFromFormat('H:i:s', $time->from)->hour;
                $toHour = Carbon::createFromFormat('H:i:s', $time->to)->hour;


                if ( $nowHour >= $fromHour && $nowHour <= $toHour ) {

                    $image = $this->upload_file( $request->image , 'orders/customize/');

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

                $order_customize = CustomixeResource::make($order_customize);
                return $this->apiResponse($order_customize);

                } else {
                    $msg = 'you cannot order now review working hours';
                    return $this->apiResponse(null, false, $msg, 500);
                }
                }else{
                    $msg = 'you cannot order today review working days';
                    return $this->apiResponse(null, false, $msg, 500);
                }
            }else{
                $msg = 'you are not designer';
                return $this->apiResponse(null, false, $msg, 500);
            }

    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

}
