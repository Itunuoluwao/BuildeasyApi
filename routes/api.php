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
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST,GET,PUT,PATCH,OPTIONS');
header('Access-Control-Allow-Credentials: false');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
