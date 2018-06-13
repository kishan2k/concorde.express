@extends('layouts.layout1')
@section('PageTitle', 'Pickups')
<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>



<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css">
<script src="/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
@section('content')

@section('content')

<?php

use App\pickup;
$pickups = pickup::where('booked_by', '=', Auth::user()->email)->get();

foreach ($pickups as $pickup) {}
;

?>


          <div class="">
              <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                  <div class="panel-title hidden-xs">Pickup</div>
                  <a href="{{ url('pickup/create') }}"><button class="btn btn-info right">New Pickup</button></a>
                </div>
                <div class="panel-body pn">
                  <table class="table  table-primary " id="datatable3">
                    <thead>
                      <tr>
                        <th>Confirmation Number</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Address</th>
                        <th>Booked Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                    @foreach ($pickups as $pickup)
                      <tr>
                        <td>{{ $pickup->collection_confirmation_number }}</td>
                        <td>{{ $pickup->name }}</td>
                        <td>{{ $pickup->collection_date }}</td>
                        <td>{{ $pickup->collection_ready_time }} - {{ $pickup->collection_close_time }}</td>
                        <td>{{ $pickup->address }} - {{ $pickup->postcode }}</td>
                        <td>{{ $pickup->created_at }}</td>
                        <td>
                        <a href="pickup/{{$pickup->id}}/view"><button class="btn btn-primary">View</button></a>


                        <a href="pickup/{{$pickup->id}}/cancel"><button class="btn btn-danger">Cancel</button></a>
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



</script>



@stop