<?php

namespace App\Http\Controllers\Teacher;

use Request;
use App\Http\Controllers\Controller;
use App\subject;
use Auth;
use App\register_courses;
use App\subjects_transection;
use App\group_student;

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

        $group = group_student::where('id_subject',$id)->get();

        if(count($group) != 0){
            $group_ = group_student::where('id_subject',$id)->orderBy('code')->get();

            $subject = subject::find($id)->first();

            return view('group_student.list_group_student')->with(compact('group_','subject'));
        }else {
            if (!Request::ajax()) {
                return view('group_student.list_student')->with(compact('register_courses', 'id'));
            } else {
                return view('group_student.list_student_element')->with(compact('register_courses', 'id'));
            }
        }
    }


    public function store()
    {
        //dd(Request::input('data'));
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $group_student = new group_student;
                $group_student->id_subject = $t['id_subject'];
                $group_student->id_student = $t['id_student'];
                $group_student->code = $randomString;
                $group_student->save();
                //dd($group_student);
            }
        }

        return redirect('teacher/group_student');
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
