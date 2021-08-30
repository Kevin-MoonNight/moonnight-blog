<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }

    public function index(){
        return view('frontend.index');
    }

    public function articleControl(){
        $user = auth()->user();
        $articles = $user->articles()->with('user','tags')->orderBy('id','desc')->paginate(10);

        return view('dashboard.articles',['articles' => $articles,'user' => $user]);
    }


   public function dashboard() {
        $user = auth()->user();

        return view('dashboard.index',['user' => $user]);
    }


}
