<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/21/2015
 * Time: 8:48 PM
 */

namespace App\Http\ViewComposers;

use App\Models\Access\User\User;
use App\Notification;
use App\PatientAssignment;
use App\Reports;
use Illuminate\Contracts\View\View;

class DoctorComposer
{
    /**
     * The user repository implementation
     */
    protected $users;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
    }

    public function countUsers(View $view)
    {
        $view->with('count', User::count());
    }

    public function notifications(View $view)
    {

        //Fetch all notifications for this user alone
        $notifications = Notification::where('user_id', auth()->user()->id)->paginate(3);

        $data =
            [
                'notifications'   => $notifications
            ];

        $view->with($data);

    }

    public function userDetails(View $view)
    {
        $user = User::where('users.id', auth()->user()->id)->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')->first();

        if($user)
            $view->with('user', $user);
    }

    public function assignedPatients(View $view)
    {
        $doctor = auth()->user();

        $assigned_patients = Reports::where('assigned_doctor_id', $doctor->id)->join('users', 'users.id', '=', 'Reports.user_id')->groupBy('user_id')->get(['*', 'reports.id AS reportID']);

        if($assigned_patients)
            $view->with('patients', $assigned_patients);
    }
}