<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\teacher;
use ImageUploadAndResizer;

class AdminTeacherController extends Controller
{

    public function index(Request $request)
    {
        $teacher = new teacher;

        if($request->method('post')) {
            if ($request->input('name')) {
                $teacher = $teacher->where('name_teacher', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('lastname_teacher', 'like', "%" . $request->input('name') . "%");
            }
        }

        $teacher = $teacher->get();

        if(!$request->ajax()) {
            return view('teacher_admin.list_teacher')->with(compact('teacher'));
        }else{
            return view('teacher_admin.list_teacher_element')->with(compact('teacher'));
        }


    }


    public function create(Request $request)
    {
        //dd($request->all());
        $fileNameToDatabase = '//via.placeholder.com/250x250';
        if($request->hasFile('photo')){
            $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
            $uploader->width = 350;
            $uploader->height = 350;
            $fileNameToDatabase = $uploader->execute();
        }

        $teacher = new teacher;
        $teacher->name_teacher = $request->input('name_teacher');
        $teacher->lastname_teacher = $request->input('lastname_teacher');
        $teacher->brithdate = $request->input('brithdate');
        $teacher->tell = $request->input('tell');
        $teacher->address = $request->input('address');
        $teacher->photo = $fileNameToDatabase;
        $teacher->save();
        //dd($teacher);

        return redirect('/admin/teacher');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $teacher = teacher::find($request->input('id'));

        return view ('teacher_admin.view_teacher')->with(compact('teacher'));
    }


    public function edit(Request $request)
    {
        $teacher = teacher::find($request->input('id'));

        return view ('teacher_admin.edit_teacher')->with(compact('teacher'));
    }


    public function update(Request $request)
    {
        $teacher = teacher::find($request->input('id'));
        //dd($teacher);
        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $teacher->name_teacher = $request->input('name_teacher');
            $teacher->lastname_teacher = $request->input('lastname_teacher');
            $teacher->brithdate = $request->input('brithdate');
            $teacher->tell = $request->input('tell');
            $teacher->address = $request->input('address');
            $teacher->photo = $fileNameToDatabase;
            $teacher->save();
        }else{
            $teacher->name_teacher = $request->input('name_teacher');
            $teacher->lastname_teacher = $request->input('lastname_teacher');
            $teacher->brithdate = $request->input('brithdate');
            $teacher->tell = $request->input('tell');
            $teacher->address = $request->input('address');
            $teacher->photo =  $request->input('photo_hidden');;
            $teacher->save();
        }
        return redirect('/admin/teacher');
    }


    public function destroy(Request $request)
    {
        $teacher = teacher::find($request->input('id'));
        $teacher->delete();

        return redirect('/admin/teacher');
    }
}
