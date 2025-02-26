<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Http\Requests\SettingsFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
          $settings = Settings::all();
          return response()->json([
            'message' => 'settings fetched successfully!',
            'settings' => $settings
          ],200);
        } catch (\Exception $e) {
          return response()->json([
            'message' => 'fails',
            'error' => $e->getMessage()
          ]);
        }

    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingsFormRequest $request, string $id)
    {
      try {

        $settings = Settings::findOrFail($id);
        $settings = $settings->update($request->validated());

        return response()->json([
          'message' => 'settings updated successfully!',
          'settings' => $request->validated()
        ],200);
      } catch (ModelNotFoundException $e) {
        return response()->json([
          'message' => 'Not Found!',
          'error' => $e->getMessage()
        ],404);

      } catch (\Exception $e) {
        return response()->json([
          'message' => 'fails',
          'error' => $e->getMessage()
        ],401);
      }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
