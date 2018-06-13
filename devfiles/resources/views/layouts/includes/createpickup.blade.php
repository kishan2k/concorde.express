<?php
$autoaddresses = autoaddress::where('belongs_to', '=', Auth::user()->email)->get();
?>
<div class="col-md-8 center">
  <link href="http://jdewit.github.io/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
  <div class="">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Book Pickup</h3>
        </div>
        <div class="panel-body">
            <legend>Book Pickup</legend>
            <div class="panel-body border">
                <form method="POST" class="form-horizontal" action="{{ url('/pickup/create/created')}}" role="form">
                    <div class="form-group">

                        <div class="form-group">
                            <label for="company" class="col-lg-2 control-label">Choose Address</label>
                            <div class="bs-component">
                                <div class="col-lg-10">
                                    <select class="form-control select-primary" id="Address1" name="addresschoose">
                                       <option value="">Please Select</option>
                                            @foreach ($autoaddresses as $autoaddress)
                                            <option value="{{ $autoaddress->name }}"
                                            data-name="{{ $autoaddress->name }}"
                                            data-company="{{ $autoaddress->company }}"
                                            data-email="{{ $autoaddress->email }}"
                                            data-phone="{{ $autoaddress->phone }}"
                                            data-country="{{ $autoaddress->country }}"
                                            data-address="{{ $autoaddress->address1 }}"
                                            data-city="{{ $autoaddress->city }}"
                                            data-location="{{ $autoaddress->pickup_location }}"
                                            data-readytime="{{ $autoaddress->pickup_ready_time }}"
                                            data-closetime="{{ $autoaddress->pickup_close_time }}"
                                            data-spec_ints="{{ $autoaddress->pickup_instructions }}"
                                            data-postcode="{{ $autoaddress->postcode }}">
                                            {{ $autoaddress->company }}, {{ $autoaddress->name }}
                                            </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>



                        <label for="company" class="col-lg-2 control-label">Company</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="company" name="company" type="text" class="form-control" placeholder="Company">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-4">
                                <input id="name" name="name" type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="col-lg-2 control-label">Phone</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="Phone" name="Phone" type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <label for="Peices" class="col-lg-2 control-label">Peices</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="Peices" name="Peices" type="text" class="form-control" placeholder="Peices">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-lg-2 control-label">Address</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="address" name="address" type="text" class="form-control" placeholder="address">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Address 1</label>
                            <div class="col-lg-4">
                                <input id="address1" name="address1" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-lg-2 control-label">Package Location</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="package_location" name="package_location" type="text" class="form-control" placeholder="Location">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Pickup Date</label>
                            <div class="col-lg-4">
                                <input id="pickupdate" name="pickupdate" type="text" class="form-control datepicker" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-lg-2 control-label">City</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="city" name="city" type="text" class="form-control" placeholder="City">
                            </div>
                            <label for="country" class="col-lg-2 control-label">Country</label>
                            <div class="col-lg-4">
                                <select class="form-control select-primary " id="countr" name="country">
                                    @include('layouts.includes.countries')
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postcode" class="col-lg-2 control-label">Postcode</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="postcode" name="postcode" type="text" class="form-control" placeholder="Postcode">
                            </div>
                            <label for="name" class="col-lg-2 control-label">Ready Time (HH:MM)</label>
                            <div class="col-lg-4">
                                <input id="pickuptime" name="pickuptime" type="text" class="form-control timepicker" placeholder="HH:MM">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="closetime" class="col-lg-2 control-label">Close Time (HH:MM)</label>
                        <div class="col-lg-4">
                            <input id="closetime" name="closetime" type="text" class="form-control timepicker" placeholder="HH:MM">
                        </div>
                        <label for="postcode" class="col-lg-2 control-label">Special Intructions</label>
                        <div class="bs-component">
                            <div class="col-lg-4">
                                <input id="spec_ints" name="spec_ints" type="text" class="form-control" placeholder="Special Intructions">
                            </div>

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

</div>


<script src="{{ asset('/assetsb/plugins/jquery/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('/assetsb/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript"
     src="/datetime/js/bootstrap-datetimepicker.min.js">
    </script>
<script>

 $('#Address1').change(function() {
    selectedOption = $('option:selected', this);
    $('input[name=name]').val( selectedOption.data('name') );
    $('input[name=company]').val( selectedOption.data('company') );
    $('input[name=email]').val( selectedOption.data('email') );
    $('input[name=Phone]').val( selectedOption.data('phone') );
    $('input[name=address]').val( selectedOption.data('address') );
    $('input[name=city]').val( selectedOption.data('city') );
    $('input[name=postcode]').val( selectedOption.data('postcode') );

    $('input[name=package_location]').val( selectedOption.data('location') );
    $('input[name=pickuptime]').val( selectedOption.data('readytime') );
    $('input[name=closetime]').val( selectedOption.data('closetime') );
    $('input[name=spec_ints]').val( selectedOption.data('spec_ints') );

    $('[name=country]').val( selectedOption.data('country') );
});


    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        clearBtn: true,
        calendarWeeks: false,
        autoclose: true,
        todayHighlight: true
    });


</script>
</div>
