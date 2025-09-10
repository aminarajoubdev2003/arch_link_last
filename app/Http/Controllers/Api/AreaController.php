<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;

class AreaController extends Controller
{
    use GeneralTrait;
    public function index(){

        $areas = Area::all();
        $areas =  AreaResource::collection($areas);
        return $this->apiResponse($areas);
    }
}
