<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('inventories')->name('inventory.')->group(function () {
    Route::get('/', [InventoryController::class, 'index'])->name('index');
    Route::get('/create', [InventoryController::class, 'create'])->name('create');
    Route::post('/store', [InventoryController::class, 'store'])->name('store');
    Route::get('/show/{inventory}', [InventoryController::class, 'show'])->name('show');
    Route::get('/edit/{inventory}', [InventoryController::class, 'edit'])->name('edit');
    Route::post('/update/{inventory}', [InventoryController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [InventoryController::class, 'destroy'])->name('destroy');
});
Route::prefix('vehicles')->name('vehicle.')->group(function () {
    Route::get('/', [VehicleController::class, 'index'])->name('index');
    Route::get('/create', [VehicleController::class, 'create'])->name('create');
    Route::post('/store', [VehicleController::class, 'store'])->name('store');
    Route::get('/show/{vehicle}', [VehicleController::class, 'show'])->name('show');
    Route::get('/edit/{vehicle}', [VehicleController::class, 'edit'])->name('edit');
    Route::post('/update/{vehicle}', [VehicleController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [VehicleController::class, 'destroy'])->name('destroy');
});