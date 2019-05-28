<?php

namespace App\Http\Controllers\Teacher;

use Request;
use App\Http\Controllers\Controller;

use App\examination;
use App\examination_transection;
use auth;
use ImageUploadAndResizer;

use App\subjects_transection;
use App\subject;
use DB;
use App\Summernote;
use App\answer_student;
use App\student;
use App\register_courses;

class GradingexamController extends Controller
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
            return view('granding_eaxm.list_subject')->with(compact('subject'));
        }else{
            return view('granding_eaxm.list_subject_element')->with(compact('subject'));
        }
    }


    public function create($id = null)
    {
        $student = register_courses::where('id_subject',$id)->where('status',1)->get();

        if(!Request::ajax()) {
            return view('granding_eaxm.list_student')->with(compact('student'));
        }else{
            return view('granding_eaxm.list_student_element')->with(compact('student'));
        }

    }


    public function store($id_subject = null , $id_student = null)
    {
        $subject = subject::where('id_subject',$id_subject)->first();
        $examination = examination::where('id_subject',$id_subject)->get();
        $examination_ = examination::where('id_subject',$id_subject)->first();
        $examination_transection = examination_transection::where('code',$examination_->code)->get();

        $answer_student = answer_student::where('user_create',$id_student)->where('id_subject',$id_subject)->get();

        return view ('granding_eaxm.list_exm_test')->with(compact('examination','subject','examination_transection','examination_','answer_student'));
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
