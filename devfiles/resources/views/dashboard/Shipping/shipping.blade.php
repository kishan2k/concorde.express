@extends('layouts.layout1')
@section('PageTitle', 'Shipping')
<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>



<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css">
<script src="/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
@section('content')

@section('content')

<?php

use App\localshipment;
use App\shipment;

$shipments = shipment::where('booked_by', '=', Auth::user()->email)->get();
$localshipments = localshipment::where('booked_by', '=', Auth::user()->email)->get();

foreach ($shipments as $shipment) {}
;

Shippo::setCredentials("kishan@ambasana.co.uk", "ambasana");

?>


          <div class="">
              <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                  <div class="panel-title hidden-xs">Express Shipments</div>
                </div>
                <div class="panel-body pn">
                  <table class="table  table-primary " id="datatable3">
                    <thead>
                      <tr>
                        <th>Tracking Number</th>
                        <th>Status</th>
                        <th>Reciever</th>
                        <th>Reference</th>
                        <th>Booked Date</th>
                        <th>Cost</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                    @foreach ($shipments as $shipment)
                      <tr>
                        <?php $retrieve_transaction = Shippo_Transaction::retrieve($shipment->transaction_obj);?>
                        <td>{{ $shipment->tracking_number }}</td>
                        <td>{{ $retrieve_transaction['tracking_status']['status'] }}</td>
                        <td>{{ $shipment->rec_name }}</td>
                        <td>{{ $shipment->reference }}</td>
                        <td>{{ $shipment->created_at }}</td>
                        <td>£{{ $shipment->shipment_cost_client }}</td>
                        <td><a href="shipment/{{$shipment->id}}"><button class="btn btn-primary">View</button></a></td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>



          <div class="">
              <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                  <div class="panel-title hidden-xs">Shipments</div>
                </div>
                <div class="panel-body pn">
                  <table class="table  table-primary " id="datatable4">
                    <thead>
                      <tr>
                        <th>Tracking Number</th>
                        <th>Status</th>
                        <th>Reciever</th>
                        <th>Reference</th>
                        <th>Booked Date</th>
                        <th>Cost</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                    @foreach ($localshipments as $localshipment)
                      <tr>
                        <td>{{ $localshipment->tracking_number }}</td>
                        <td>{{ $localshipment->status }}</td>
                        <td>{{ $localshipment->rec_name }}</td>
                        <td>{{ $localshipment->reference }}</td>
                        <td>{{ $localshipment->created_at }}</td>
                        <td>£{{ $localshipment->shipment_cost }}</td>
                        <td><a href="local/shipment/{{$localshipment->id}}"><button class="btn btn-primary">View</button></a></td>
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
      "order": [[ 4, "desc" ]],
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],

 "sDom": 'Tlfrtip',
  "oTableTools": {"sSwfPath": "/swf/copy_csv_xls_pdf.swf"}
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
      "order": [[ 4, "desc" ]],
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],

 "sDom": 'Tlfrtip',
  "oTableTools": {"sSwfPath": "/swf/copy_csv_xls_pdf.swf"}
   });



</script>



@stop