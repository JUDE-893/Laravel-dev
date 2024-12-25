<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Trip;

class AuthController
{
    public function index() {
      return 'worldwise api';
    }

    /**
     * check if the current user is authentificated
     */
    public function checkAuth() {

      //if (Auth::check()) {
        return response()->json([
          'message' => 'user authentificated',
          'resultats' => true,
          'user' => Auth::guard('api')->user(),
        ],200);
      // }else {
      //   return response()->json([
      //     'message' => 'user is not authentificated',
      //     'resultats' => false,
      //     'data' => Auth::user()
      //   ],401);
      // };
    }
    /**
     * check the entrer credentifials and lig the user
     */
    public function login(Request $request)
    {
      try {

        $validated =  $request->validate([
          'email' => 'required',
          'password' => 'required'
        ]);

        $user = User::where('email',$validated['email'])
        ->first();

        if ( $user ) {
          if( Hash::check($validated['password'], $user->password) ) {

            Auth::login($user);
            $user->remember_token =  Str::random(60);
            $user->save();

            return response()->json([
              'message' => 'logged successevelly',
              'resultats' => true,
              'user' => Auth::user(),
              'api_token' => $user->remember_token
            ],200);
          }else {
            return response()->json([
              'message' => 'Incorrect password value',
              'resultats' => false
            ],401);
          }
        }else {
          return response()->json([
            'message' => 'Incorrect email address or password value',
            'resultats' => false
          ],401);
        };

      } catch (ValidationException $e) {
          return response()->json([
            'message' => 'Invalid Email address and Password',
            'resultats' => false,
            'error'=> $e->getMessage()
          ],422);

      }catch (\Exception $e) {
         return response()->json([
           'message' => 'Oops! Something went Wrong.. Try again.',
           'resultats' => false,
           'error'=> $e->getMessage()
         ],500);
      };

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // \Log::info("MIME Type: " . $request->file('profile_img')->getMimeType());
      // \Log::info("hasFile: " . $request->hasFile('profile_img'));

      try {
        // validate entry data
        $validated = $request->validate([
          'name' => 'required',
          'user_name' => 'required',
          'email' => 'required',
          'password' => 'required',
          'city' => 'required',
          'country' => 'required',
          'profile_img' => 'image|mimes:jpeg,png,svg,jpg'
        ]);

        //encrypte the password
        $validated['password'] = bcrypt($validated['password']);

        if ($request->hasFile('profile_img')) {
          // get the iimage file
          $photo = $request->file('profile_img');
          // rename the image file
          $photo_name = Str::random(8) . '.' . $photo->getClientOriginalExtension();
          //store the photo in the inner file systeme and retirieve its relative path.
          $path = $photo->storeAs('profile_imgs',$photo_name,'public');
          //Storage::disk('public')->put('profile_imgs/' . $photo_name, $photo);
          $validated['profile_img'] = $photo_name;/*$path;*/
          //\Log::info("url: " . Storage::url($path));
          Storage::disk('public')->put('example.txt', 'Contents');
        }else {
          $validated['profile_img'] = 'dsd';
        };

        // push to the DB
        $user = User::create($validated);
        //Authentificate the user
        Auth::login($user);

        // response
        return response()->json([
          'message' => 'signed up successevelly!'
        ]);

      }catch (ValidationException $e) {
        return response()->json([
          'message' => 'validation error',
          'error' => $e
        ],422);
      }catch (\Exception $e) {
        \Log::info("500 Error: " . $e);
        return response()->json([
          'message' => 'Oops! Somthing Went Wrong..Try again',
          'error' => $e
        ],500);
      };
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
