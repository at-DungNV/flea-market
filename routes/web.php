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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index');
    
    Route::get('/post', [
      'uses' => 'PostController@index',
      'as'   => 'post.index'
    ]);
    
    Route::group(['middleware' => ['auth']], function () {
      
      Route::resource('post', 'PostController', ['except' => [
          'index'
      ]]);

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

      Route::get('/home', 'HomeController@index');

      Route::get('/image/{filename}', [
        'uses' => 'PostController@getPostImages',
        'as'   => 'post.getPostImages'
      ]);

    });

    Route::group(['prefix' => 'api'], function () {
        Route::get('provinces', [
          'uses' => 'ProvinceController@index',
          'as'   => 'province.index'
        ]);
        
        Route::get('province/{id}', [
          'uses' => 'ProvinceController@getDistricts',
          'as'   => 'province.getDistricts'
        ]);
        
        Route::get('districts', [
          'uses' => 'DistrictController@index',
          'as'   => 'district.index'
        ]);
        
        Route::get('district/{id}', [
          'uses' => 'DistrictController@getWards',
          'as'   => 'district.getWards'
        ]);
        
        Route::get('wards', [
          'uses' => 'WardController@index',
          'as'   => 'ward.index'
        ]);
    });
});
