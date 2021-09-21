<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use rameninfo\Application\Controller\Ramen\RamenDeleteController;
use rameninfo\Application\Controller\Ramen\RamenEditController;
use rameninfo\Application\Controller\Ramen\RamenFindController;
use rameninfo\Application\Controller\Ramen\RamenSaveController;
use rameninfo\Application\Controller\Ramen\RamenShowController;
use rameninfo\Application\Controller\TwitterData\TwitterDataDeleteController;
use rameninfo\Application\Controller\TwitterData\TwitterDataFindController;
use rameninfo\Application\Controller\TwitterData\TwitterDataSaveController;
use rameninfo\Application\Controller\TwitterData\TwitterDataShowController;

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
Route::group(['prefix' => 'ramen', 'as' => 'ramen.'], function (){
    Route::post('/save', RamenSaveController::class)->name('save');
    Route::get('/find/{ramen_id}', RamenFindController::class)->name('find');
    Route::get('/show', RamenShowController::class)->name('show');
    Route::delete('/delete', RamenDeleteController::class)->name('delete');
    Route::get('edit/{ramen_id}', RamenEditController::class)->name('edit');
});

Route::group(['prefix' => 'twitterdata' , 'as' => 'twitterdata.'],function (){
//   Route::post('/save', TwitterDataSaveController::class)->name('save');
   Route::get('/find/{ramen_id}', TwitterDataFindController::class)->name('find');
   Route::get('/show', TwitterDataShowController::class)->name('show');
   Route::delete('/delete', TwitterDataDeleteController::class)->name('delete');
   Route::post('/save',TwitterDataSaveController::class)->name('save');
});

//Route::group(['middleware' => ['api']],function (){
//    Route::post('/save', RamenSaveController::class)->name('ramen_save');
//});



