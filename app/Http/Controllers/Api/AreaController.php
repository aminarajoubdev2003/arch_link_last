<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;

class AreaController extends Controller
{
    use GeneralTrait;
    public function index( $uuid ){

        //$areas = Area::all();
        try{
        $city = City::where('uuid', $uuid)->firstOrFail();
        $areas = Area::Where('city_id' , $city->id)->get();
        $areas =  AreaResource::collection($areas);
        return $this->apiResponse($areas);
        }catch( Exception $ex){
            return $this->apiResponse(null, false, $ex->getMessage(), 500);
        }
    }
}
