<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\localshipment;
use Request;

class LocalShipmentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		return view('dashboard.Shipping.local.shipping');

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
		return view('dashboard.Shipping.local.index');
	}
	public function rate() {

		return view('dashboard.Shipping.local.create');
		// return $shipment;

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

		$shipment = localshipment::find($tracking_number);
		return view('dashboard.Shipping.local.shipmentTrack')->with(compact('shipment'));
	}

	public function delete($id) {

		echo $shipment = localshipment::find($id);

		// $shipment->delete();
		// flash()->success('Shipment Deleted');
		// return redirect('admin/shipments');

	}

	public function localLabel($tracking_number) {

		$shipment = localshipment::find($tracking_number);
		return view('dashboard.Shipping.local.localLabel')->with(compact('shipment'));
	}
	public function localInvoice($tracking_number) {

		$shipment = localshipment::find($tracking_number);
		return view('dashboard.Shipping.local.localInvoice')->with(compact('shipment'));
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
