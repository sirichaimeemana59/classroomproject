<?php

namespace App\Http\Controllers\Teacher;

use Request;
use App\Http\Controllers\Controller;
use App\subject;
use Auth;
use App\register_courses;

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

        $subject = $subject->where('user_create',Auth::user()->id)->get();

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
        $subject->day = Request::get('day');
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

    public function approval_of_registration(){
        $register_courses = new register_courses;
        $register_courses = $register_courses->where('id_teacher',Auth::user()->id)->get();

        return view('Teacher.approval_of_registration')->with(compact('register_courses'));
    }

    public  function approval_set_status(){
        $register_courses = register_courses::find(Request::get('id'));
        $register_courses->status = '1';
        $register_courses->user_approve = Auth::user()->id;
        $register_courses->save();

        return redirect('/teacher/approval_of_registration');
    }
}