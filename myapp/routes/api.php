<?php

use Illuminate\Http\Request;

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

Route::get('getClient', 'Client\ApiController@Client');
Route::get('getClient/{uniqueid}', 'Client\ApiController@ClientById');
Route::post('create', 'Client\ApiController@ClientSave');
Route::put('updateClient/{uniqueid}', 'Client\ApiController@ClientUpdate');
Route::delete('deleteClient/{uniqueid}', 'Client\ApiController@Clientdelete');

//  Route::post('login', 'UserController@login');
// Route::post('register', 'UserController@register');
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details', 'UserController@details');
// });

Route::prefix('v1')->namespace('API')->group(function () {
  // Login
  Route::post('/login','AuthController@postLogin');
  // Register
  Route::post('/register','AuthController@postRegister');
  // Protected with APIToken Middleware
  Route::middleware('APIToken')->group(function () {
    // Logout
    Route::post('/logout','AuthController@postLogout');
  });
});

Route::get('QRCode/{uniqueid}', 'Client\RegisterController@ScanQRcode');
Route::post('submit_scan/{uniqueid}', 'Client\RegisterController@Scanforidcard');
Route::put('onlostid/{uniqueid}', 'Client\RegisterController@lostidcard');
Route::put('lunch_tea/{scanid}', 'Client\RegisterController@scanforLunchandtea');
Route::put('lunch_tea_submit/{scanid}', 'Client\RegisterController@OnsubmitLunchTea');
Route::put('book/{scanid}', 'Client\RegisterController@scanforBooks');
Route::put('book_submit/{scanid}', 'Client\RegisterController@Onsubmitbook');
Route::PUT('galanight/{scanid}', 'Client\RegisterController@scanforgalanight');
Route::put('submit_g_night/{scanid}', 'Client\RegisterController@submitforgalanight');
Route::PUT('galadinner/{scanid}', 'Client\RegisterController@scanforgaladinner');
Route::put('submit_g_dinner/{scanid}', 'Client\RegisterController@submitforgaladinner');
