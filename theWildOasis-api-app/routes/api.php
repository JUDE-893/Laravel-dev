<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CabinsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CabinsImagesController;

// definning routes
Route::prefix('the-wild-oasis')->group(function() {
  Route::resource('/cabins',CabinsController::class);
  Route::resource('/settings',SettingsController::class);
  Route::resource('/Bookings',BookingsController::class);
  Route::post('/Bookings/get',[BookingsController::class, 'index']);
  Route::post('/Bookings/get-stats-after-date',[BookingsController::class, 'create']);
  Route::post('/Bookings/get-today-activities',[BookingsController::class, 'edit']);
  Route::resource('/bucket/cabins',CabinsImagesController::class);
  Route::post('/bucket/cabins/update',[CabinsImagesController::class, 'updateImage']);
});
