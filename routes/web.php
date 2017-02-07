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
Auth::routes();

Route::get('/', function () {
  return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {

  Route::resource('categories', 'CategoryController');
  Route::resource('posts', 'PostController');
  Route::get('sidebarCategories', 'CategoryController@getSidebarCategories');


  Route::get('/home', 'HomeController@index');

  Route::get('/image/{filename}', [
    'uses' => 'PostController@getPostImages',
    'as'   => 'posts.getPostImages'
  ]);

  // usage inside a laravel route
  Route::get('/image', function()
  {
      $img = Image::make('foo.jpg')->resize(300, 200);

      return $img->response('jpg');
  });
});
