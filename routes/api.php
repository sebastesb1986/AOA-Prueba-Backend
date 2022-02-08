<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Routes para las acciones de mostrar, registrar, actualizar y eliminar automoviles

Route::get('car', [CarController::class, 'index'])->name('car.index');
Route::post('car/store', [CarController::class, 'store'])->name('car.store');
Route::get('car/{car}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::put('car/{car}/update', [CarController::class, 'update'])->name('car.update');
Route::delete('car/{id}/delete', [CarController::class, 'destroy'])->name('car.destroy');

// Fin Routes para las acciones de mostrar, registrar, actualizar y eliminar automoviles

