@extends('layouts.layout1')
@section('PageTitle', 'Create Pickup')
@section('content')
<?php
use App\pickup;
$url = Config::get('carrier.dhl_xml_url');

$Company = Request::input('company');
$Name = Request::input('name');
$Address = Request::input('address');
$Address1 = Request::input('address1');
$Location = Request::input('package_location');
$Date = Request::input('pickupdate');
$City = Request::input('city');
$Country = Request::input('country');
$Postcode = Request::input('postcode');
$Pickuptime = Request::input('pickuptime');
$Closetime = Request::input('closetime');
$Spec = Request::input('spec_ints');
$Phone = Request::input('Phone');
$Peices = Request::input('Peices');
$currentuseremail = Auth::user()->email;

$data = '<?xml version="1.0" encoding="UTF-8"?>
<req:BookPURequest xsi:schemaLocation="http://www.dhl.com book-pickup-global-req.xsd" schemaVersion="1.0" xmlns:req="http://www.dhl.com" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <Request>
    <ServiceHeader>
        <MessageTime>'.date('c').'</MessageTime>
            <MessageReference>1234567890123456789012345678901</MessageReference>
            <SiteID>concorde</SiteID>
        <Password>LxTXGQWD1Y</Password>
    </ServiceHeader>

   </Request>
   <RegionCode>EU</RegionCode>
   <Requestor>
      <AccountType>D</AccountType>
      <AccountNumber>189077569</AccountNumber>      
      <RequestorContact>
         <PersonName>'.$Name.'</PersonName>
         <Phone>'.$Phone.'</Phone>         
      </RequestorContact>
      <CompanyName>'.$Company.'</CompanyName>
   </Requestor>
   <Place>
      <LocationType>C</LocationType>
      <CompanyName>'.$Company.'</CompanyName>
      <Address1>'.$Address.'</Address1>
      <Address2>'.$Address1.'</Address2>
      <PackageLocation>'.$Location.'</PackageLocation>
      <City>'.$City.'</City>
      <CountryCode>'.$Country.'</CountryCode>
      <PostalCode>'.$Postcode.'</PostalCode>
   </Place>
   <Pickup>
      <PickupDate>'.$Date.'</PickupDate>
      <ReadyByTime>'.$Pickuptime.'</ReadyByTime>
      <CloseTime>'.$Closetime.'</CloseTime>      
      <Pieces>'.$Peices.'</Pieces>
      <SpecialInstructions>'.$Spec.'</SpecialInstructions>
   </Pickup>
   <PickupContact>
      <PersonName>'.$Name.'</PersonName>
      <Phone>'.$Phone.'</Phone>
   </PickupContact>
   
</req:BookPURequest>
';
$tuCurl = curl_init();
curl_setopt($tuCurl, CURLOPT_URL, $url);
curl_setopt($tuCurl, CURLOPT_PORT , 443);
curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
curl_setopt($tuCurl, CURLOPT_HEADER, 0);
curl_setopt($tuCurl, CURLOPT_POST, 1);
curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data)));
curl_setopt($tuCurl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($tuCurl, CURLOPT_SSL_VERIFYHOST, 0);
 
$tuData = curl_exec($tuCurl);
 
curl_close($tuCurl);
$xml = simplexml_load_string($tuData);
// echo $xml;
// print '<pre>';
// print_r($xml);

if (isset($xml->ConfirmationNumber)) {
  $confnumber = $xml->ConfirmationNumber;
}



if (isset($xml->Response->Status->ActionStatus)) {
  $error = $xml->Response->Status;
$errorstatus = $xml->Response->Status->ActionStatus;
$errormessage = $xml->Response->Status->Condition->ConditionData;
$errorcode = $xml->Response->Status->Condition->ConditionCode;


}


?>
<div class="container">
<?php if(isset($confnumber)){ ?>

        
  
<div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pickup Scheduled</h3>
                                </div>
                                <div class="panel-body">
                                    <h2>You have Created a pickup at {{$Address}} on the date {{$Date}} at {{$Pickuptime}}</h2><br>
                                    <h4>Your Pickup Confirmation Number is :  {{$confnumber}}</h4>
                                </div>
                            </div>
                          


<?php } ?>

<?php if(isset($errormessage)){ ?>
  <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">PickUp Not Sceduled</h3>
                                </div>
                                <div class="panel-body">
                                    <h2>{{$errormessage}}</h2><br>
                                    <br>
                                    <p>Error Code - {{$errorcode}}</p>
                                </div>
                            </div>

  </div>
<?php } ?> 


<?php

if (isset($confnumber)) {
  $pickup = new pickup;

$pickup->name = $Name;
$pickup->booked_by = $currentuseremail;
$pickup->company = $Company;
$pickup->address = $Address;
$pickup->address1 = $Address1;
$pickup->location = $Location;
$pickup->collection_date = $Date;
$pickup->collection_ready_time = $Pickuptime;
$pickup->collection_close_time = $Closetime;
$pickup->phone = $Phone;
$pickup->peices = $Peices;
$pickup->city = $City;
$pickup->postcode = $Postcode;
$pickup->country = $Country;
$pickup->special_instructions = $Spec;
$pickup->collection_confirmation_number = $confnumber;

$pickup->save();
}

?>




@stop

