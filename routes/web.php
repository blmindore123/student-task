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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/dashboard', 'LoginController@dashboard');
Route::get('/logout', 'LoginController@logout');

Route::get('/student/create', 'StudentController@create');
Route::post('/student/store', 'StudentController@store');
Route::get('student/getData', 'StudentController@getData');
Route::get('student/showScore/{id}', 'StudentController@showScore');

Route::post('/login', 'LoginController@login');