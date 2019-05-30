<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\student;
use ImageUploadAndResizer;
use App\User;
use Hash;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $student = new student;

        if($request->method('post')) {
            if ($request->input('name')) {
                $student = $student->where('name_student', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('lastname_student', 'like', "%" . $request->input('name') . "%");
            }
        }

        $student = $student->get();

        if(!$request->ajax()) {
            return view('student_admin.list_student')->with(compact('student'));
        }else{
            return view('student_admin.list_student_element')->with(compact('student'));
        }

    }


    public function create(Request $request)
    {
        if($request->input('password') == $request->input('password_')){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
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


            $student = new student;
            $student->name_student = $request->input('name_student');
            $student->lastname_student = $request->input('lastname_student');
            $student->brithdate = $request->input('brithdate');
            $student->tell = $request->input('tell');
            $student->address = $request->input('address');
            $student->photo = $fileNameToDatabase;
            $student->email = $request->input('email');
            $student->code = $randomString;
            $student->save();
            //dd($teacher);

            $User = new User;
            $User->name = $request->input('name_student');
            $User->email = $request->input('email');
            $User->password = Hash::make($request->input('password'));
            $User->code = $randomString;
            $User->role = 0;
            $User->save();
        }

        return redirect('/admin/student');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $student = student::find($request->input('id'));

        return view ('student_admin.view_student')->with(compact('student'));
    }


    public function edit(Request $request)
    {
        $student = student::find($request->input('id'));

        return view ('student_admin.edit_student')->with(compact('student'));
    }


    public function update(Request $request)
    {
//        $User = User::where('code',$request->input('code'))->get();
//        dd($User);
        $student = student::find($request->input('id'));
        //dd($teacher);
        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $student->name_student = $request->input('name_student');
            $student->lastname_student = $request->input('lastname_student');
            $student->brithdate = $request->input('brithdate');
            $student->tell = $request->input('tell');
            $student->address = $request->input('address');
            $student->photo = $fileNameToDatabase;
            if($request->input('email_') != $request->input('email')){
                $student->email = $request->input('email');
            }else{
                $student->email = $request->input('email_');
            }

            $student->code = $request->input('code');
            $student->save();

            if($request->input('password_') == $request->input('password')){
                $User = User::find($request->input('id_user'));
                $User->name = $request->input('name_student');
                if($request->input('email_') != $request->input('email')){
                    $student->email = $request->input('email');
                }else{
                    $student->email = $request->input('email_');
                }
                $User->password = Hash::make($request->input('password'));
                $User->code = $request->input('code');
                $User->role = 0;
                $User->save();
            }
        }else{
            $student->name_student = $request->input('name_student');
            $student->lastname_student = $request->input('lastname_student');
            $student->brithdate = $request->input('brithdate');
            $student->tell = $request->input('tell');
            $student->address = $request->input('address');
            $student->photo =  $request->input('photo_hidden');
            if($request->input('email_') != $request->input('email')){
                $student->email = $request->input('email');
            }else{
                $student->email = $request->input('email_');
            }
            $student->code = $request->input('code');;
            $student->save();

            if($request->input('password_') == $request->input('password')){
                $User = User::find($request->input('id_user'));
                $User->name = $request->input('name_student');
                if($request->input('email_') != $request->input('email')){
                    $student->email = $request->input('email');
                }else{
                    $student->email = $request->input('email_');
                }
                $User->password = Hash::make($request->input('password'));
                $User->code = $request->input('code');
                $User->role = 0;
                $User->save();
            }
        }
        return redirect('/admin/student');
    }


    public function destroy(Request $request)
    {
        $student = student::find($request->input('id'));
        $student->delete();

        return redirect('/admin/student');
    }
}
