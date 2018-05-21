<?php

namespace App\Http\Controllers;

use App\DrugSubscribtion;
use Illuminate\Http\Request;

class DrugSubscribtionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DrugSubscribtion::create($request->all());
        $message = "Drug successfully added";
        return response(compact('message'),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DrugSubscribtion  $drugSubscribtion
     * @return \Illuminate\Http\Response
     */
    public function show(DrugSubscribtion $drugSubscribtion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrugSubscribtion  $drugSubscribtion
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugSubscribtion $drugSubscribtion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrugSubscribtion  $drugSubscribtion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugSubscribtion $drugSubscribtion)
    {
        //
        $drugSubscribtion->update($request->all());
        $message="Stock updated";
        return response(compact('message'),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrugSubscribtion  $drugSubscribtion
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugSubscribtion $drugSubscribtion)
    {
        //
    }


    public function shopDrugs(Request $request){
        $drugs = DrugSubscribtion::with('drugs.category')->where('pharmacy_id',$request->pharmacy_id)->get();
        return response(compact('drugs'),200);
    }
}
