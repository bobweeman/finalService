<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('qr_code', function ()
{
    $img = Image::make(\LaravelQRCode\Facades\QRCode::text('QR Code Generator for Laravel!')->png())->resize(320, 240)->stream('jpg',60);

    return response()->download($img);
});
