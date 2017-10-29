<?php

// Normal Routes

Route::get('/', function () {
	return redirect('/home');
});


Route::prefix('hotels')->group(function (){

	Route::get('/', 'CompanyController@index');
	Route::get('{name}', 'CompanyController@details');

});






// Authentication Routes...
Route::get('signin', 'NormalUserAuth\SigninController@showSigninForm')->name('signin');
Route::post('signin', 'NormalUserAuth\SigninController@signin');
Route::post('signout', 'NormalUserAuth\SigninController@signout')->name('signout');

// Registration Routes...
Route::get('signup', 'NormalUserAuth\SignupController@showSignupForm')->name('signup');
Route::post('signup', 'NormalUserAuth\SignupController@register');

// Password Reset Routes...
Route::get('password/reset', 'NormalUserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'NormalUserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'NormalUserAuth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'NormalUserAuth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');


// Owner Routes
Route::prefix('owner')->group(function () {

	// Authentication Routes...
	Route::get('signin', 'OwnerUserAuth\SigninController@showSigninForm');
	Route::post('signin','OwnerUserAuth\SigninController@signin');
	Route::post('signout', 'OwnerUserAuth\SigninController@signout');

	// Registration Routes...
	Route::get('signup', 'OwnerUserAuth\SignupController@showSignupForm');
	Route::post('signup', 'OwnerUserAuth\SignupController@signup');

	// Password Reset Routes...
	Route::get('password/reset', 'OwnerUserAuth\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/email', 'OwnerUserAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::get('password/reset/{token}', 'OwnerUserAuth\ResetPasswordController@showResetForm');
	Route::post('password/reset', 'OwnerUserAuth\ResetPasswordController@reset');

	Route::get('account', 'OwnerController@index');
	Route::post('account/{type}', 'OwnerController@updateAccount');

	Route::get('rooms', 'OwnerController@rooms');
	Route::post('rooms/{type}', 'OwnerController@updateRoom');
	Route::delete('rooms/delete', 'OwnerController@deleteRoom');
	Route::post('rooms/get/information', 'OwnerController@infoRoom');

	Route::get('/', function() {
		return redirect('/owner/account');
	});

});


// Admin Routes
Route::get('/admin', function() {
	return redirect('/admin/home');
});

Route::prefix('admin')->group(function () {

	// Admin Authentication Routes...
	Route::get('signin', 'AdminUserAuth\SigninController@showSigninForm');
	Route::post('signin', 'AdminUserAuth\SigninController@signin');
	Route::post('signout', 'AdminUserAuth\SigninController@signout');
	Route::post('user/signin', 'AdminUserAuth\SigninController@signin');
	Route::get('home', 'AdminController@index');

});
