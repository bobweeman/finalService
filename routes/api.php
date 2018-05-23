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
Route::resource('categories','DrugCategoryController');
Route::resource('drug_compositions','DrugCompositionController');
Route::resource('orders','OrderController');
Route::resource('prescriptions','PrescriptionController');
Route::resource('prescription_details','PrescriptionDetailController');
Route::resource('drug_subscribtions','DrugSubscribtionController');
Route::resource('stock','StockController');
Route::resource('patients','PatientsController');
Route::post('access_level','UserController@accessLevel');
Route::post('check_shop','PharmacyController@checkShop');
Route::post('my_pharmacy','PharmacyController@myPharmacy');
Route::post('my_diagnosis','PrescriptionController@myDiagnosis');
Route::post('my_qr','PrescriptionController@my_qr');
Route::post('shop_drugs','DrugSubscribtionController@shopDrugs');
Route::post('search_drugs','DrugController@searchDrugs');

Route::resource('user_registration','UserController');