@extends('layouts.layout1')
@section('PageTitle', 'Create New Address entry')
@section('content')






<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>

<div>
    <div class="panel">
        <br>
        <div class="panel-heading">
            <span class="panel-title">Add Address</span>
        </div>
        <div class="panel-body border">
            <form method="POST" class="form-horizontal" action="/settings/address/create" role="form">
                
                <div class="form-group">
                    <label for="company" class="col-lg-2 control-label">Company</label>
                    <div class="bs-component">
                        <div class="col-lg-4">
                            <input id="company" name="company" required type="text" class="form-control" placeholder="Company">
                        </div>
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-4">
                            <input id="name" name="name" type="text" required class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-4">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <label for="phone" class="col-lg-2 control-label">Phone</label>
                    <div class="col-lg-4">
                        <input id="phone" name="phone" type="phone" class="form-control" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-4">
                        <select class="form-control w400"  name="country">
                            @include('layouts.includes.countries')
                        </select>
                    </div>
                    <label for="address" class="col-lg-2  control-label">Address</label>
                    <div class="col-lg-4">
                        <input id="address" name="address" required type="text" class="form-control" placeholder="Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address1" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-4">
                        <input id="address1" name="address1" type="text" class="form-control" placeholder="Address">
                    </div>
                     <label for="city" class="col-lg-2 control-label">City</label>
                    <div class="col-lg-4">
                        <input id="City" name="city" required type="text" class="form-control" placeholder="City">
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-lg-2 control-label">State</label>
                    <div class="col-lg-4">
                        <input id="state" name="state" type="text" class="form-control" placeholder="state">
                    </div>
                   
                    <label for="postcode" class="col-lg-2 control-label">Postcode / Zip</label>
                    <div class="col-lg-4">
                        <input id="postcode" name="postcode" type="text" class="form-control" placeholder="Postcode / Zip">
                    </div>
                </div>
                <div class="form-group">
                    <label for="location" class="col-lg-2 control-label">Pickup Location</label>
                    <div class="col-lg-4">
                        <input id="location" name="location" type="text" class="form-control" placeholder="Location">
                    </div>
                   
                    <label for="readytime" class="col-lg-2 control-label">Pick Up Ready Time (HH:MM 24hr)</label>
                    <div class="col-lg-4">
                        <input id="readytime" name="readytime" type="text" class="form-control" placeholder="12:00">
                    </div>
                </div>
                <div class="form-group">
                   <label for="closetime" class="col-lg-2 control-label">Pick Up Close Time (HH:MM 24hr)</label>
                    <div class="col-lg-4">
                        <input id="closetime" name="closetime" type="text" class="form-control" placeholder="12:00">
                    </div>
                   
                    <label for="instructions" class="col-lg-2 control-label">Instructions</label>
                    <div class="col-lg-4">
                        <input id="instructions" name="instructions" type="text" class="form-control" placeholder="Special Instructions">
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



