<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...

        //Shit
        view()->composer(
            'frontend.includes.assigned_patients', 'App\Http\ViewComposers\DoctorComposer@countUsers'
        );

        //Notification Side Container Contents
        view()->composer(
            'frontend.includes.notifications', 'App\Http\ViewComposers\DoctorComposer@notifications'
        );

        //Profile Side Container
        view()->composer(
            'frontend.includes.profile-nav', 'App\Http\ViewComposers\DoctorComposer@userDetails'
        );

        //Get all patients assigned to the authenticated doctor
        view()->composer(
            'frontend.includes.assigned_patients', 'App\Http\ViewComposers\DoctorComposer@assignedPatients'
        );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
