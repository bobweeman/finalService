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
    \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size(400)->generate('Make me into a QrCode!', '../public/qrcode1.png');

    return response()->download(public_path('/qrcode1.png'));
});
