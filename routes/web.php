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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/infoForm', function () {
    return view('informationForm');
});
//route to managerepairrequest controller
Route::post('submit','manageRepairRequestController@requestdetail');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('testingindex', function () {
    return view('manageRepairStatus.testindex');
});

Route::get('/manageRepairStatus/{id}/custViewAll', 'manageRepairStatusController@custViewAll')->name('manageRepairStatus.custViewAll');
Route::get('/manageRepairStatus/{id}/custEdit', 'manageRepairStatusController@custEdit')->name('manageRepairStatus.custEdit');
Route::get('/manageRepairStatus/{id}/{idtwo}/custConfirm', 'manageRepairStatusController@custConfirm')->name('manageRepairStatus.custConfirm');
Route::get('/manageRepairStatus/{id}/{idtwo}/custCancel', 'manageRepairStatusController@custCancel')->name('manageRepairStatus.custCancel');
Route::resource('manageRepairStatus', 'manageRepairStatusController');

// Route for Manage Registration
Route::get('/ManageRegistration/CustRegistration', 'App\Http\Controllers\RegistrationController@showCustomerRegisterForm');
Route::get('/ManageRegistration/RiderRegistration', 'App\Http\Controllers\RegistrationController@showRiderRegisterForm');

Route::post('/register/customer', 'App\Http\Controllers\RegistrationController@custreg');
Route::post('register/rider', 'App\Http\Controllers\RegistrationController@riderreg');