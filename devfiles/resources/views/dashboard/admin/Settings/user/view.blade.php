@extends('layouts.layout1')
@section('PageTitle', 'User')
@section('content')
<?php
use App\shipment;
$useremail = $user->email;
$shipments = shipment::where('booked_by', $useremail)
               ->orderBy('created_at', 'desc')
               ->take(5)
               ->get();
?>

	<div class="row">
		<div class="col-md-6">
			<div class="panel">				
				<div class="panel-body center">
					<legend>
						Address & Info
					</legend>
					<address>
						<h1>{{ $user->company }}</h1>
						<h2>{{ $user->name }}</h2>
						<h4>{{ $user->address1 }}</h4>
						<h4>@if (isset($user->address2)) {{ $user->address2 }} @endif</h4>
						<h4>{{ $user->city }}</h4>
						<h4>{{ $user->state }}</h4>
						<h4>{{ $user->postcode }}</h4>
						<h4>{{ $user->country }}</h4>
						<h4>{{ $user->phone }}</h4>
						<h4>{{ $user->email }}</h4>
					</address>
				</div>
			</div>
		</div>


		<div class="col-md-6">
			<div class="panel">				
				<div class="panel-body center">
					<legend>
						Shipping Info
					</legend>
					<ul>
					@foreach ($shipments as $shipment)
						<li>{{$shipment->tracking_number }}</li>

					@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	


@stop
