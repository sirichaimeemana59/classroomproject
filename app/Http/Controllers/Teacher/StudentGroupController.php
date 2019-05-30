<?php

namespace App\Http\Controllers\Teacher;

use Request;
use App\Http\Controllers\Controller;
use App\subject;
use Auth;
use App\register_courses;
use App\subjects_transection;

class StudentGroupController extends Controller
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
            return view('group_student.list_subject')->with(compact('subject'));
        }else{
            return view('group_student.list_subject_element')->with(compact('subject'));
        }
    }


    public function create($id = null)
    {
        $register_courses = register_courses::where('id_subject',$id)->where('status',1)->get();

        if(!Request::ajax()) {
            return view('group_student.list_student')->with(compact('register_courses'));
        }else{
            return view('group_student.list_student_element')->with(compact('register_courses'));
        }
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
