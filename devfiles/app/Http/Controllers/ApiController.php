<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Hash;
use DB;
use Auth;
use App\autoaddress;
use App\shipment;
class ApiController extends Controller {


	
	public function getAll()
	{
	
	$shipments = shipment::all();
	
	return $shipments;
	
	}
	



}
