@extends('layouts.layout1')
@section('PageTitle', 'Shipment Overview')
<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>



<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css">
<script src="/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
@section('content')

<?php

use App\localshipment;
use App\shipment;

$shipments = shipment::all();
$localshipments = localshipment::all();

foreach ($shipments as $shipment) {}
;

Shippo::setCredentials("kishan@ambasana.co.uk", "ambasana");

?>

          <div class="">
              <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                  <div class="panel-title hidden-xs">Shipments</div>
                </div>
                <div class="panel-body pn">
                  <table class="table  table-primary " id="datatable3">
                    <thead>
                      <tr>
                        <th>Tracking Number</th>
                        <th>Status</th>
                        <th>Reference</th>
                        <th>Booked By</th>
                        <th>Receiver</th>
                        <th>Booked Date</th>
                        <th>My Cost</th>
                        <th>Client Cost</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                    @foreach ($shipments as $shipment)
                      <tr>
                        <?php $retrieve_transaction = Shippo_Transaction::retrieve($shipment->transaction_obj);?>
                        <td>{{ $shipment->tracking_number }}</td>
                        <td>{{ $retrieve_transaction['tracking_status']['status'] }}</td>
                        <td>{{ $shipment->reference }}</td>
                        <td>{{ $shipment->booked_by }}</td>
                        <td>{{ $shipment->rec_name }}</td>
                        <td>{{ $shipment->created_at }}</td>
                        <td>£ {{ $shipment->shipment_cost_us }}</td>
                        <td>£ {{ $shipment->shipment_cost_client }}</td>
                        <td>
                          <a href="shipment/{{$shipment->id}}"><button class="btn btn-primary">View</button></a>
                          <a href="shipment/{{$shipment->id}}/delete"><button class="btn btn-danger">Delete</button></a>


                        </td>
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
                        <th>Reference</th>
                        <th>Booked By</th>
                        <th>Receiver</th>
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
                        <td>{{ $localshipment->reference }}</td>
                        <td>{{ $localshipment->booked_by }}</td>
                        <td>{{ $localshipment->rec_name }}</td>
                        <td>{{ $localshipment->created_at }}</td>
                        <td>£ {{ $localshipment->shipment_cost }}</td>

                        <td>
                          <a href="/local/shipment/{{$shipment->id}}"><button class="btn btn-primary">View</button></a>
                          <a href="local/shipment/{{$shipment->id}}/delete"><button class="btn btn-danger">Delete</button></a>


                        </td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>








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
      "order": [[ 5, "desc" ]],
      "iDisplayLength": 50,
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
      "order": [[ 5, "desc" ]],
      "iDisplayLength": 50,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],

 "sDom": 'Tlfrtip',
  "oTableTools": {"sSwfPath": "/swf/copy_csv_xls_pdf.swf"}
   });

</script>



@stop