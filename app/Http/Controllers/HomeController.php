<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use DB;
use App\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // dd(Auth::user()->name);
        //return redirect('/admin/teacher');
            if( Auth::user()->role == 1){
                Redirect::to('/admin/teacher')->send();
            }else if(Auth::user()->role == 0){
                Redirect::to('/student/home')->send();
            }else if(Auth::user()->role == 2){
                Redirect::to('/teacher/home')->send();
            }else{
                Redirect::to('/index')->send();
            }

    }
}
