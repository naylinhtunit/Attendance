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
Route::post('department', 'DepartmentController@store');
Route::put('department/{id}', 'DepartmentController@update');
Route::delete('department/{id}', 'DepartmentController@destroy');
/**
 *  Role Route
 * 
 */
Route::get('role', 'RoleController@index');
Route::post('role', 'RoleController@store');
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
Route::post('holiday', 'PublicHolidaysController@store');
Route::put('holiday/{id}', 'PublicHolidaysController@update');
Route::delete('holiday/{id}', 'PublicHolidaysController@destroy');
/**
 *  Public Leave Type Route
 * 
 */
Route::get('leave_type', 'LeaveTypeController@index');
Route::post('leave_type', 'LeaveTypeController@store');
Route::put('leave_type/{id}', 'LeaveTypeController@update');
Route::delete('leave_type/{id}', 'LeaveTypeController@destroy');
/**
 *  Public Leave Route
 * 
 */
Route::get('leave', 'LeaveController@index');
Route::post('leave', 'LeaveController@store');
Route::put('leave/{id}', 'LeaveController@update');
Route::delete('leave/{id}', 'LeaveController@destroy');