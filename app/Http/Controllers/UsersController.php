<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $users = User::all();

        return $users;
    }


    public function create(){


    }


    public function store(Request $request){
        $content = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::create($content);

        return $user;
    }


    public function show($id){
        $user = User::find($id);

        if($user === null){
            return "尋找不到使用者";
        }

        return $user;
    }


    public function update(Request $request,$id){
        $content = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::find($id);

        $user->update($content);

        return $user;
    }


    public function destory($id){

        return User::destroy($id);
    }


    public function search($name){

        $users = User::where('name','like','%'.$name.'%')->get();

        return $users;
    }
}
