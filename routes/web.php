<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;

Auth::routes();

Route::get('/', function () {
  return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {

  Route::resource('posts', 'PostController');

  Route::resource('categories', 'CategoryController');

  Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/profile', [
      'uses' => 'UserController@profile',
      'as'   => 'users.profile'
    ]);

    Route::put('/profile', [
      'uses' => 'UserController@update',
      'as'   => 'users.update'
    ]);

    Route::put('/password', [
      'uses' => 'UserController@updatePassword',
      'as'   => 'users.updatePassword'
    ]);

    Route::get('/{id}/edit', [
      'uses' => 'UserController@edit',
      'as'   => 'users.edit'
    ]);
    
    Route::get('/approval-posts', [
      'uses' => 'UserController@getApprovalPosts',
      'as'   => 'users.approvalPosts'
    ]);
    
    Route::get('/rejected-posts', [
      'uses' => 'UserController@getRejectedPosts',
      'as'   => 'users.rejectedPosts'
    ]);

  });

  Route::get('sidebarCategories', 'CategoryController@getSidebarCategories');


  Route::get('/home', 'HomeController@index');

  Route::get('/image/{filename}', [
    'uses' => 'PostController@getPostImages',
    'as'   => 'posts.getPostImages'
  ]);


  // usage inside a laravel route
  Route::get('/test', function(Request $request)
  {

      dd($request->all());
      return "dungnv";
  });
});
