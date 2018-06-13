@extends('layouts.layout1')
@section('PageTitle', 'Home')
@section('content')

<?php
use App\autoaddress;
use App\autoboxes;
$autoaddresses = autoaddress::where('belongs_to', '=', Auth::user()->email)->get();
$boxes = autoboxes::all();

?>




<div class="">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs nav-justified" role="tablist">
                                            <li role="presentation" class=""><a href="#tab1" data-toggle="tab">Sender</a></li>
                                            <li role="presentation"><a href="#tab2" data-toggle="tab">Reciver</a></li>
                                            <li role="presentation"><a href="#tab3" data-toggle="tab"></i>Shipment</a></li>
                                            <li role="presentation"><a href="#tab4" data-toggle="tab"></i>Finish</a></li>
                                        </ul>


                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-info  active progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm" method="POST" action="{{ url('local/shipping/book')}}" role="form">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="Address" class="col-lg-2 control-label">Sender</label>
                                                                    <select id="Address" class="basic-single form-control w200">
                                                                        <option value="">Please Select</option>
                                                                        @foreach ($autoaddresses as $autoaddress)
                                                                        <option value="{{ $autoaddress->name }}" data-name="{{ $autoaddress->name }}" data-company="{{ $autoaddress->company }}"
                                                                            data-email="{{ $autoaddress->email }}" data-phone="{{ $autoaddress->phone }}" data-country="{{ $autoaddress->country }}"
                                                                        data-address="{{ $autoaddress->address1 }}" data-city="{{ $autoaddress->city }}" data-postcode="{{ $autoaddress->postcode }}">{{ $autoaddress->company }} - {{ $autoaddress->name }} - {{ $autoaddress->address1 }} - {{ $autoaddress->country }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group col-md-6">
                                                                    <label for="sender_company">Company</label>
                                                                    <input type="text" class="form-control" name="sender_company" id="sender_company" placeholder="Company">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="sender_name">Name</label>
                                                                    <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="Name">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="sender_email">Email</label>
                                                                    <input type="text" class="form-control" name="sender_email" id="sender_email" placeholder="Email">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="sender_phone">Phone</label>
                                                                    <input type="text" class="form-control" name="sender_phone" id="sender_phone" placeholder="Phone">
                                                                </div>
                                                                 <div class="form-group col-md-6">
                                                                    <label for="sender_country">Country</label>
                                                                    <select class="form-control select-primary w400" id="sender_country" name="sender_country">
                                                                        @include('layouts.includes.countries')
                                                                    </select>
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="sender_address">Address</label>
                                                                    <input type="text" class="form-control" name="sender_address" maxlength="35" id="sender_address" placeholder="Address">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="sender_address1">Address 1</label>
                                                                    <input type="text" class="form-control" name="sender_address1" maxlength="35" id="sender_address1" placeholder="Address">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="sender_state">state</label>
                                                                    <input type="text" class="form-control" name="sender_state" maxlength="35" id="sender_state" placeholder="State">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="sender_city">City</label>
                                                                    <input type="text" class="form-control" name="sender_city" maxlength="35" id="sender_city" placeholder="City">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="sender_postcode">PostCode / Zip</label>
                                                                    <input type="text" class="form-control" name="sender_postcode" id="sender_postcode" placeholder="Postcode / Zip">
                                                              </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="Address" class="col-lg-2 control-label">Reciver</label>
                                                                    <select id="Address1" class="basic-single form-control w200">
                                                                        <option value="">Please Select</option>
                                                                        @foreach ($autoaddresses as $autoaddress)
                                                                        <option value="{{ $autoaddress->name }}" data-name="{{ $autoaddress->name }}" data-company="{{ $autoaddress->company }}"
                                                                            data-email="{{ $autoaddress->email }}" data-phone="{{ $autoaddress->phone }}" data-country="{{ $autoaddress->country }}"
                                                                        data-address="{{ $autoaddress->address1 }}" data-city="{{ $autoaddress->city }}" data-postcode="{{ $autoaddress->postcode }}">{{ $autoaddress->company }} - {{ $autoaddress->name }} - {{ $autoaddress->address1 }} - {{ $autoaddress->country }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group col-md-6">
                                                                    <label for="rec_company">Company</label>
                                                                    <input type="text" class="form-control" name="rec_company" id="rec_company" placeholder="Company">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="rec_name">Name</label>
                                                                    <input type="text" class="form-control" name="rec_name" id="rec_name" placeholder="Name">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="rec_email">Email</label>
                                                                    <input type="text" class="form-control" name="rec_email" id="rec_email" placeholder="Email">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="rec_phone">Phone</label>
                                                                    <input type="text" class="form-control" name="rec_phone" id="rec_phone" placeholder="Phone">
                                                                </div>
                                                                 <div class="form-group col-md-6">
                                                                    <label for="rec_country">Country</label>
                                                                    <select class="form-control select-primary w400" id="rec_country" name="rec_country">
                                                                    @include('layouts.includes.countries')
                                                                </select>
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="rec_address">Address</label>
                                                                    <input type="text" class="form-control" maxlength="35" name="rec_address" id="rec_address" placeholder="Address">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="rec_address1">Address 1</label>
                                                                    <input type="text" class="form-control" maxlength="35" name="rec_address1" id="rec_address1" placeholder="Address">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="rec_state">state</label>
                                                                    <input type="text" class="form-control" maxlength="35" name="rec_state" id="rec_state" placeholder="State">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="rec_city">City</label>
                                                                    <input type="text" class="form-control" maxlength="35" name="rec_city" id="rec_city" placeholder="City">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="rec_postcode">PostCode / Zip</label>
                                                                    <input type="text" class="form-control" name="rec_postcode" id="rec_postcode" placeholder="Postcode / Zip">
                                                              </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-12">
                                                                    <label for="boxes" class="col-lg-2 control-label">Templates</label>
                                                                    <select id="boxes" class="basic-single form-control w200">
                                                                        <option value="">Please Select</option>
                                                                        @foreach ($boxes as $box)
                                                                        <option value="{{$box->carrier}}" data-name="{{$box->name}}" data-carrier="{{$box->carrier}}" data-length="{{$box->length}}" data-width="{{$box->width}}"
                                                                        data-height="{{$box->height}}" data-weight="{{$box->weight}}"
                                                                        >{{ $box->carrier }} - {{$box->name}} {{$box->weight}}KG </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="length">Length</label>
                                                                <input type="text" class="form-control" name="length" id="length" placeholder="Length">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="width">Width</label>
                                                                <input type="text" class="form-control" name="width" id="width" placeholder="Width">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="height">Height</label>
                                                                <input type="text" class="form-control" name="height" id="height" placeholder="Height">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="weight">Weight</label>
                                                                <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                    <label for="ref">Refrence</label>
                                                                    <input type="text" class="form-control" name="ref" id="ref">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                    <label for="content_desc">Content Description</label>
                                                                    <input type="text" class="form-control" name="content_desc" id="content_desc">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                    <label for="quantity">Quantity</label>
                                                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                    <label for="customs_value">Value (£)</label>
                                                                    <input type="text" class="form-control" name="customs_value" id="customs_value">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                    <label for="content_type">Content Type</label>
                                                                  <select class="form-control" name="content_type" id="content_type">
                                                                      @include('layouts.includes.contenttypes')
                                                                  </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab4">
                                                    <h2 class="no-s">Thank You!</h2>
                                                    <div class="alert alert-info m-t-sm m-b-lg" role="alert">
                                                        Click Submit to get the rates for the corresponding shipment
                                                    </div>
                                                    <button class="btn btn-success btn-large" type="submit">submit</button>
                                                </div>
                                                <ul class="pager wizard">
                                                    <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                                    <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                 <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>


                 <!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//t.concordexpress.uk/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//t.concordexpress.uk/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

<script>
$('#Address').change(function() {
    selectedOption = $('option:selected', this);
    $('input[name=sender_name]').val( selectedOption.data('name') );
    $('input[name=sender_company]').val( selectedOption.data('company') );
    $('input[name=sender_email]').val( selectedOption.data('email') );
    $('input[name=sender_phone]').val( selectedOption.data('phone') );
    $('input[name=sender_address]').val( selectedOption.data('address') );
    $('input[name=sender_city]').val( selectedOption.data('city') );
    $('input[name=sender_postcode]').val( selectedOption.data('postcode') );
    $('[name=sender_country]').val( selectedOption.data('country') );
});
    $('#Address1').change(function() {
    selectedOption = $('option:selected', this);
    $('input[name=rec_name]').val( selectedOption.data('name') );
    $('input[name=rec_company]').val( selectedOption.data('company') );
    $('input[name=rec_email]').val( selectedOption.data('email') );
    $('input[name=rec_phone]').val( selectedOption.data('phone') );
    $('input[name=rec_address]').val( selectedOption.data('address') );
    $('input[name=rec_city]').val( selectedOption.data('city') );
    $('input[name=rec_postcode]').val( selectedOption.data('postcode') );
    $('[name=rec_country]').val( selectedOption.data('country') );
});


$('#boxes').change(function() {
    selectedOption = $('option:selected', this);
    $('input[name=length]').val( selectedOption.data('length') );
    $('input[name=width]').val( selectedOption.data('width') );
    $('input[name=height]').val( selectedOption.data('height') );
    $('input[name=weight]').val( selectedOption.data('weight') );
});

</script>




                        @stop