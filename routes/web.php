<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can reg ister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('havaDurumu');
});

Route::get('',[WeatherController::class,'inputPage'])->name('inputPage');
Route::get('form',[WeatherController::class,'getData'])->name('getData');


