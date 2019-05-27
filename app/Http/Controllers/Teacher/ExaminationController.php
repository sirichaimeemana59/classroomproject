<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\examination;
use App\examination_transection;
use auth;
use ImageUploadAndResizer;

class ExaminationController extends Controller
{

    public function index(Request $request)
    {
        $examination = new examination;

        if($request->method('post')) {
            if ($request->get('name')) {
                $examination = $examination->where('proposition_th', 'like', "%" . $request->get('name') . "%")
                    ->orWhere('proposition_en', 'like', "%" . $request->get('name') . "%");
            }
        }

        $examination = $examination->where('user_create',Auth::user()->id)->get();

        if(!$request->ajax()) {
            return view('examination.list_examination')->with(compact('examination'));
        }else{
            return view('examination.list_examination_element')->with(compact('examination'));
        }
    }


    public function create(Request $request)
    {

        $fileNameToDatabase = '//via.placeholder.com/250x250';
        if ($request->hasFile('photo')) {
            $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
            $uploader->width = 350;
            $uploader->height = 350;
            $fileNameToDatabase = $uploader->execute();
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $examination = new examination;
        $examination->code = $randomString;
        $examination->proposition_th = $request->input('proposition_th');
        $examination->proposition_en = $request->input('proposition_en');
        $examination->user_create = Auth::user()->id;
        $examination->photo = empty($request->hasFile('photo'))?null:$fileNameToDatabase;
        $examination->save();
        //dump($examination);

        if (!empty($request->get('data'))) {
            foreach ($request->get('data') as $t) {
                $examination_transection = new examination_transection;
                $examination_transection->status = empty($t['status'])?'f':'t';
                $examination_transection->choice_th = $t['choice_th'];
                $examination_transection->choice_en = $t['choice_en'];
                $examination_transection->code = $randomString;
                $examination_transection->save();
                //dump($examination_transection);
            }
        }

        return redirect('/teacher/examination');
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $examination = examination::find($request->input('id'));

        $examination_transection = examination_transection::where('code',$examination->code)->get();

        return view ('examination.view_examination')->with(compact('examination','examination_transection'));
    }


    public function edit($id = null)
    {
        $examination = examination::find($id);

        $examination_transection = examination_transection::where('code',$examination->code)->get();

        return view ('examination.edit_examination')->with(compact('examination','examination_transection'));
    }


    public function update(Request $request)
    {

        //dd($teacher);
        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $examination = examination::find($request->input('id_'));
            $examination->code = $request->input('code_');
            $examination->proposition_th = $request->input('proposition_th');
            $examination->proposition_en = $request->input('proposition_en');
            $examination->user_create = Auth::user()->id;
            $examination->photo = empty($request->hasFile('photo'))?null:$fileNameToDatabase;
            $examination->save();

            if (!empty($request->get('data'))) {
                foreach ($request->get('data') as $t) {
                    $examination_transection =  examination_transection::find($t['id']);
                    $examination_transection->status = empty($t['status'])?'f':'t';
                    $examination_transection->choice_th = $t['choice_th'];
                    $examination_transection->choice_en = $t['choice_en'];
                    $examination_transection->code = $t['code'];
                    $examination_transection->save();
                    //dump($examination_transection);
                }
            }

            if (!empty($request->get('data1'))) {
                foreach ($request->get('data1') as $l) {
                    $examination_transection =  new examination_transection;
                    $examination_transection->status = empty($l['status'])?'f':'t';
                    $examination_transection->choice_th = $l['choice_th'];
                    $examination_transection->choice_en = $l['choice_en'];
                    $examination_transection->code = $request->input('code_');
                    $examination_transection->save();
                    //dump($examination_transection);
                }
            }

        }else{
            $examination = examination::find($request->input('id_'));
            $examination->code = $request->input('code_');
            $examination->proposition_th = $request->input('proposition_th');
            $examination->proposition_en = $request->input('proposition_en');
            $examination->user_create = Auth::user()->id;
            $examination->photo = null;
            $examination->save();

           // dd($request->get('data'));
            //dump($request->get('data_'));

            if (!empty($request->get('data_'))) {
                foreach ($request->get('data_') as $y) {
                    $examination_transection =  examination_transection::find($y['id']);
                    $examination_transection->status = empty($y['status'])?'f':'t';
                    $examination_transection->choice_th = $y['choice_th'];
                    $examination_transection->choice_en = $y['choice_en'];
                    $examination_transection->code = $y['code'];
                    $examination_transection->save();
                    //dump($request->get('data_'));
                }
            }

            if (!empty($request->get('data1'))) {
                foreach ($request->get('data1') as $b) {
                    $examination_transection =  new examination_transection;
                    $examination_transection->status = empty($b['status'])?'f':'t';
                    $examination_transection->choice_th = $b['choice_th'];
                    $examination_transection->choice_en = $b['choice_en'];
                    $examination_transection->code = $request->input('code_');
                    $examination_transection->save();
                    //dump($examination_transection);
                }
            }
        }
        return redirect('/teacher/examination');
    }


    public function destroy(Request $request)
    {
        $examination_transection = examination_transection::find($request->get('id'));
        $examination_transection->delete();

        return redirect('/teacher/examination');
    }

    public function destroy_more(Request $request)
    {
        $examination = examination::find($request->input('id'));
        $examination_transection = examination_transection::where('code',$examination->code);
        $examination->delete();
        $examination_transection->delete();


        return redirect('/teacher/examination');
    }
}
