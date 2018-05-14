<?php

namespace App\Http\Controllers;

use App\DrugCategory;
use Illuminate\Http\Request;

class DrugCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drug_category = DrugCategory::withCount('drugs')->orderBy('name','asc')->get();
        return response(compact('drug_category'),200);
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
        DrugCategory::create($request->all());
        $message="Drug Category created successfully";
        return response(compact('message'),200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DrugCategory $drugCategory)
    {
        //

        return response(compact('drugCategory'),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugCategory $drugCategory)
    {
        //
        return response(compact('drugCategory'),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugCategory $drugCategory)
    {
        //
        $drugCategory->update($request->all());
        $message="Drug Category updated successfully";
        return response(compact('message'),200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugCategory $drugCategory)
    {
        //
        $drugCategory->delete();
        $message="Drug Category deleted successfully";
        return response(compact('message'),200);
    }
}
