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
        'day.required' => 'حقل اليوم مطلوب.',
        'day.string' => 'يجب أن يكون اليوم نصاً.',
        'day.unique' => 'هذا اليوم مسجل مسبقاً.',
        'day.min' => 'يجب ألا يقل اليوم عن 3 أحرف.',
        'day.max' => 'يجب ألا يزيد اليوم عن 20 حرفاً.',
        'day.regex' => 'اليوم يجب أن يحتوي على حروف فقط.',
        'from.required' => 'حقل البداية مطلوب.',
        'from.date_format' => 'تنسيق الوقت في حقل البداية غير صحيح. يجب أن يكون H:i.',
        'to.required' => 'حقل النهاية مطلوب.',
        'to.date_format' => 'تنسيق الوقت في حقل النهاية غير صحيح. يجب أن يكون H:i.',
        'to.after' => 'وقت النهاية يجب أن يكون بعد وقت البداية.',
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

    /*public function store( Request $request ){
        //echo 'klkl';
        $validate = Validator::make($request->all(), [
            "day" => "required|string|unique:settings,day|min:3|max:20|regex:/^[A-Za-z]+$/",
            "from" => "required|date_format:H:i",
            "to" => "required|date_format:H:i|after:from"
        ]);

        if($validate->fails()) {
            $errors = $validate->errors();
            return view('admin.error',compact('errors'));
        }

    try {
        $uuid = Str::uuid();

        $setting = Setting::create([
            'uuid' => $uuid,
            'day' => $request->day,
            'from' => $request->from,
            'to' => $request->to
        ]);
        $times = Setting::all();
        return view('admin.settings',compact('times'));

    } catch (\Exception $ex) {
        return view('admin.settings');

    }
    }*/
    public function edit( $id ){
        $time = Setting::findOrFail($id);
        return view('admin.editWorkTime',compact('time'));
    }

    public function update( Request $request , $id){
        $validate = Validator::make($request->all(), [
        "day" => "string|unique:settings,day|min:3|max:20|regex:/^[A-Za-z]+$/",
        "from" => "date_format:H:i:s",
        "to" => "date_format:H:i:s|after:from"
        ]);


        if ($validate->fails()) {
            $errors = $validate->errors();
            return view('admin.error',compact('errors'));
        }

        try{
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
