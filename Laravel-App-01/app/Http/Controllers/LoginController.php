<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequestes;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;

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
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
  //   public function store(Request $request)
  //   {
  // //     $pattern = [
  // //   "/\w{2,}+/",
  // //   "/^[A-Za-z]+[A-Za-z0-9?.!_&]{8,}@(?:gmail|hotmail|yahoo|edu)\.(?:com|fr|uk|ca)$/",
  // //   "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
  // // ];
  // //
  // //
  // //      $error ='NoErrorsSoFar!';
  // //
  // //     if(!preg_match($pattern[0], $request->input("data.0"))) {
  // //       $error = "invalid value for the first name";
  // //     }else {
  // //       // last name filter
  // //       if (!preg_match($pattern[0], $request->input("data.1"))) {
  // //         $error = "invalid value for the last name";
  // //       }else {
  // //         // email filter
  // //         if (!preg_match($pattern[1], $request->input("data.2"))) {
  // //           $error = "invalid value for the email address";
  // //         }else {
  // //           // password filter
  // //           if (!preg_match($pattern[2], $request->input("data.3"))) {
  // //             $error = "invalid value for the password";
  // //           }else {
  // //             // password comfirm filter
  // //             if ($request->input("data.3") !== $request->input("data.4")) {
  // //               $error = "please confirme the email value";
  // //             }else {
  // //               $request->merge(['error_message'=>$error]);
  // //               $request->flash();
  // //               return redirect(to :'/Paluma');
  // //             }
  // //           }
  // //         }
  // //       }
  // //     }
  // //
  // //     $request->merge(['error_message'=>$error]);
  // //     $request->flash(); // store the request data in the session
  // //     return back()->withInput();
  //
  //     /*------session flashed data-------
  //       - flashing data : is an aproash that allow to store data from the current request in the session
  //       - flash() // store the request data in the session
  //       - old() retrieve data from the session
  //       - request flashed data get removed when the new request is triggered regardless of this request's route or resource.
  //     */
  //     dd($request);
  //     return redirect()->back();
  //   }
    public function store(PostStoreRequestes $request)
    {
       $validatedData = $request->validated();
       $name = $validatedData['firstName'] . ' ' . $validatedData['lastName'];
       User::create(array_merge([
        'name'=> "$name",
      ],$validatedData));

      return redirect()->route('Login.index');
    }


    /**
     * verify user login .
     */
     public function loginVerif(PostStoreRequestes $request) {
       $validated = $request->validated();
       $user = User::where('email', $validated['email'])->first();

        if ($user) {
          if (Hash::check($validated['password'], $user['password'])) {
              session(["user" => $user]);
              session()->save();
              return view('index');
            }else {
              return back()->withErrors(['password' => 'Incorrect Email Password']);
            }
        }

       return back()->withErrors(['email' => 'Email address or Password Incorrect!']);
      // dd($validated);
     }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('signup');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $user = User::find(1);
          $posts = $user->postes();

          $post = Post::find(3);
          $author = $post->user;
          dd($author, $user);

        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'destroy';
    }
}
