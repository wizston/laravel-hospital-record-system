<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/21/2015
 * Time: 12:54 PM
 */

namespace App\Http\Controllers\Frontend;


use App\AssignedRole;
use App\Conversation;
use App\DoctorsSpecialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RecommendationRequest;
use App\Http\Requests\Frontend\ReferPatientRequest;
use App\Http\Requests\Frontend\RegisterDoctorRequest;
use App\Http\Requests\Frontend\UpdateUsersRequest;
use App\Http\Requests\Frontend\User\ConversationRequest;
use App\Models\Access\User\User;
use App\PatientAssignment;
use App\Recommendation;
use App\Reports;
use Illuminate\Support\Facades\Input;

class ManagementController extends Controller
{
    public function dashboard()
    {
        $doctor = auth()->user();

        //Get last 10 reports assigned to this doctor
        $reports = Reports::count();

        $doctorsIds = AssignedRole::where('role_id', 3)->lists('user_id');
        $patientsIds = AssignedRole::where('role_id', 2)->lists('user_id');

        //Get total of all
        $patients = User::whereIn('id', $patientsIds)->count();
        $doctors = User::whereIn('id', $doctorsIds)->count();

        $all_patients_details = User::whereIn('users.id', $patientsIds)->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')->paginate(15);
        $all_doctors_details = User::whereIn('users.id', $doctorsIds)->leftJoin('doctors_specializations' , 'doctors_specializations.id', '=', 'users.specialization_id')->paginate(15, ['*','users.name AS doctorName', 'users.id as user_id']);

        $data =
            [
                'total_doc'      => $doctors,
                'total_patients' => $patients,
                'total_reports'  => $reports,
                'patients'       => $all_patients_details,
                'doctors'        => $all_doctors_details
            ];

        return view('frontend.management.dashboard', $data);
    }

    public function newDoctor()
    {
        $specializations = DoctorsSpecialization::lists('name', 'id');

        $data =
            [
                'specializations' => $specializations
            ];

        return view('frontend.management.register-doctor', $data);
    }

    public function registerDoctor(RegisterDoctorRequest $request)
    {
        $doctor = new User();

        $doctor->name 		        = $request->name;
        $doctor->email 	            = $request->email;
        $doctor->password           = $request->password;
        $doctor->specialization_id  = $request->specialization_id;
        $doctor->license_number     = $request->license_number;
        $doctor->confirmed          = 1;
        $doctor->save();


        //Attach new roles
        $doctor->attachRoles([3]);
        //Attach other permissions
        $doctor->attachPermissions([24]);

        return redirect()->back()->withFlashSuccess('Entry Saved!');
    }

    public function update(UpdateUsersRequest $request)
    {
        $person = User::find($request->userID);

        $person->name = $request->name;
        $person->email = $request->email;
        $person->license_number = $request->license_number ? $request->license_number : null;
        $person->specialization_id = $request->specialization_id ? $request->specialization_id : null;
        $person->save();

        return redirect('management/dashboard')->withFlashSuccess('Entry Saved!');
    }

    public function edit($id)
    {
        $user = User::find($id);

        $specializations = DoctorsSpecialization::lists('name', 'id');

        $data =
            [
                'user' => $user,
                'specializations' => $specializations
            ];

        return view('frontend.management.edit-doctor', $data);
    }

    public function reports()
    {
        //Get all reports assigned to this doctor
        $reports = Reports::join('users', 'users.id', '=', 'reports.assigned_doctor_id')->orderBy('reports.id', 'DESC')->paginate(5);

        $data =
            [
                'reports'  => $reports
            ];

        return view('frontend.management.all-reports', $data);
    }
}