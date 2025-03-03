<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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

          // $Qr = Booking::where(!empty(trim($request->filterColumn)) && !empty(trim($request->filterValue)), function($query) use($request)
          $Qr = Booking::when(
            !empty(trim($request->filterColumn)) && !empty(trim($request->filterValue)),
            function($query) use($request) {
              return $query->where($request->filterColumn, $request->filterValue);
          })
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
        $bookings = $Qr->skip($request->pageLength*($request->page) ?? 0)
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
    public function create(Request $request)
    {
      try {
        $startDate = Carbon::parse($request->startDate)->toDateTimeString();
        $endDate = Carbon::parse($request->endDate)->toDateTimeString();

        $bookings = Booking::whereBetween($request->column,
                            [$startDate, $endDate])
                            ->with([
                              'guest' => function($query) {
                                return $query->select('id','full_name');
                              }])
                            ->get();

        //success
        return response()->json([
          'success' => true,
          'message' => 'bookings fetched successfully!',
          'bookings' => $bookings
        ]);

      } catch (\Exception $error) {
          // fails
          return response()->json([
            'success' => false,
            'message' => 'fails',
            'error' => $error->getMessage()
          ]);
      };

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
        try {
          $booking = Booking::with([
                          'cabin' => function($query) {
                                          return $query->select('id','name');
                                        },
                          'guest' => function($query) {
                                          return $query->select('id','full_name','email');
                                        }
                        ])->find($id);
          // success
          return response()->json([
            'success' => true,
            'message' => 'boooking fetched successfully',
            'booking' => $booking
          ],200);
        } catch (\Exception $e) {
            // fails
            return response()->json([
              'success' => false,
              'message' => 'fails',
              'error' => $e->getMessage(),
            ],404);
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
          $startToday =  date('Y-m-d 00:00:00');
          $endToday =  date('Y-m-d 23:59:59');
          \Log::Info($request);
           $bookings = Booking::where(function($query) use($request,$startToday,$endToday) {
             return $query->where($request->filterColumn,$request->values[0]['filterValue'])
                    ->whereBetween($request->values[0]['timeColumn'], [$startToday, $endToday]);
           })
           ->orWhere(function($query) use($request,$startToday,$endToday) {
             return $query->where($request->filterColumn,$request->values[1]['filterValue'])
                    ->whereBetween($request->values[1]['timeColumn'], [$startToday, $endToday]);
           })
           ->with([
             'guest' => function($query) {
               return $query->select('id','full_name', 'nationality', 'country_flag');
             }
           ])
           ->get();
           //success
           return response()->json([
             'success' => true,
             'message' => 'bookings fetched successfully!',
             'bookings' => $bookings
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
