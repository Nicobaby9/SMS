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
Route::get('/articles', 'PageController@article')->name('articles.index');
Route::get('/galery', 'PageController@gallery');

Route::group(['prefix' => 'article'], function() {
	Route::get('/category/{category}', 'PageController@categoryArticle')->name('category.article');
	Route::get('/{slug}', 'PageController@show')->name('front.article.show');
	Route::post('/{slug}', 'CommentController@addArticleComments')->name('articlecomment.store');
});

Auth::routes();

Route::resource('/forum', 'ThreadController', ['only' => ['index', 'create', 'store', 'destroy']]);

Route::group(['prefix' => 'forum'], function() {
	Route::get('/category/{tag}', 'ThreadController@categoryThread')->name('tag.thread');
	Route::get('/thread/{slug}', 'ThreadController@show')->name('thread.show');
	Route::get('/thread/{slug}/edit', 'ThreadController@edit')->name('thread.edit');
	Route::patch('/thread/{slug}/update', 'ThreadController@update')->name('thread.update');
	Route::get('/search','SearchController@search')->name('thread.search');
	Route::resource('/comment', 'CommentController', ['only' => ['update', 'destroy', 'edit']]);
});

Route::group(['middleware' => 'auth'], function() {

	Route::post('/comment/create/{thread}', 'CommentController@addThreadComments')->name('threadcomment.store');
	Route::post('/reply/create/{comment}', 'CommentController@addReplyComments')->name('replycomment.store');
	Route::post('/forum/mark-as-solution', 'ThreadController@markAsSolution')->name('markAsSolution');
	Route::post('/comment/like', 'LikeController@toggleLike')->name('toggleLike');
	Route::post('/comment/{id}/act', 'LikeController@actOnChirp')->name('actOnChirp');

	Route::group(['prefix' => 'user'], function() {

		Route::get('/profile/{user}', 'UserProfileController@index')->name('user_profile');
		Route::get('/profile/{user}/edit', 'UserProfileController@show')->name('user_profile_edit');
		Route::patch('/profile/{id}/update', 'UserProfileController@update')->name('user_profile_update');
		Route::get('/photo', 'UserProfileController@photo');
		Route::get('/photo/{id}', 'UserProfileController@photoShow')->name('photo');
		Route::post('/photo.store/{id}', 'UserProfileController@photoStore')->name('photo.store');

	});

	Route::get('/markAsRead', function () {
		auth()->user()->unreadNotifications->markAsRead();
	});

	Route::get('/spp/checkout', 'App\MidtransController@create');

});

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'administrator','middleware' => ['auth', 'RoleChecker:admin'], 'namespace' => 'Admin'], function() {
	
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');
	Route::resource('/article', 'ArticleController');
	Route::resource('/article-category', 'ArticleCategoryController');
	Route::resource('/books', 'BookController');
	Route::resource('/books-category', 'BookCategoryController');
	Route::resource('/gallery', 'GalleryController');
	Route::resource('/students', 'StudentController');

	Route::resource('/setting/front-end', 'FrontEndController');
	Route::get('/setting/images', 'FrontendImageController@settingImages')->name('frontend.image');
	Route::patch('/setting/images/{id}', 'FrontendImageController@updateImage')->name('frontend.image.update');

	Route::get('/book-export-data', 'ExcelController@bookexport')->name('export.book');
	Route::get('/student-export-data', 'ExcelController@studentexport')->name('export.student');
	Route::post('/student-import-data', 'ExcelController@studentimport')->name('import.student');
	
});

Route::get('google', 'GoogleController@redirect');
Route::get('google/callback', 'GoogleController@callback');

