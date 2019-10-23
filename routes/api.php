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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('project')->group(function () {
    Route::get('/', 'ProjectController@index');
    Route::post('/add', 'ProjectController@store');
    Route::delete('/{id}/delete', 'ProjectController@destroy');
    Route::get('/{id}', 'ProjectController@show');
    Route::put('/{id}/edit', 'ProjectController@update');
// project with member
    Route::get('/{id}/list-member', 'ProjectWithMemberController@index');
    Route::post('/{id}/add-member/{idmember}', 'ProjectWithMemberController@store');
    Route::get('/{id}/edit-member/{idmember}', 'ProjectWithMemberController@show');
    Route::put('/{id}/update/{idmember}', 'ProjectWithMemberController@update');
    Route::delete('/{id}/remove-member/{idmember}', 'ProjectWithMemberController@destroy');
});
// crud member
Route::prefix('member')->group(function () {
    Route::get('/', 'MemberController@index');
    Route::post('/add', 'MemberController@store');
    Route::delete('/{id}/delete', 'MemberController@destroy');
    Route::get('/{id}', 'MemberController@show');
    Route::put('/{id}/edit', 'MemberController@update');
});
