<?php

use Illuminate\Support\Facades\Route;

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
    $payment = \App\Models\Payment::query()->first();
    if($payment) {
        echo 'DB reading';
    } else {
        echo 'DB not reading';
    }

    $write = new \App\Models\MissedPayment();
    $write->msisdn = '01747544555';
    $write->transaction_id = 'XXXXXXXXXX';
    $write->merchant_id = 1;
    $store = $write->save();
    if($store) {
        echo 'DB writing';
    } else {
        echo 'DB not writing';
    }
    return '';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
