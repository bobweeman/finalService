<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('pharmacies','PharmacyController');
Route::resource('drugs','DrugController');
Route::resource('categories','CategoryController');
Route::resource('drug_compositions','DrugCompositionController');
Route::resource('orders','OrdersController');
Route::resource('prescriptions','PrescriptionsController');
Route::resource('prescription_details','PrescriptionDetailsController');

