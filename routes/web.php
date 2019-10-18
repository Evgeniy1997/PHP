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
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
});

Route::get('/profile/{id}', 'HomeController@getUserById');

Route::get('get-users', 'HomeController@getUsers');

Route::get('/deleteUser/{id}', 'HomeController@deleteUser');

Route::post('/updateUser', 'HomeController@updateUser');
