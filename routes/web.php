<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'helloController@index');
    
Route::get('/about','helloController@About');

Route::get('/contact', function () {
    return view('contact');
});

// category crud are here

Route::get('/addCategory','helloController@addCategory');
Route::get('/allCategory','helloController@allCategory');
Route::get('/view/category/{id}','helloController@viewCategory');
Route::get('/delete/category/{id}','helloController@deleteCategory');
Route::post('/storeCategory','helloController@storeCategory');
Route::get('/edit/category/{id}','helloController@editCategory');
Route::post('/updateCategory/{id}','helloController@updateCategory');

// post crud are here

Route::get('/writePost','postController@post');
Route::post('/storePost','postController@strorePost');
Route::get('/allPost','postController@allPost');
Route::get('/view/post/{id}','postController@viewPost');
Route::get('/edit/post/{id}','postController@editPost');
Route::post('/update/post/{id}','postController@updatePost');
Route::get('/delete/post/{id}','postController@deletePost');

//student crud are here using Eloquent

Route::get('/student', 'studentController@student');
Route::post('/storeStudent','studentController@storeStudent');
Route::get('/allStudents', 'studentController@allStudents');
Route::get('/view/student/{id}','studentController@viewStudent');
Route::get('/delete/student/{id}','studentController@deleteStudent');
Route::get('/edit/student/{id}','studentController@editStudent');
Route::post('/update/student/{id}','studentController@updateStudent');