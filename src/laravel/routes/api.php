<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use rameninfo\Application\Controller\Ramen\RamenDeleteController;
use rameninfo\Application\Controller\Ramen\RamenFindController;
use rameninfo\Application\Controller\Ramen\RamenSaveController;
use rameninfo\Application\Controller\Ramen\RamenShowController;

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
Route::post('/save', RamenSaveController::class)->name('ramen.save');
Route::get('/find/{ramen_id}', RamenFindController::class)->name('ramen.find');
Route::get('/show', RamenShowController::class)->name('ramen.show');
Route::delete('/delete', RamenDeleteController::class)->name('ramen.delete');
//Route::group(['middleware' => ['api']],function (){
//    Route::post('/save', RamenSaveController::class)->name('ramen_save');
//});



