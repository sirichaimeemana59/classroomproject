<?php
Auth::routes();

Route::get('/','Home\HomeController@index');

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
Route::get('/teacher/home','Teacher\TeacherController@index');
Route::any('/teacher/list_subject','Teacher\TeacherController@index');
Route::post('/teacher/insert_subject','Teacher\TeacherController@create');
Route::post('/teacher/view_subject','Teacher\TeacherController@show');
Route::get('/teacher/edit_subject/{id?}','Teacher\TeacherController@edit');
Route::post('/teacher/edit_subject/form','Teacher\TeacherController@update');
Route::post('/teacher/delete_subject','Teacher\TeacherController@destroy');
Route::get('/teacher/approval_of_registration','Teacher\TeacherController@approval_of_registration');
Route::post('/teacher/approval_of_registration/set_status','Teacher\TeacherController@approval_set_status');
Route::post('teacher/delete/subject_transection','Teacher\TeacherController@delete_subject_transection');

//Student
Route::any('/student/home','Student\StudentController@show_subject');
Route::any('/student/list_subject/{text?}','Student\StudentController@show_subject');
Route::post('/student/register_courses','Student\StudentController@register_courses');
Route::get('/student/class_schedule','Student\StudentController@class_schedule');
Route::post('/student/delete_courses','Student\StudentController@delete_courses');

//Examination
Route::any('/teacher/examination','Teacher\ExaminationController@index');
Route::post('/teacher/insert_examination','Teacher\ExaminationController@create');
Route::post('/teacher/view_exam','Teacher\ExaminationController@show');
Route::get('/teacher/edit_exam/{id?}','Teacher\ExaminationController@edit');
Route::post('/teacher/edit_exam/form','Teacher\ExaminationController@update');
Route::post('/teacher/delete/choice','Teacher\ExaminationController@destroy');
Route::post('/teacher/delete-examination','Teacher\ExaminationController@destroy_more');
Route::get('/teacher/add_eam_form/{id?}','Teacher\ExaminationController@add_eam_form');
Route::get('/teacher/add_eam_form_new/{id?}','Teacher\ExaminationController@add_eam_form_new');

//Student examination
Route::any('/student/test/examination/{text?}','Student\StudentExaminationController@index');
Route::get('/student/student_start_test/{id?}','Student\StudentExaminationController@student_start_test');
Route::post('/student/send/ans','Student\StudentExaminationController@send_ans');

//teacher grading_the_exam
Route::any('/teacher/grading_the_exam','Teacher\GradingexamController@index');
Route::any('/teacher/grading_the_exam/list_student/{id?}/{text?}','Teacher\GradingexamController@create');
Route::get('/teacher/grading_the_exam/check/{id_subject?}/{id_student?}','Teacher\GradingexamController@store');
Route::post('/teacher/score/score_summary','Teacher\GradingexamController@score_summary');

//teacher group_student
Route::any('/teacher/group_student','Teacher\StudentGroupController@index');
Route::any('/teacher/group_student_add/{id?}','Teacher\StudentGroupController@create');
Route::post('/teacher/group_student/add','Teacher\StudentGroupController@store');