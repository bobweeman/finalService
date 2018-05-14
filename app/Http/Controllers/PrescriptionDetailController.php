<?php

namespace App\Http\Controllers;

use App\PrescriptionDetail;
use Illuminate\Http\Request;

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
        PrescriptionDetail::create($request->all());
        $message="Prescription created successfully";
        return response(compact('message'),200);
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
