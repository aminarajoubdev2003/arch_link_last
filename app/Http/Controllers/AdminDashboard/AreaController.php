<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Models\Area;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    public function index(){
        $areas = Area::all();
        $cities = City::all();
        return view('admin.area',compact('areas','cities'));
    }

    public function create(){
        $cities = City::all();
        return view('admin.addArea' , compact( 'cities'));
    }

    public function store( Request $request){

        $validate = Validator::make($request->all(), [
            "area_name" => "required|string|min:3|max:20|regex:/^[A-Za-z\-\s]+$/",
            "city_id" => "required|string|exists:cities,id"
        ]);

        if($validate->fails()) {
          $errors = $validate->errors();
            return view('admin.error',compact('errors'));
        }

    try {
        $area = Area::Where('area_name',$request->area_name)->where('city_id',$request->city_id)->first();
        if( $area )
        {
            $errors = 'This area is alerady exsist in the city';
            return view('admin.str_erroe',compact('errors'));
        }else{

        $area = Area::create([
            'uuid' => Str::uuid(),
            'area_name' => $request->area_name,
            'city_id' => $request->city_id
        ]);
        return $this->index();
    }

    } catch (\Exception $ex) {
       return view('admin.addArea');
    }
    }

    public function edit( $id ){
        $area = Area::findOrFail($id);
        $cities = City::all();
        return view('admin.EditArea',compact('area','cities'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            "area_name" => "string|min:3|max:20|regex:/^[A-Za-z]+$/",
            "city_id" => "string|exists:cities,id"
        ]);

        if ($validate->fails()) {
           $errors = $validate->errors();
            return view('admin.error',compact('errors'));
        }

        try{
        $area = Area::Where('area_name',$request->area_name)->where('city_id',$request->city_id)->first();
        if( $area )
        {
           $errors = 'This area is alerady exsist in the city';
            return view('admin.str_erroe',compact('errors'));
        }else{
        $area = Area::findOrFail($id);
        $area->area_name = $request->area_name;
        $area->city_id = $request->city_id;
        $area->save();
        return $this->index();
        }
    }catch (\Exception $ex) {
       return view('admin.EditArea');
    }
    }

    public function delete( $id ){
        if ($area = Area::findOrFail($id)->delete()){
           return $this->index();
        }else{
            $errors = 'there is problem in deletion';
            return view('admin.str_erroe',compact('errors'));
        }
    }

    public function deleted_area( ){
        $deletedRecords = Area::onlyTrashed()->get();
        return view('admin.areaTrash', compact('deletedRecords'));
    }

    public function restore( $id ){
       $restored = Area::withTrashed()->where('id', $id)->first();
       $city = City::where('id' , $restored->city_id)->first();

       if( $city ){
        $restored->restore();
        return $this->index();
       }
       else{
        $errors = ' The City Of The Area Is Not Found In The System';
        return view('admin.str_erroe',compact('errors'));
       }
    }
}
