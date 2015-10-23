<?php namespace App\Http\Controllers\Frontend;

use App\Conversation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\ConversationRequest;
use App\Http\Requests\Frontend\User\ReportRequest;
use App\Models\Access\User\User;
use App\Notification;
use App\PatientAssignment;
use App\Recommendation;
use App\Reports;
use App\Services\Access\Facades\Access;

/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/21/2015
 * Time: 12:49 PM
 */

class UserController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        if(Access::hasRole('Doctor') || Access::hasRole('Administrator'))
        {
            return redirect('doctor/dashboard');
        }

        $recent_report = Reports::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();

        if($recent_report)
            $recommendation = Recommendation::where('report_id', $recent_report->id)->join('users', 'users.id', '=', 'recommendations.doctor_id')->first();
        else
            $recommendation = [];

        $data =
            [
                'recent_report'  => $recent_report,
                'recommendation' => $recommendation
            ];

        return view('frontend.user.dashboard', $data);

    }
    /**
     * @return \Illuminate\View\View
     */
    public function notification()
    {
        //Fetch all notifications for this user alone
        $notifications = Notification::where('user_id', auth()->user()->id)->paginate(10);

        $data =
            [
                'notifications'   => $notifications
            ];

        return view('frontend.user.notification', $data);
    }

    public function reports()
    {
        $reports = Reports::where('user_id', auth()->user()->id)->get();

        $data =
            [
                'reports'  => $reports
            ];

        return view('frontend.user.reports', $data);
    }

    public function reportPage($id)
    {
        $report = Reports::find($id);
        if($report)
        {
            $recommendation = Recommendation::where('report_id', $report->id)->join('users', 'users.id', '=', 'recommendations.doctor_id')->first();

            $conversations = Conversation::where('report_id', $report->id)->where('patient_id', auth()->user()->id)->get();

            $data =
                [
                    'report'         => $report,
                    'recommendation' => $recommendation,
                    'conversations'  => $conversations
                ];

            return view('frontend.user.report_page', $data);
        }
        else
            abort(404);
    }

    public function newReport()
    {
        return view('frontend.user.new-report');
    }

    public function postReport(ReportRequest $request)
    {
        $user = auth()->user();

        $lastAssignedDoc = PatientAssignment::join('users', 'users.id', '=', 'patient_assignments.doctor_id')->where('users.specialization_id', 1)->orderBy('patient_assignments.id', 'DESC')->pluck('doctor_id');

        //This gets the id of the last doctor in the database that has a general (1) specialization.
        $lastDoc = User::where('specialization_id', 1)->orderBy('id', 'DESC')->pluck('id');


        //Reset last doc when we get to our last doctor
        if($lastAssignedDoc == $lastDoc)
            $lastAssignedDoc = 0;

        $nextDocId = User::where('specialization_id', 1)->where('id', '>', $lastAssignedDoc)->first();


        $report = new Reports();
        $report->report = $request->txtReport;
        $report->user_id = $user->id;
        $report->patient_name = $user->name;
        $report->assigned_doctor_id = $nextDocId->id;

        //Save Report... Incase you dont know
        $report->save();

        $patientAss = new PatientAssignment();

        //Create a record of this assignment
        $patientAss->patient_id = $user->id;
        $patientAss->doctor_id = $nextDocId->id;
        $patientAss->report_id = $report->id;
        $patientAss->save();

        #Ideally, You should send a notification email to the doctor assigned and the user
        return redirect()->back()->withFlashSuccess('Your report has been submitted, one of our doctor will respond to it shortly.');
    }

    public function saveConversations(ConversationRequest $request)
    {

        $doctor = User::find($request->doctorID);
        $conversation = new Conversation();

        $conversation->message = $request->message;
        $conversation->doctor_id = $doctor->id;
        $conversation->patient_id = auth()->user()->id;
        $conversation->report_id  = $request->reportId;
        $conversation->doctor_name = $doctor->name;
        $conversation->sender      = auth()->user()->id;

        $conversation->save();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $user = auth()->user();
        $current_user = User::where('users.id', $user->id)->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')->first();
        $reportCount = Reports::where('user_id', $user->id)->count();
//        $recommendations = Recommendation::where('user_id', $user->id)->count();

        $data =
            [
                'user'            => $current_user,
                'reportCount'     => $reportCount,
//                'recommendations' => $recommendations
        ];

        return view('frontend.user.profile', $data);
    }

}
