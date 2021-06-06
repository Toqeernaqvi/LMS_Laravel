<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\countryController;
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
//Route::get('/users/{name?}' , [SayhelloController::class,'index']);

//Country Routes
Route::get('/country', [countryController::class, 'getAllCountries']);
 Route::get('/country/{id}', [countryController::class, 'getCountry']);
Route::post('/country',[countryController::class, 'createCountry']);
Route::put('/country/{id}',[countryController::class,'updateCountry']);
Route::delete('/country/{id}',[countryController::class,'deleteCountry']);
//Route::get('country','countryController@getAllCountries');
//Route::get('country/{id}','countryController@getCountry');//
//Route::post('country','countryController@createCountry');
// Route::put('country/{id}','countryController@updateCountry');
// Route::delete('country/{id}','countryController@deleteCountry');

 