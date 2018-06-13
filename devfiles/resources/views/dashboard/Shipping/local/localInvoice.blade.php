<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Concorde Express | Commercial Invoice</title>
	<meta name='description' content='Commercial Invoice Form – Fill out and print a commercial invoice from your browser'>
	<meta name="google-site-verification" content="SM57_z8qwOx-f4jMaIxZzH5Y3NvG_IZbaYnkfqxE8zw">
	<meta name="msvalidate.01" content="F8913053136DBA78ADDD87B7F0FC512F">
	<link rel="stylesheet" href="{{asset('invoice/css/reset.css')}}">
	<link rel="stylesheet" href="{{asset('invoice/css/styles.css')}}">
	<link rel="stylesheet" href="{{asset('invoice/css/print.css')}}" media="print">
</head>

<body>


	<div id="actions">
		<div class="left">
			<input class="button" type="button" value="Print" onclick="window.print();return false;">
			<!--<input class="button" id="view" type="submit" value="View PDF" />-->
		</div>

		<div class="clear"><!--empty--></div>
	</div><!--end actions-->
	<div id="main">
		<form id="form" action="topdf.php" method="post">
			<div id="invHeader">
			<h1 style="color: #000000;">Commercial Invoice - Concorde Express</h1>
					<br>
				<div id="headLeft">

					<div>
						<p>Shipper/Exporter<p>
						<textarea name="shipper" id="shipper">

						</textarea>
					</div>
					<div>
						<p>Consignee<p>
						<textarea name="consignee" id="consignee"></textarea>
					</div>

				</div><!--end headLeft-->


				<div id="headRight">
					<div id="headRightLeft">
						<div>
							<p>Date</p>
							<input type="text" value="{{$shipment->shipment_booking_date}}" name="date" id="date">
						</div>

						<div>
							<p>Country of Origin</p>
							<input type="text" name="orig" id="orig">
						</div>
						<div>
							<p>Final Destination</p>
							<input type="text" name="dest" id="dest">
						</div>

						<div>
							<p>Terms of Freight</p>
							<input type="text" name="freightTerms" id="freightTerms">
						</div>
						<div>
							<p>Export Route / Carrier</p>
							<input type="text" name="carrier" id="carrier">
						</div>
					</div>
					<div id="headRightRight">
						<div>
							<p>Invoice No.</p>
							<input type="text" name="invNo" id="invNo">
						</div>
						<div>
							<p>Currency Used</p>
							<input type="text" name="currency" id="currency">
						</div>
						<div>
							<p>B/L / AWB No.</p>
							<input type="text" name="awb" id="awb">
						</div>
						<div>
							<p>No. of Packages</p>
							<input type="text" name="packageNo" id="packageNo">
						</div>
						<div>
							<p>Service Type</p>
							<input type="text" name="service" id="service">
						</div>


					</div>
					<div class="clear"><!--empty--></div>
					<div>
						<p>Notes</p>
						<textarea name="notes" id="notes"></textarea>
					</div>
				</div><!--end headRight"-->
				<div class="clear"><!--empty--></div>
			</div><!--end invHeader-->
			<div id="invTable">
				<table id="items">
					<thead>
						<tr>
							<th>Item & Description</th>
							<th>HS No.</th>
							<th>Unit Value</th>
							<th>Quantity</th>
							<th>Weight: <input type="text" name="weight" id="weight"></th>
							<th>Value</th>
						</tr>
					</thead>
					<tfoot>
						<tr id="hiderow">
							<td colspan="6"><a id="addrow" href="javascript:;" title="Add a row">+ Row</a></td>
						</tr>

						<tr>
							<td class="blank" colspan="2"> </td>
							<td class="total-line sub-total">Sub Totals</td>
							<td class="total-qty sub-total"><div id="total-qty">0</div><input type="hidden" name="total-qty" id="qtyInpt"></td>
							<td class="total-weight sub-total"><div id="total-weight">0</div><input type="hidden" name="total-weight" id="weightInpt"></td>
							<td class="total-value sub-total"><div id="total">$0</div><input type="hidden" name="total" id="totalInpt"></td>
						</tr>
						<tr>
							<td colspan="3" class="blank"> </td>
							<td class="total-line freightAmt">Freight</td>
							<td class="total-value freightAmt"><input type="text" name="freightdue" id="freightInpt"></td>
						</tr>
						<tr>
							<td colspan="3" class="blank"> </td>
							<td class="total-line insAmt">Insurance</td>
							<td class="total-value insAmt"><input type="text" name="insAmt" id="insInpt"></td>
						</tr>
						<tr>
							<td colspan="3" class="blank"> </td>
							<td class="total-line balance">Total Value</td>
							<td class="total-value balance"><div class="due">$0</div><!--<input type="hidden" name="due" class="due" />--></td>
						</tr>
					</tfoot>
				</table>
			</div><!--end invTable-->
			<div id="signature">
				<p><em>I <strong>({{$shipment->sender_name}})</strong> hereby certify this commercial invoice to be true and correct.</em></p>
				<br>
				<br>
				<p>Shipper______________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date_________________</p>
			</div>
		</form>
	</div><!--end main-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('invoice/js/jstorage.min.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('invoice/js/autoresize.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('invoice/js/invoice.js')}}"></script>
<script type="text/javascript">
$('#shipper').val($.jStorage.get('shipper', '{{$shipment->sender_company}}' + '\n' + '{{$shipment->sender_name}}' + '\n' + '{{$shipment->sender_address1}}' + '\n' + '{{$shipment->sender_address2}}' + '\n' + '{{$shipment->sender_city}}, {{$shipment->sender_state}}, {{$shipment->sender_postcode}}' + '\n' + '{{$shipment->sender_country}}' + '\n' + '{{$shipment->sender_phone}}'));
$('#consignee').val($.jStorage.get('consignee', '{{$shipment->rec_company}}'+ '\n' + '{{$shipment->rec_name}}' + '\n' + '{{$shipment->rec_address1}}' + '\n' + '{{$shipment->rec_address2}}' + '\n' + '{{$shipment->rec_city}}, {{$shipment->rec_state}}, {{$shipment->rec_postcode}}' + '\n' + '{{$shipment->rec_country}}'  + '\n' + '{{$shipment->rec_phone}}'));
$('#intConsignee').val($.jStorage.get('intConsignee', ''));

$('#date').val('{{$shipment->shipment_booking_date}}');
$('#orig').val($.jStorage.get('orig', '{{$shipment->sender_country}}'));
$('#dest').val($.jStorage.get('dest', '{{$shipment->rec_country}}'));
$('#saleTerms').val($.jStorage.get('saleTerms', ''));
$('#freightTerms').val($.jStorage.get('freightTerms', 'DAP'));
$('#invNo').val($.jStorage.get('invNo', '{{$shipment->tracking_number}}'));
$('#currency').val($.jStorage.get('currency', 'GBP'));
$('#awb').val($.jStorage.get('awb', '{{$shipment->tracking_number}}'));
$('#carrier').val($.jStorage.get('carrier', '{{$shipment->shipment_provider}}'));
$('#pmtTerms').val($.jStorage.get('pmtTerms', ''));
$('#packageNo').val($.jStorage.get('packageNo', '{{$shipment->p_number}}'));
$('#notes').val($.jStorage.get('notes', ''));
$('#weight').val($.jStorage.get('weight', 'KGs.'));
$('#service').val('{{$shipment->shipment_class}}');




</script>

</body>
</html>