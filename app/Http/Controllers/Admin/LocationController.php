<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Http\Requests\RoomTypeRequest;
use Illuminate\Http\Request;
use App\Models\location;
use DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = location::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
      // return $request;
        try{
            Location::create([
                'country'=>$request->country,
                'city'=>$request->city,
                'address'=>$request->address,
            ]);
            return redirect()->route('admin.location.create')->with(['success'=>'location is saved successfully']);

        }catch(\Exception $e){
            return redirect()->route('admin.location.create')->with(['error'=>'Something is wrong please try again later']);
           // return $e;
        }
    }

    public function edit($id)
    {
        try {
            $locations=location::findOrFail($id);
            return view('admin.location.edit',compact('locations'));
        }catch (\Exception $e){
            return $e;
            return redirect()->route('admin.location')->with(['error'=>'Something is wrong please try again later']);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        try{
            $location = location::findOrFail($id);
            $location->update([
                'country'=>$request->country,
                'city'=>$request->city,
                'address'=>$request->address,
            ]);
            return redirect()->route('admin.location.edit',$location->id)->with(['success'=>'location is saved successfully']);

        }catch(\Exception $e){
            return redirect()->route('admin.location.edit',$location->id)->with(['error'=>'Something is wrong please try again later']);
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
       $location = location::findOrFail($id);
        $location->delete();
        return redirect()->route('admin.location')->with('success','Data has been deleted.');
    }
}
