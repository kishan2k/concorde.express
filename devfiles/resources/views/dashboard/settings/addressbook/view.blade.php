
@extends('layouts.layout1')
@section('PageTitle', 'Address View')
@section('content')


<div class="container">
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="panel-title">Address</span>
    </div>
    <div class="panel-body border">
    <h2>
        <address>
        <strong>{{ $address->name }}</strong>
        <br> {{ $address->company }}
        <br> {{ $address->address1 }}
        <br> {{ $address->address2 }}
        <br> {{ $address->city }}
        <br> {{ $address->postcode }}
        <br> {{ $address->state }}
        <br> {{ $address->country }}
        <br> {{ $address->phone }}
        <br> {{ $address->email }}
        </address>
        </h2>
        <hr>
        <br> Ready Time : {{ $address->pickup_ready_time }}
        <br> Close Time : {{ $address->pickup_close_time }}
        <br> Package Location : {{ $address->pickup_location }}
        <br> Special Instructions : {{ $address->pickup_instructions }}
    </div>
</div>
</div>

@stop