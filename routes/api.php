<?php

use App\Http\Requests\userRequest;
use App\User;
//use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::middleware('auth:api')->get('/api', function (Request $request) {
	dd($request);
});*/


/*--------------------------rest full api-----------------------------*/

Route::post('/user-login' , 'userController@login')->name("user.login");

Route::post('/user-logout' , 'userController@logout')->name("user.logout")->middleware("auth:api");


Route::get('/users' , 'userController@index')->name("user.list")->middleware(['auth:api']);


Route::get('/user/{id}' ,'userController@show')->name("user.show")->middleware(['auth:api']);


Route::post('/create-user' ,'userController@store')->name('user.create');


Route::put('/update-user/{id}' , 'userController@update')->name('user.update')->middleware(['auth:api']);


Route::delete('/delete-user/{id}' ,'userController@destroy')->name("user.delete")->middleware(['auth:api']);