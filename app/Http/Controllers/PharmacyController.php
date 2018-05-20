<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pharmacies = Pharmacy::with('owners')->orderBy('name','asc')->get();
        return response(compact('pharmacies'),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if image is available
        if($request->has('logo')){
            $data = base64_decode($request);

            $image      = $data;
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $logo = $fileName;
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream(); // <-- Key point

            //dd();
            Storage::disk('local')->put('images/pharmacies'.'/'.$fileName, $img, 'public');
        }

        $data = new Pharmacy();
        $data->name=$request->name;
        $data->logo=$logo;
        $data->latitude=$request->latitude;
        $data->longitude=$request->longitude;
        $message='Pharmacy created successfully';
        return response(compact('message'),200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        //

        return response(compact('pharmacy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        //
        return response(compact('pharmacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacy $pharmacy)
    {
        //
        $pharmacy->update($request->all());
        $message='Pharmacy updated successfully';
        return response(compact('message'),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        //
        $pharmacy->delete();
        $message='Pharmacy deleted successfully';
        return response(compact('message'),200);
    }

    public function checkShop(Request $request){
        $count=Pharmacy::where('owner_id',$request->user_id)->count();
        return response(compact('count'),200);
    }

    public function myPharmacy(Request $request){
        $shop=Pharmacy::where('owner_id',$request->user_id)->first();
        return response(compact('shop'),200);
    }
}
