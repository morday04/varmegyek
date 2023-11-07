<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CassisController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VehicleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home',);
})->name('home');

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('fuels', [FuelController::class, 'index'])->name('fuels');
Route::post('fuel', [FuelController::class, 'save'])->name('saveFuel');
Route::get('fuel/create', [FuelController::class, 'create'])->name('createFuel');
Route::post('fuel/{id}', [FuelController::class, 'edit'])->name('editFuel');
Route::patch('fuel/{id}', [FuelController::class, 'update'])->name('updateFuel');
Route::delete('fuel/{id}', [FuelController::class, 'delete'])->name('deleteFuel');
Route::post('fuels/search', [FuelController::class, 'search'])->name('searchFuels');

Route::get('cassises', [CassisController::class, 'index'])->name('cassises');
Route::post('cassis', [CassisController::class, 'save'])->name('saveCassis');
Route::get('cassis/create', [CassisController::class, 'create'])->name('createCassis');
Route::post('cassis/{id}', [CassisController::class, 'edit'])->name('editCassis');
Route::patch('cassis/{id}', [CassisController::class, 'update'])->name('updateCassis');
Route::delete('cassis/{id}', [CassisController::class, 'delete'])->name('deleteCassis');
Route::post('cassises/search', [CassisController::class, 'search'])->name('searchCassises');

Route::get('clients', [ClientController::class, 'index'])->name('clients');
Route::post('client', [ClientController::class, 'save'])->name('saveClient');
Route::get('client/create', [ClientController::class, 'create'])->name('createClient');
Route::post('client/{id}', [ClientController::class, 'edit'])->name('editClient');
Route::patch('client/{id}', [ClientController::class, 'update'])->name('updateClient');
Route::delete('client/{id}', [ClientController::class, 'delete'])->name('deleteClient');
Route::post('clients/search', [ClientController::class, 'search'])->name('searchClients');
Route::post('clients/{id}/send-valid-until-mail', [ClientController::class, 'sendValidUntilMail'])->name('sendValidUntilMail');


Route::get('manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers');
Route::post('manufacturer', [ManufacturerController::class, 'save'])->name('saveManufacturer');
Route::get('manufacturer/create', [ManufacturerController::class, 'create'])->name('createManufacturer');
Route::post('manufacturer/{id}', [ManufacturerController::class, 'edit'])->name('editManufacturer');
Route::patch('manufacturer/{id}', [ManufacturerController::class, 'update'])->name('updateManufacturer');
Route::delete('manufacturer/{id}', [ManufacturerController::class, 'delete'])->name('deleteManufacturer');
Route::post('manufacturers/search', [ManufacturerController::class, 'search'])->name('searchManufacturers');
Route::get('/manufacturers/{id}/types', [ManufacturerController::class, 'types'])->name('getTypes');

Route::get('types', [TypeController::class, 'index'])->name('types');
Route::post('type', [TypeController::class, 'save'])->name('saveType');
Route::get('type/create', [TypeController::class, 'create'])->name('createType');
Route::post('type/{id}', [TypeController::class, 'edit'])->name('editType');
Route::patch('type/{id}', [TypeController::class, 'update'])->name('updateType');
Route::delete('type/{id}', [TypeController::class, 'delete'])->name('deleteType');
Route::post('types/search', [TypeController::class, 'search'])->name('searchTypes');
Route::post('/types/filter', [TypeController::class, 'filter'])->name('postTypesFilter');
Route::get('/types/filter', [TypeController::class, 'filter'])->name('getTypesFilter');

Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');
Route::post('vehicle', [VehicleController::class, 'save'])->name('vehicle');
Route::get('vehicle/create', [VehicleController::class, 'create'])->name('createVehicle');
Route::post('vehicle/{id}', [VehicleController::class, 'edit'])->name('editVehicle');
Route::patch('vehicle/{id}', [VehicleController::class, 'update'])->name('updateVehicle');
Route::delete('vehicle/{id}', [VehicleController::class, 'delete'])->name('deleteVehicle');
Route::post('vehicles/search', [VehicleController::class, 'search'])->name('searchVehicles');
Route::get('/vehicles/{id}', [VehicleController::class, 'filter'])->name('vehiclesFilter');
