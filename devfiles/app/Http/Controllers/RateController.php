<?php namespace App\Http\Controllers;

use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

class RateController extends Controller {


	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/



	
	public function GetRate()
	{
		return view('frontend.rate');
	}
	public function PostRate()
	{
		return view('frontend.rate');
	}

}
