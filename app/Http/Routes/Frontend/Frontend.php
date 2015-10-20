<?php

/**
 * Frontend Controllers
 *
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function ()
{
	get('/', 'FrontendController@index')->name('home');
	get('dashboard', 'FrontendController@dashboard')->name('dashboard');
	get('notifications', 'FrontendController@notification')->name('notification');
	get('profile', 'FrontendController@profile')->name('profile');
	get('reports', 'FrontendController@reports')->name('reports');
	get('report/{id}', 'FrontendController@reportPage')->name('report.page');

//	get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
	get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
	patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');

});