<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Http\Requests\SettingsFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
        //   $settings = Settings::all();
        //   return response()->json([
        //     'success' => true,
        //     'message' => 'settings fetched successfully!',
        //     'settings' => $settings
        //   ],200);
        // } catch (\Exception $e) {
        //   return response()->json([
        //     'success' => false,
        //     'message' => 'fails',
        //     'error' => $e->getMessage()
        //   ]);
        // }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      try {

        $user = $request->user();
        $settings = $user->update($request->all());

        return response()->json([
          'success' => true,
          'message' => 'user updated successfully!',
          'user' => $request->user()
        ],200);
      } catch (ModelNotFoundException $e) {
        return response()->json([
          'success' => false,
          'message' => 'Not Found!',
          'error' => $e->getMessage()
        ],404);

      } catch (\Exception $e) {
        return response()->json([
          'success' => false,
          'message' => 'fails',
          'error' => $e->getMessage()
        ],401);
      }
    }

}
