<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Banner;
use DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
      // return $request;
        try{
            if(!$request->has('publish_status'))
                $request->request->add(['publish_status'=>0]);
            else
                $request->request->add(['publish_status'=>1]);

            if($request->hasFile('banner_src'))
                  $imgPath =  saveImage($request->file('banner_src'),'assets/banners');
            DB::beginTransaction();
            Banner::create([
               'banner_src' => $imgPath,
                'alt_text' =>  $request->alt_text,
                'publish_status' =>  $request->publish_status,
            ]);
            DB::commit();
            return redirect()->route('admin.banner.create')->with(['success'=>'Banner is saved successfully']);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('admin.banner.create')->with(['error'=>'Something is wrong please try again later']);
           // return $e;
        }
    }

    public function edit($id)
    {
        try {
            $banners=Banner::findOrFail($id);
            return view('admin.banner.edit',compact('banners'));
        }catch (\Exception $e){
            return $e;
            return redirect()->route('admin.banner')->with(['error'=>'Something is wrong please try again later']);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        try{
            $banner = Banner::find($id);
            if(!$request->has('publish_status'))
                $request->request->add(['publish_status'=>0]);
            else
                $request->request->add(['publish_status'=>1]);

            if($request->hasFile('banner_src'))
            DB::beginTransaction();
            if($request -> has('banner_src')) {
                $imgPath =  saveImage($request->file('banner_src'),'assets/banners');
                DeleteImage($banner->banner_src, 'banners','assets/banners/');
                $banner->update([
                    'banner_src' => $imgPath
                ]);
            }
            $banner -> update([
                'alt_text' => $request -> alt_text,
                'publish_status' => $request -> publish_status,
            ]);
            DB::commit();
            return redirect()->route('admin.banner.edit', $banner->id)->with(['success'=>'Banner is edited successfully']);

        }catch(\Exception $e){
            DB::rollback();
          //  return redirect()->route('admin.banner')->with(['error'=>'Something is wrong please try again later']);
            return $e;
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
       $banner = Banner::findOrFail($id);
        $banner->delete();
        DeleteImage($banner->banner_src, 'banners','assets/banners/');
        return redirect()->route('admin.banner')->with('success','Data has been deleted.');
    }
}
