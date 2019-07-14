<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController');
Route::get('/Department', 'departmentController@index')->name('Department');
Route::get('/session/{department_id}', 'departmentController@show_semester')->name('session');
Route::get('/type/{semester_id}', 'typeController@index')->name('type');
Route::get('/subject/{course_type_id}', 'subjectController@index')->name('subject');
Route::post('/upload_file', 'subjectController@storeBook')->name('subject_upload');
Route::get('/books', function(){return view('books');})->name('books');
Route::get('/show_file/{course_id}','uploadController@show_file');

/*Route::get('/upload', function(){
	return view('upload')});*/
	Route::get('/upload', 'uploadController@index')->name('upload');

	Route::get('/download/{file}', 'downloadController@download')->name('download');




Route::resource('/comments','CommentsController');
Route::resource('/replies','RepliesController');
Route::post('/replies/ajaxDelete','RepliesController@ajaxDelete');




Route::get('/add_department','departmentController@add_department');

Route::post('/save-department','departmentController@save_department');

Route::get('/add_semester','departmentController@add_semester');

Route::post('/save-semester','departmentController@save_semester');

Route::get('/add_course','departmentController@add_course');

Route::post('/save-course','departmentController@save_course');
Route::get('/add_course_type','departmentController@add_course_type');

Route::post('/save-course-type','departmentController@save_course_type');

Route::get('/add_file','departmentController@add_file');

Route::post('/save-file','departmentController@save_file');

Route::get('/show-file','departmentController@show_file');
