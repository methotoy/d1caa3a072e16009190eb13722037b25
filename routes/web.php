<?php

// Authentication Routes...
Route::get('signin', 'NormalUserAuth\SigninController@showSigninForm')->name('signin');
Route::post('signin', 'NormalUserAuth\SigninController@signin');
Route::post('signout', 'NormalUserAuth\SigninController@signout')->name('signout');

// Registration Routes...
Route::get('register', 'NormalUserAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'NormalUserAuth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'NormalUserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'NormalUserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'NormalUserAuth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'NormalUserAuth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');
Route::get('/', function () {
	return redirect('/home');
});


// Owner Routes
Route::get('/owner', function() {
	return redirect('/owner/home');
});

Route::prefix('owner')->group(function () {

	// Authentication Routes...
	Route::get('signin', 'OwnerUserAuth\SigninController@showSigninForm');
	Route::post('signin','OwnerUserAuth\SigninController@signin');
	Route::post('signout', 'OwnerUserAuth\SigninController@signout');

	// Registration Routes...
	Route::get('register', 'OwnerUserAuth\RegisterController@showRegistrationForm');
	Route::post('register', 'OwnerUserAuth\RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'OwnerUserAuth\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/email', 'OwnerUserAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::get('password/reset/{token}', 'OwnerUserAuth\ResetPasswordController@showResetForm');
	Route::post('password/reset', 'OwnerUserAuth\ResetPasswordController@reset');

	Route::get('/home', 'OwnerController@index');

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
