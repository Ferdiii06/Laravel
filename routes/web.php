<?php



use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\ReportController;



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;


Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalariesController::class);
Route::resource('report', ReportController::class);
Route::resource('settings', SettingsController::class);



Route::get('/', function () {
    return view('welcome');
});





