<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        //透過email尋找使用者
        $user = User::firstWhere('email', $validated['email']);

        //判斷密碼是否正確
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            abort(400);
        }

        //獲取token
        $token = $user->createToken('myapptoken')->plainTextToken;

        return response(['user' => $user->makeVisible(['id']), 'token' => $token], 200);
    }

    public function logout(Request $request)
    {
        return auth()->user()->tokens()->delete();
    }

    public function register(StoreUserRequest $request)
    {

        $validated = $request->validated();

        //密碼加密
        $validated['password'] = Hash::make($validated['password']);

        //創建使用者
        $user = User::create($validated);

        //獲取token
        $token = $user->createToken('myapptoken')->plainTextToken;

        return response(['user' => $user, 'token' => $token], 201);
    }
}
