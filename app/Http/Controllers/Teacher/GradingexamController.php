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
use App\score_student;

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


    public function create($id = null ,$text = null)
    {

        $student = register_courses::where('id_subject',$id)->where('status',1)->get();


        if(!Request::ajax()) {
            return view('granding_eaxm.list_student')->with(compact('student','text'));
        }else{
            return view('granding_eaxm.list_student_element')->with(compact('student','text'));
        }

    }


    public function store($id_subject = null , $id_student = null)
    {
        $subject = subject::where('id_subject',$id_subject)->first();
        $examination = examination::where('id_subject',$id_subject)->get();
        $examination_ = examination::where('id_subject',$id_subject)->first();

//        dd($examination_['code']);
        foreach ($examination as $row){
            $examination_transection = examination_transection::where('code',$row['code'])->where('status','t')->get();
            $examination_t[] = $examination_transection->toArray();
        }

        //dd($examination_t);

        $answer_student = answer_student::where('user_create',$id_student)->where('id_subject',$id_subject)->get();
        $answer_student_ = answer_student::where('user_create',$id_student)->where('id_subject',$id_subject)->first();

        $score_student = score_student::where('id_student',$id_subject)->where('id_subject',$id_subject)->get();

        if(count($score_student) != 0){
            return redirect('/teacher/grading_the_exam/list_student/'.$id_subject.'/'.$text=2);
        }else{
            return view ('granding_eaxm.list_exm_test')->with(compact('examination','subject','examination_t','examination_','answer_student','answer_student_'));
        }
    }


    public function score_summary()
    {
        $score_student = new score_student;
        $score_student->score = Request::get('score');
        $score_student->id_teacher = Request::get('user_create');
        $score_student->id_student = Request::get('id_subject');
        $score_student->id_ans = Request::get('id_ans');
        $score_student->id_question = Request::get('id_exm');
        $score_student->id_subject = Request::get('id_subject');
        $score_student->code = Request::get('code');
        $score_student->save();

        foreach (Request::get('data') as  $t){
            $answer_student = answer_student::find($t['code']);
            $answer_student->status = 't';
            $answer_student->save();
        }
        //dd($answer_student);
        return redirect('/teacher/grading_the_exam/list_student/'.Request::get('id_subject'));
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
