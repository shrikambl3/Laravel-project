<?php

namespace App\Http\Controllers;

use App\WallModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:wall_models|max:55',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/home')
                ->withInput()
                ->withErrors($validator);
        }
        $wall = new WallModel;
        $wall->name = $request->input('name');
        $wall->email = $request->input('email');
        $wall->message = $request->input('message');
        $wall->save();
        return redirect('/home');
    }
}
