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
use App\Http\Controllers;
use rameninfo\Application\Controller\Ramen\RamenSaveController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/save', RamenSaveController::class);
Route::get('/save',function (){
    return view('ramen.save');
});
Route::get('/show','RamenController@show');
Route::post('/hash','HashController@index');
Route::get('/hash',function (){
    return view('hash');
});

Route::get('/sample','SampleController@index');
