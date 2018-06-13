@extends('layouts.layout1')
@section('PageTitle', 'Add Credit')
@section('content')

<?php
$currentuseremail = Auth::user()->email;
$credit = Auth::user()->credit;
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
                                    <form action="{{ url('settings/credit') }}" method="POST">
  										<input type="text" name="credit">
  									<button class="btn btn-info" type="submit">Add</button>
  									</form>
                                </div>
                            </div>
                        </div>



@stop
