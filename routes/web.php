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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', function(){
    return redirect()->to('/crud');
});
Route::resource('crud', 'CrudController');

Route::group(['middleware' => 'web'], function() {
	Route::auth();
});

Route::group(['middleware' => ['web', 'auth']], function() {
	Route::get('/', 'HomeContoller@index');
	Route::get('/', function() {
		if (Auth::user()->admin == 1) {
			return view('admin');
		} else {
			return view('user');
		}
	});
});

// Route untuk import data excel ke database
Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

// Route untuk akses cari data
Route::group(['middleware' => ['web']], function () {

    
    Route::resource('/crud','CrudController');
    Route::get('namadosen','CrudController@search');

});

Route::group(['middleware' => 'auth'], function () {
	
    Route::get('password', 'PasswordController@change')->name('password.change');
    Route::put('password', 'PasswordController@update')->name('password.update');
});



