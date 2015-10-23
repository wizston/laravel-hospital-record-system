<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/21/2015
 * Time: 12:54 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Conversation;
use App\DoctorsSpecialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RecommendationRequest;
use App\Http\Requests\Frontend\ReferPatientRequest;
use App\Http\Requests\Frontend\User\ConversationRequest;
use App\Models\Access\User\User;
use App\PatientAssignment;
use App\Recommendation;
use App\Reports;
use Illuminate\Support\Facades\Input;

class DoctorController extends Controller
{
    public function dashboard()
    {
        if(access()->can('manage_hospital'))
        {
            return redirect('management/dashboard');
        }

        $doctor = auth()->user();

        //Get last 10 reports assigned to this doctor
        $reports = Reports::where('assigned_doctor_id', $doctor->id)->orderBy('id', 'DESC')->paginate(10);

        $data =
            [
                'reports'  => $reports,
            ];

        return view('frontend.doctor.dashboard', $data);
    }

    public function report($id)
    {

        $doctor = auth()->user();

        //Get all reports assigned to this doctor
        if($reports = Reports::where('assigned_doctor_id', $doctor->id)->where('reports.id', $id)->join('users', 'user_id', '=', 'users.id')->first(['*', 'reports.updated_at AS report_date', 'reports.id AS reportID']))
        {

            $previous_complaints = Reports::where('user_id', $reports->user_id)->where('id', '!=', $reports->reportID)->get();

            $recommendation = Recommendation::where('report_id', $id)->orderBy('id', 'DESC')->first();

            //Get current recommendation(s) for this post

            $doctors = ['--Select Specialization--'] + DoctorsSpecialization::lists('name', 'id')->toArray();

            $data = [
                'report' => $reports,
                'id' => $id,
                'recommendation' => $recommendation,
                'doctors' => $doctors,
                'previous_complaints' => $previous_complaints,
            ];

            return view('frontend.doctor.report', $data);
        }
        else
            abort(404);
    }

    public function postRecommendation($id, RecommendationRequest $request)
    {
        if($report = Reports::find($id)) {

            $doctor = auth()->user();

            $recommendation = new Recommendation();
            $recommendation->advice = $request->doc_advice;
            $recommendation->drugs = $request->doc_drug;
            $recommendation->doctor_id = $doctor->id;
            $recommendation->report_id = $id;
            $recommendation->save();

            return redirect()->back()->withFlashSuccess('Report Submitted Successfully');
        }
        else
            abort(404);

    }


    public function referPatient($id, ReferPatientRequest $request)
    {

        if($report = Reports::find($id))
        {

            $report->assigned_doctor_id = $request->doctors;
            $report->save();

            $newDocAss = new PatientAssignment();
            $newDocAss->doctor_id  = $request->doctors;
            $newDocAss->patient_id = $report->user_id;
            $newDocAss->report_id  = $report->id;
            $newDocAss->save();

            return redirect('doctor/dashboard')->withFlashSuccess("The patient <strong>($report->patient_name)</strong> has been referred appropriately ");

        }
        else
            abort(404);
    }

    public function feedback($id)
    {
        $doctor = auth()->user();

        //Get last 10 reports assigned to this doctor
        $reports = Reports::where('user_id', $id)->where('assigned_doctor_id', $doctor->id)->orderBy('id', 'DESC')->paginate(10);

        if($reports->total() === 0)
            abort(404);

        $lastReport = Reports::where('user_id', $id)->where('assigned_doctor_id', $doctor->id)->orderBy('id', 'DESC')->first();


        if(Input::get('conversation'))
        {
            //If this report doesn't exits, Get outta here
            if(! Reports::where('user_id', $id)->where('assigned_doctor_id', $doctor->id)->where('id', Input::get('conversation'))->orderBy('id', 'DESC')->count())
                abort(404);

            //Now getting everything based on user id and report id : if specified
            $lastReport = Reports::where('user_id', $id)->where('assigned_doctor_id', $doctor->id)->where('id', Input::get('conversation'))->first();

            //Same for conversations
            $conversations = Conversation::where('doctor_id', auth()->user()->id)->where('report_id', Input::get('conversation'))->join('users', 'users.id', '=', 'conversations.sender')->get();
        }
        else
            $conversations = Conversation::where('doctor_id', auth()->user()->id)->where('report_id', $lastReport->id)->join('users', 'users.id', '=', 'conversations.sender')->get();

        $data =
            [
                'conversations' => $conversations,
                'reports'       => $reports,
                'lastReport'    => $lastReport,
                'id'            => $id
            ];

        return view('frontend.doctor.feedback', $data);
    }

    public function allReports()
    {
        $doctor = auth()->user();

        //Get all reports assigned to this doctor
        $reports = Reports::where('assigned_doctor_id', $doctor->id)->orderBy('id', 'DESC')->get();

        $data =
            [
                'reports'  => $reports
            ];

        return view('frontend.doctor.all-reports', $data);
    }


    public function saveConversations(ConversationRequest $request)
    {

        $patient = User::find($request->doctorID);
        $conversation = new Conversation();

        $conversation->message     = $request->message;
        $conversation->doctor_id   = auth()->user()->id;
        $conversation->patient_id  = $patient->id;
        $conversation->report_id   = $request->reportId;
        $conversation->doctor_name = $patient->name;
        $conversation->sender      = auth()->user()->id;

        $conversation->save();

        return redirect()->back();
    }

}