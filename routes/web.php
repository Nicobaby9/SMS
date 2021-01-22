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

Route::resource('/', 'PageController', ['only' => 'index']);
Route::get('/galery', 'PageController@gallery');
Route::get('/articles', 'PageController@article')->name('articles.index');
Route::get('/article/{slug}', 'PageController@show')->name('front.article.show');
Route::get('/articles/category', 'PageController@article')->name('categories.article.index');
Route::post('/article/{slug}', 'CommentController@addArticleComments')->name('articlecomment.store');

Auth::routes();

Route::resource('/forum', 'ThreadController');
Route::resource('/comment', 'CommentController', ['only' => ['update', 'destroy', 'edit']]);
Route::get('/forum/search','SearchController@search')->name('thread.search');

Route::group(['middleware' => 'auth'], function() {

	Route::post('/comment/create/{thread}', 'CommentController@addThreadComments')->name('threadcomment.store');
	Route::post('/reply/create/{comment}', 'CommentController@addReplyComments')->name('replycomment.store');
	Route::post('/forum/mark-as-solution', 'ThreadController@markAsSolution')->name('markAsSolution');
	Route::post('/comment/like', 'LikeController@toggleLike')->name('toggleLike');
	Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile');
	
	Route::get('/user/profile/{user}/edit', 'UserProfileController@show')->name('user_profile_edit');
	Route::patch('/user/profile/{id}/update', 'UserProfileController@update')->name('user_profile_update');
	Route::get('/photo', 'UserProfileController@photo');
	Route::get('/photo/{id}', 'UserProfileController@photoShow')->name('photo');
	Route::post('/photo.store/{id}', 'UserProfileController@photoStore')->name('photo.store');

	Route::get('/markAsRead', function () {
		auth()->user()->unreadNotifications->markAsRead();
	});

});

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'administrator','middleware' => ['auth', 'RoleChecker:admin']], function() {
	
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');
	Route::resource('/students', 'StudentController');
	Route::resource('/profil', 'ProfileController');
	Route::resource('/setting/front-end', 'FrontEndController');
	Route::resource('/gallery', 'GalleryController');
	Route::resource('/article', 'ArticleController');
	Route::resource('/article-category', 'ArticleCategoryController');
	Route::resource('/books', 'BookController');
	Route::resource('/books-category', 'BookCategoryController');

	Route::get('/student-export-data', 'ExcelController@studentexport')->name('export.student');
	Route::post('/student-import-data', 'ExcelController@studentimport')->name('import.student');
	Route::get('/book-export-data', 'ExcelController@bookexport')->name('export.book');
	
});

Route::get('google', 'GoogleController@redirect');
Route::get('google/callback', 'GoogleController@callback');

