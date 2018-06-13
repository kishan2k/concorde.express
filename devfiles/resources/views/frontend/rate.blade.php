@extends('frontend.layouts.layout')
@section('PageTitle', 'Quoted Rate')
@section('content')

<?php 



$recCountry = Request::input('country');
$recCity = Request::input('city');
$recPostCode = Request::input('postcode');



$weight = Request::input('weight');

Shippo::setCredentials("kishan@ambasana.co.uk", "ambasana");



//example fromAddress array object
$fromAddress = array(
    'object_purpose' => 'QUOTE',
    'name' => 'Concorde Express',
    'company' => 'Concorde Express',
    'street1' => '66A Cannon Street',
    'city' => 'Leicester',
    'zip' => 'LE4 6NG',
    'country' => 'GB'
    );
//example fromAddress array object
$toAddress = array(
    'object_purpose' => 'QUOTE',
    'city' => $recCity,
    'zip' => $recPostCode,
    'country' => $recCountry,
    );
//example fromAddress array object
$parcel = array(
    'length'=> 1,
    'width'=> 1,
    'height'=> 1,
    'distance_unit'=> 'cm',
    'weight'=> $weight,
    'mass_unit'=> 'kg',
);

$shipment = Shippo_Shipment::create(
array(
    'object_purpose'=> 'QUOTE',
    'address_from'=> $fromAddress,
    'address_to'=> $toAddress,
    'parcel'=> $parcel,
    'submission_type'=> 'PICKUP'    
));
//Wait for rates to be generated
$attempts = 0;
while (($shipment["object_status"] == "QUEUED" || $shipment["object_status"] == "WAITING") && $attempts < 10){
    $shipment = Shippo_Shipment::retrieve($shipment["object_id"]);
    $attempts +=1;}
//Get all rates for shipment.
$allrates = Shippo_Shipment::get_shipping_rates(array('id'=> $shipment["object_id"]));
//Get the first rate in the rates results.
$rates = $allrates["results"];

    //dd($rates);

?>
<br>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<table class="table table-striped" id="rates">
      <thead>
        <tr>
          
          <th>Carrier</th>
          <th>Service</th>
          <th>Cost</th>
          <th>Delivery Time</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($rates as $rate)
      <?php ksort($rates) ?>
        <tr>
          <th scope="row"><img src="{{ $rate->provider_image_75 }}"> - {{$rate->provider}}</th>
          <td>{{ $rate->servicelevel_name }}</td>
          <td>£ {{$rate->amount_local * 1.75}}</td>
          <td>{{ $rate->days }}</td>
          <td><a href="#"><button class="btn btn-primay">Buy</button></a></td>
        </tr>  
    @endforeach      
      </tbody>
    </table>
    
    
 
@stop
    
@stop