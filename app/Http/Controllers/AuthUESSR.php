<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use rsacresources\js\Pages\Auth\Login;
use rsacresources\js\Pages\Auth\register;

class AuthUESSR extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // 2. محاولة تسجيل الدخول
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            // 3. جلب المستخدم الحالي وإنشاء رمز المصادقة
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            // 4. إرجاع استجابة JSON مع معلومات المستخدم ورمز الوصول
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    // أضف أي بيانات أخرى تحتاجها
                ],
            ], 200);
        }

       else{ // 5. إرجاع استجابة عند فشل المصادقة
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
    }



    public function logout(Request $request)
     {
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logged out successfully']);
     }
}
