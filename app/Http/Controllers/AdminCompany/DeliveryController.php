<?php

namespace App\Http\Controllers\AdminCompany;

use App\Models\Area;
use App\Models\Delivery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{
    public function index(){
        $deliveries = Delivery::all();
        //$areas = Area::all();
        return view('companyAdmin.delivery', compact('deliveries'));
       //dd( $areas );
       //return view('companyAdmin.delivery');
    }

    public function create(){
        $areas = Area::all();
        return view('companyAdmin.addDelivery' , compact( 'areas'));
    }

    public function store( Request $request){
        $validate = Validator::make($request->all(), [
        'name' => 'required|string|min:3|max:20|regex:/^[A-Za-z\s]+$/',
        'email' => 'required|email|unique:deliveries,email',
        'phone' => 'required|digits:10|unique:deliveries,phone_number|regex:/^(09)[0-9]{8}$/',
        "area_id" => "required|string|exists:areas,id"
        ],[
            'email.unique' => 'Email already exists',
        ]);

        if($validate->fails()) {
          $errors = $validate->errors();
          return view('companyAdmin.error',compact('errors'));
           //dd($errors);
        }

    try {
        $delivery = Delivery::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'area_id' => $request->area_id
        ]);
        return $this->index();
    } catch (\Exception $ex) {
       //return view('companyAdmin.addDelivery');
       dd($ex);
    }
    }

    public function edit( $id ){
        $delivery = Delivery::findOrFail($id);
        $areas = Area::all();
        //return view('companyAdmin.editDelivery',['delivery' => $delivery]);
        return view('companyAdmin.editDelivery',compact('delivery','areas'));
        //dd($delivery);

    }

    public function update(Request $request, $id)
    {
    $validate = Validator::make($request->all(),[
        "name" => "string|min:3|max:20|regex:/^[A-Za-z\s]+$/",
        'phone_number' => 'digits:10|unique:deliveries,phone_number,' . $id . '|regex:/^(09)[0-9]{8}$/',
        'email' => 'required|email|unique:deliveries,email',
        'area_id' => 'exists:areas,id',
    ]);

    $delivery = Delivery::find($id);
    $areas = Area::all();

    if ($validate->fails()){
        $errors = $validate->errors();
        return view('companyAdmin.error',compact('errors'));
        //return view('companyAdmin.editDelivery', compact('errors','delivery','areas'));
    }

    try {
        $delivery->name = $request->name;
        $delivery->phone_number = $request->phone_number;
        $delivery->email = $request->email;
        $delivery->area_id = $request->area_id;

        if($delivery->save()){
           return $this->index();
        }

    } catch (\Exception $ex) {
        return view('companyAdmin.editDelivery');

    }
    }

    public function delete( $id ){
        //echo 'yes';
        $delivery = Delivery::findOrFail($id)->first();

        if( $delivery->busy == 0 ){
            $delivery->delete();
           return $this->index();
        }else{
            $errors = ' you canot delete this delivery because he is busy';
            return view('admin.str_erroe',compact('errors'));
        }
    }

    public function deleted_delivery( ){
        $deletedRecords = Delivery::onlyTrashed()->get();
        return view('companyAdmin.deliveryTrash', compact('deletedRecords'));
        //return view('companyAdmin.deliveryTrash');
    }

    public function restore($id)
    {

    $restored = Delivery::withTrashed()->where('id', $id)->restore();

    if ($restored) {
        return $this->index();
    } else {
        $errors = 'There is a problem in restoration data';
        return view('admin.str_error', compact('errors'));
    }
    }

}
