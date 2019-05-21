<?php
Auth::routes();

Route::get('/index','Home\HomeController@index');

//User Login
Route::post('user/login','User\UserLoginController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@getLogout');

//Language
Route::get('locale/{locale?}',function($locale){
   Session::put('locale',$locale);
   return redirect()->back();
});


//Admin Teacher
Route::any('/admin/teacher','Admin\AdminTeacherController@index');
Route::post('/admin/insert_teacher','Admin\AdminTeacherController@create');
Route::post('/admin/view_teacher','Admin\AdminTeacherController@show');
Route::post('/admin/edit_teacher','Admin\AdminTeacherController@edit');
Route::post('admin/edit_teacher_form','Admin\AdminTeacherController@update');
Route::post('product/delete_product','Admin\AdminTeacherController@destroy');

//Admin Student
Route::any('/admin/student','Admin\StudentController@index');
Route::post('/admin/insert_student','Admin\StudentController@create');
Route::post('/admin/view_student','Admin\StudentController@show');
Route::post('/admin/edit_student','Admin\StudentController@edit');
Route::post('/admin/edit_student_form','Admin\StudentController@update');
Route::post('/student/delete_student','Admin\StudentController@destroy');

//Teacher
//Route::get('/teacher/home','Teacher\TeacherController@index');
Route::any('/teacher/list_subject','Teacher\TeacherController@index');
Route::post('/teacher/insert_subject','Teacher\TeacherController@create');
Route::post('/teacher/view_subject','Teacher\TeacherController@show');
Route::post('/teacher/edit_subject','Teacher\TeacherController@edit');
Route::post('/teacher/edit_subject/form','Teacher\TeacherController@update');
Route::post('/teacher/delete_subject','Teacher\TeacherController@destroy');