<?php namespace App\Http\Controllers\Frontend;

use App\DoctorsSpecialization;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Notification;
use App\Reports;
use Illuminate\Http\Request;

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
		#return view('frontend.index');
		return redirect('dashboard');
	}

    /**
     * AJAX call to fetch all doctors relation a a specialization
     */
    public function getDoctors(Request $request)
    {
        $spec_id = $request->id;

        $specs = User::where('specialization_id', $spec_id)->where('id', '!=', auth()->user()->id)->get();

        $response = "";

        if(count($specs))
        {
            foreach ($specs as $spec) {
                $response .= "<option value='" . $spec['id'] . "'>" . $spec['name'] . "</option>";
            }
            return $response;
        }
        else
            return json_encode('error: No Doctor matches your request',500);


    }

	/**
	 * @return \Illuminate\View\View
	 */
	public function macros()
	{
		return view('frontend.macros');
	}
}