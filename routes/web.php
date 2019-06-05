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

use App\Http\Middleware\UserMiddleware;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('index','ArticleController@index');

Route::get('read/{article_id}','ArticleController@read');
Route::post('read/{article_id?}','ArticleController@self_comment');

Route::get('add','ArticleController@add');
Route::post('add','ArticleController@create');

Route::get('edit/{id?}','ArticleController@edit');
Route::post('edit/{id?}','ArticleController@update');

Route::get('delete/{id?}','ArticleController@delete');

Route::get('user','UsersController@list');

Route::get('user/add/{follower?}&{followed?}','UsersController@follow_add');

Route::get('user/remove/{follower?}&{followed?}','UsersController@follow_remove');

Route::get('index','ArticleController@index');

Route::get('user/{user_id?}','ArticleController@article_list')
				->middleware(UserMiddleware::class);

Route::view('user/{user_id?}/false','errors.user_false');

Route::get('user/{user_id?}/{article_id?}','ArticleController@article_read')
				->middleware(UserMiddleware::class);

Route::post('user/{user_id?}/{article_id?}','ArticleController@comment')
				->middleware(UserMiddleware::class);
//Auth認証関連
Auth::routes();

// Route::get('index', 'ArticleController@index')->name('index');
