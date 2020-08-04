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
Route::get('/tasks', 'TaskController@index');//一覧
Route::post('/tasks', 'TaskController@store');//登録
Route::get('/tasks/{task}', 'TaskController@show');//詳細
Route::put('/tasks/{task}', 'TaskController@update');//編集
Route::delete('/tasks/{task}', 'TaskController@destroy');//削除