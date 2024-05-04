<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::resource("/employee",EmployeeController::class) ;

Route::middleware(['auth'])->group(function () {
    Route::resource("/employee", EmployeeController::class)->only(['edit', 'destroy']);
});

Route::post("/employee/login",[\App\Http\Controllers\EmployeeLogin::class,"login"]);

Route::get("/query/average",[\App\Http\Controllers\Querys::class,"average_decade"]);
