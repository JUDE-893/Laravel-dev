<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookingFilterFormRequest;
use App\Models\Booking;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * Had to be changed from the get to post in order to transmit json filtered data
     */
    public function index(BookingFilterFormRequest $request)
    {
        try {

          $Qr = Booking::where($request->filterColumn ?? 'status',$request->filterValue ?? 'unconfirmed')
                                ->with([
                                  'cabin' => function($query) {
                                    return $query->select('id','name');
                                  },
                                  'guest' => function($query) {
                                    return $query->select('id','full_name','email');
                                  }
                                ])
                                ->orderBy($request->sortByColumn ?? 'start_date',$request->order ?? 'asc');
        // total count of bookings
        $count = count($Qr->get());
        // requested bookings
        $bookings = $Qr->skip($request->pageLength*($request->page-1) ?? 0)
                       ->take($request->pageLength?? 10)
                       ->get();


          return response()->json([
            'success' => true,
            "message" => 'fetched the booking data successfully!',
            'bookings' => $bookings,
            'totalBookings' => $count,
          ],200);

        } catch (\Exception $e) {
            return response()->json([
              'success' => false,
              "message" => 'fails',
              'error' => $e->getMessage()
            ],404);
        };

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
        //
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
    public function update(Request $request, string $id)
    {
      try {

        $booking = Booking::findOrFail($id);
        $booking = $booking->update($request->all());

        return response()->json([
          'success' => true,
          "message" => 'booking data updated successfully!',
          'bookings' => $booking
        ],200);

      } catch (\Exception $e) {
          return response()->json([
            'success' => false,
            "message" => 'fails',
            'error' => $e->getMessage()
          ],403);
      }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
          $booking = Booking::destroy($id);

          return response()->json([
            'success' => true,
            "message" => 'booking deleted successfully!',
            'bookings' => $booking
          ],200);

        } catch (\Exception $e) {
            return response()->json([
              'success' => false,
              "message" => 'fails',
              'bookings' => $e->getMessage()
            ],404);
        }

    }
}
