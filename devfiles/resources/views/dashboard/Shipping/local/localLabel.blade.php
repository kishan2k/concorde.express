<?php
use App\User;
$bookedbyemail = $shipment->booked_by;
$usersearch = User::where('email', '=', $bookedbyemail)->first();
$userid = $usersearch->id;
?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-e3zv{font-weight:bold}
.tg .tg-hgcj{font-weight:bold;text-align:center}
.tg .tg-h0x1{text-align:center}
#logo {width: 45px;}
#barcode {text-align:center}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 423px">
  <colgroup>
  <col style="width: 100px">
  <col style="width: 155px">
  <col style="width: 136px">
  </colgroup>
  <tr>
    <th class="tg-hgcj"  colspan="2">{{$shipment->shipment_class}}</th>
    <th class="tg-s6z2"><img id="logo" src="http://res.cloudinary.com/concorde-express/image/upload/v1437392521/75_Logo_gqcho3.png"><br><strong>Concorde Express</strong><br></th>
  </tr>
  <tr>
    <td class="tg-e3zv">FROM</td>
    <td class="tg-6wtj"><strong>{{$shipment->sender_company}}</strong><br>
      {{$shipment->sender_name}}<br>{{$shipment->sender_address1}}
      {{ $shipment->sender_address2}}<br>
      {{ $shipment->sender_state}}<br>
      {{$shipment->sender_city}}<br>{{$shipment->sender_postcode}}<br>{{$shipment->sender_country}}
    </td>
    <td class="tg-hgcj">{{$shipment->sender_phone}}</td>
  </tr>
  <tr>
    <td class="tg-e3zv">TO</td>
    <td class="tg-6wtj"><strong>{{$shipment->rec_company}}</strong><br>
      {{$shipment->rec_name}}<br>{{$shipment->rec_address1}}
      {{ $shipment->rec_address2}} <br>
      {{ $shipment->rec_state}}<br>
      {{$shipment->rec_city}}<br>{{$shipment->rec_postcode}}<br>{{$shipment->rec_country}}
    </td>
    <td class="tg-hgcj">{{$shipment->rec_phone}}</td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="2">Ref : {{$shipment->reference}}</td>
    <td class="tg-s6z2">{{$shipment->shipment_booking_date}}</td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="3">Contents : {{$shipment->shipment_contents_type}} - {{$shipment->shipment_contents}}</td>
  </tr>
  <tr>
    <td class="tg-h0x1" >Weight<br>{{$shipment->shipment_weight}}KG</td>
    <td class="tg-s6z2">Peice(s) : {{$shipment->p_number}}<br>Acc : 786{{$userid}}</td>
    <td class="tg-s6z2">Value (GBP) <br>{{$shipment->shipment_customs_value}}</td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="3">
      <img id="barcode" class="img-responsive center-block" />
    </td>
  </tr>
</table>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https:////netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://github.com/lindell/JsBarcode/releases/download/1.5/JsBarcode.all.min.js"></script>
<script>
$(document).ready(function(){
setInterval(function(){
var date = new Date();
$("#barcode").JsBarcode("{{$shipment->id}}", {
width:  3,
height: 75,
quite: 15,
format: "CODE128",
displayValue: true,
font:"monospace",
textAlign:"center",
fontSize: 20,
backgroundColor:"",
lineColor:"#000"
});
},1000);
});
</script>