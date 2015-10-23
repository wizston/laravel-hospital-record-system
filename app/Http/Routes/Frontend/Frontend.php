<?php

/**
 * Frontend Controllers
 *
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function ()
{
    //Ajax Calls
    post('doctor/report/ajax/get_doctors', 'FrontendController@getDoctors')->name('get_doctors');

    get('/', 'FrontendController@index')->name('home');
    get('dashboard', 'UserController@dashboard')->name('frontend.dashboard');
    get('notifications', 'UserController@notification')->name('notification');
    get('profile', 'UserController@profile')->name('profile');

//	get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
    get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
    patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');


    //Reports : Create New Report
    get('report/new', 'UserController@newReport')->name('report.new');
    post('report/new', 'UserController@postReport')->name('report.post_report');

    //View all reports in list
    get('reports', 'UserController@reports')->name('reports');

    //View a single report
    get('report/{id}', 'UserController@reportPage')->name('report.page');

    //Save conversations
    post('report/chat/new', 'UserController@saveConversations')->name('report.new_conversation');

    Route::group(['middleware' => 'access.routeNeedsPermission:give_recommendations'], function () {
        get('doctor/dashboard', 'DoctorController@dashboard')->name('doctor.dashboard');
        get('doctor/report/{id}', 'DoctorController@report')->name('doctor.report');
        get('doctor/reports', 'DoctorController@allReports')->name('doctor.reports');
        post('doctor/report/post-recommendation/{id}', 'DoctorController@postRecommendation')->name('doctor.post.recommendation');
        post('doctor/report/refer_patient/{id}', 'DoctorController@referPatient')->name('doctor.refer_patient');

        //Patient Feedback / messages
        get('doctor/feedback/{id}', 'DoctorController@feedback')->name('doctor.feedback');

        //Save conversations
        post('doctor/report/chat/new', 'DoctorController@saveConversations')->name('report.new_conversation');
    });

    Route::group(['middleware' => 'access.routeNeedsPermission:manage_hospital'], function () {
        get('management/dashboard', 'ManagementController@dashboard')->name('management.dashboard');
        get('management/new-doctor', 'ManagementController@newDoctor')->name('management.register_doctor');
        get('management/profile/edit/{id}', 'ManagementController@edit')->name('frontend.management.profile.edit');
        get('management/reports', 'ManagementController@reports')->name('frontend.management.reports');
        patch('management/profile/update', 'ManagementController@update')->name('frontend.management.profile.update');

        post('management/doctor/save', 'ManagementController@registerDoctor')->name('management.create.dashboard');
    });
});