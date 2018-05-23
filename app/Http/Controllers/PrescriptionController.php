<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prescriptions = Prescription::withCount('details')->latest()->get();
        return response(compact('prescriptions'),200);
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
        //
        $random = $request->drug_id.$request->precription_id."pharmcode_qr".rand(1,100000).date('m');

        Storage::disk('local')->put('images/qrcodes'.'/'.$random.'.png', QRCode::text($random)->png(), 'public');

//        $slip= Prescription::create($request->all());
        $data = new Prescription();
        $data->doctor_id=$request->doctor_id;
        $data->patient_id=$request->patient_id;
        $data->diagnosis=$request->diagnosis;
        $data->qr_code_url=$random.'.png';
        $data->save();
        $slip=$data->id;
        $message='Prescription created successfully';
        return response(compact('slip'),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $prescription=Prescription::with('details')->where('id',$id)->get();
        return response(compact('prescription'),200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
        return response(compact('prescription'),200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
        $prescription->update($request->all());
        $message='Prescription updated successfully';
        return response(compact('message'),200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
        $prescription->delete();
        $message='Prescription deleted successfully';
        return response(compact('message'),200);
    }
}
