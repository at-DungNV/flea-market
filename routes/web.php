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

  Route::get('/posts/pagination', 'PostController@paginate')->where('page', '[0-9]+');

  Route::resource('categories', 'CategoryController');
  Route::resource('posts', 'PostController');
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
