<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
// front end
Route::get('/', 'FrontEndController@index');
Route::get('about-us', 'FrontEndController@AboutUsPage');
Route::get('policies', 'FrontEndController@TermsPage');
Route::get('contact', 'FrontEndController@ContactPage');
Route::get('shipping/list', 'ApiController@getAll');

// rates
Route::get('quote', 'RateController@GetRate');
Route::post('quote', 'RateController@PostRate');

Route::group(['middleware' => 'App\Http\Middleware\UserTypeMiddleware'], function () {
// home
	Route::get('home', 'HomeController@index');
	Route::post('home', 'HomeController@index');
	Route::post('topup', 'HomeController@topup');

// settings
	Route::get('settings', 'ConfigController@index');
	Route::post('settings', 'ConfigController@post');

	Route::get('settings/credit', 'CreditController@index');
	Route::post('settings/credit', 'CreditController@add');
	Route::post('settings/credit/add', 'CreditController@CreditAdd');

	Route::group(['prefix' => 'settings'], function () {
		Route::get('address', 'AddressBookController@address');
		// address create
		Route::get('address/create', 'AddressBookController@addressCreateGet');
		Route::post('address/create', 'AddressBookController@addressCreatePost');

		Route::get('address/{address_id}', 'AddressBookController@addressView');
		// address edit
		Route::get('address/{address_id}/edit', 'AddressBookController@addressEditGet');
		Route::post('address/{address_id}/edit', 'AddressBookController@addressEditPost');

		// address delete
		Route::get('address/{address_id}/delete', 'AddressBookController@addressDeleteGet');
		Route::post('address/{address_id}/delete', 'AddressBookController@addressDeletePost');

	});

	Route::get('shipping', 'ShipmentController@index');
	Route::get('shipping/book/', 'ShipmentController@book');
	Route::get('shipping/book/create', 'ShipmentController@createNew');
	Route::post('shipping/book', 'ShipmentController@store');
	Route::post('shipment/book/new', 'ShipmentController@bookedNew');

	Route::get('shipment/{tracking_number}', 'ShipmentController@showShipment');
	Route::get('local/shipment/{tracking_number}', 'LocalShipmentController@showShipment');
	Route::get('local/shipping', 'LocalShipmentController@index');
	Route::get('local/shipping/book/', 'LocalShipmentController@book');
	Route::post('local/shipping/book', 'LocalShipmentController@rate');
	Route::post('local/shipment/book/new', 'LocalShipmentController@storeLocal');

	Route::get('local/shipment/{tracking_number}/label', 'LocalShipmentController@localLabel');
	Route::get('local/shipment/{tracking_number}/invoice', 'LocalShipmentController@localInvoice');

	Route::get('admin/shipment/{tracking_number}', 'ShipmentController@showShipment');

	Route::get('pickup', 'PickupController@getPickup');
	Route::post('pickup', 'PickupController@postPickup');
	Route::get('pickup/{id}/view', 'PickupController@getPickupView');

	Route::get('pickup/create', 'PickupController@getPickupCreate');
	Route::post('pickup/create', 'PickupController@getPickupCreate');
	Route::get('pickup/create/created', 'PickupController@getPickupCreate1');
	Route::post('pickup/create/created', 'PickupController@getPickupCreate1');

	Route::get('pickup/{id}/cancel', 'PickupController@getPickupCancel');

	Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
		Route::group(['prefix' => 'admin'], function () {
			Route::get('/', 'AdminController@index');
			Route::get('shipments', 'AdminShipmentController@index');
			Route::get('shipment/{tracking_number}', 'ShipmentController@showShipment');
			Route::get('shipment/{tracking_number}/delete', 'ShipmentController@deleteShipment');
			Route::get('local/shipment/{id}/delete', 'LocalShipmentController@delete');
			Route::get('settings', 'ConfigController@AdminSettings');
			Route::group(['prefix' => 'settings'], function () {

				Route::get('users', 'UserController@userIndex');
				// address create
				Route::get('user/create', 'UserController@userCreateGet');
				Route::post('users/create', 'UserController@userCreatePost');

				Route::get('users/{user_id}', 'UserController@userView');
				// address edit
				Route::get('users/{user_id}/edit', 'UserController@userEditGet');
				Route::post('users/{user_id}/edit', 'UserController@userEditPost');

				// address delete
				Route::get('users/{user_id}/delete', 'UserController@userDeleteGet');
				Route::post('users/{user_id}/delete', 'ConfigController@userDeletePost');

			});

		});

	});

	Route::get('shipment/{tracking_number}', 'ShipmentController@showShipment');

});

Route::controllers([
	'auth' => 'Auth\AuthController',
]);
