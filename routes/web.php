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

Route::resource('/', 'PageController');

Auth::routes();

Route::resource('/forum', 'ThreadController');
Route::resource('/comment', 'CommentController', ['only' => ['update', 'destroy', 'edit']]);

Route::post('/comment/create/{thread}', 'CommentController@addThreadComments')->name('threadcomment.store');
Route::post('/reply/create/{comment}', 'CommentController@addReplyComments')->name('replycomment.store');
Route::post('/forum/mark-as-solution', 'ThreadController@markAsSolution')->name('markAsSolution');
Route::post('/comment/like', 'LikeController@toggleLike')->name('toggleLike');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'administrator','middleware' => 'auth'], function() {
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/students', 'StudentController');
	Route::resource('/profil', 'ProfileController');
	Route::resource('/setting/front-end', 'FrontEndController');
	
});

Route::get('google', 'GoogleController@redirect');
Route::get('google/callback', 'GoogleController@callback');