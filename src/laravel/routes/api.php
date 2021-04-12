<?php

use App\Http\Controllers\TestController;
use Bootstrap\Test2Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use package\rameninf\Applicatio\Controlle\Ramen\RamenSaveController;

/*
|--------------------------------------------------------------------------
| API Routes
|---------------------------------------
-----------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', TestController::class);
Route::post('/save', RamenSaveController::class)->name('ramen.save');


//Route::group(['middleware' => ['api']],function (){
//    Route::post('/save', RamenSaveController::class)->name('ramen_save');
//});



