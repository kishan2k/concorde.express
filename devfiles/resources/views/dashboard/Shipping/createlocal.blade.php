@extends('layouts.layout1')
@section('PageTitle', 'Book Shipment')
@section('content')

<?php

use App\localshipment;
use Carbon\Carbon;

$length = Request::input('length');
$width = Request::input('width');
$height = Request::input('height');
$weight = Request::input('weight');

$amount = Request::input('amount');
$currentuseremail = Auth::user()->email;

$senderCompany = Request::input('sender_company');
$ref = Request::input('ref');

$senderName = Request::input('sender_name');
$senderEmail = Request::input('sender_email');
$senderPhone = Request::input('sender_phone');
$senderCountry = Request::input('sender_country');
$senderAddress = Request::input('sender_address');
$senderAddress1 = Request::input('sender_address1');
$senderCity = Request::input('sender_city');
$senderState = Request::input('sender_state');
$senderPostCode = Request::input('sender_postcode');
$customs_value = Request::input('customs_value');
$recCompany = Request::input('rec_company');
$recName = Request::input('rec_name');
$recEmail = Request::input('rec_email');
$recPhone = Request::input('rec_phone');
$recCountry = Request::input('rec_country');
$recAddress = Request::input('rec_address');
$recAddress1 = Request::input('rec_address1');
$recCity = Request::input('rec_city');
$recPostCode = Request::input('rec_postcode');
$recState = Request::input('rec_state');
$quantity = Request::input('quantity');
$amount = Request::input('amount');
$serviceType = Request::input('service_type');
$serviceProvider = Request::input('service_provider');
$contentDesc = Request::input('content_desc');
$content_type = Request::input('content_type');

$credit = Auth::user()->credit;

if ($credit <= $amount) {
	?>
<div class="container">
<div class="alert alert-danger" role="alert">
   Your Credit is too low to buy the shipment. Please TopUp to continue
</div>
</div>
<br>
@include('layouts.includes.credit')


<?php

} else {

	try {

		$newShipment = localshipment::create(array(
			'sender_name' => $senderName,
			'sender_company' => $senderCompany,
			'sender_phone' => $senderPhone,
			'sender_email' => $senderEmail,
			'sender_country' => $senderCountry,
			'sender_address1' => $senderAddress,
			'sender_address2' => $senderAddress1,
			'sender_state' => $senderState,
			'sender_city' => $senderCity,
			'sender_postcode' => $senderPostCode,
			'p_number' => $quantity,
			'rec_name' => $recName,
			'rec_company' => $recCompany,
			'rec_phone' => $recPhone,
			'rec_email' => $recEmail,
			'rec_country' => $recCountry,
			'rec_address1' => $recAddress,
			'rec_address2' => $recAddress1,
			'rec_state' => $recState,
			'rec_city' => $recCity,
			'rec_postcode' => $recPostCode,
			'status' => "Booked",
			'shipment_weight' => $weight,
			'shipment_dimension_L' => $length,
			'shipment_dimension_W' => $width,
			'shipment_dimension_H' => $height,
			'shipment_customs_value' => $customs_value,
			'shipment_contents' => $contentDesc,
			'shipment_contents_type' => $content_type,
			'shipment_provider' => $serviceProvider,
			'shipment_class' => $serviceType,

			'shipment_cost' => $amount,
			'shipment_booking_date' => Carbon::now(),
			'reference' => $ref,
			'booked_by' => $currentuseremail,
		));

		$userid = Auth::user()->id;
		$credit = Auth::user()->credit;
		$newcredit = $credit - $amount;
		DB::table('users')
			->where('id', $userid)
			->update(['credit' => $newcredit]);

	} catch (Exception $e) {

	}

}

?>

<?php
$trackingnumber = localshipment::orderBy('created_at', 'desc')->first();
$update = localshipment::find($trackingnumber->id);

$update->tracking_number = $trackingnumber->id;
$update->label_url = "https://concorde.express/local/shipment/$trackingnumber->id/label";
$update->customs_url = "https://concorde.express/local/shipment/$trackingnumber->id/invoice";
$update->tracking_url = "https://concorde.express/local/shipment/$trackingnumber->id";
$update->save();

$label_url = "https://concorde.express/local/shipment/$trackingnumber->id/label";
$invoice_url = "https://concorde.express/local/shipment/$trackingnumber->id/invoice";
$track_url = "https://concorde.express/local/shipment/$trackingnumber->id";
?>
@if (isset($e))
@include('layouts.includes.exception')
@endif


@if ($credit > $amount)

{{$recState}} - {{$senderState}}
<div class="col-md-8 center">
    <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Shipment Booked</h3>
                                </div>
                                <div class="panel-body">

                                 <a href="{{ $label_url}}" target="_blank"><button class="btn btn-primary">View label</button></a>
								<a href="{{ $invoice_url}}" target="_blank"><button class="btn btn-primary">View Commerical Invoice</button></a>

                                  <a href="{{$track_url}}" target="_blank"><button class="btn btn-primary">Track</button></a>

                                    {{ $trackingnumber->id }}

                                    </div>

                                </div>
                            </div>

@endif






@stop