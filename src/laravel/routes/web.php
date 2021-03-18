<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/sample','RamenController@index');
Route::get('/sample',function (){
    return view('sample');
});
Route::post('/hash','HashController@index');
Route::get('/hash',function (){
    return view('hash');
});
