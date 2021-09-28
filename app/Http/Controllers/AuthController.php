<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;


class AuthController extends Controller
{


    public function login(Request $request){

        //驗證資料
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);


        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=>true,'data'=>$validator->errors(),'res'=>$request->all()],200);
        }

        //創建使用者
        $user = User::where('email',$request->input('email'))->first();

        if(!$user || !Hash::check($request->input('password'),$user->password)){
            return response(['errors'=>true,'notice'=>'帳號或密碼有誤!' ],200);
        }


        //獲取token
        $token = $user->createToken('myapptoken')->plainTextToken;


        return response(['errors'=>false,'user'=> $user ,'token'=> $token],200);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();


        return response(['errors'=>false]);
    }


    public function register(Request $request){
        //驗證資料
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);


        //驗證失敗
        if ($validator->fails()) {
            return response(['errors'=>true,'data'=> $validator->errors()],200);
        }

        //創建使用者
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        //獲取token
        $token = $user->createToken('myapptoken')->plainTextToken;


        return response(['errors'=>false,'user'=> $user , 'token'=> $token],201);
    }


}
