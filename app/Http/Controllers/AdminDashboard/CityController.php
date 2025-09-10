<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Delivery;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.index',compact('cities'));
    }

    public function create()
    {
        return view('admin.addCity');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "city_name"=>"required|string|unique:cities,city_name|min:3|max:20|regex:/^[A-Za-z]+$/",
        ],
        );

        if($validate->fails()) {
           $errors = $validate->errors();
           return view('admin.error',compact('errors'));
        }

    try {
        $uuid = Str::uuid();

        $city = City::create([
            'uuid' => $uuid,
            'city_name' => $request->city_name
        ]);
       return $this->index();

    } catch (\Exception $ex) {
        return view('admin.addCity');
    }
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.EditCity',['city' => $city]);

    }



    public function update(Request $request, $id)
    {

    $validate = Validator::make($request->all(), [
        "city_name" => "string|min:3|max:20|regex:/^[A-Za-z]+(?:\s[A-Za-z]+)*$/|unique:cities,city_name,"
    ]);

    if ($validate->fails()) {
        $errors = $validate->errors();
        return view('admin.error',compact('errors'));
    }
    try{
        $city = City::findOrFail($id);
        $city->city_name = $request->city_name;
        $city->save();
        return $this->index();

    }catch (\Exception $ex) {
        return view('admin.EditCity');
    }

    }

    public function delete( $id ){
        if ($city = City::findOrFail($id)->delete()){
            $areas = Area::where('city_id',$id)->get();


            foreach( $areas as $area){
                $delivery = Delivery::where('area_id' , $area->id)->delete();
                $area->delete();
            }
           return $this->index();
        }else{
            $errors = 'there is problem in deletion';
            return view('admin.str_erroe',compact('errors'));
        }
    }

    public function deleted_city( ){
        $deletedRecords = City::onlyTrashed()->get();
        return view('admin.cityTrash', compact('deletedRecords'));
    }

    public function restore($id)
    {
    // رجّع المدينة (مع الـ areas أوتوماتيك)
    $restored = City::withTrashed()->where('id', $id)->restore();

    if ($restored) {
        return $this->index();
    } else {
        $errors = 'There is a problem in restoration data';
        return view('admin.str_error', compact('errors'));
    }
    }



}
