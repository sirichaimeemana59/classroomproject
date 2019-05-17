<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{

    public function index()
    {
        //dd(Request::all());
        if(Request::get('email') == 'sirichai@o-kaatplus.com' && Request::get('pwd') == '1234'){
            return view('teacher_admin.list_teacher');
        }else{
            return redirect('/index');
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
