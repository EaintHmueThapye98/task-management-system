<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/employee-list', [EmployeeController::class, 'showEmployeeList']);
Route::post('/add-new-employee', [EmployeeController::class, 'submitCreateEmployeeForm']);
Route::post('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee']);
