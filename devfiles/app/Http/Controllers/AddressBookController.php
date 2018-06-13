<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Hash;
use Auth;
use App\autoaddress;
class AddressBookController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}


// addressbook
	public function address()
	{
	
		
		return view('dashboard.settings.addressbook.index');
		
	}


	public function addressCreateGet()
	{
		return view('dashboard.settings.addressbook.create');
	}
	public function addressView($address_id)
	{
		$address = autoaddress::find($address_id);
		return view('dashboard.settings.addressbook.view')->with(compact('address'));
	}
	
	public function addressEditGet($address_id)
	{
		$address = autoaddress::find($address_id);
		return view('dashboard.settings.addressbook.edit')->with(compact('address'));
	}
	public function addressEditPost($address_id)
	{
		$address = autoaddress::find($address_id);
		
		$name = Request::input('name');
		$company = Request::input('company');
		$email = Request::input('email');
		$phone = Request::input('phone');
		$country = Request::input('country');
		$address1 = Request::input('address');
		$address2 = Request::input('address1');
		$city = Request::input('city');
		$postcode = Request::input('postcode');
		$state = Request::input('state');
		$pickuplocation = Request::input('location');
		$pickupreadytime = Request::input('readytime');
		$pickupclosetime = Request::input('closetime');
		$instructions = Request::input('instructions');
		
		$currentuseremail = Auth::user()->email;
		
		$address->name = $name;
		$address->company = $company;
		$address->email = $email;
		$address->phone = $phone;
		$address->country = $country;
		$address->address1 = $address1;
		$address->address2 = $address2;
		$address->city = $city;
		$address->postcode = $postcode;
		$address->state = $state;
		$address->pickup_location = $pickuplocation;
		$address->pickup_ready_time = $pickupreadytime;
		$address->pickup_close_time = $pickupclosetime;
		$address->pickup_instructions = $instructions;
		$address->belongs_to = $currentuseremail;
		

		$address->save();
		
		flash()->success('Address Updated');
		return redirect('settings/address');
	}


	public function addressDeleteGet($address_id)
	{
		$address = autoaddress::find($address_id);
		$address->delete();
		flash()->success('Address Deleted');
		return redirect('settings/address');
	}

	

	public function addressCreatePost()
	{
		$name = Request::input('name');
		$company = Request::input('company');
		$email = Request::input('email');
		$phone = Request::input('phone');
		$country = Request::input('country');
		$address1 = Request::input('address');
		$address2 = Request::input('address1');
		$city = Request::input('city');
		$postcode = Request::input('postcode');
		$state = Request::input('state');
		$pickuplocation = Request::input('location');
		$pickupreadytime = Request::input('readytime');
		$pickupclosetime = Request::input('closetime');
		$instructions = Request::input('instructions');
		
		$currentuseremail = Auth::user()->email;
		$address = new autoaddress;
		$address->name = $name;
		$address->company = $company;
		$address->email = $email;
		$address->phone = $phone;
		$address->country = $country;
		$address->address1 = $address1;
		$address->address2 = $address2;
		$address->city = $city;
		$address->postcode = $postcode;
		$address->state = $state;
		$address->pickup_location = $pickuplocation;
		$address->pickup_ready_time = $pickupreadytime;
		$address->pickup_close_time = $pickupclosetime;
		$address->pickup_instructions = $instructions;
		$address->belongs_to = $currentuseremail;
		

		$address->save();
		
		flash()->success('New Address Entry Added');
		return redirect('settings/address');
	}





















	

}
