<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\SpaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/{any}', [SpaController::class,'index'])->where('any', '.*');
Route::post('upload',[FileController::class,'upload'])->name('upload');
