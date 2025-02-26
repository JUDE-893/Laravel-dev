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
  Route::post('/bookings/get',[BookingsController::class, 'index']);
  Route::resource('/bucket/cabins',CabinsImagesController::class);
  Route::post('/bucket/cabins/update',[CabinsImagesController::class, 'updateImage']);
});
