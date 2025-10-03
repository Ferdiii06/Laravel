<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::resource('employees', EmployeeController::class);
Route::get('/', function () {
    return view('welcome');

});
// Route::get('/employees', function () {
//     return view('employees.index');
// });




