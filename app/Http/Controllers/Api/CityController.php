<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;

class CityController extends Controller
{
    use GeneralTrait;

    public function index(){

        $cities = City::all();
        $cities = CityResource::collection($cities);
        return $this->apiResponse($cities);

    }
}
