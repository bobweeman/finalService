<?php

namespace App\Http\Controllers;

use App\PrescriptionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;

class PrescriptionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prescription_details = PrescriptionDetail::latest()->get();
        return response(compact('prescription_details'),200);

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

        return response(compact('random'),200);
//        $qr=QRCode::text($random)->png();
//        Storage::disk('local')->put('images/qrcodes'.'/'.$random, $qr, 'public');
//
//
//        $request->request->add(['qr_code_url' => $random]);
//        PrescriptionDetail::create($request->all());
//        $message="Prescription details created successfully";
//        return response(compact('message'),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrescriptionDetail  $prescriptionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PrescriptionDetail $prescriptionDetail)
    {
        //
        return response(compact('prescriptionDetail'),200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrescriptionDetail  $prescriptionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PrescriptionDetail $prescriptionDetail)
    {
        //
        return response(compact('prescriptionDetail'),200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrescriptionDetail  $prescriptionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrescriptionDetail $prescriptionDetail)
    {
        //
        $prescriptionDetail->update($request->all());
        $message = "Prescription is update successfully";
        return response(compact('message'),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrescriptionDetail  $prescriptionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrescriptionDetail $prescriptionDetail)
    {
        //
        $prescriptionDetail->delete();
        $message = "Prescription is deleted successfully";
        return response(compact('message'),200);
    }
}
