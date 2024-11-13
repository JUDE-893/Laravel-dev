<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Log');
    }

    public function signup()
    {
        return view('signup');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $pattern = [
    "/\w{2,}+/",
    "/^[A-Za-z]+[A-Za-z0-9?.!_&]{8,}@(?:gmail|hotmail|yahoo|edu)\.(?:com|fr|uk|ca)$/",
    "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
  ];


       $error ='';

      if(!preg_match($pattern[0], $request->input("data.0"))) {
        $error = "invalid value for the first name";
      }else {
        // last name filter
        if (!preg_match($pattern[0], $request->input("data.1"))) {
          $error = "invalid value for the last name";
        }else {
          // email filter
          if (!preg_match($pattern[1], $request->input("data.2"))) {
            $error = "invalid value for the email address";
          }else {
            // password filter
            if (!preg_match($pattern[2], $request->input("data.3"))) {
              $error = "invalid value for the password";
            }else {
              // password comfirm filter
              if ($request->input("data.3") !== $request->input("data.4")) {
                $error = "please confirme the email value";
              }else {
                return view('index');
              }
            }
          }
        }
      }

        return $error;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
