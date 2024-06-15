<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request):JsonResponse
    {   $request->authenticate();
        $user=auth()->user();
        $token=$request->user()->createToken('authToken')->plainTextToken;
        return response()->json([
            'message'=>'Login Successful',
            'token'=>$token,
            'user'=>$user,
        ]);
    }

    public function register(Request $request):JsonResponse
    {   $request->validate([
        'name'=>'required|string',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string',
    ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),

        ]);
         return response()->json([
            'message'=>'Registered Successfully',
            'user'=>$user,
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
}
