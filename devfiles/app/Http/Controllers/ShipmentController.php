<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\shipment;
use Request;

class ShipmentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		return view('dashboard.Shipping.shipping');

	}

// pickup

	public function getPickup() {
		return view('dashboard.pickup.index');
	}

	public function postPickup() {
		return view('dashboard.pickup.index');
	}
	public function getPickupCreate() {
		return view('dashboard.pickup.create');
	}
	public function postPickupCreate() {
		return view('dashboard.pickup.create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function book() {
		return view('dashboard.Shipping.index');
	}
	public function createNew() {

		return view('dashboard.Shipping.create');
		// return $shipment;

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Request::all();

		return view('dashboard.Shipping.create');

	}

	public function bookedNew() {

		return view('dashboard.Shipping.created');

	}

	public function storeLocal() {
		$input = Request::all();

		return view('dashboard.Shipping.createlocal');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showShipment($tracking_number) {

		$shipment = shipment::find($tracking_number);
		return view('dashboard.Shipping.shipmentTrack')->with(compact('shipment'));
	}

	public function deleteShipment($tracking_number) {

		$shipment = shipment::find($tracking_number);
		$shipment->delete();
		flash()->success('Shipment Deleted');
		return redirect('admin/shipments');
	}

	public function localLabel($tracking_number) {

		$shipment = shipment::find($tracking_number);
		return view('dashboard.Shipping.localLabel')->with(compact('shipment'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
