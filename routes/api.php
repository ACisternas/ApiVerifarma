<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmaciaController;

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


Route::post('farmacia', [FarmaciaController::class,'create']);
Route::get('farmacia/{id}', [FarmaciaController::class,'getFarmaciaById']);
Route::get('farmacia/{lat}/{lon}', [FarmaciaController::class,'getFarmaciaCercana']);
