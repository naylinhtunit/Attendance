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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/**
 *  Dashboards Route
 * 
 */
Route::get('/','DashboardController@index')->name('dashboard');
/**
 *  Company Route
 * 
 */
Route::get('company', 'CompanyController@index');
Route::get('company/create', 'CompanyController@create');
Route::post('company', 'CompanyController@store');
Route::get('company/{company}/edit', 'CompanyController@edit');
Route::put('company/{company}', 'CompanyController@update');
Route::delete('company/{company}', 'CompanyController@destroy');
/**
 *  Department Route
 * 
 */
Route::get('department', 'DepartmentController@index');
Route::get('department/create', 'DepartmentController@create');
Route::post('department', 'DepartmentController@store');
Route::get('department/{department}/edit', 'DepartmentController@edit');
Route::put('department/{department}', 'DepartmentController@update');
Route::delete('department/{department}', 'DepartmentController@destroy');
/**
 *  Role Route
 * 
 */
Route::get('role', 'RoleController@index');
Route::get('role/create', 'RoleController@create');
Route::post('role', 'RoleController@store');
Route::get('role/{role}/edit', 'RoleController@edit');
Route::put('role/{role}', 'RoleController@update');
Route::delete('role/{role}', 'RoleController@destroy');
/**
 *  Employee Route
 * 
 */
Route::resource('/employee','EmployeeController');
Route::post('/employee/create','EmployeeController@store')->name('employee.store');
/**
 *  Public Holidays Route
 * 
 */
Route::get('holiday', 'PublicHolidaysController@index');
Route::get('holiday/create', 'PublicHolidaysController@create');
Route::post('holiday', 'PublicHolidaysController@store');
Route::get('holiday/{holiday}/edit', 'PublicHolidaysController@edit');
Route::put('holiday/{holiday}', 'PublicHolidaysController@update');
Route::delete('holiday/{holiday}', 'PublicHolidaysController@destroy');
/**
 *  Public Leave Type Route
 * 
 */
Route::get('leave_type', 'LeaveTypeController@index');
Route::get('leave_type/create', 'LeaveTypeController@create');
Route::post('leave_type', 'LeaveTypeController@store');
Route::get('leave_type/{leave}/edit', 'LeaveTypeController@edit');
Route::put('leave_type/{leave}', 'LeaveTypeController@update');
Route::delete('leave_type/{leave}', 'LeaveTypeController@destroy');
/**
 *  Public Leave Route
 * 
 */
Route::get('leave', 'LeaveController@index');
Route::get('leave/create', 'LeaveController@create');
Route::post('leave', 'LeaveController@store');
Route::get('leave/{leave}/edit', 'LeaveController@edit');
Route::put('leave/{leave}', 'LeaveController@update');
Route::delete('leave/{leave}', 'LeaveController@destroy');
/**
 *  Public Leave Route
 * 
 */
Route::get('attendance', 'AttendanceController@index');
Route::get('attendance/create', 'AttendanceController@create');
Route::post('attendance', 'AttendanceController@store');
Route::get('attendance/{attendance}/edit', 'AttendanceController@edit');
Route::put('attendance/{attendance}', 'AttendanceController@update');
Route::delete('attendance/{attendance}', 'AttendanceController@destroy');