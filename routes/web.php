<?php

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

Route::get('/', 'HomeController@index')->middleware('is_admin')
    ->name('home');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE';
});

Route::get('mlogin/{email}/{password}', ['as' => 'MobileLogin', 'uses' => 'GetFunction@loginMobile']);
Route::get('min/{id}/{mlat}/{mlong}/', ['as' => 'Min', 'uses' => 'GetFunction@mIn']);
Route::get('mout/{id}/{mlat}/{mlong}/', ['as' => 'Min', 'uses' => 'GetFunction@mOut']);

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('is_admin')->name('home');
Route::get('/index', 'EmployeeHomeController@index')->middleware('is_employee')->name('index');
Route::get('employee_data', ['as' => 'EmployeeData', 'uses' => 'HomeController@dataEmployee'])->middleware('is_admin');
Route::get('form_add_employee', ['as' => 'FormAddEmployee', 'uses' => 'HomeController@formAddEmployee'])->middleware('is_admin');
Route::post('add_employee', ['as' => 'AddEmployee', 'uses' => 'HomeController@addEmployee'])->middleware('is_admin');
Route::get('getTime', ['as' => 'GetFunctionTime', 'uses' => 'GetFunction@getTimeserver']);
Route::get('getIp', ['as' => 'GetIP', 'uses' => 'GetFunction@getIpclient']);
Route::post('employeein', ['as' => 'EmployeeIn', 'uses' => 'GetFunction@employIn']);
Route::post('employeeout', ['as' => 'EmployeeOut', 'uses' => 'GetFunction@employOut']);
Route::get('profile', ['as' => 'PageProfile', 'uses' => 'GetFunction@pageProfile']);
Route::get('attended_data', ['as' => 'AttendedData', 'uses' => 'EmployeeHomeController@attendedData'])->middleware('is_employee');
Route::get('attended_master', ['as' => 'AttendedMaster', 'uses' => 'HomeController@attendedMaster'])->middleware('is_admin');