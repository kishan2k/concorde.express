@extends('layouts.layout1')
@section('PageTitle', 'View Pickup')
@section('content')
<div class="col-md-8 center">
	<div class="panel">
		<div class="panel-body">
		<h1>Pickup For {{$pickupid->name}}, {{$pickupid->company}}</h1>
		<h2>Ready Time - {{ $pickupid->collection_ready_time}}, Close time - {{$pickupid->collection_close_time}}, <strong>{{ $pickupid->collection_date }}</strong> </h2>
		<h2>Collcetion Confirmation Number : <strong>{{$pickupid->collection_confirmation_number}}</strong></h2>
		<hr>
		<h3>Location</h3>

		<h4>{{$pickupid->address}} {{$pickupid->address1}}
		<br>
		{{$pickupid->postcode}}<br>
		{{$pickupid->city}}<br>
		{{$pickupid->country}}</h4>
		<hr>
		<h3>Contact</h3>
		<h4>{{ $pickupid->company }}, {{ $pickupid->name }}<br>
		{{ $pickupid->phone }}
		</h4>
		<hr>
		<h3>Pickup Information</h3>
		<h4>Peice(s) - <strong>{{$pickupid->peices}}</strong></h4>
		<h4>Location - <strong>{{$pickupid->location}}</strong></h4>
		<h4>Special Instructions - <strong>{{$pickupid->special_instructions}}</strong></h4>

		<hr>
		<div class="col-md-4 center">
	<div class="btn-group btn-group-justified" role="group">
			<a href="{{ url('pickup') }}"><button class="btn btn-primary ">Go Back</button></a>

			<a href="cancel"><button class="btn btn-danger">Cancel</button></a>


                           </div>
		</div>
		</div>
	</div>
</div>
@stop
