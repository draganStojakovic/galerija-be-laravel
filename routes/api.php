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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
    
});

Route::get('galleries', 'GalleriesController@index');
Route::get('galleries/{id}', 'GalleriesController@show');              
Route::post('galleries/{id}', 'GalleriesController@store');          
Route::put('galleries/{id}', 'GalleriesController@update');             
Route::delete('galleries/{id}', 'GalleriesController@destroy');   

Route::get('comments', 'CommentsController@index');
Route::get('comments/{id}', 'CommentsController@show');     
Route::post('comments/{id}', 'CommentsController@store');     
Route::put('comments/{id}', 'CommentsController@update');    
Route::delete('comments/{id}', 'CommentsController@destroy');  

Route::get('users/{id}', 'UsersController@show');