<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Cabin;
use App\Http\Requests\CabinFormRequest;
use App\Http\Requests\PutCabinFormRequest;

class CabinsController extends Controller
{
    /**
     * Display all cabins.
     */
    public function index()
    {
      try {
        $cabins = Cabin::all();
        // dd($cabins);
        return response()->json([
          'success' => true,
          'message' => 'cabin data fetched successfully!',
          'cabins'=> $cabins
        ],200);

      } catch (\Exception $e) {
        return response()->json([
          'success' => false,
          'message' => 'fails',
          'error' => $e->getMessage()
        ],404);
      }


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
    public function store(CabinFormRequest $request)
    {
      $cabin = Cabin::create($request->validated());

      if (!$cabin) {
        return response()->json([
          'success' => false,
          'message' => 'fails',
          'error' => $e->getMessage()
        ],404);
      };

      return response()->json([
        'success' => true,
        'message' => 'Cabin created successfully',
        'cabin' => $cabin
      ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(PutCabinFormRequest $request, string $id)
    {
      try {

        $cabin0 = Cabin::findOrFail($id);

        $cabin = $cabin0->update($request->validated());

        if(!$cabin) {
          abort(500,'can\'t update');
        };

        // success
        return response()->json([
          'success' => true,
          'message' => 'updated Successfully',
          'cabin' => $cabin0
        ],200);

      } catch (ModelNotFoundException $e) {
        // not found
        return response()->json([
          'success' => false,
          'message' => 'Not Found!',
          'error' => $e->getMessage()
        ],404);


      } catch (\Exception $e) {
        // fails
        return response()->json([
          'success' => false,
          'message' => 'fails',
          'error' => $e->getMessage()
        ],500);
      };


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

          $cabin = Cabin::destroy($id);

          // success
          return response()->json([
            'success' => true,
            'message' => 'cabin deleted Successfully',
            'cabin' => $cabin
          ],200);

        } catch (\Exception $e) {
          // fails
          return response()->json([
            'success' => false,
            'message' => 'fails',
            'error' => $e->getMessage()
          ],402);
        };
    }
}
