

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
<col style="width: 132px">
<col style="width: 155px">
<col style="width: 136px">
</colgroup>
  <tr>
    <th class="tg-hgcj"  colspan="2">{{$shipment->shipment_class}}</th>

    <th class="tg-s6z2"><img id="logo" src="https://res.cloudinary.com/concorde-express/image/upload/v1437392521/75_Logo_gqcho3.png"><br><strong>Concorde Express</strong><br></th>
  </tr>
  <tr>
    <td class="tg-e3zv">FROM</td>
    <td class="tg-6wtj">{{$shipment->sender_company}}<br>
    {{$shipment->sender_name}}<br>{{$shipment->sender_address1}}<br>{{$shipment->sender_address2}}<br>{{$shipment->sender_postcode}}<br>United Kingdom
    </td>
    <td class="tg-hgcj">{{$shipment->sender_phone}}</td>
  </tr>
  <tr>
    <td class="tg-e3zv">To</td>
    <td class="tg-6wtj">{{$shipment->rec_company}}<br>{{$shipment->rec_name}}<br>Leicester<br>LE4 6NG<br>UK</td>
    <td class="tg-hgcj">07788859991</td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="2">Ref : S5 Ebay</td>
    <td class="tg-s6z2">20/07/2015</td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="3">Contents : Mobile Phone</td>
  </tr>
  <tr>
  <td class="tg-031e" colspan="3">Special Instructions : FRAGILE : HANDLE WITH CARE</td>
  </tr>
  <tr>
    <td class="tg-h0x1" >Weight (KG)<br>5KG</td>
    <td class="tg-s6z2">Peice : 1/2<br>Acc : 786001</td>
    <td class="tg-s6z2">Value (GBP) <br>15 </td>
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
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="{{ asset('JsBarcode.all.min.js')}}"></script>


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