<?php

Auth::routes();

Route::prefix('auth')->group(function () {
    Route::get('{provider}', 'Auth\AuthController@redirectToProvider')->name('auth.provider');
    Route::get('{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});

Route::middleware('auth')->group(function () {
    Route::prefix('settings')->group(function () {
        Route::get('account', 'UserController@edit')->name('users.edit');
        Route::match(['put', 'patch'], 'account', 'UserController@update')->name('users.update');

        Route::get('password', 'UserPasswordController@edit')->name('users.password');
        Route::match(['put', 'patch'], 'password', 'UserPasswordController@update')->name('users.password.update');

        Route::get('token', 'UserTokenController@edit')->name('users.token');
        Route::match(['put', 'patch'], 'token', 'UserTokenController@update')->name('users.token.update');
    });

    Route::resource('newsletter-subscriptions', 'NewsletterSubscriptionController')->only('store');
    
});

Route::get('/mylogin', 'Auth\LoginController@mylogin')->name('mylogin');
Route::get('/signup', 'Auth\RegisterController@signup')->name('signup');


Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('laravel-filemanager');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');


