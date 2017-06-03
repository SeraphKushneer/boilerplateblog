<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
//Route::get('/', 'FrontendController@index')->name('index');
Route::get('/', 'PostController@index')->name('index');
Route::get('/posts/create', 'PostController@create')->name('create');

Route::post('/posts', 'PostController@store')->name('store');
Route::get('/posts/{post}', 'PostController@show')->name('show');

Route::post('/posts/{post}/comments', 'CommentController@store')->name('store');




Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('/create/posts', 'PostController@index')->name('index');
/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
