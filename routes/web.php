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


Route::get('/broadcast', function() {
    event(new \App\Events\TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('frontend.welcome');
});


Route::get('auth/facebook', [
  'uses' => 'Auth\RegisterController@redirectToProvider',
  'as'   => 'auth.facebook'
]);
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');


Route::get('/send-notifications', function () {
    $user = Auth::user();
    
    $notification = App\Models\Notification::create([
        'user_id' => 1,
        'post_id' => 1,
        'message' => 'dungnv',
        'seen' => 1,
    ]);
    // Announce that a new message has been posted
    event(new \App\Events\PostApprovalEvent($user, $notification));
    
    return ['status' => 'OK'];
})->middleware('auth');



Route::get('/categories', 'CategoryController@index');


Route::group(['namespace' => 'Frontend'], function () {
    
    Route::get('/images/{filename}', [
      'uses' => 'PostController@getPostImages',
      'as'   => 'post.getPostImages'
    ]);
  
    Route::get('/notifications', [
      'uses' => 'NotificationController@index',
      'as'   => 'notification.index'
    ])->middleware('auth');
    
    Route::get('/update-unread-notification', [
      'uses' => 'NotificationController@updateUnreadNotification',
      'as'   => 'notification.updateUnreadNotification'
    ])->middleware('auth');
    
    Route::put('/notifications/{id}', [
      'uses' => 'NotificationController@update',
      'as'   => 'notification.update'
    ])->middleware('auth');
    
    Route::get('/', 'HomeController@index');
    
    Route::get('/posts', [
      'uses' => 'PostController@index',
      'as'   => 'posts.index'
    ]);
    
    Route::group(['middleware' => ['auth', 'active']], function () {
      
      Route::resource('posts', 'PostController', ['except' => [
          'index', 'update'
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
        
        Route::get('/posts', [
          'uses' => 'UserController@getApprovalPosts',
          'as'   => 'users.show.posts'
        ]);

        Route::put('/posts', [
          'uses' => 'PostController@update',
          'as'   => 'frontend.post.update'
        ]);

      });

      Route::get('/home', 'HomeController@index');

    });

    Route::group(['prefix' => 'api'], function () {
        Route::get('provinces', [
          'uses' => 'ProvinceController@index',
          'as'   => 'province.index'
        ]);
        
        Route::get('provinces/{id}/districts', [
          'uses' => 'ProvinceController@getDistricts',
          'as'   => 'province.getDistricts'
        ]);
        
        Route::get('districts', [
          'uses' => 'DistrictController@index',
          'as'   => 'district.index'
        ]);
        
        Route::get('districts/{id}/wards', [
          'uses' => 'DistrictController@getWards',
          'as'   => 'district.getWards'
        ]);
        
        Route::get('wards', [
          'uses' => 'WardController@index',
          'as'   => 'ward.index'
        ]);
    });
});







Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => ['admin', 'active']], function () {
  Route::get('/post', [
    'uses' => 'PostController@index',
    'as'   => 'admin.post.index'
  ]);
  
  Route::get('/post/{post}', [
    'uses' => 'PostController@show',
    'as'   => 'admin.post.show'
  ]);
  
  Route::delete('/post/{post}', [
    'uses' => 'PostController@destroy',
    'as'   => 'admin.post.destroy'
  ]);
  
  Route::get('/rejected-posts', [
    'uses' => 'PostController@getRejectedPosts',
    'as'   => 'admin.post.rejected'
  ]);
  
  Route::get('/waiting-posts', [
    'uses' => 'PostController@getWaitingPosts',
    'as'   => 'admin.post.waiting'
  ]);
  
  Route::get('/approval-posts', [
    'uses' => 'PostController@getApprovalPosts',
    'as'   => 'admin.post.approval'
  ]);
  
  Route::put('/post', [
    'uses' => 'PostController@update',
    'as'   => 'admin.post.update'
  ]);
  
  
  Route::get('/user', [
    'uses' => 'UserController@index',
    'as'   => 'admin.user.index'
  ]);
  
  
  Route::get('/user/{id}', [
    'uses' => 'UserController@show',
    'as'   => 'admin.user.show'
  ]);
  
  Route::get('/user-blocked', [
    'uses' => 'UserController@getBlockedUsers',
    'as'   => 'admin.user.blocked'
  ]);
  
  Route::post('/user/message', [
    'uses' => 'UserController@sendMessage',
    'as'   => 'admin.user.message'
  ]);
  
  Route::put('/user', [
    'uses' => 'UserController@update',
    'as'   => 'admin.user.update'
  ]);
  
  Route::delete('/user/{id}', [
    'uses' => 'UserController@destroy',
    'as'   => 'admin.user.destroy'
  ]);
});
