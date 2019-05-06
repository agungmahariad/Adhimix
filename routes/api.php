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
Route::get('search-company/{key}','Auth@autoComplete');
Route::get('get-company/{key}','Auth@getCompany');
Route::get('get-row/{row}','staff@getRow');
Route::get('get-row-penawaran/{row}','staff@getRowPenawaran');
Route::get('tolak/{row}','adminAdhimix@tolak');
