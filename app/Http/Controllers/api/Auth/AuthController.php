<?php

namespace App\Http\Controllers\api\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthController extends Controller
{
public function login(LoginRequest $request): JsonResponse
{
    // نتحقق من البيانات باستخدام LoginRequest
    $credentials = $request->validated();

    // محاولة تسجيل الدخول باستخدام الـ credentials
    if (!Auth::attempt($credentials)) {
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    // جلب المستخدم اللي سجل الدخول
    $user = Auth::user();

    // توليد توكن باستخدام Sanctum
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message'    => 'Login successful',
        'token'      => $token,
        'token_type' => 'Bearer',
        'user'       => $user,
    ]);
}

    public function register(Request $request): JsonResponse
{
    $request->validate([
        'name'     => 'required|string',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // توليد التوكين
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Registered Successfully',
        'user'    => $user,
        'token'   => $token,
        'token_type' => 'Bearer',
    ]);
}
    public function information(Request $request, $id): JsonResponse
    {
        $request->authenticate();
        $user=auth()->user();
        $request->validate([
            'FullName' => 'required|string',
            'phone' => 'required|string',
            'info' => 'required|string',
        ]);

        $user = User::findOrfail($id);
        $user->update([
            'FullName' => $request->FullName,
            'phone' => $request->phone,
            'info' => $request->info,
        ]);

        return response()->json([
            'message' => 'Information has been updated',
            'user' => $user,
        ]);
    }
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
