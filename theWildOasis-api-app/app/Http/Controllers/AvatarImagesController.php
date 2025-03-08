<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CabinImageFormRequest;

class AvatarImagesController extends Controller
{
    /**
     * Display all cabins.
     */
    public function index()
    {
      dd(Storage::disk('public')->url('cabins/cabin-001.jpeg'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CabinImageFormRequest $request)
    {
      try {
        if(!$request->hasFile('image')) {
          abort(402, 'No Image to Store');
        };

        $image = $request->file('image');

        $path = $image->storeAs('avatars',$request->validated()['imageName'],'public');

        // success
        return response()->json([
          'success' => true,
          'message' => 'Avatar image stored successfully',
          'avatar' => $path
        ],200);

      } catch (\Exception $e) {
        // fails
        return response()->json([
          'success' => false,
          'message' => 'fails',
          'error' => $e->getMessage()
        ],404);
      };


    }

    /**
     * Update the specified resource in storage.
     */
    public function updateImage(CabinImageFormRequest $request)
    {
      try {

        if(!$request->hasFile('image')) {
          abort(402, 'No Image to Store (replace with)');
        };

        if (!Storage::disk('public')->exists('avatars/' . $request->imageName)) {
          //abort(402, 'No Image to Repalce');
        };

        Storage::disk('public')->delete('avatars/' . $request->imageName);

        $image = $request->file('image');

        $path = $image->storeAs('avatars',$request->imageName,'public');

        // success
        return response()->json([
          'success' => true,
          'message' => 'Avatar image updated successfully',
          'avatar' => $path
        ],200);

      } catch (\Exception $e) {
        // fails
        return response()->json([
          'success' => false,
          'message' => 'fails',
          'error' => $e->getMessage()
        ],404);
      };

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $imageName)
    {

      try {

        if (!Storage::disk('public')->exists('avatars/' . $imageName)) {
          abort(402, 'No Image to Delete');
        };

        Storage::disk('public')->delete('avatars/' . $imageName);

        // success
        return response()->json([
          'success' => true,
          'message' => 'Avatars image deleted successfully',
        ],200);

      } catch (\Exception $e) {
        // fails
        return response()->json([
          'success' => false,
          'message' => 'fails',
          'error' => $e->getMessage()
        ],404);
      };

    }
}
