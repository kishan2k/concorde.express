<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Hash;
use DB;
use Auth;
use App\autoaddress;
class ConfigController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('dashboard.settings.index');
	}
	public function AdminSettings()
	{
		return view('dashboard.admin.settings.index');
	}



}
