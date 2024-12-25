<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Trip;

class TripsController
{

  //function that add a new trip
  public function addTrip(Request $request) {
    //\Log::info('#request : ' . $request);
    try {
      $validated = $request->validate([
        'user_id'=> 'required',
        'wikipediaId'=> 'min:1',
        'description'=> 'min:1',
        'date'=> 'required',
        'countryFlag'=> 'required',
        'countryName'=> 'required',
        'cityName'=> 'required',
        'lat'=> 'required',
        'lng'=> 'required'
      ]);

      $trip = Trip::create($validated);

      return response()->json([
        "message" => "trip added successfully!",
        "trip" => $validated
      ]);

    }catch(ValidationException $e){
      //\Log::info('#Error : ' . $e);
      return response()->json([
        "message" => "validation error",
        'error' => $e
      ],422);

    }catch(\Exception $e) {
      //\Log::info('#Error : ' . $e);
      return response()->json([
        "message" => "Oop! Something just went wrong! Try later..",
        'error' => $e
      ],500);
    };

  }

  //function that retrieve and return all the user's trips
  public function getTrips($user_id) {
    \Log::info('#user_Id : ' . $user_id);
    $trips = Trip::where('user_id',34)->get();
    \Log::info('#trips : ' . $trips);

    return response()->json([
      'trips' => $trips,
      'message' => 'data fetched successfully'
    ],200);
  }
}
 ?>
