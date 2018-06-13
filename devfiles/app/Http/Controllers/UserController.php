<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Hash;
use Auth;
use App\User;
class UserController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}


public function userIndex()
	{
	
		
		return view('dashboard.admin.Settings.user.index');
		
	}


	public function userCreateGet()
	{
		return view('dashboard.admin.Settings.user.create');
	}
	public function userView($user_id)
	{
		$user = user::find($user_id);
		return view('dashboard.admin.Settings.user.view')->with(compact('user'));
	}
	
	public function userEditGet($user_id)
	{
		$user = user::find($user_id);
		return view('dashboard.admin.Settings.user.edit')->with(compact('user'));
	}
	public function userEditPost($user_id)
	{
		$user = user::find($user_id);

			$name = Request::input('name');
			$company = Request::input('company');
			$email = Request::input('email');
			$passwordraw = Request::input('password');
			$rate = Request::input('rate');
			$credit = Request::input('credit');
			$admin = Request::input('admin');
			$password = Hash::make($passwordraw);
			$address1 = Request::input('address1');
			$address2 = Request::input('address2');
			$city = Request::input('city');
			$phone = Request::input('phone');
			$state = Request::input('state');
			$country = Request::input('country');
			$postcode = Request::input('postcode');

			
		
			$user->name = $name;
			$user->company = $company;
			$user->email = $email;
			$user->password = $password;
			$user->rate = $rate;
			$user->credit = $credit;
			$user->address1 = $address1;
			$user->address2 = $address2;
			$user->city = $city;
			$user->country = $country;
			$user->state = $state;
			$user->phone = $phone;
			$user->postcode = $postcode;

			if (isset($admin) == true) {
			$user->admin = true;
			}
			$user->save();

				
		flash()->success('User Updated');
		return redirect('admin/settings/users');
	}


	public function userDeleteGet($user_id)
	{
		$user = user::find($user_id);
		$user->delete();
		flash()->success('User Deleted');
		return redirect('admin/settings/users');
	}

	

	public function userCreatePost()
	{

	$name = Request::input('name');
	$company = Request::input('company');
	$email = Request::input('email');
	$passwordraw = Request::input('password');
	$rate = Request::input('rate');
	$credit = Request::input('credit');
	$admin = Request::input('admin');
	$password = Hash::make($passwordraw);
	$address1 = Request::input('address1');
	$address2 = Request::input('address2');
	$city = Request::input('city');
	$phone = Request::input('phone');
	$state = Request::input('state');
	$country = Request::input('country');
	$postcode = Request::input('postcode');

	
	$user = New user;
	$user->name = $name;
	$user->company = $company;
	$user->email = $email;
	$user->password = $password;
	$user->rate = $rate;
	$user->credit = $credit;
	$user->address1 = $address1;
	$user->address2 = $address2;
	$user->city = $city;
	$user->country = $country;
	$user->state = $state;
	$user->phone = $phone;
	$user->postcode = $postcode;


	if (isset($admin) == true) {
	$user->admin = true;
	}
	$user->save();
		
	flash()->success('New user Entry Added');
	return redirect('admin/settings/users');
	}



























	

}
