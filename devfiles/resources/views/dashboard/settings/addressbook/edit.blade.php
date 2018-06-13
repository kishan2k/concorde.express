@extends('layouts.layout1')
@section('PageTitle', 'Edit Address')
@section('content')






<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>

<div>
    <div class="panel">
        <br>
        <div class="panel-heading">
            <span class="panel-title">Add Address</span>
        </div>
        <div class="panel-body border">
            <form method="POST" class="form-horizontal" action="/settings/address/{{ $address->id }}/edit" role="form">
                
                  <div class="form-group">
                    <label for="company" class="col-lg-2 control-label">Company</label>
                    <div class="bs-component">
                        <div class="col-lg-4">
                            <input id="company" name="company" required type="text" class="form-control" value="{{ $address->company }}" placeholder="{{ $address->company }}">
                        </div>
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-4">
                            <input id="name" name="name" type="text"  value="{{ $address->name }}" required class="form-control" placeholder="{{ $address->name }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-4">
                        <input id="email"  value="{{ $address->email }}" name="email" type="email" class="form-control" placeholder="{{ $address->email }}">
                    </div>
                    <label for="phone" class="col-lg-2 control-label">Phone</label>
                    <div class="col-lg-4">
                        <input id="phone"  value="{{ $address->phone }}" name="phone" type="phone" class="form-control" placeholder="{{ $address->phone }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-4">
                        <select class="form-control w400"  value="{{ $address->country }}" name="country">
                            @include('layouts.includes.countries')
                        </select>
                    </div>
                    <label for="address" class="col-lg-2  control-label">Address</label>
                    <div class="col-lg-4">
                        <input id="address" name="address"  value="{{ $address->address1 }}" required type="text" class="form-control" placeholder="{{ $address->address1 }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address1" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-4">
                        <input id="address1" name="address1"  value="{{ $address->address2 }}" type="text" class="form-control" placeholder="{{ $address->address2 }}">
                    </div>
                     <label for="city" class="col-lg-2 control-label">City</label>
                    <div class="col-lg-4">
                        <input id="City" name="city"  value="{{ $address->city }}" required type="text" class="form-control" placeholder="{{ $address->city }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-lg-2 control-label">State</label>
                    <div class="col-lg-4">
                        <input id="state" name="state"  value="{{ $address->state }}"  type="text" class="form-control" placeholder="{{ $address->state }}">
                    </div>
                   
                    <label for="postcode" class="col-lg-2 control-label">Postcode / Zip</label>
                    <div class="col-lg-4">
                        <input id="postcode" name="postcode"  value="{{ $address->postcode }}"   type="text" class="form-control" placeholder="{{ $address->postcode }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="location" class="col-lg-2 control-label">Pickup Location</label>
                    <div class="col-lg-4">
                        <input id="location" name="location"  value="{{ $address->pickup_location }}"  type="text" class="form-control" placeholder="{{ $address->pickup_location }}">
                    </div>
                   
                    <label for="readytime" class="col-lg-2 control-label">Pick Up Ready Time (HH:MM 24hr)</label>
                    <div class="col-lg-4">
                        <input id="readytime" name="readytime" type="text"  value="{{ $address->pickup_ready_time }}"  class="form-control" placeholder="{{ $address->pickup_ready_time }}">
                    </div>
                </div>
                <div class="form-group">
                   <label for="closetime" class="col-lg-2 control-label">Pick Up Close Time (HH:MM 24hr)</label>
                    <div class="col-lg-4">
                        <input id="closetime" name="closetime"  value="{{ $address->pickup_close_time }}" type="text" class="form-control" placeholder="{{ $address->pickup_close_time }}">
                    </div>
                   
                    <label for="instructions" class="col-lg-2 control-label">Instructions</label>
                    <div class="col-lg-4">
                        <input id="instructions"  value="{{ $address->pickup_instructions }}" name="instructions" type="text" class="form-control" placeholder="{{ $address->pickup_instructions }}">
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
@stop



