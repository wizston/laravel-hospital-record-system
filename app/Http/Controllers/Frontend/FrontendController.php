<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Notification;
use App\Reports;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller {

	/**
	 * Check to see if the application is installed
	 * Redirect to the installer if need be
     */
	public function __construct() {
		$this->middleware('app.runInstaller');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{

//		return view('frontend.index');

		return redirect('dashboard');
	}
	/**
	 * @return \Illuminate\View\View
	 */
	public function dashboard()
	{

		//Fetch all notifications for this user alone
		$notifications = Notification::where('user_id', auth()->user()->id)->paginate(3);

		$data =
			[
				'notifications'   => $notifications
			];

		return view('frontend.dashboard', $data);
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

		return view('frontend.notification', $data);
	}

    public function reports()
    {
        $reports = Reports::where('user_id', auth()->user()->id)->get();

        $data =
            [
                'reports'  => $reports
            ];

        return view('frontend.reports', $data);
    }

    public function reportPage($id)
    {
        $report = Reports::find($id);
        if(!$report) {
            $data =
                [
                    'report' => $report
                ];

            return view('frontend.report_page', $data);
        }
        else
            abort(404);
    }


	/**
	 * @return \Illuminate\View\View
	 */
	public function profile()
	{
		return view('frontend.profile');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function macros()
	{
		return view('frontend.macros');
	}
}