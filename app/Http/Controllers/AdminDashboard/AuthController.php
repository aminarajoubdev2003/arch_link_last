<?php

namespace App\Http\Controllers\AdminDashboard;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            return response()->json([
                'success' => false,
                'message' => $validatedData->errors()
            ], 422);
        }

        // البحث عن المستخدم
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'
            ], 401);
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
