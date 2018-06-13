@extends('layouts.layout1')
@section('PageTitle', 'Add Credit')
@section('content')
<?php
$currentuseremail = Auth::user()->email;
$credit = Auth::user()->credit;
$rawcredit1 = $rawcredit2 / 103.4 - 20;
$key = Config::get('stripe.stripe_publishable');

?>

    <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Add Credit</h4>
                                </div>
                                <div class="panel-body">
                                    <h1>Your Remaining Credit is £{{$credit}}</h1>
                                    <hr>

                                    <p>Transaction fee applies (3.4% + 20p) as a standard</p>
                                    <br>
                                    <form action="{{ url('settings/credit/add') }}" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{$key}}"
    data-email="{{ $currentuseremail }}"
    data-amount="{{$rawcredit2}}"
    data-currency="gbp"
    data-name="Concorde Express TopUp"
    data-description="Credit TopUp {{$currentuseremail}}"
    data-image="{{ asset('/assets/img/75_Logo.png') }}">
  </script>
  <input type="hidden" value="{{$rawcredit2}}" name="topupvalue">
  <input type="hidden" value="{{$rawcredit1}}" name="topupvalue1">
</form>
                                </div>
                            </div>
                        </div>



@stop
