<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomTypeRequest;
use App\Models\roomtype;
use App\Models\Roomtypeimage;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypes = RoomType::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.roomType.index',compact('roomTypes'));
    }

    public function show($id)
    {
        $roomTypes=RoomType::find($id);
       // return   $roomTypes->roomtypeimgs;
        return view('admin.roomType.show',compact('roomTypes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
      // return $request;
        try{
            DB::beginTransaction();
           $roomId= roomtype::insertGetId([
                'title'=>$request->title,
                'details'=>$request->details,
                'price'=>$request->price,
            ]);
 //return $images =  $request->file('imgs');
            if($request->imgs){
                foreach($request->imgs as $img){
                    $imgPath =  saveImage($img,'assets/gallery');
                    $imgData=new Roomtypeimage;
                    $imgData->room_type_id=$roomId;
                    $imgData->img_src=$imgPath;
                    $imgData->img_alt=$request->title;
                    $imgData->save();
                }
            }

            DB::commit();
            return redirect()->route('admin.roomType.create')->with(['success'=>'roomtype is saved successfully']);

        }catch(\Exception $e){
            DB::rollback();
              return $e;
           // return redirect()->route('admin.roomType.create')->with(['error'=>'Something is wrong please try again later']);

        }
    }

    public function edit($id)
    {
        try {
            $roomTypes=roomtype::findOrFail($id);
            return view('admin.roomType.edit',compact('roomTypes'));
        }catch (\Exception $e){
            return $e;
            return redirect()->route('admin.roomType')->with(['error'=>'Something is wrong please try again later']);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, $id)
    {
        try{
            $roomType=roomType::findOrFail($id);
            DB::beginTransaction();
            $roomType->update([
                'title'=>$request->title,
                'details'=>$request->details,
                'price'=>$request->price,
            ]);
           // return $images =  $request->imgs;
            if($request->imgs){
                foreach($request->imgs as $img){
                    $imgPath =  saveImage($img,'assets/gallery');
                    $imgData=new Roomtypeimage;
                    $imgData->room_type_id=$id;
                    $imgData->img_src=$imgPath;
                    $imgData->img_alt=$request->title;
                    $imgData->save();
                }
            }

            DB::commit();
            return redirect()->route('admin.roomType.edit',$id)->with(['success'=>'roomtype is saved successfully']);

        }catch(\Exception $e){
            DB::rollback();
            return $e;
            // return redirect()->route('admin.roomType.create')->with(['error'=>'Something is wrong please try again later']);

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
       $roomtype = roomtype::findOrFail($id);
        $roomtype->delete();
        return redirect()->route('admin.roomType')->with('success','Data has been deleted.');
    }


    public function destroyImage($img_id)
    {
        $data=Roomtypeimage::where('id',$img_id)->first();
        DeleteImage($data->img_src, 'gallery','assets/gallery/');
        Roomtypeimage::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);
    }
}
