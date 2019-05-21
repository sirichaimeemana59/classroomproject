<?php

namespace App\Http\Controllers\Teacher;

use Request;
use App\Http\Controllers\Controller;
use App\subject;
use Auth;

class TeacherController extends Controller
{

    public function index()
    {
        $subject = new subject;

        if(Request::method('post')) {
            if (Request::get('name')) {
                $subject = $subject->where('name_subject_th', 'like', "%" . Request::get('name') . "%")
                    ->orWhere('name_subject_en', 'like', "%" . Request::get('name') . "%");
            }
        }

        $subject = $subject->get();

        if(!Request::ajax()) {
            return view('Teacher.list_subject')->with(compact('subject'));
        }else{
            return view('Teacher.list_subject_element')->with(compact('subject'));
        }

        //return view('Teacher.home_teacher');
    }


    public function create()
    {
        $subject = new subject;
        $subject->name_subject_th = Request::get('name_subject_th');
        $subject->name_subject_en = Request::get('name_subject_en');
        $subject->amount = Request::get('amount');
        $subject->time_start = Request::get('time_start');
        $subject->time_stop = Request::get('time_stop');
        $subject->user_create = Auth::user()->id;
        $subject->save();

        return redirect('/teacher/list_subject');
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $subject = subject::find(Request::get('id'));

        return view ('Teacher.view_subject')->with(compact('subject'));
    }


    public function edit()
    {
        $subject = subject::find(Request::get('id'));

        return view ('Teacher.edit_subject')->with(compact('subject'));
    }


    public function update()
    {
        $subject = subject::find(Request::get('id'));
        $subject->name_subject_th = Request::get('name_subject_th');
        $subject->name_subject_en = Request::get('name_subject_en');
        $subject->amount = Request::get('amount');
        $subject->time_start = Request::get('time_start');
        $subject->time_stop = Request::get('time_stop');
        $subject->user_create = Auth::user()->id;
        $subject->save();


    }


    public function destroy()
    {
        $subject = subject::find(Request::get('id'));
        $subject->delete();

        return redirect('/teacher/list_subject');
    }
}
