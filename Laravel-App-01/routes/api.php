<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\CalculateCode;

// ----------application programming interface -------
/*

*/


// ----------returning api --------------

// using the helper method* "view()"
// NOTE: the helper methods are a bunch of built-in function in Laravel that are made globally accessible in order to perform some simple task (arrays,url paths ..)
Route::get('/', function () {
    return ('api retured content');
});
