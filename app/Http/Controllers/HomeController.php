<?php

namespace App\Http\Controllers;

use App\WallModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  WallModel::select("*")->orderBy('created_at','desc')->paginate(10);
        return view('home',compact('posts'));
    }
}
