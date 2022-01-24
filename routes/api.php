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

Route::GET('/blog_search/{id}','ApiController@blog_search');
Route::POST('/blog_archive','ApiController@blog_archive');
Route::POST('/blog_rearchive','ApiController@blog_rearchive');
Route::GET('/event_status','ApiController@event_status');