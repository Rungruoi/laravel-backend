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

Route::prefix('admin')->group(function() {
    Route::get('project', 'ProjectController@index');
    Route::post('project/add', 'ProjectController@store');
    Route::delete('project/{id}/delete', 'ProjectController@destroy');
    Route::put('project/{id}/edit','ProjectController@update');

    Route::get('member', 'MemberController@index');
    Route::post('member/add', 'MemberController@store');
    Route::delete('member/{id}/delete', 'MemberController@destroy');
    Route::put('member/{id}/edit', 'MemberController@update');

    Route::get('project/{id}/list-member', 'ProjectWithMemberController@index');
    Route::post('project/{id}/add-member/{idmember}', 'ProjectWithMemberController@store');
    Route::delete('project/{id}/remove-member/{idmember}', 'ProjectWithMemberController@destroy');

});
