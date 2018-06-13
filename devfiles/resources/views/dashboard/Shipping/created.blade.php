@extends('layouts.layout1')
@section('PageTitle', 'Book Shipment')
@section('content')

<?php

use App\autoaddress;
use App\shipment;
use Carbon\Carbon;

$rate_object = Request::input('rate_object_id');
$amount = Request::input('amount');
$currentuseremail = Auth::user()->email;

$senderCompany = Request::input('sender_company');
$ref = Request::input('ref');
$customs_value = Request::input('customs_value');
$senderName = Request::input('sender_name');
$senderEmail = Request::input('sender_email');
$senderPhone = Request::input('sender_phone');
$senderCountry = Request::input('sender_country');
$senderAddress = Request::input('sender_address');
$senderAddress1 = Request::input('sender_address1');
$senderCity = Request::input('sender_city');
$senderState = Request::input('sender_state');
$senderPostCode = Request::input('sender_postcode');
$rawAmount = Request::input('amountr');
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
$shipment_id = Request::input('shipment_id');

$length = Request::input('length');
$width = Request::input('width');
$height = Request::input('height');
$weight = Request::input('weight');

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

		$testmode = Auth::user()->test_mode;
		if ($testmode == true) {
            
            $liveuser = Config::get('carrier.shippo_live_username');
            $livepass = Config::get('carrier.shippo_live_password');
			Shippo::setCredentials("$liveuser", "$livepass");
		} else {

			$testuser = Config::get('carrier.shippo_test_username');
            $testpass = Config::get('carrier.shippo_test_password');
			Shippo::setCredentials("$testuser", "$testpass");

		}

		$transaction = Shippo_Transaction::create(array('rate' => $rate_object, 'metadata' => $currentuseremail));
//Wait for transaction to be proccessed
		$attempts = 0;
		while (($transaction["object_status"] == "QUEUED" || $transaction["object_status"] == "WAITING") && $attempts < 100) {
			$transaction = Shippo_Transaction::retrieve($transaction["object_id"]);
			$attempts += 1;}

		$transaction_id = $transaction["object_id"];
//dd($transaction);
		if ($transaction["tracking_number"] == '') {
			abort(503, 'No tracking info returned, please contact support.');
		}
		;

		$newShipment = shipment::create(array(
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

			'shipment_weight' => $weight,
			'shipment_dimension_L' => $length,
			'shipment_dimension_W' => $width,
			'shipment_dimension_H' => $height,
			'shipment_customs_value' => $customs_value,
			'shipment_contents' => $contentDesc,
			'shipment_contents_type' => $content_type,

			'shipment_provider' => $serviceProvider,
			'shipment_class' => $serviceType,

			'shipment_cost_us' => $rawAmount,
			'shipment_cost_client' => $amount,
			'shipment_booking_date' => Carbon::now(),

			'rate_obj' => $rate_object,
			'shipment_obj' => $shipment_id,
			'transaction_obj' => $transaction_id,

			'label_url' => $transaction["label_url"],
			'tracking_url' => $transaction["tracking_url_provider"],
			'tracking_number' => $transaction["tracking_number"],

			'customs_url' => $transaction["commercial_invoice_url"],

			'reference' => $ref,
			'booked_by' => $currentuseremail,
		));

		$userid = Auth::user()->id;
		$credit = Auth::user()->credit;
		$newcredit = $credit - $amount;
		DB::table('users')
			->where('id', $userid)
			->update(['credit' => $newcredit]);

		$API_KEY = 'live_1bee3e05fd61e98ffa5b18fdbd1ce50e99c65b67';

		$api = new sendwithus\API($API_KEY);

		$response = $api->send('tem_2hQJnRKZyRYzMyxydYpTVF',
			array(
				'name' => $senderName,
				'address' => $senderEmail),
			array(
				'email_data' => array(
					'user_name' => $senderName,
					'tracking_number' => $transaction["tracking_number"],
					'tracking_url' => $transaction["tracking_url_provider"],
				),
				'cc' => array(
					array(
						'name' => '.$tracking_url.',
						'address' => 'booking@concordexpress.uk',
					),
				),
			)
		);
		$response = $api->send('tem_2hQJnRKZyRYzMyxydYpTVF',
			array(
				'name' => $recName,
				'address' => $recEmail),
			array(
				'email_data' => array(
					'user_name' => $recName,
					'tracking_number' => $transaction["tracking_number"],
					'tracking_url' => $transaction["tracking_url_provider"],
				),
			)

		);
	} catch (Exception $e) {

	}

}
$returnedtrackningnumber = $transaction["tracking_number"];
?>
@if (isset($e))
@include('layouts.includes.exception')
@endif


@if ($credit > $amount)


<div class="col-md-8 center">
    <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Shipment Booked</h3>
                                </div>
                                <div class="panel-body">

                                 <a href="{{ $transaction["label_url"] }}" target="_blank"><button class="btn btn-primary">View label</button></a>

                                  @if ($transaction["commercial_invoice_url"] != NULL)
                                  <a href="{{ $transaction["commercial_invoice_url"] }}" target="_blank"><button class="btn btn-primary">View Commerical Invoice</button></a>
                                  @endif
                                  <a href="{{ $transaction["tracking_url_provider"] }}" target="_blank"><button class="btn btn-primary">Track</button></a>

                                    {{ $transaction["tracking_number"] }}
                                    {{ $transaction["message"] }}
                                    </div>

                                </div>
                            </div>

@endif


<?php
$autoaddresses = autoaddress::where('belongs_to', '=', Auth::user()->email)->get();
?>
<div class="col-md-8 center">
  <link href="http://jdewit.github.io/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
  <div class="">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Book Pickup</h3>
        </div>
        <div class="panel-body">
            <legend>Book Pickup</legend>
            <div class="panel-body border">
                <form method="POST" class="form-horizontal" action="{{ url('/pickup/create/created')}}" role="form">
                    <div class="form-group">

                        <div class="form-group">
                            <label for="company" class="col-lg-2 control-label">Choose Address</label>
                            <div class="bs-component">
                                <div class="col-lg-10">
                                    <select class="form-control select-primary" id="Address1" name="addresschoose">
                                       <option value="">Please Select</option>
                                            @foreach ($autoaddresses as $autoaddress)
                                            <option value="{{ $autoaddress->name }}"
                                            data-name="{{ $autoaddress->name }}"
                                            data-company="{{ $autoaddress->company }}"
                                            data-email="{{ $autoaddress->email }}"
                                            data-phone="{{ $autoaddress->phone }}"
                                            data-country="{{ $autoaddress->country }}"
                                            data-address="{{ $autoaddress->address1 }}"
                                            data-city="{{ $autoaddress->city }}"
                                            data-location="{{ $autoaddress->pickup_location }}"
                                            data-readytime="{{ $autoaddress->pickup_ready_time }}"
                                            data-closetime="{{ $autoaddress->pickup_close_time }}"
                                            data-spec_ints="{{ $autoaddress->pickup_instructions }}"
                                            data-postcode="{{ $autoaddress->postcode }}">
                                            {{ $autoaddress->company }}, {{ $autoaddress->name }}
                                            </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>



                        <label for="company" class="col-lg-2 control-label">Company</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="company" name="company" type="text" class="form-control" placeholder="Company">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-4">
                                <input id="name" name="name" type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="col-lg-2 control-label">Phone</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="Phone" name="Phone" type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <label for="Peices" class="col-lg-2 control-label">Peices</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="Peices" name="Peices" type="text" class="form-control" placeholder="Peices">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-lg-2 control-label">Address</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="address" name="address" type="text" class="form-control" placeholder="address">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Address 1</label>
                            <div class="col-lg-4">
                                <input id="address1" name="address1" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-lg-2 control-label">Package Location</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="package_location" name="package_location" type="text" class="form-control" placeholder="Location">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Pickup Date</label>
                            <div class="col-lg-4">
                                <input id="pickupdate" name="pickupdate" type="text" class="form-control datepicker" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-lg-2 control-label">City</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="city" name="city" type="text" class="form-control" placeholder="City">
                            </div>
                            <label for="country" class="col-lg-2 control-label">Country</label>
                            <div class="col-lg-4">
                                <select class="form-control select-primary " id="countr" name="country">
                                    @include('layouts.includes.countries')
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postcode" class="col-lg-2 control-label">Postcode</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="postcode" name="postcode" type="text" class="form-control" placeholder="Postcode">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Ready Time (HH:MM)</label>
                            <div class="col-lg-4">
                                <input id="pickuptime" name="pickuptime" type="text" class="form-control timepicker" placeholder="HH:MM">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="closetime" class="col-lg-2 control-label">Close Time (HH:MM)</label>
                        <div class="col-lg-4">
                            <input id="closetime" name="closetime" type="text" class="form-control timepicker" placeholder="HH:MM">
                        </div>
                        <label for="postcode" class="col-lg-2 control-label">Special Intructions</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="spec_ints" name="spec_ints" type="text" class="form-control" placeholder="Special Intructions">
                            </div>

                        </div>
                    </div>


                    <br />
                    <br />
                    <br />
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>


            </div>

        </div>
    </div>

</div>


<script src="{{ asset('/assetsb/plugins/jquery/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('/assetsb/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript"
     src="/datetime/js/bootstrap-datetimepicker.min.js">
    </script>
<script>

 $('#Address1').change(function() {
    selectedOption = $('option:selected', this);
    $('input[name=name]').val( selectedOption.data('name') );
    $('input[name=company]').val( selectedOption.data('company') );
    $('input[name=email]').val( selectedOption.data('email') );
    $('input[name=Phone]').val( selectedOption.data('phone') );
    $('input[name=address]').val( selectedOption.data('address') );
    $('input[name=city]').val( selectedOption.data('city') );
    $('input[name=postcode]').val( selectedOption.data('postcode') );

    $('input[name=package_location]').val( selectedOption.data('location') );
    $('input[name=pickuptime]').val( selectedOption.data('readytime') );
    $('input[name=closetime]').val( selectedOption.data('closetime') );
    $('input[name=spec_ints]').val( selectedOption.data('spec_ints') );

    $('[name=country]').val( selectedOption.data('country') );
});


    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        clearBtn: true,
        calendarWeeks: false,
        autoclose: true,
        todayHighlight: true
    });


</script>
</div>




@stop