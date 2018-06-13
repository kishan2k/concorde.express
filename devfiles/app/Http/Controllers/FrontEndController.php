<?php namespace App\Http\Controllers;
use Request;
use App\shipment;
use Shippo;
class FrontEndController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
	return view('frontend.index');
		
	}
	
	public function AboutUsPage()
	{
	return view('frontend.pages.about-us');
		
	}
	public function TermsPage()
	{
	return view('frontend.pages.terms-and-condition');
		
	}
	public function ContactPage()
	{
	return view('frontend.pages.contact');
		
	}
	

}
