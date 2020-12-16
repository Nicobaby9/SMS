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
    return view('landing-page.index');
});

Auth::routes();

Route::get('/administrator/home', 'HomeController@index')->name('home');

Route::resource('administrator/students', 'StudentController');
// Route::get('/administrator/edit/profil/{id}', 'ProfileController@edit');
// Route::post('/administrator/update/{id}', 'ProfileController@update');
Route::resource('administrator/profil', 'ProfileController');

