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
Route::get('company/edit/{id}', 'CompanyController@edit');
Route::put('company/{id}', 'CompanyController@update');
Route::delete('company/{id}', 'CompanyController@destroy');
/**
 *  Department Route
 * 
 */
Route::get('department', 'DepartmentController@index');
Route::get('department/create', 'DepartmentController@create');
Route::post('department', 'DepartmentController@store');
Route::get('department/edit/{id}', 'DepartmentController@edit');
Route::put('department/{id}', 'DepartmentController@update');
Route::delete('department/{id}', 'DepartmentController@destroy');
/**
 *  Role Route
 * 
 */
Route::get('role', 'RoleController@index');
Route::get('role/create', 'RoleController@create');
Route::post('role', 'RoleController@store');
Route::get('role/edit/{id}', 'RoleController@edit');
Route::put('role/{id}', 'RoleController@update');
Route::delete('role/{id}', 'RoleController@destroy');
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
Route::get('holiday/edit/{id}', 'PublicHolidaysController@edit');
Route::put('holiday/{id}', 'PublicHolidaysController@update');
Route::delete('holiday/{id}', 'PublicHolidaysController@destroy');
/**
 *  Public Leave Type Route
 * 
 */
Route::get('leave_type', 'LeaveTypeController@index');
Route::get('leave_type/create', 'LeaveTypeController@create');
Route::post('leave_type', 'LeaveTypeController@store');
Route::get('leave_type/edit/{id}', 'LeaveTypeController@edit');
Route::put('leave_type/{id}', 'LeaveTypeController@update');
Route::delete('leave_type/{id}', 'LeaveTypeController@destroy');
/**
 *  Public Leave Route
 * 
 */
Route::get('leave', 'LeaveController@index');
Route::get('leave/create', 'LeaveController@create');
Route::post('leave', 'LeaveController@store');
Route::get('leave/edit/{id}', 'LeaveController@edit');
Route::put('leave/{id}', 'LeaveController@update');
Route::delete('leave/{id}', 'LeaveController@destroy');
/**
 *  Public Leave Route
 * 
 */
Route::get('attendance', 'AttendanceController@index');
Route::get('attendance/create', 'AttendanceController@create');
Route::post('attendance', 'AttendanceController@store');
Route::get('attendance/edit/{id}', 'AttendanceController@edit');
Route::put('attendance/{id}', 'AttendanceController@update');
Route::delete('attendance/{id}', 'AttendanceController@destroy');