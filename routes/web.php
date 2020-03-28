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

Route::get('/panel'										,'Panel\LoginController@login')->name('login');
Route::post('/panel/checklogin'							,'Panel\LoginController@checklogin');

Route::group(['middleware' => ['auth']], function () {

Route::get('/panel/logout'								,'Panel\LoginController@logout');
	
Route::get('/panel/index'								,'Panel\PanelController@index');
	
	
	
Route::get('/panel/posts/list'							,'Panel\PostController@postlist');
Route::get('/panel/posts/new'							,'Panel\PostController@newpost');
Route::post('/panel/posts/new'							,'Panel\PostController@addpost');
	
Route::post('/panel/posts/delete'						,'Panel\PostController@delete');	


Route::get('/panel/posts/edit/{id}'						,'Panel\PostController@editlist')			->name('posts.edit');
Route::post('/panel/posts/edit/{id}'					,'Panel\PostController@editpost')			->name('posts.update');
			
Route::get('/panel/posts/edit/coverimg/{id}/{img}'		,'Panel\PostController@coverimg')			->name('posts.coverimg');
Route::get('/panel/posts/edit/delimg/{id}/{img}'		,'Panel\PostController@delimg')				->name('posts.delimg');


Route::get('/panel/projects/list'						,'Panel\ProjectController@projectlist');
Route::get('/panel/projects/new'						,'Panel\ProjectController@newproject');
Route::post('/panel/projects/new'						,'Panel\ProjectController@addproject');
Route::post('/panel/projects/delete'						,'Panel\ProjectController@delete');
Route::get('/panel/projects/edit/{id}'					,'Panel\ProjectController@editlist')		->name('projects.edit');
Route::post('/panel/projects/edit/{id}'					,'Panel\ProjectController@editproject')		->name('projects.update');
Route::get('/panel/projects/edit/coverimg/{id}/{img}'	,'Panel\ProjectController@coverimg')		->name('posts.coverimg');
Route::get('/panel/projects/edit/delimg/{id}/{img}'		,'Panel\ProjectController@delimg')			->name('posts.delimg');

Route::get('/panel/comments/list'						,'Panel\CommentsController@commentlist');
Route::post('/panel/comments/delete'				,'Panel\CommentsController@delete');

/*
Route::get('/panel/categories/list'						,'Panel\CategoryController@categorylist')	->name('category.approve');
Route::get('/panel/categories/edit/{id}'				,'Panel\CategoryController@editlist')		->name('category.edit');
Route::post('/panel/categories/edit/{id}'				,'Panel\CategoryController@editcategory')	->name('category.update');
Route::get('/panel/categories/new'						,'Panel\CategoryController@newcategory');
Route::post('/panel/categories/new'						,'Panel\CategoryController@addcategory');
Route::get('/panel/categories/delete/{id}'				,'Panel\CategoryController@delete')	->name('project.delete');*/


Route::get('/panel/categories/list'						,'Panel\CategoryController@index');
Route::post('panel/categories/new'						,'Panel\CategoryController@new');
Route::get('panel/categories/pull/{id}'					,'Panel\CategoryController@pull');
Route::post('panel/categories/update'					,'Panel\CategoryController@update');
Route::post('/panel/categories/delete'					,'Panel\CategoryController@delete');

/*
Route::get('/panel/abilities/edit/{id}'					,'AbilityController@edit');		
Route::post('/panel/abilities/edit/{id}'				,'AbilityController@update');	
Route::get('/panel/abilities/new'						,'AbilityController@new');
Route::post('/panel/abilities/new'						,'AbilityController@insert');
	*/

Route::get('/panel/abilities/list'						,'AbilityController@index');
Route::post('panel/abilities/new'						,'AbilityController@new');
Route::get('panel/abilities/pull/{id}'					,'AbilityController@pull');
Route::post('panel/abilities/update'					,'AbilityController@update');
Route::post('/panel/abilities/delete'					,'AbilityController@delete');

Route::get('/panel/settings/social'						,'SocialController@index');
Route::post('/panel/settings/social'					,'SocialController@update');

Route::get('/panel/settings/personal'					,'PersonalController@index');
Route::post('/panel/settings/personal'					,'PersonalController@update');
	
Route::get('/panel/settings/general'					,'SiteSettingController@index');
Route::post('/panel/settings/general'					,'SiteSettingController@update');

Route::get('/panel/messages/list'						,'ContactController@list');
Route::post('/panel/messages/delete'					,'ContactController@delete');
Route::get('/panel/messages/pull/{id}'					,'ContactController@pull');
});

Route::get('/'											,'PersonalController@index2');

Route::get('/blog'										,'Blog\IndexController@index');
Route::get('/blog/category/{id}/{slug?}'				,'Blog\CategoryController@index');
		
Route::get('/blog/post/{id}/{slug?}'					,'Blog\PostController@index');
Route::post('/blog/posts/{id}/{slug?}/addcomment'		,'Blog\PostController@addComment');
	
Route::get('/blog/contact'								,'ContactController@index');
Route::post('/blog/contact'								,'ContactController@sendMail');
		
Route::get('/blog/project'								,'Blog\ProjectController@pull');
Route::get('/blog/projects/{id}/{slug?}'				,'Blog\ProjectController@index');
	
	