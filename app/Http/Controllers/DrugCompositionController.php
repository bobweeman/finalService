<?php

namespace App\Http\Controllers;

use App\DrugComposition;
use Illuminate\Http\Request;

class DrugCompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drug_composition = DrugComposition::withCount('drugs')->orderBy('name','asc')->get();
        return response(compact('drug_composition'),200);
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
        DrugComposition::create($request->all());
        $message="Drug Composition created successfully";
        return response(compact('message'),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DrugComposition  $drugComposition
     * @return \Illuminate\Http\Response
     */
    public function show(DrugComposition $drugComposition)
    {
        //
        return response(compact('drugComposition'),200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrugComposition  $drugComposition
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugComposition $drugComposition)
    {
        //
        return response(compact('drugComposition'),200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrugComposition  $drugComposition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugComposition $drugComposition)
    {
        //
        $drugComposition->update($request->all());
        $message="Drug Composition updated successfully";
        return response(compact('message'),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrugComposition  $drugComposition
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugComposition $drugComposition)
    {
        //
        $drugComposition->delete();
        $message="Drug Composition deleted successfully";
        return response(compact('message'),200);
    }
}
