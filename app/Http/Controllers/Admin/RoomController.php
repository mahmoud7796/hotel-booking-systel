<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\RoomTypeRequest;
use App\Models\Location;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Models\room;
use DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::with(['RoomType'=>function ($q){
            $q->select('id','title');
        }])->orderBy('id','DESC')->paginate(PAGINATION_COUNT);

        $locations =Room::with(['locations'=>function ($q){
            $q->select('id','address');
        }])->orderBy('id','DESC')->get();
        return view('admin.room.index',compact('rooms','locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roomTypes = RoomType::get();
         $locations =Location::get();
        return view('admin.room.create',compact('roomTypes','locations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
      // return $request;
        try{
           Room::create([
                'title'=>$request->title,
               'room_type_id'=>$request->room_type_id,
               'location_id'=>$request->location_id,
           ]);
            return redirect()->route('admin.room.create')->with(['success'=>'room is saved successfully']);

        }catch(\Exception $e){
            return redirect()->route('admin.room.create')->with(['error'=>'Something is wrong please try again later']);
           // return $e;
        }
    }

    public function edit($id)
    {
        try {
            $rooms=room::findOrFail($id);
            $roomTypes = RoomType::get();
            $locations = Location::get();
            return view('admin.room.edit',compact('rooms','roomTypes','locations'));
        }catch (\Exception $e){
           // return $e;
            return redirect()->route('admin.room')->with(['error'=>'Something is wrong please try again later']);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        try{
            $room = room::findOrFail($id);
            $room->update([
                'title'=>$request->title,
                'room_type_id'=>$request->room_type_id,
                'location_id'=>$request->location_id,

            ]);
            return redirect()->route('admin.room.edit',$room->id)->with(['success'=>'room is saved successfully']);

        }catch(\Exception $e){
            return redirect()->route('admin.room.edit',$room->id)->with(['error'=>'Something is wrong please try again later']);
            // return $e;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $room = room::findOrFail($id);
        $room->delete();
        return redirect()->route('admin.room')->with('success','Data has been deleted.');
    }
}
