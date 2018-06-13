@extends('layouts.layout1')
@section('PageTitle', 'Book Shipment')
@section('content')
<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
<link href="../vendor/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<script src="../vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="../vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="../vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<?php
use App\localshipment;
$shipments = localshipment::all();
foreach ($shipments as $shipment) {}
;
$currentuser = Auth::user()->name;
$currentuseremail = Auth::user()->email;
$userrate = Auth::user()->rate;
$senderCompany = Request::input('sender_company');
$senderName = Request::input('sender_name');
$senderEmail = Request::input('sender_email');
$senderPhone = Request::input('sender_phone');
$senderCountry = Request::input('sender_country');
$senderAddress = Request::input('sender_address');
$senderAddress1 = Request::input('sender_address1');
$senderCity = Request::input('sender_city');
$senderState = Request::input('sender_state');
$senderPostCode = Request::input('sender_postcode');
$recCompany = Request::input('rec_company');
$recName = Request::input('rec_name');
$recEmail = Request::input('rec_email');
$recPhone = Request::input('rec_phone');
$recCountry = Request::input('rec_country');
$recAddress = Request::input('rec_address');
$recAddress1 = Request::input('rec_address1');
$recCity = Request::input('rec_city');
$recPostCode = Request::input('rec_postcode');
$recState = Request::input('rec_state');
$ref = Request::input('ref');
$contentDesc = Request::input('content_desc');
$quantity = Request::input('quantity');
$netWeight = Request::input('netWeight');
$customs_value = Request::input('customs_value');
$content_type = Request::input('content_type');
$length = Request::input('length');
$width = Request::input('width');
$height = Request::input('height');
$weight = Request::input('weight');

$rates = array(
	array(
		"provider" => "Concorde Express",
		"service" => "Economy N-Dox",
		"price" => $weight * 3,
		"delivery_time" => 7,
		"service_id" => 1,
	),
);

?>

{{$recState }} - {{$senderState }}

<div class="">
  <div class="panel panel-visible" id="spy3">
    <div class="panel-heading">
      <div class="panel-title hidden-xs">Economy Services</div>
    </div>
    <div class="panel-body pn">
      <table class="table  table-primary " id="datatable3">
        <thead>
          <tr>
            <th>Carrier</th>
            <th>Service</th>
            <th>Rate</th>
            <th>Delivery Time</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($rates as $rate)
          <tr>
            <form action="{{ url('local/shipment/book/new') }}" method="POST">
              <td>{{$rate['provider'] }}</td>
              <td>{{$rate['service'] }}</td>
              <td>£ {{$rate['price'] }}</td>
              <td>{{$rate['delivery_time'] }} Days</td>
              <td><a><button type="submit" value="{{$rate['service_id'] }}" name="service_id"  class="btn btn-primary">Book</button>
                <input type="hidden" value="{{ $senderCompany  }}" name="sender_company">
                <input type="hidden" value="{{$rate['price'] }}" name="amount">
                <input type="hidden" value="{{ $senderName  }}" name="sender_name">
                <input type="hidden" value="{{ $senderEmail }}" name="sender_email">
                <input type="hidden" value="{{ $senderPhone }}" name="sender_phone">
                <input type="hidden" value="{{ $senderAddress }}" name="sender_address">
                <input type="hidden" value="{{ $senderAddress1 }}" name="sender_address1">
                <input type="hidden" value="{{ $senderState }}" name="sender_state">
                <input type="hidden" value="{{ $senderCity }}" name="sender_city">
                <input type="hidden" value="{{ $senderPostCode }}" name="sender_postcode">
                <input type="hidden" value="{{ $senderCountry }}" name="sender_country">
                <input type="hidden" value="{{$rate['service'] }}" name="service_type">
                <input type="hidden" value="{{$rate['provider'] }}" name="service_provider">
                <input type="hidden" value="{{ $recCompany  }}" name="rec_company">
                <input type="hidden" value="{{ $recName  }}" name="rec_name">
                <input type="hidden" value="{{ $customs_value }}" name="customs_value">
                <input type="hidden" value="{{ $recEmail }}" name="rec_email">
                <input type="hidden" value="{{ $recPhone }}" name="rec_phone">
                <input type="hidden" value="{{ $recAddress }}" name="rec_address">
                <input type="hidden" value="{{ $recAddress1 }}" name="rec_address1">
                <input type="hidden" value="{{ $recState }}" name="rec_state">
                <input type="hidden" value="{{ $recCity }}" name="rec_city">
                <input type="hidden" value="{{ $recPostCode }}" name="rec_postcode">
                <input type="hidden" value="{{ $recCountry }}" name="rec_country">
                <input type="hidden" value="{{ $length }}" name="length">
                <input type="hidden" value="{{ $width }}" name="width">
                <input type="hidden" value="{{ $height }}" name="height">
                <input type="hidden" value="{{ $weight }}" name="weight">
                <input type="hidden" value="{{ $ref }}" name="ref">
                <input type="hidden" value="{{ $contentDesc }}" name="content_desc">
                <input type="hidden" value="{{ $content_type }}" name="content_type">
                <input type="hidden" value="{{ $quantity }}" name="quantity">
              </a></td>
            </form>
          </tr>
@endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>





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
$('#datatable3').dataTable({
"aoColumnDefs": [{
'bSortable': true,
'aTargets': [-1]
}],
"oLanguage": {
"oPaginate": {
"sPrevious": "Prev",
"sNext": "Next"
}
},
"order": [[ 2, "asc" ]],
"iDisplayLength": 50,
"aLengthMenu": [
[5, 10, 25, 50, -1],
[5, 10, 25, 50, "All"]
],
"sDom": '',
"oTableTools": {
"sSwfPath": "/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
}
});
$('#datatable4').dataTable({
"aoColumnDefs": [{
'bSortable': true,
'aTargets': [-1]
}],
"oLanguage": {
"oPaginate": {
"sPrevious": "Prev",
"sNext": "Next"
}
},
"order": [[ 0, "desc" ]],
"iDisplayLength": 15,
"aLengthMenu": [
[5, 10, 25, 50, -1],
[5, 10, 25, 50, "All"]
],
"sDom": '',
"oTableTools": {
"sSwfPath": "/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
}
});
</script>
@stop