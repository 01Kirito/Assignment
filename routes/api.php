<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLogin;
use App\Http\Controllers\Querys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::resource("/employee",EmployeeController::class) ;



Route::post("/employee/login",[EmployeeLogin::class,"login"]);


Route::group(['middleware' => ['auth:sanctum']],function () {

    Route::resource("/employee", EmployeeController::class);
    Route::post('/employee/logout', [EmployeeLogin::class, 'logout']);
    Route::get("/query/average",[Querys::class,"AverageDecade"]);
    Route::get("/query/employee_founder/{employee}",[Querys::class,"EmployeeToFounder"]);

});




