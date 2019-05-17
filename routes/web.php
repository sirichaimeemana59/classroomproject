<?php

//Route::get('/', function () {
//    return view('index.index');
//});

Route::get('/index','Home\HomeController@index');

//User Login
Route::post('user/login','User\UserLoginController@index');
//Admin Teacher
Route::get('/admin/teacher','Admin\AdminTeacherController@index');