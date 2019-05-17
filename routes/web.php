<?php
Auth::routes();

Route::get('/index','Home\HomeController@index');

//User Login
Route::post('user/login','User\UserLoginController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@getLogout');




//Admin Teacher
Route::any('/admin/teacher','Admin\AdminTeacherController@index');
Route::post('/admin/insert_teacher','Admin\AdminTeacherController@create');
Route::post('/admin/view_teacher','Admin\AdminTeacherController@show');
Route::post('/admin/edit_teacher','Admin\AdminTeacherController@edit');
Route::post('admin/edit_teacher_form','Admin\AdminTeacherController@update');
Route::post('product/delete_product','Admin\AdminTeacherController@destroy');

