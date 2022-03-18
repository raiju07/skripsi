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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logoutUser')->name('user.logout');

Route::get('generate/{str}', function($str){
	return bcrypt($str);
});

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::post('/lowongan', 'HomeController@welcome')->name('lowongan');
Route::get('/lowongan/{id}', 'HomeController@showLowongan')->name('show.lowongan');


Route::group(['prefix' => 'admin'], function(){
	// Auth::Admin
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/', 'Admin\AdminController@home')->name('admin.home');
	Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

	Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin.password.update');

	Route::group(['middleware' => ['auth:admin'] ], function () {
		Route::get('/profil', 'Admin\AdminController@profil');
		Route::patch('/profil/{id}', 'Admin\AdminController@profilUpdate');

		Route::resource('/admin', 'Admin\AdminController');
		Route::resource('/lowongan', 'Admin\LowonganController');
		Route::resource('/pelamar', 'Admin\PelamarController');
		Route::resource('/soal', 'Admin\SoalController');
		Route::resource('/lamaran', 'Admin\LamaranController');

		Route::get('/laporan', 'Admin\LaporanController@index');
		
	});
	
});

Route::group(['middleware' => ['auth:web'] ], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/lamaran', 'User\LamaranController');
	Route::resource('/ujian', 'User\UjianController');
	Route::get('/profil', 'User\PelamarController@profil');
	Route::patch('/profil/{id}', 'User\PelamarController@profilUpdate');
	Route::get('/hasil', 'User\HasilController@index');

});


