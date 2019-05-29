<?php

namespace App\Http\Controllers\Student;

use Request;
use App\Http\Controllers\Controller;

use App\subject;
use App\teacher;
use App\examination;
use App\examination_transection;
use App\register_courses;
use auth;
use App\answer_student;

class StudentExaminationController extends Controller
{

    public function index($text = null)
    {
        $subject = new register_courses;

        if(Request::method('post')) {
            if (Request::get('name')) {
                $subject = $subject->with('join_subject')->where('id_subject',Request::get('name'));
            }
        }

        $subject = $subject->where('user_create',Auth::user()->id)->where('status',1)->get();

        //dd($subject);

        if(!Request::ajax()) {
            return view('student_examation.list_subject')->with(compact('subject','text'));
        }else{
            return view('student_examation.list_subject_element')->with(compact('subject','text'));
        }
    }


    public function student_start_test($id = null)
    {
        $subject = subject::where('id_subject',$id)->first();
        $examination = examination::where('id_subject',$id)->get();
        $examination_ = examination::where('id_subject',$id)->first();
        $examination_transection = examination_transection::where('code',$examination_->code)->get();
        $answer_student = answer_student::where('code',$examination_->code)->where('user_create',Auth::user()->id)->get();

//        dd(count($answer_student));
        if(count($answer_student) != 0){
            return redirect('/student/test/examination/'.$text=2);
        }


        return view ('student_examation.list_exm_test')->with(compact('examination','subject','examination_transection','examination_'));
    }


    public function send_ans()
    {

        if(!empty(Request::get('data'))){
            foreach (Request::get('data') as $key => $t){
                $answer_student = new answer_student;
                $answer_student->id_subject = $t['id_subject'];
                $answer_student->code       = $t['code'];
                $answer_student->id_exm     = $t['id_exm'];
                $answer_student->id_ans     = $t['id_ans'];
                $answer_student->user_create     = Auth::user()->id;
                $answer_student->ans     = empty($t['ans'])?null:$t['ans'];
                $answer_student->save();
            }
        }

        //dump(Request::get('data'));

        return redirect('student/test/examination');
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
