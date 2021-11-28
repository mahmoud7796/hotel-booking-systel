<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\customer;
use DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
      // return $request;
        try{
            if($request->hasFile('photo'))
                  $imgPath =  saveImage($request->file('photo'),'assets/customers');
            customer::create([
               'photo' => $imgPath,
                'full_name' =>  $request->full_name,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
                'mobile' =>  $request->mobile,
                'address' =>  $request->address,
            ]);
            return redirect()->route('admin.customer.create')->with(['success'=>'customer is saved successfully']);

        }catch(\Exception $e){
            return redirect()->route('admin.customer.create')->with(['error'=>'Something is wrong please try again later']);
           // return $e;
        }
    }

    public function edit($id)
    {
        try {
            $customer=customer::findOrFail($id);
            return view('admin.customer.edit',compact('customer'));
        }catch (\Exception $e){
         //   return $e;
            return redirect()->route('admin.customer')->with(['error'=>'Something is wrong please try again later']);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        try{
            $customer = customer::find($id);
            if($request->hasFile('photo'))
            DB::beginTransaction();
            if($request -> has('photo')) {
                $imgPath =  saveImage($request->file('photo'),'assets/customers');
                DeleteImage($customer->photo, 'customers','assets/customers/');
                $customer->update([
                    'photo' => $imgPath
                ]);
            }
            if($request->password!=null){
                $customer -> update([
                    'password' =>  Hash::make($request->password),
                ]);
            }else{
                $customer -> update([
                    'password' =>  $customer->password,
                ]);
            }
            $customer -> update([
                'full_name' =>  $request->full_name,
                'email' =>  $request->email,
                'address' =>  $request->address,
                'mobile' =>  $request->mobile,
            ]);

            DB::commit();
            return redirect()->route('admin.customer.edit', $customer->id)->with(['success'=>'customer is edited successfully']);

        }catch(\Exception $e){
            DB::rollback();
          //  return redirect()->route('admin.customer')->with(['error'=>'Something is wrong please try again later']);
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
       $customer = customer::findOrFail($id);
        $customer->delete();
        if($customer->photo!==null){
            DeleteImage($customer->photo, 'customers','assets/customers/');
        }
        return redirect()->route('admin.customer')->with('success','Data has been deleted.');
    }
}
