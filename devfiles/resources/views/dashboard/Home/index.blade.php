@extends('layouts.layout1')
@section('PageTitle', 'Home')
@section('content')
<?php
use App\shipment;
use App\autoboxes;

use App\Classes\packpin;

$shipments = shipment::where('booked_by', '=', Auth::user()->email)->get();



$numShipments = count($shipments)

?>

@include('layouts.includes.credit')
<br>
<div class="col-md-4">
<div class="pp_track_wrap" data-button-position="right" data-button-width="" data-button-height="default" data-button-color="#ffffff" data-button-background="#e51c23" data-button-carriers='[]' data-button-language="en" data-button-number="" data-button-hide-number="0" data-domain="button.packpin.com"></div>
</div>
<div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter">{{ $numShipments }}</p>
                                        <span class="info-box-title">Shipments booked</span>
                                    </div>
                                    
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


<div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="">
                                        <a href="http://email.concordexpress.uk" target="_blank"><button class="btn btn-primary">View Mail</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>






@stop