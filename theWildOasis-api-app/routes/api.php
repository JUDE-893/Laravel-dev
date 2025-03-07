<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CabinsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CabinsImagesController;

// definning routes
Route::middleware(['auth:sanctum','verified'])->prefix('the-wild-oasis')->group(function() {
  Route::resource('/cabins',CabinsController::class);
  Route::resource('/settings',SettingsController::class);
  Route::resource('/Bookings',BookingsController::class);
  Route::post('/Bookings/get',[BookingsController::class, 'index']);
  Route::post('/Bookings/get-stats-after-date',[BookingsController::class, 'create']);
  Route::post('/Bookings/get-today-activities',[BookingsController::class, 'edit']);
  Route::resource('/bucket/cabins',CabinsImagesController::class);
  Route::post('/bucket/cabins/update',[CabinsImagesController::class, 'updateImage']);
  Route::get('/user', function (Request $request) {

    try {
      \Log::Info($request->user());
      // success
      return response()->json([
        'success' => true,
        'user' => $request->user()
      ],200);
    } catch (\Exception $e) {
      // fails
      return response()->json([
        'success' => false,
        'error' => $e->getMessage()
      ],404);
    };

  });
});
