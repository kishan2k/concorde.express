@extends('layouts.layout1')
@section('PageTitle', 'Book Shipment')
@section('content')
<style>
.center {
    text-align: center;
}
</style>
<?php
if ($shipment->booked_by !== Auth::user()->email) {
	if (Auth::user()->admin == true) {

	} else {
		return "this does not belong to you";
	}}

if ($shipment->status == "ERROR") {
	echo "<div class=\"col-md-12\"><div class=\"panel panel-danger\">
            <div class=\"panel-heading center\">
                    <span class=\"panel-title\">Shipment Notice</span>
            </div>
            <div class=\"panel-body center\">
            <h1>$shipment->id</h1>
            <br>
                    <h2>Please Contact Support</h2>
            </div>
    </div>
</div>";
}
;

if ($shipment->status == "ERROR") {echo '<style type="text/css">#tracking{
display:none;
}</style>';}
?>
<div id="tracking">
<div class="col-md-3">

<div class="panel panel-info">
    <div class="panel-heading center">
        <span class="panel-title">Shipment Tracking Number</span>
    </div>
    <div class="panel-body center">
        <h2>{{ $shipment->tracking_number }}</h2>

    </div>
</div>
</div>
<?php

;?>
<div class="col-md-3">
    <div class="panel panel-info">
        <div class="panel-heading center">
            <span class="panel-title">Status</span>
        </div>
        <div class="panel-body center">
            <h2>{{ $shipment->status }}</h2>

        </div>
    </div>
</div>


<div class="col-md-3">
    <div class="panel panel-info">
        <div class="panel-heading center">
            <span class="panel-title">Provider &amp; Service Type</span>
        </div>
        <div class="panel-body center">
            <h2>{{ $shipment->shipment_provider }}</h2>
            <hr>
            <h3>{{ $shipment->shipment_class }}</h3>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-info">
        <div class="panel-heading center">
            <span class="panel-title">Booking Date </span>
        </div>
        <div class="panel-body center">
            <h2>{{ date("d F Y",strtotime($shipment->shipment_booking_date)) }} at {{ date("g:ha",strtotime($shipment->shipment_booking_date)) }}</h2>
        </div>
    </div>
</div>

<div class="col-md-6">
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="panel-title">Sender</span>
    </div>
    <div class="panel-body border">
        <h2>{{ $shipment->sender_company }}</h2>
        <h3>{{ $shipment->sender_name }}</h3>
        <h4>{{ $shipment->sender_address1 }}</h4>
        <h4>{{ $shipment->sender_address2 }}</h4>
        <h4>{{ $shipment->sender_city }}</h4>
        <h4>{{ $shipment->sender_postcode }}</h4>
        <h4>{{ $shipment->sender_state }}</h4>
        <h4>{{ $shipment->sender_country }}</h4>
        <h4>{{$shipment->sender_email}}</h4>
        <h4>Phone:  {{ $shipment->sender_phone }}</h4>
    </div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="panel-title">receiver</span>
    </div>
    <div class="panel-body border">
    <h2>
       <h2>{{ $shipment->rec_company }}</h2>
        <h3>{{ $shipment->rec_name }}</h3>
        <h4>{{ $shipment->rec_address1 }}</h4>
        <h4>{{ $shipment->rec_address2 }}</h4>
        <h4>{{ $shipment->rec_city }}</h4>
        <h4>{{ $shipment->rec_postcode }}</h4>
        <h4>{{ $shipment->rec_state }}</h4>
        <h4>{{ $shipment->rec_country }}</h4>
        <h4>{{$shipment->rec_email}}</h4>
        <h4>Phone:  {{ $shipment->rec_phone }}</h4>
    </div>
</div>
</div>
<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">Label </span>
        </div>
        <div class="panel-body center">
            <br>
            <a href="{{ $shipment->label_url }}" target="_blank"><button class="btn btn-primary">View Label</button></a>
        </div>
    </div>
</div>
@if ($shipment->customs_url != NULL)
<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">Commerial Invoice </span>
        </div>
        <div class="panel-body center">
            <br>
            <a href="{{ $shipment->customs_url }}" target="_blank"><button class="btn btn-primary">Commercial Invoice</button></a>
        </div>
    </div>
</div>
@endif
<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">Track </span>
        </div>
        <div class="panel-body center">
            <br>
            <a href="{{ $shipment->tracking_url }}" target="_blank"><button class="btn btn-primary">Track</button></a>
        </div>
    </div>
</div>

<?php
$calc = $shipment->shipment_dimension_L * $shipment->shipment_dimension_W * $shipment->shipment_dimension_H;
$vol = $calc / 5000;

?>


<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">Cost </span>
        </div>
        <div class="panel-body center">
            <h2>£{{ $shipment->shipment_cost }}</h2>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">L x W x H </span>
        </div>
        <div class="panel-body center">
            <h2>{{ $shipment->shipment_dimension_L }}CM  x  {{ $shipment->shipment_dimension_W }}CM  x  {{ $shipment->shipment_dimension_H }}CM</h2>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">Actual Weight</span>
        </div>
        <div class="panel-body center">
            <h2>{{ $shipment->shipment_weight }} KG</h2>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">Calculated Weight</span>
        </div>
        <div class="panel-body center">
            <h2>{{ $vol }} KG</h2>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading center">
            <span class="panel-title">Reference</span>
        </div>
        <div class="panel-body center">
            <h2>{{ $shipment->reference }}</h2>
        </div>
    </div>
</div>


</div>

<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;

    js.src = "//button.packpin.com/assets/js/script_button.min.js?v=1.13";

    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'pp-jssdk'));</script>
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

@stop