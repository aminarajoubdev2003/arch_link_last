<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index(){
        $times = Setting::all();
        return view('admin.settings',compact('times'));
    }

    public function create(){
        return view('admin.addWorkTime');
    }

    public function store(Request $request)
    {
    $messages = [
    'day.required'   => 'The day field is required.',
    'day.string'     => 'The day must be a string.',
    'day.unique'     => 'This day is already registered.',
    'day.min'        => 'The day must be at least 3 characters.',
    'day.max'        => 'The day must not be greater than 20 characters.',
    'day.regex'      => 'The day must contain letters only.',
    'from.required'  => 'The start time field is required.',
    'from.date_format' => 'The start time format is invalid. It must be H:i.',
    'to.required'    => 'The end time field is required.',
    'to.date_format' => 'The end time format is invalid. It must be H:i.',
    'to.after'       => 'The end time must be after the start time.',
];


    $validate = Validator::make($request->all(), [
        'day' => 'required|string|unique:settings,day|min:3|max:20|regex:/^[A-Za-z]+$/',
        'from' => 'required|date_format:H:i',
        'to' => 'required|date_format:H:i|after:from',
    ], $messages);

    if ($validate->fails()) {
        $errors = $validate->errors();
        return view('admin.error', compact('errors'));
    }

    try {
        $uuid = Str::uuid();

        Setting::create([
            'uuid' => $uuid,
            'day' => $request->day,
            'from' => $request->from,
            'to' => $request->to,
        ]);

        $times = Setting::all();
        return view('admin.settings', compact('times'));

    } catch (\Exception $ex) {
        return view('admin.settings');
    }
}

    public function edit( $id ){
        $time = Setting::findOrFail($id);
        return view('admin.editWorkTime',compact('time'));
    }

    public function update( Request $request , $id){
        $validate = Validator::make($request->all(), [
        "day" => "string|min:3|max:20|regex:/^[A-Za-z]+$/",
        "from" => "date_format:H:i",
        "to" => "date_format:H:i|after:from"
        ]);


        if ($validate->fails()) {
            $errors = $validate->errors();
            return view('admin.error',compact('errors'));
        }

        try{


        if (strlen($request->from) === 5) { //  HH:MM
            $request->from .= ':00';
        }

        if (strlen($request->to) === 5) {
            $request->to .= ':00';
        }
        $time = Setting::findOrFail($id);
        $time->day = $request->day;
        $time->from = $request->from;
        $time->to = $request->to;
        $time->save();

        return $this->index();


        }catch (\Exception $ex) {
        return view('admin.settings');
        }
    }

    public function delete( $id ){
        if ($time = Setting::findOrFail($id)->delete()){
           return $this->index();
        }else{
            $errors = 'there is problem in deletion';
            return view('admin.str_erroe',compact('errors'));
        }
    }

    public function deleted_time( ){
        $deletedRecords = Setting::onlyTrashed()->get();
        //dd($deletedRecords);
        return view('admin.workTimesTrash', compact('deletedRecords'));
    }

    public function restore( $id ){
       $time = Setting::withTrashed()->where('id', $id)->restore();
       if( $time ){
       return $this->index();
       }
    }
}
