<?php

namespace App\Http\Controllers\Student;

use Request;
use App\Http\Controllers\Controller;
use App\subject;
use Auth;
use App\register_courses;

class StudentController extends Controller
{

    public function index()
    {
        return view('Student.home_student');
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

    public function show_subject($text = null){
        $subject = new subject;

        if(Request::method('post')) {
            if (Request::get('name')) {
                $subject = $subject->where('name_subject_th', 'like', "%" . Request::get('name') . "%")
                    ->orWhere('name_subject_en', 'like', "%" . Request::get('name') . "%");
            }
        }

        $subject = $subject->get();

        if(!Request::ajax()) {
            return view('Student.list_subject')->with(compact('subject','text'));
        }else{
            return view('Student.list_subject_element')->with(compact('subject','text'));
        }

    }

    public function register_courses(){
        $count = count(Request::get('id_subject'));
        for ($i = 0;$i < $count;$i++) {

            $find = new register_courses;
            $find = $find->where('id_subject',Request::get('id_subject')[$i])
                    ->where('user_create',Auth::user()->id)->get();

            if($find){
                $text = 1;
                return redirect('student/list_subject/'.$text);
            }else{
                $register_courses = new register_courses;
                $register_courses->id_subject = Request::get('id_subject')[$i];
                $register_courses->user_create = Auth::user()->id;
                $register_courses->id_teacher = Request::get('id_teacher')[$i];
                $register_courses->save();

                $subject = subject::find(Request::get('id_subject')[$i]);
                $subject->amount = $subject->amount - 1;
                $subject->save();
            }

            }

        return redirect('student/list_subject');
    }

    public function class_schedule(){

        $register_courses = new register_courses;
        $register_courses =$register_courses->where('user_create',Auth::user()->id)->where('status',1)->get();

        $register_courses_ = new register_courses;
        $register_courses_ =$register_courses_->where('user_create',Auth::user()->id)->get();

        return view('Student.show_courses')->with(compact('register_courses','register_courses_'));
    }

    public  function delete_courses(){
        $register_courses =  register_courses::find(Request::get('id'));
        $register_courses->delete();

        return redirect('student/class_schedule');
    }
}
