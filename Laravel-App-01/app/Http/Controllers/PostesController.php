<?php
namespace App\Http\Controllers;

/**
 * controllers are classes that handle the logic behind HTTP requests. They act as an intermediary between the views and models, and are responsible for processing user input, interacting with the database, and returning appropriate responses (usually views or JSON).
 */

class PostesController extends Controller
{

  // middleware with Controllers
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('page');
  }

}

 ?>
