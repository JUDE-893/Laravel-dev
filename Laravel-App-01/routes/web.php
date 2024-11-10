<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\CalculateCode;

// ----------dependencies injection -------
/*
  - Reffering to providing* objects or services that a class needs to function, rather that this class creating it itself.
  - in Laravel, dependency injection happens by providing a class that gonna be automatically instanciated to creact  the obect or the sevice desired
*/


// ----------returning Views --------------

// using the helper method* "view()"
// NOTE: the helper methods are a bunch of built-in function in Laravel that are made globally accessible in order to perform some simple task (arrays,url paths ..)
Route::get('/home', function () {
    return view('welcome');
});

// using the Route static class's method property : "view()"
Route::view(uri:'/home',view:'welcome');


//--------Passing params via the url-------------

// NOTE: the order of params in the uri must be the same as the args.
// - ? : to indicate an optional params (require default args)

// returning params a string
Route::get('item.details/{item}/{id}', function($item,$id) {
  return "item: $item , id: $id";
})->name(name:'item.details');;

// returning params as json object
Route::get('item.details/{item}/{id?}', function($item,$id = null) {
  return response()->json(['item' => $item, 'id' => $id])->name(name:'item.details');;
});


// -----------Filtering params using Regex----------

Route::get('item.details/{item}/{id?}', function( string $item = null, string $id = null) {
  return response()->json(['item' => $item, 'id' => $id]);
})->where(["item" => "\w+" , 'id' => "^[A-Z]{4,}\d{3,}"])->name(name:'item.details');;


// -----------routes naming----------

Route::get('item.details/{item}/{id?}', function( string $item = null, string $id = null) {
  return response()->json(['item' => $item, 'id' => $id]);
})->name(name:'item.details');

// using middleware app for route

Route::get('middleware/{item}/{id?}', function( string $item = null, string $id = null, Request $request) {
  $query = $request->query('code');
  return "code was $query";
})->name(name:'middleware')->middleware(middleware:CalculateCode::class);
