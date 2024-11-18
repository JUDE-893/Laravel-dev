<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\CalculateCode;
use App\Http\Controllers\PostesController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;

// ----------dependencies injection -------
/*
  - Reffering to providing* objects or services that a class needs to function, rather that this class creating it itself.
  - in Laravel, dependency injection happens by providing a class that gonna be automatically instanciated to creact  the obect or the sevice desired
*/


// ----------returning Views --------------
/*
// using the helper method* "view()"
// NOTE: the helper methods are a bunch of built-in function in Laravel that are made globally accessible in order to perform some simple task (arrays,url paths ..)
Route::get('/', function () {
    return view('welcome');
});

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

//------------middlewares-------------
Route::get('middleware/{item}/{id?}', function( string $item = null, string $id = null, Request $request) {
  $query = $request->query('code');
  return "code was $query";
})->name(name:'middleware')->middleware(middleware:CalculateCode::class)

//-----------middleware Alias ---------
Route::get('middleware/{item}/{id?}', function( string $item = null, string $id = null, Request $request) {
  $query = $request->query('code');
  return "code was $query";
})->name(name:'middleware')->middleware('code');

// --------csrf----------
Route::post('/csrf', function() {
  return view('csrf');
});

// ------ Controller-----
Route::get("/page",[PostesController::class, 'index']);
Route::get("/",[HomePageController::class, 'index']);

Route::resource(name: 'Paluma',controller:HomePageController::class);
Route::get("/paluma/Product",[HomePageController::class, 'product'])->name(name:'product');
Route::get("/paluma/signUp", [LoginController::class, 'signup'])->name(name:'SignUp');
Route::post("/paluma/store", [LoginController::class, 'store'])->name(name:'SignUp');
Route::resource(name : "/paluma/Login",controller: LoginController::class);*/


//-------response header-------
/*Route::get('/', function() {
  return response(content:"hello from response and headers", status: 200)->withHeaders(
    ['Content_Type' => 'text/plaintext',
    'Header1' => 'heLLo this isandaff athe grey',
    'Header2' => 'Hellow This is Saroune'
    ]
  );
});
*/

//----------Caching in Laravel------------
/*
 - Caching is an approach used to enhance the performance the the app by storing data in the browser in order to prevent fetching it repeatedly.
 - ETag : the unique key that the app generate by encrypting the the content to the data, this key would be stored in the the browser (header meta-data) is used to identify if the data has been updated in the browser jin order to fetch the new one.
 - meachanism : -> after the first request the client recieves the data and the ETag key plus the cach data
   -> in the next request (demanding the same content been cached earlier) the browser includes the etage value in the header and  associated to a key 'if-Non_Matched'
   -> the server generate the ETag and compare it with the 'if-Non-Matched' value
   -> if it was the same the server return a response with a code "304 NOT MODIFIED" that tells the browser to used the cacged data


Route::middleware(['cache.headers:public, max_age=86000, etag,status=404'])->group ( function() {
  Route::get('/', function() {
    return "Page has some cached data \n check the header-meta infos";
  });
});*/

//--------- redirecting-------------
/*Route::get('/',function(){
  return redirect()->route('dashboard.redirect.route',['id'=>33]);
});

Route::get('/dashboard/{id?}',function(){
  return 'Dashboard';
})->name(name:'dashboard.redirect.route');

//-------- redirecting actions-------
Route::get('/', function(){
  return redirect()->action([HomePageController::class, 'index'],['id'=>25]);
});

Route::get('/dashboard', [HomePageController::class, 'index'])->name(name:'dashboard');

// ---------Redirection to an external Domain--------
Route::get('/',function(){
  return redirect()->away(path:'https://edwindiaz.com');
});*/

// -------Passing data to the view--------
/*
  - by passing the data to the view helper method, it then make it available locally within the scoop of view specified.
  - compact('str') function creates an associative array with the key would be "str" (passed to it) and a value of a variable with matching name 'str'. Returns : ['str'=>$str]

Route::get('/', function(){
  $user = ['name'=>'andrei', 'email'=>'AndreiNegoie@CodeAcademy.gmail', 'job'=> 'mentor, teacher, ingeneer, freelancer..'];
  // return view('page',['user'=>$user]);
  return view('page', compact('user'));
});*/

//--------shares Data--------
/*
  -making a certain data globally accessed by all the views
*/

Route::get('/', function(){
  return view('page');
});

Route::get('/login', function(){
  return view('log');
});

Route::get('/home',function(){
  return view('index');
});

Route::get('/dashboard',function(){
  return view('dashboard');
});
