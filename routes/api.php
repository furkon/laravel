<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::get('/api', function() {
// 	 $auth = auth()->guard('api');
//     return auth()->user();
// });

Route::group(['prefix' => 'v1/', 'middleware' => 'auth:api'],function(){
	Route::resource('comments','CommentController',array('except'=>array('create','edit')));
});