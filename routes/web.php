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

// default
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//manage repair Request
Route::get('/infoForm', function () {//create request
    return view('manageRepairRequest.informationForm');
});
Route::post('submit','manageRepairRequestController@create');//create request

Route::get('request', function () {//main page
    return view('manageRepairRequest.requestMain');
});

Route::get('/manageRepairRequest/{id}/list', 'manageRepairRequestController@list')->name('manageRepairRequest.list');//viewDraft
Route::get('/manageRepairRequest/{id}/edit', 'manageRepairRequestController@edit')->name('manageRepairRequest.edit');//editDraft
Route::post('/manageRepairRequest/{id}/update', 'manageRepairRequestController@update')->name('manageRepairRequest.update');//updateDraft
Route::get('/manageRepairRequest/{id}/destroy', 'manageRepairRequestController@destroy')->name('manageRepairRequest.destroy');//deleteDraft
Route::get('/manageRepairRequest/{id}/sort', 'manageRepairRequestController@sort')->name('manageRepairRequest.sort');//sortDraft
Route::get('/statuschart', 'manageRepairRequestController@index');//chart page
Route::get('app2', function () {//echart page
    return view('layouts.app2');
});

//manage request Status
Route::get('testingindex', function () {
    return view('manageRepairStatus.testindex');
});

Route::get('/manageRepairStatus/search', 'manageRepairStatusController@search')->name('manageRepairStatus.search');
Route::get('/manageRepairStatus/{id}/custViewAll', 'manageRepairStatusController@custViewAll')->name('manageRepairStatus.custViewAll');
Route::get('/manageRepairStatus/{id}/custEdit', 'manageRepairStatusController@custEdit')->name('manageRepairStatus.custEdit');
Route::get('/manageRepairStatus/{id}/{idtwo}/custConfirm', 'manageRepairStatusController@custConfirm')->name('manageRepairStatus.custConfirm');
Route::get('/manageRepairStatus/{id}/{idtwo}/custCancel', 'manageRepairStatusController@custCancel')->name('manageRepairStatus.custCancel');
Route::resource('manageRepairStatus', 'manageRepairStatusController');

// Route for Manage Registration
Route::get('/ManageRegistration/CustRegistration', 'ManageRegistrationController@showCustomerRegisterForm');
Route::get('/ManageRegistration/RiderRegistration', 'ManageRegistrationController@showRiderRegisterForm');

Route::post('/register/customer', 'ManageRegistrationController@custreg');
Route::post('/register/rider', 'ManageRegistrationController@riderreg');

//Route For Manage Account
Route::get('test', function () {
    return view('ManageAccount.test');
});
//Customer
Route::get('/ManageAccount/{id}/selectProfile', 'ManageAccountController@selectProfile')->name('ManageAccount.selectProfile');//View Profile
Route::get('/ManageAccount/{id}/editProfile', 'ManageAccountController@editProfile')->name('ManageAccount.editProfile');//Edit Profile
Route::post('/ManageAccount/{id}/update', 'ManageAccountController@update')->name('ManageAccount.update');//Update infomation
Route::get('/ManageAccount/{id}/changePassword', 'ManageAccountController@changePassword')->name('ManageAccount.changePassword');//Change password
Route::get('/ManageAccount/{id}/changePass', 'ManageAccountController@changePass')->name('ManageAccount.changePass');//Update password
//Rider
Route::get('/ManageAccount/{id}/selectProfileR', 'ManageAccountController@selectProfileR')->name('ManageAccount.selectProfileR');//View Profile
Route::get('/ManageAccount/{id}/editProfileR', 'ManageAccountController@editProfileR')->name('ManageAccount.editProfileR');//Edit Profile
Route::post('/ManageAccount/{id}/updateR', 'ManageAccountController@updateR')->name('ManageAccount.updateR');//Update infomation
Route::get('/ManageAccount/{id}/changePasswordR', 'ManageAccountController@changePasswordR')->name('ManageAccount.changePasswordR');//Change password
Route::get('/ManageAccount/{id}/changePassR', 'ManageAccountController@changePassR')->name('ManageAccount.changePassR');//Update password
Route::resource('ManageAccount', 'ManageAccountController');
//Staff
//-->Customer
Route::get('/ManageAccount/search', 'ManageAccount@search')->name('ManageAccount.search');//Search 
Route::get('/ManageAccount/selectUserType', 'ManageAccountController@selectUserType')->name('ManageAccount.selectUserType');//View List
Route::get('/ManageAccount/{id}/ViewProfile', 'ManageAccountController@viewProfile')->name('ManageAccount.viewProfile');//View Profile
Route::get('/ManageAccount/{id}/updateIC', 'ManageAccountController@updateIC')->name('ManageAccount.updateIC');//Edit IC
Route::post('/ManageAccount/{id}/updateICC', 'ManageAccountController@updateICC')->name('ManageAccount.updateICC');//Update IC
Route::get('/ManageAccount/{id}/banUser', 'ManageAccountController@banUser')->name('ManageAccount.banUser');//Ban 
Route::get('/ManageAccount/{id}/ban', 'ManageAccountController@ban')->name('ManageAccount.ban');//Ban update 


//Route for Manage Payment
Route::get('button', function () {
    return view('ManagePayment.Button');
});
    Route::post('/ManagePayment/paymentDetails','PaymentController@paymentDetails')->name('ManagePayment.Payment1');

    Route::post('/ManagePayment/paymentCOD','PaymentController@paymentCOD')->name('ManagePayment.PaymentCOD');
    
    Route::get("/PaymentStatusInterface/{customerID}/{orderID}/{estimatedCost}/{customerName}/{customerAddress}", 'PaymentController@paymentPayPal');

    
