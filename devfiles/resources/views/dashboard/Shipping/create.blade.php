@extends('layouts.layout1')
@section('PageTitle', 'Book Shipment')
@section('content')
<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
<link href="../vendor/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<script src="../vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="../vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="../vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<?php
use App\shipment;
$shipments = shipment::all();
foreach ($shipments as $shipment) {}
;
$currentuser = Auth::user()->name;
$currentuseremail = Auth::user()->email;
$userrate = Auth::user()->rate;
$senderCompany = Request::input('sender_company');
$senderName = Request::input('sender_name');
$senderEmail = Request::input('sender_email');
$senderPhone = Request::input('sender_phone');
$senderCountry = Request::input('sender_country');
$senderAddress = Request::input('sender_address');
$senderAddress1 = Request::input('sender_address1');
$senderCity = Request::input('sender_city');
$senderState = Request::input('sender_state');
$senderPostCode = Request::input('sender_postcode');
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
$ref = Request::input('ref');
$contentDesc = Request::input('content_desc');
$quantity = Request::input('quantity');
$netWeight = Request::input('netWeight');
$customs_value = Request::input('customs_value');
$content_type = Request::input('content_type');
$length = Request::input('length');
$width = Request::input('width');
$height = Request::input('height');
$weight = Request::input('weight');
$testmode = Auth::user()->test_mode;
if ($testmode == false) {
	 
            $liveuser = Config::get('carrier.shippo_live_username');
            $livepass = Config::get('carrier.shippo_live_password');
			Shippo::setCredentials("$liveuser", "$livepass");
} else {
	$testuser = Config::get('carrier.shippo_test_username');
            $testpass = Config::get('carrier.shippo_test_password');
			Shippo::setCredentials("$testuser", "$testpass");

}
//example fromAddress array object
$fromAddress = array(
	'object_purpose' => 'PURCHASE',
	'name' => $senderName,
	'company' => $senderCompany,
	'street1' => $senderAddress,
	'street2' => $senderAddress1,
	'city' => $senderCity,
	'state' => $senderState,
	'zip' => $senderPostCode,
	'country' => $senderCountry,
	'phone' => $senderPhone,
	'email' => $senderEmail);
//example fromAddress array object
$toAddress = array(
	'object_purpose' => 'PURCHASE',
	'name' => $recName,
	'company' => $recCompany,
	'street1' => $recAddress,
	'street2' => $recAddress1,
	'city' => $recCity,
	'state' => $recState,
	'zip' => $recPostCode,
	'country' => $recCountry,
	'phone' => $recPhone,
	'email' => $recEmail);
//example fromAddress array object
$parcel = array(
	'length' => $length,
	'width' => $weight,
	'height' => $height,
	'distance_unit' => 'cm',
	'weight' => $weight,
	'mass_unit' => 'kg',
);
//example CustomsItems object. This is only required for int'l shipment only.
$customs_item = array(
	'description' => $contentDesc,
	'quantity' => $quantity,
	'net_weight' => $weight,
	'mass_unit' => 'kg',
	'value_amount' => $customs_value,
	'value_currency' => 'GBP',
	'origin_country' => 'GB');
#Creating the CustomsDeclaration
#(CustomsDeclarations are only required for international shipments)
$customs_declaration = Shippo_CustomsDeclaration::create(
	array(
		'contents_type' => $content_type,
		'contents_explanation' => $contentDesc,
		'non_delivery_option' => 'RETURN',
		'certify' => 'true',
		'certify_signer' => $senderName,
		'items' => array($customs_item),
	));

try {
	$shipment = Shippo_Shipment::create(
		array(
			'object_purpose' => 'PURCHASE',
			'address_from' => $fromAddress,
			'address_to' => $toAddress,
			'parcel' => $parcel,
			'submission_type' => 'DROPOFF',
			'reference_1' => $currentuser,
			'reference_2' => $ref,
			'metadata' => $currentuseremail,
			'customs_declaration' => $customs_declaration["object_id"],
		));
//Wait for rates to be generated
	$attempts = 0;
	while (($shipment["object_status"] == "QUEUED" || $shipment["object_status"] == "WAITING") && $attempts < 50) {
		$shipment = Shippo_Shipment::retrieve($shipment["object_id"]);
		$attempts += 1;}
//Get all rates for shipment.
	$rates = Shippo_Shipment::get_shipping_rates(array('id' => $shipment["object_id"]));
//Get the first rate in the rates results.
	$rate = $rates["results"];

} catch (Exception $e) {


}

//dd($shipment);


?>
@if (isset($e))
@include('layouts.includes.exception')
@endif


@if (isset($rate))
<div class="">
  <div class="panel panel-visible" id="spy3">
    <div class="panel-heading">
      <div class="panel-title hidden-xs">Express Services</div>
    </div>
    <div class="panel-body pn">
      <table class="table  table-primary " id="datatable3">
        <thead>
          <tr>
            <th>Carrier</th>
            <th>Service</th>
            <th>Rate</th>
            <th>Delivery Time</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rate as $rt)
          <tr>
            <form action="{{ url('shipment/book/new') }}" method="POST">
              <td><img src="{{ $rt['provider_image_75'] }}"> </img>{{ $rt['provider'] }}</td>
              <td>{{ $rt['servicelevel_name'] }}</td>
              <td>£ {{ $rt['amount'] * $userrate}}</td>
              <td>{{ $rt['days'] }}</td>
              <td><a><button value="{{ $rt['object_id'] }}" type="submit" name="rate_object_id"  class="btn btn-primary">Book</button>
                <input type="hidden" value="{{ $rt['amount'] * $userrate}}" name="amount">
                <input type="hidden" value="{{ $rt['amount']}}" name="amountr">
                <input type="hidden" value="{{ $senderCompany  }}" name="sender_company">
                <input type="hidden" value="{{ $senderName  }}" name="sender_name">
                <input type="hidden" value="{{ $senderEmail }}" name="sender_email">
                <input type="hidden" value="{{ $senderPhone }}" name="sender_phone">
                <input type="hidden" value="{{ $senderAddress }}" name="sender_address">
                <input type="hidden" value="{{ $senderAddress1 }}" name="sender_address1">
                <input type="hidden" value="{{ $senderState }}" name="sender_state">
                <input type="hidden" value="{{ $senderCity }}" name="sender_city">
                <input type="hidden" value="{{ $senderPostCode }}" name="sender_postcode">
                <input type="hidden" value="{{ $senderCountry }}" name="sender_country">
                <input type="hidden" value="{{ $rt['servicelevel_name'] }}" name="service_type">
                <input type="hidden" value="{{ $rt['provider'] }}" name="service_provider">
                <input type="hidden" value="{{ $recCompany  }}" name="rec_company">
                <input type="hidden" value="{{ $recName  }}" name="rec_name">
                <input type="hidden" value="{{ $recEmail }}" name="rec_email">
                <input type="hidden" value="{{ $recPhone }}" name="rec_phone">
                <input type="hidden" value="{{ $recAddress }}" name="rec_address">
                <input type="hidden" value="{{ $recAddress1 }}" name="rec_address1">
                <input type="hidden" value="{{ $recState }}" name="rec_state">
                <input type="hidden" value="{{ $customs_value }}" name="customs_value">
                <input type="hidden" value="{{ $recCity }}" name="rec_city">
                <input type="hidden" value="{{ $recPostCode }}" name="rec_postcode">
                <input type="hidden" value="{{ $recCountry }}" name="rec_country">
                <input type="hidden" value="{{ $shipment["object_id"] }}" name="shipment_id">
                <input type="hidden" value="{{ $length }}" name="length">
                <input type="hidden" value="{{ $width }}" name="width">
                <input type="hidden" value="{{ $height }}" name="height">
                <input type="hidden" value="{{ $weight }}" name="weight">
                <input type="hidden" value="{{ $ref }}" name="ref">
				<input type="hidden" value="{{ $contentDesc }}" name="content_desc">
                <input type="hidden" value="{{ $content_type }}" name="content_type">
              </a></td>
            </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endif
















<!-- Piwik -->
<script type="text/javascript">
var _paq = _paq || [];
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function() {
var u="//t.concordexpress.uk/";
_paq.push(['setTrackerUrl', u+'piwik.php']);
_paq.push(['setSiteId', 1]);
var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
})();
</script>
<noscript><p><img src="//t.concordexpress.uk/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
<script>
$('#datatable3').dataTable({
"aoColumnDefs": [{
'bSortable': true,
'aTargets': [-1]
}],
"oLanguage": {
"oPaginate": {
"sPrevious": "Prev",
"sNext": "Next"
}
},
"order": [[ 2, "asc" ]],
"iDisplayLength": 50,
"aLengthMenu": [
[5, 10, 25, 50, -1],
[5, 10, 25, 50, "All"]
],
"sDom": '',
"oTableTools": {
"sSwfPath": "/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
}
});
$('#datatable4').dataTable({
"aoColumnDefs": [{
'bSortable': true,
'aTargets': [-1]
}],
"oLanguage": {
"oPaginate": {
"sPrevious": "Prev",
"sNext": "Next"
}
},
"order": [[ 0, "desc" ]],
"iDisplayLength": 15,
"aLengthMenu": [
[5, 10, 25, 50, -1],
[5, 10, 25, 50, "All"]
],
"sDom": '',
"oTableTools": {
"sSwfPath": "/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
}
});
</script>
@stop