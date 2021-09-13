<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantTypeController;
use App\Http\Controllers\UniquePlantController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'plant_types'], function(){
    Route::get('', [PlantTypeController::class, 'index'])->name('plant_type.index');
    Route::get('create', [PlantTypeController::class, 'create'])->name('plant_type.create');
    Route::post('store', [PlantTypeController::class, 'store'])->name('plant_type.store');
    Route::get('edit/{plant_type}', [PlantTypeController::class, 'edit'])->name('plant_type.edit');
    Route::post('update/{plant_type}', [PlantTypeController::class, 'update'])->name('plant_type.update');
    Route::post('updatePhoto/{plant_type}', [PlantTypeController::class, 'updatePhoto'])->name('plant_type.updatePhoto');
    Route::post('delete/{plant_type}', [PlantTypeController::class, 'destroy'])->name('plant_type.destroy');
    // Route::post('deletePhoto/{plant_type}', [PlantTypeController::class, 'deletePhoto'])->name('plant_type.deletePhoto');
    Route::get('show/{plant_type}', [PlantTypeController::class, 'show'])->name('plant_type.show');
 });

 Route::group(['prefix' => 'unique_plants'], function(){
    Route::get('', [UniquePlantController::class, 'index'])->name('unique_plant.index');
    Route::get('create', [UniquePlantController::class, 'create'])->name('unique_plant.create');
    Route::post('store', [UniquePlantController::class, 'store'])->name('unique_plant.store');
    Route::get('edit/{unique_plant}', [UniquePlantController::class, 'edit'])->name('unique_plant.edit');
    Route::post('update/{unique_plant}', [UniquePlantController::class, 'update'])->name('unique_plant.update');
    Route::post('delete/{unique_plant}', [UniquePlantController::class, 'destroy'])->name('unique_plant.destroy');
    Route::get('show/{unique_plant}', [UniquePlantController::class, 'show'])->name('unique_plant.show');
 });
 