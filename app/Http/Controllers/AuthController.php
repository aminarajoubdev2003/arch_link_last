<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
{
    try {
        // التحقق من المدخلات
        $validatedData = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validatedData->fails()) {
           $errors = $validatedData->errors();
           return view('admin.str_erroe',compact('errors'));
        }

        // البحث عن المستخدم
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            /*return response()->json([
                'success' => false,
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'
            ], 401);*/
            $errors = 'email or password is incorrect';
           return view('admin.str_erroe',compact('errors'));
        }

        // إنشاء Token جديد
        $token = $user->createToken('web_login')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'تم تسجيل الدخول بنجاح',
            'user'    => $user,
            'token'   => $token
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

}
