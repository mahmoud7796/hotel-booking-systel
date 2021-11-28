<?php

namespace App\Http\Controllers\Site;
use App\Http\Requests\BookingRequest;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RoomType;
use App\Models\Booking;

// use Stripe\Stripe;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations=Location::get();
        return view('site.booking',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
            $data=new Booking;
            $data->room_id=$request->room_id;
           $data->customer_id=$request->id;
           $data->location_id=$request->location_id;
            $data->checkin_date=$request->checkin_date;
            $data->checkout_date=$request->checkout_date;
            $data->total_adults=$request->total_adults;
            $data->total_children=$request->total_children;
            $data->save();
        return redirect()->route('site.booking')->with(['success'=>'You booked Successfully! We Will Contact You To Confirm Your Reservation Thank You']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */


    // Check Avaiable rooms

    // Check Avaiable rooms
    function availableRooms(Request $request,$checkin_date){
       $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
        $data=[];
        foreach($arooms as $room){
            $roomTypes=RoomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }

        return response()->json(['data'=>$data]);
    }

}
