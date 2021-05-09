<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
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


Route::get('index',[CRUDController::class,'index']);
Route::get('add',[CRUDController::class,'add']);
Route::post('add',[CRUDController::class,'insertData']);
Route::delete('delete/{member_id}',[CRUDController::class,'delete']);
Route::post('edit/{member_id}',[CRUDController::class,'edit']);

Route::post('Update',[CRUDController::class,'updateData']);

Route::post('downloadPDF',[CRUDController::class,'downloadPDF']);