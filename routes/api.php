<?php

use App\Http\Controllers\Api\CountyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('counties', [CountyController::class, 'index'])->name('apiCounties');
Route::get('counties/search', [CountyController::class, 'search'])->name('apiSearchCounties');
Route::post('counties/county', [CountyController::class, 'save'])->name('apiSaveCounty');
Route::delete('counties/{id}', [CountyController::class, 'delete'])->name('apiDeleteCounty');
//Route::get('/counties/{id}/cities', [CountyController::class, 'types'])->name('getCities');
