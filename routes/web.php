<?php

use App\Http\Controllers\countryController;
use App\Http\Controllers\stateController;
use App\Http\Controllers\cityController;
use App\Http\Controllers\areaController;
use App\Http\Controllers\organizationController;
use App\Http\Controllers\branchController;
use App\Http\Controllers\accountController;
use App\Http\Requests\Location\country;
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
    return view('dashboard');
});

// Route::view('country', 'pages.location.country');
// Route::view('state', 'pages.location.state');
// Route::view('city', 'pages.location.city');

// Route::get('/form', function () {
//     return view('forms.country');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/country', function () {
    return view('pages.location.country');
})->middleware(['auth'])->name('country');

Route::get('/state', function () {
    return view('pages.location.state');
})->middleware(['auth'])->name('state');

Route::get('/city', function () {
    return view('pages.location.city');
})->middleware(['auth'])->name('city');

Route::get('/area', function () {
    return view('pages.location.area');
})->middleware(['auth'])->name('area');

Route::get('/organization', function () {
    return view('pages.organizations.organization');
})->middleware(['auth'])->name('organization');
Route::get('/branch', function () {
    return view('pages.organizations.branch');
})->middleware(['auth'])->name('branch');

Route::get('/account', function () {
    return view('pages.users.account');
})->middleware(['auth'])->name('account');

require __DIR__.'/auth.php';

 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
 

// Location Module
Route::resource( 'country',  countryController::class);
Route::resource( 'state',  stateController::class);
Route::get('/getState/{id}', [ stateController::class,'getState' ]);
Route::get('city/getState/{id}', [ cityController::class,'getState' ]);
Route::resource( 'city',  cityController::class);
Route::get('/getCity/{id}', [ cityController::class,'getCity' ]);
Route::resource( 'area',  areaController::class);
Route::get('/getArea/{id}', [ areaController::class,'getArea' ]);
Route::get('area/getArea/{id}', [ areaController::class,'getArea' ]);

Route::get('area/getState/{id}', [ areaController::class,'getState' ]);
Route::get('area/getCity/{id}', [ areaController::class,'getCity' ]);

//Organizations Module
Route::resource( 'organization',  organizationController::class);
Route::resource( 'branch',  branchController::class);
Route::get('/getBranch/{id}', [ branchController::class,'getBranch' ]);
 

//User Module
Route::resource( 'account',  accountController::class);
