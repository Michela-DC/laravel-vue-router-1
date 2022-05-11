<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function() {

    // Route::get('/posts', 'Api\PostController@index');
    // Route::get('posts/{post}', 'PostController@show');
    // Queste due route le posso riassumere con:
    Route::resource('posts', 'PostController')->only([
        'index', 'show',
    ]);

    Route::get('/categories', 'CategoryController@index');

    Route::get('/categories/{category}/posts', 'CategoryController@archive');
    // archive è un metodo in CategoryController che abbiamo creato in più oltre a quelli di base
});



