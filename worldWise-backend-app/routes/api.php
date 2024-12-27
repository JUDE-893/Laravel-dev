<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripsController;

Route::prefix('worldwise')->resource('/',AuthController::class);
Route::post('/login',[AuthController::class,'login']);
Route::post('/signup',[AuthController::class,'store']);
Route::post('/check.auth', [AuthController::class, 'checkAuth']);
Route::post('/add_trip',[TripsController::class, 'addTrip']);
Route::get('trips/{user_id}', [TripsController::class,'getTrips']);
Route::post('trips/delete', [TripsController::class,'deleteTrip']);

 ?>
